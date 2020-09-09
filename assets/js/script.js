const openAccount = document.querySelector(".open-account");
const openMenuClass = document.querySelector(".open-menu");
const modalContainer = document.querySelector(".modal-container");

function openMenu() {
    
    document.addEventListener('click', (e)=> {
        
        let el = e.target;
        if(el == openAccount) {
            openMenuClass.style.display = "flex";
            modalContainer.style.display = "flex";
        } 
        if(el === modalContainer) {
            openMenuClass.style.display = "none";
            modalContainer.style.display = "none";

        }
        if(el.getAttribute('href') == '#open') {
            openMenuClass.style.display = "flex";
            modalContainer.style.display = "flex";
        }
    })
    
}

const withdrawMenu = document.querySelector(".withdraw-menu");
const depositMenu = document.querySelector(".deposit-menu");

function bankingOperation() {

    document.addEventListener("click", (e)=> {
       
        let el = e.target;
        if(el.classList == 'withdraw-menu') {
            e.preventDefault()
            document.querySelector(".withdraw").style.display = "flex";
            document.querySelector(".deposit").style.display = "none";
        } 
        if(el.classList == 'deposit-menu') {
            e.preventDefault();
            document.querySelector(".deposit").style.display = "flex";
            document.querySelector(".withdraw").style.display = "none";
        }
        
    })

}

const openMenuMobile = document.querySelector(".img-menu-mobile");

function menuMobile() {

    document.addEventListener("click", (e)=> {

        let el = e.target;

        if(el.classList == "img-menu-mobile") {
            document.querySelector(".menu-mobile").style.display = "block"
           
        }
        if(el.classList == "close-menu-mobile") {
            document.querySelector(".menu-mobile").style.display = "none"
        }
        
        
    })

    
}

const linksMenu = document.querySelectorAll(".menu ul li a");
const linksMenuMobile = document.querySelectorAll(".menu-mobile .container-mobile ul li a[href^='#']");

function scroll(e) {
    e.preventDefault();
    const href = e.currentTarget.getAttribute('href');
    const section = document.querySelector(href);
    const top = section.offsetTop;

    document.querySelector(".menu-mobile").style.display = "none";

    window.scrollTo({
        top: top,
        behavior: 'smooth'
    })
}

linksMenu.forEach((link) => {
    console.log(link.href)
    link.addEventListener('click', scroll);        
})

linksMenuMobile.forEach((link) => {
    link.addEventListener('click', scroll);
})

menuMobile();
openMenu();
bankingOperation();