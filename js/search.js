//this file adds the functionality to the search bar
document.addEventListener("DOMContentLoaded",()=>{
    setTimeout(function () {
        document.querySelector(".search-loading").style.display = 'none';
        document.querySelector(".items-container").classList.remove('hideItem');
    },600);
})