const app = (()=>{
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);
    // Navigation sticky
    window.addEventListener("scroll", ()=> {
        const navbar = $(".sticky-nav");
        navbar.classList.toggle("sticky", window.scrollY > 0);
    });

    $('#showreply').onclick=()=>{
        if($('.cmt__item-reply').style.display === 'block'){
            $('#showreply').textContent = "SHOW 12 REPLIES ▼";
            $('.cmt__item-reply').style.display = "none";
        }else{
            $('.cmt__item-reply').style.display = "block";
            $('#showreply').textContent = "SHOW 12 REPLIES ▲";
        }
    }
})();