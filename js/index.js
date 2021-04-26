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