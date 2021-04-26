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
//creating instances of the class
const cart = new Cart();
//setting up the cart
cart.cartSetUp();

