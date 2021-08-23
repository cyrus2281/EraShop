//this script apply sorting and functionality to page
const filterPriceMin = document.querySelector("#filter-price-range-min");
const filterPriceMax = document.querySelector("#filter-price-range-max");
const filterRateMin = document.querySelector("#filter-rating-range-min");
const filterRateMax = document.querySelector("#filter-rating-range-max");
const ItemsContainer = document.querySelector('.load-content');
//listener for filter button
document.querySelector('.filter-btn').addEventListener('click', (e) => {
    e.preventDefault();
    //getting all the values
    let minPrice = parseFloat(filterPriceMin.value);
    let maxPrice = parseFloat(filterPriceMax.value);
    let minRate = parseFloat(filterRateMin.value);
    let maxRate = parseFloat(filterRateMax.value);
    const items = document.querySelectorAll('.item');
    //applying the filter to each item
    items.forEach(item => {
        let price = parseFloat(item.dataset.price);
        let rating = parseFloat(item.dataset.rating);
        if (!(price > maxPrice || price < minPrice || rating < minRate || rating > maxRate)) {
            item.classList.add('t');
            item.classList.remove('hideItem');
        } else {
            item.classList.add('hideItem');
            item.classList.remove('t');
        }
    });
    //check for empty result
    checkEmpty();
});
//listener for sort button
document.querySelector('.sort-toggle').addEventListener('click', (e) => {
    if (e.target.dataset.sort) {
        //getting items and convert them to sortalbe
        const type = e.target.dataset.sort;
        const items = document.querySelectorAll('.item');
        const sortableItems = convertItems(items);
        let sortedItems;
        //sorting items
        if (type == "pl") {
            sortedItems = sortLowPirce(sortableItems);
        } else if (type == "ph") {
            sortedItems = sortHighPirce(sortableItems);
        } else if (type == "rl") {
            sortedItems = sortLowRate(sortableItems);
        } else if (type == "rh") {
            sortedItems = sortHighRate(sortableItems);
        }
        //displaying sorted items
        sortDOM(sortedItems, items)
    }
});
//creating a sortable arry from the items
function convertItems(items) {
    const itemArray = []
    items.forEach(item => {
        let idItem = parseFloat(item.dataset.id);
        let priceItem = parseFloat(item.dataset.price);
        let rateItem = parseFloat(item.dataset.rating);
        let object = {
            id: idItem,
            rate: rateItem,
            price: priceItem
        }
        itemArray.push(object);
    });
    return itemArray;
}
//sorting functions
function sortLowPirce(items) {
    let sorting = items.slice(0);
    sorting.sort(function (a, b) {
        return a.price - b.price;
    });
    return sorting;
}
function sortHighPirce(items) {
    let sorting = items.slice(0);
    sorting.sort(function (a, b) {
        return b.price - a.price;
    });
    return sorting;
}
function sortLowRate(items) {
    let sorting = items.slice(0);
    sorting.sort(function (a, b) {
        return a.rate - b.rate;
    });
    return sorting;
}
function sortHighRate(items) {
    let sorting = items.slice(0);
    sorting.sort(function (a, b) {
        return b.rate - a.rate;
    });
    return sorting;
}
//displaying the sorted items on the page
function sortDOM(sortedItems, allItems) {
    const parent = allItems[0].parentElement;
    const containerDOM = document.querySelector('.load-content');
    containerDOM.innerHTML = "";
    sortedItems.forEach(srtItem => {
        allItems.forEach(data => {
            if (data.dataset.id == srtItem.id) {
                containerDOM.appendChild(data);
            }
        });
    })
}
//if all items filtered out, "show no item found"
function checkEmpty() {
    filterItems = [...document.querySelectorAll('.t')];
    filterItems = filterItems.filter(itm => !itm.classList.contains('displayHide'));
    if (filterItems.length <= 0) {
        document.querySelector('.no-item-search').textContent = 'no item matched'
    } else {
        document.querySelector('.no-item-search').textContent = ''
    }
}