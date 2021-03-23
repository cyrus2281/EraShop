//this file adds the functionality to the search bar
document.addEventListener("DOMContentLoaded",()=>{
    document.querySelector(".items-container").classList.add('hideItem');
    //activing the search in 1.2 second to be sure of data loading
    setTimeout(function(){
        //get the searched value
        let baseUrl = (window.location).href;
        let searchValue = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
        searchValue = searchValue.toLowerCase();
        //filter for the items
        const items = document.querySelectorAll('.item');
        const ItemsContainer = document.querySelector('.load-content');
        items.forEach(item=>{
            const dataset = item.dataset.name;
            if(dataset.includes(searchValue)){
            }else{
                ItemsContainer.removeChild(item)
            }
        });
        //no result for no output
        if (document.querySelectorAll('.item').length <= 0){
            document.querySelector('.load-content').innerHTML = `<div class="no-item-search">no item found</div>`
        }
        document.querySelector(".search-loading").style.display='none';
        document.querySelector(".items-container").classList.remove('hideItem');
    },1200);
})
