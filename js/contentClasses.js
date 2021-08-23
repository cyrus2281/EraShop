//a variable to hold to current product item
let currentProductItem = {};
let ajaxData = [];
//Class to get data
class Ajax {
     async getItems() {
         const url = 'https://604506d8c0194f00170bc898.mockapi.io/erashop';
        // const url = './js/items.json';
        const allItems = await fetch(url);
        const data = await allItems.json();
        return data
    }
}

//class to work with UI
class UI {
    constructor() {
        this.container = document.querySelector('.load-content');
        this.featured = document.querySelector('.slides-center');
        this.productDOM = document.querySelector('.product-container');
    }
    //get content and send each of it to showContent 
    getContent(items) {
        if (this.container) {
            items.forEach(item => {
                this.showContent(item, this.container);
            })
        }
    }
    //add an item to content
    showContent(item, parent) {
        const div = document.createElement('div');
        div.classList.add('item', item.brand, item.categ, 't');
        div.dataset.name = `${item.modal} ${item.brand} ${item.categ}`;
        div.dataset.price = `${item.price}`;
        div.dataset.rating = `${item.rating}`;
        div.dataset.id = `${item.id}`;
        let stars = this.getRating(item.rating);
        div.innerHTML = `
            <a href="./product.html#id=${item.id}" class="item-img-container">
              <img
                src=".${item.image}"
                class="item-img"
                alt="product item image"
              />
            </a>
            <div class="item-info">
              <h2 class="item-title"><a href="./product.html#id=${item.id}">${item.modal}</a></h2>
              <h3 class="item-subtitle">${item.brand}</h3>
              <h4 class="item-subtext">${item.categ}</h4>
            </div>
            <div class="item-extra">
              <div class="item-stars">
                ${stars}
              </div>
              <span class="item-price">$${item.price}</span>
            </div>
            `
        parent.appendChild(div);
    }
    //create html format for the ratings
    getRating(rating) {
        let rateDOM = [
            `<i class="far fa-star item-star"></i>`,
            `<i class="far fa-star item-star"></i>`,
            `<i class="far fa-star item-star"></i>`,
            `<i class="far fa-star item-star"></i>`,
            `<i class="far fa-star item-star"></i>`];
        let index = 0;
        let result = "";
        rateDOM.forEach(item => {
            if (index < rating) {
                result += `<i class="fas fa-star item-star"></i>\n`;
            } else {
                result += item + "\n";
            }
            index++;
        });
        return result;
    }
    //get featured items for carousel and send each to showFeatured and setup owl script
    getFeatured(items) {
        if (this.featured) {
            let output = "";
            items.forEach(item => {
                if (item.featured) {
                    output += this.showFeatured(item);
                }
            });
            this.featured.innerHTML = output;
            this.owlCarousel();
        }
    }
    //add featured items to carousel 
    showFeatured(item) {
        let article = `
        <!-- single featured item -->
        <article class="featured-item">
          <h3 class="featured-header">${item.brand}</h3>
          <h4 class="featured-subtitle">${item.modal}</h4>
          <div class="featured-container">
            <img
              src=".${item.image}"
              class="featured-picture"
              alt="featured product"
            />
            <a href="./product.html#id=${item.id}" class="featured-icon">
              <i class="fas fa-eye"></i>
            </a>
          </div>
        </article>
        <!-- end of single featured item -->
            `
        return article;
    }
    //activate the owl API
    owlCarousel() {
        // owl carousel
        $('.slides-center').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            smartSpeed: 4000,
            center: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    }
    //get product by id and call showProduct
    getProduct(items) {
        if (this.productDOM) {
            const id = this.getPageId();
            const item = this.getProductByID(items, id);
            currentProductItem = item;
            this.showProduct(item);
        }
    }
    //update the content of product page based on the item
    showProduct(item) {
        const name = document.querySelector('.product-title');
        const modal = document.querySelector('#product-model');
        const brand = document.querySelector('#product-brand');
        const category = document.querySelector('#product-categ');
        const description = document.querySelector('.prodcut-description');
        const stars = document.querySelector('.product-stars');
        const price = document.querySelector('.item-price');
        const image = document.querySelector('.product-img');
        const productTotal = document.querySelector('#product-total');

        name.innerHTML = `${item.brand} ${item.modal}`;
        modal.innerHTML = `${item.modal}`;
        modal.dataset.id = `${item.id}`;
        modal.dataset.price = `${item.price}`;
        brand.innerHTML = `${item.brand}`;
        category.innerHTML = `${item.categ}`;
        description.innerHTML = `${item.description}`;
        stars.innerHTML = this.getRating(item.rating);
        price.innerHTML = `$${item.price}`;
        image.src = `.${item.image}`;
        productTotal.innerHTML = `${item.price}`;
    }
    //find the item with matching id
    getProductByID(items, id) {
        return items.find(item => item.id == id);
    }
    //extract id from the url
    getPageId() {
        let baseUrl = (window.location).href;
        return baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
    }
}
//class to handle shopping cart
class Cart {
    constructor() {
        this.shoppingCartIcon = document.querySelector('#shopping-cart');
        this.shoppingCartAmount = document.querySelector('.shopping-cart-amount');
        this.cartTotalPrice = document.querySelector('#cart-total');

        this.cartContainer = document.querySelector('.cart-container');
        this.cart = document.querySelector('.cart');
        this.closeCartBtn = document.querySelector('.close-cart');
        this.clearCartBtn = document.querySelector('.cart-btn-clear');
        this.cartItems = document.querySelector('.cart-items');
    }
    //set up cart
    cartSetUp() {
        //add event listeners
        this.cartListeners();
        //get items
        let itemsCart = this.getStorageCart();
        if (itemsCart.length > 0) {
            //add items to the cart
            itemsCart.forEach(item => {
                this.createItem(item);
            });
        }
        //update cart
        this.updataCart();
    }
    //add cart listeners
    cartListeners() {
        this.shoppingCartIcon.addEventListener('click', e => {
            this.showCart();
        });
        this.closeCartBtn.addEventListener('click', e => {
            this.closeCart();
        });
        this.clearCartBtn.addEventListener('click', () => {
            this.clearCart();
        });
        this.cartItems.addEventListener('click', e => {
            if (e.target.classList.contains("cart-item-remove")) {
                this.removeItem(e.target.parentElement.parentElement);
            } else if (e.target.classList.contains("fa-chevron-up")) {
                let cartID = e.target.parentElement.parentElement.dataset.cartId;
                let allItem = this.getStorageCart();
                let item = allItem.find(data => data.cartId == cartID);
                item.amount += 1;
                e.target.nextElementSibling.innerText = item.amount;
                this.setStorageCart(allItem);
                this.updataCart();
            } else if (e.target.classList.contains("fa-chevron-down")) {
                let cartID = e.target.parentElement.parentElement.dataset.cartId;
                let allItem = this.getStorageCart();
                let item = allItem.find(data => data.cartId == cartID);
                item.amount -= 1;
                e.target.previousElementSibling.innerText = item.amount;
                if (item.amount > 0) {
                    this.setStorageCart(allItem);
                    this.updataCart();
                } else {
                    this.removeItem(e.target.parentElement.parentElement);
                }
            }
        });
    }
    //get from local storage
    getStorageCart() {
        let cartItems = (localStorage.getItem('cart')) ? JSON.parse(localStorage.getItem('cart')) : [];
        return cartItems;
    }
    //set to loacl storage
    setStorageCart(items) {
        localStorage.setItem('cart', JSON.stringify(items));
    }
    //clear loacl storage
    clearStorage() {
        localStorage.removeItem('cart');
    }
    //add item to cart and call creatItem
    addItemToCart(item) {
        let allItems = this.getStorageCart();
        let notFound = true;
        allItems.forEach(data => {
            if (data.cartId == item.cartId) {
                data.amount = parseFloat(data.amount) + parseFloat(item.amount);
                notFound = false;
                this.upadteAmount(data);
            }
        })
        if (notFound) {
            allItems.push(item);
            this.createItem(item);
        }
        this.setStorageCart(allItems);
        this.updataCart();
    }
    //creat html for the item added to cart
    createItem(item) {
        const article = document.createElement('article');
        article.classList.add('cart-item');
        article.dataset.price = item.price;
        article.dataset.amount = item.amount;
        article.dataset.cartId = item.cartId;
        article.innerHTML = `
            <img
              class="cart-image"
              src="${item.image}"
              alt="image"
            />
            <div class="cart-info">
              <a href="./product.html#id=${item.id}" class="cart-fullname"
                >${item.brand} ${item.modal}</a
              >
              <p class="cart-details">${item.hard} ${item.ram}</p>
              <p class="cart-price">$${item.price}</p>
              <p class="cart-item-remove">remove</p>
            </div>
            <div class="cart-item-btns">
              <i class="fas fa-chevron-up"></i>
              <p class="item-amount">${item.amount}</p>
              <i class="fas fa-chevron-down"></i>
            </div>
        `
        this.cartItems.appendChild(article);
    }
    //remove item from everywhere
    removeItem(item) {
        this.cartItems.removeChild(item);
        let allCartItems = this.getStorageCart();
        allCartItems = allCartItems.filter(data => data.cartId != item.dataset.cartId);
        this.setStorageCart(allCartItems);
        this.updataCart();
    }
    //update the amount
    upadteAmount(item) {
        const id = item.cartId;
        const allItems = document.querySelectorAll('.cart-item');
        allItems.forEach(data => {
            if (data.dataset.cartId == id) {
                data.querySelector('.item-amount').innerText = item.amount;
            }
        })
    }
    //update the total price and total amount
    updataCart() {
        let totalPrice = 0;
        let totalAmount = 0;
        const allItems = this.getStorageCart();
        if (allItems.length > 0) {
            allItems.forEach(item => {
                let price = item.price;
                let amount = item.amount;
                totalAmount += amount;
                totalPrice += price * amount;
            });
        }
        if (totalAmount <= 0) {
            this.shoppingCartAmount.classList.add('hideItem');
        } else {
            this.shoppingCartAmount.classList.remove('hideItem');
            this.shoppingCartAmount.textContent = totalAmount;
        }
        this.cartTotalPrice.textContent = totalPrice.toFixed(2);
    }
    //clear the cart
    clearCart() {
        this.clearStorage();
        this.cartItems.innerHTML = '';
        this.updataCart();
        this.closeCart();
    }
    //close the cart
    closeCart() {
        this.cartContainer.classList.remove('showCartContainer');
        this.cart.classList.remove('showCart');
    }
    //show the cart
    showCart() {
        this.cartContainer.classList.add('showCartContainer');
        this.cart.classList.add('showCart');
    }

}
//creating instances of the classes
const ajax = new Ajax();
const ui = new UI();
const cart = new Cart();
//getting data and runnnig the ui
ajax.getItems()
    .then(data => {
        ui.getContent(data);
        ui.getFeatured(data);
        ui.getProduct(data);
    })
    .catch(error => console.log(error));
cart.cartSetUp();
