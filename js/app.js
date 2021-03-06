//This file is only for navbar buttons, fixed position, smooth scrolling, and copyright year date

// JQuery
$(document).ready(function () {
    // category button menu
    $(".categ-btn").click(function () {
        $(".side-nav-links-container").stop().slideToggle(1000);
        if ($(".filter-container")[0]){
            if ($(".filter-container")[0].style.display == "block") {
                $(".filter-container").stop().slideToggle(500);
            }
            if ($(".sort-container")[0].style.display == "block") {
                $(".sort-container").stop().slideToggle(500);
            }
        }
    })
    //filter button menu
    $(".search-filter").click(function () {
        $(".filter-container").stop().slideToggle(500);
        if ($(".sort-container")[0].style.display == "block") {
            $(".sort-container").stop().slideToggle(500);
        }
        if ($(".side-nav-links-container")[0].style.display == "block") {
            $(".side-nav-links-container").stop().slideToggle(500);
        }

    })
    //sort button menu
    $(".search-sort").click(function () {
        $(".sort-container").stop().slideToggle(500);
        if ($(".filter-container")[0].style.display == "block") {
            $(".filter-container").stop().slideToggle(500);
        }
        if ($(".side-nav-links-container")[0].style.display == "block") {
            $(".side-nav-links-container").stop().slideToggle(500);
        }
    })
    //close the menu on action
    $(".sort-clicked").click(function () {
        $(".sort-container").stop().slideToggle(500);
    })
    //close the menu on action
    $(".filter-btn").click(function () {
        $(".filter-container").stop().slideToggle(500);
    })

    //owl Carousel
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
})
// set copyright year date //
const date = document.querySelector("#date").innerHTML = new Date().getFullYear();
// nav toggle //
const navBtn = document.querySelector("#nav-toggle");
const links = document.querySelector("#nav-links");
// event listener for toggle button for small screen
navBtn.addEventListener("click", () => {
    links.classList.toggle("show-links");
    if ($(".side-nav-links-container")[0].style.display == "block") {
        $(".side-nav-links-container").stop().slideToggle(500);
    }
});
// nav fixed //
const navbar = document.querySelector(".navbar");
window.addEventListener("scroll", () => {
    if (window.pageYOffset > 50 && window.pageYOffset < 60) {
        navbar.animate([{ marginTop: '-6rem' }, { marginTop: '0' }], { duration: 250, fill: 'forwards' });
        navbar.classList.add("fixed");
    }
    else if (window.pageYOffset < 50) {
        navbar.classList.remove("fixed");
    } else {
        navbar.classList.add("fixed");
    }
});




