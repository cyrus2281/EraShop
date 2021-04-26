//This script will setup the buttons for the vendor page
(function () {
    //getting the buttons
    const btns = document.querySelectorAll('.selector-filter-btn')
    btns.forEach(btn => {
        //adding event listeners
        btn.addEventListener('click', e => {
            const vendor = e.target.dataset.vendor;
            const allItems = document.querySelectorAll(".item");
            //filtering items
            allItems.forEach(item => {
                if (item.classList.contains(vendor)) {
                    item.classList.remove('hideItem');
                    item.classList.add('t');
                } else {
                    item.classList.add('hideItem');
                    item.classList.remove('t');
                }
            })
        });
    });
})();