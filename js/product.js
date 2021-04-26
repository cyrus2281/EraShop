document.addEventListener("DOMContentLoaded", () => {
    const cart = new Cart();

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
        if (checkQuantity()) {
            productTotal.textContent = calculateTotalPrice();
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

        cartItem.modal = itemModal.innerHTML;
        cartItem.brand = itemBrand.innerHTML;
        cartItem.price = itemPrice;
        cartItem.hard = itemHard.value;
        cartItem.ram = itemRam.value;
        cartItem.image = itemImg.src;
        cartItem.amount = parseFloat(itemQuantity.value);
        cartItem.id = itemModal.dataset.id;
        cartItem.cartId = `${itemModal.dataset.id}${itemHard.value}${itemRam.value}`;

        return cartItem;
    }
    function calculatePrice() {
        let totalPrice = parseFloat(itemModal.dataset.price);

        if (itemHard.value == '1TB') {
            totalPrice += 300;
        } else if (itemHard.value == '2TB') {
            totalPrice += 600;
        }
        if (itemRam.value == '16GB') {
            totalPrice += 200;
        } else if (itemRam.value == '32GB') {
            totalPrice += 400;
        }
        return totalPrice.toFixed(2);
    }
    //calcuate price mutliply quantity
    function calculateTotalPrice() {
        let totalPrice = calculatePrice();
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



    //comment stars
    const rateOne = document.querySelector('.rate-1');
    const rateTwo = document.querySelector('.rate-2');
    const rateThree = document.querySelector('.rate-3');
    const rateFour = document.querySelector('.rate-4');
    const rateFive = document.querySelector('.rate-5');
    const starRate = document.querySelectorAll('.pointer');
    const commentRating = document.querySelector('#comment-rating');

    starRate.forEach(star => {
        star.addEventListener('click', (e) => {
            setRating(e.target.dataset.rate);
        })
    })

    function setRating(rating) {
        allStars = [rateOne, rateTwo, rateThree, rateFour, rateFive];
        for (let i = 0; i < 5; i++) {
            if (i < rating) {
                allStars[i].classList.add('fas');
                allStars[i].classList.remove('far');
            } else {
                allStars[i].classList.add('far');
                allStars[i].classList.remove('fas');
            }
        }
        commentRating.setAttribute('value',rating);
    }
});