document.addEventListener("DOMContentLoaded", () => {
    //wait for data to load
    setTimeout(function () {
    //categories form the inside page
    const links = document.querySelectorAll('.category-btn');
    links.forEach(link => {
        link.addEventListener('click', () => {
            let hredUrl = link.href;
            let categ = hredUrl.substring(hredUrl.lastIndexOf('=') + 1);
            categorize(categ);
        });
    });
    //handle category from other pages
    let baseUrl = (window.location).href;
    let category = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
    setTimeout(() => categorize(category), 100);
    categorize(category);
    //the function that filter based on the category
    function categorize(category) {
        document.querySelector('#categ-title').textContent = category;
        const allItems = document.querySelectorAll(".item");
        allItems.forEach(item => {
            if (item.classList.contains(category)) {
                item.classList.remove('displayHide');
                item.classList.add('t');
            } else {
                item.classList.add('displayHide');
                item.classList.remove('t');
            }
        })
    };
    }, 650);
})
