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


// smooth scroll //
const scrollLinks = document.querySelectorAll(".scroll-link");
scrollLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        links.classList.remove("show-links");
        const id = e.target.getAttribute("href").slice(1);
        const element = document.getElementById(id);
        console.log(element.offsetTop);
        let position;
        if (navbar.classList.contains("fixed")) {
            position = element.offsetTop - 62;
        } else {
            position = element.offsetTop - 224;
        }
        if (window.innerWidth < 992) {
            if (navbar.classList.contains("fixed")) {
                position = element.offsetTop - 62;
            } else {
                position = element.offsetTop - 332 - 62;
            }
        }
        window.scrollTo({
            left: 0,
            top: position,
            behavior: "smooth"
        });
    });
});


