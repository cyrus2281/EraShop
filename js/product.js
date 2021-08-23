document.addEventListener("DOMContentLoaded", () => {
setTimeout(function () {
    const cart = new Cart();
    //const thisItem = currentProductItem;

    const form = document.querySelector('.product-form');
    const itemHard = document.querySelector('#product-storage');
    const itemRam = document.querySelector('#product-ram');
    const itemQuantity = document.querySelector('#product-quantity');
    const addToCart = document.querySelector('#submit-cart');
    const productTotal = document.querySelector('#product-total');

    const itemModal = document.querySelector('#product-model');
    const itemBrand = document.querySelector('#product-brand');
    const itemImg = document.querySelector('.product-img');


    form.addEventListener('change', () => {
        if(checkQuantity()){
            productTotal.textContent = calculatePrice();
        }
    });
    addToCart.addEventListener('click', e => {
        e.preventDefault();
        if (checkQuantity()) {
            let productItem = createItem();
            cart.addItemToCart(productItem);
            clearScreen()
            cart.showCart();
        }
    });

    function createItem() {
        const cartItem = {};
        let itemPrice = calculatePrice();
/*
        cartItem.modal = thisItem.modal ;
        cartItem.brand = thisItem.brand;
        cartItem.price = itemPrice;
        cartItem.hard = itemHard.value;
        cartItem.ram = itemRam.value;
        cartItem.image = thisItem.image;
        cartItem.amount = parseFloat(itemQuantity.value);
        cartItem.id = thisItem.id;
        cartItem.cartId = `${thisItem.id}${itemHard.value}${itemRam.value}` ;
*/
        cartItem.modal = itemModal.innerHTML ;
        cartItem.brand = itemBrand.innerHTML;
        cartItem.price = itemPrice;
        cartItem.hard = itemHard.value;
        cartItem.ram = itemRam.value;
        cartItem.image = itemImg.src;
        cartItem.amount = parseFloat(itemQuantity.value);
        cartItem.id = itemModal.dataset.id;
        cartItem.cartId = `${itemModal.dataset.id}${itemHard.value}${itemRam.value}` ;

        return cartItem;
    }
    function calculatePrice(){
        // let totalPrice = parseFloat(thisItem.price);
        let totalPrice = parseFloat(itemModal.dataset.price);

        if(itemHard.value == '1TB'){
            totalPrice += 300;
        } else if (itemHard.value == '2TB') {
            totalPrice += 600;
        } 
        if (itemRam.value == '16GB') {
            totalPrice += 200;
        } else if (itemRam.value == '32GB') {
            totalPrice += 400;
        }

        totalPrice *= itemQuantity.value;
        return totalPrice.toFixed(2);
    }
    function checkQuantity() {
        let value = itemQuantity.value;
        if (value < 1) {
            showFeedback('Quantity cannot be less than 1.');
            return false;
        }
        return true;
    }
    //clear screen
    function clearScreen() {
        itemHard.value = '512GB';
        itemRam.value = '8GB';
        itemQuantity.value = 1;
        productTotal.textContent = parseFloat(itemModal.dataset.price);
    }
    //show feedback
    function showFeedback(text) {
        const feedback = document.querySelector('.feedback');
        feedback.textContent = text;
        feedback.classList.add('showItem');
        setTimeout(() => feedback.classList.remove('showItem'), 3000);
    }
    
}, 750);
});