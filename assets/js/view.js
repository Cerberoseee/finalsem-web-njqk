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

    $('.nav__menu').onclick =()=> $('.nav__menu-list').style.display = 'block';
        
    $('#close-menu').onclick=()=> $('.nav__menu-list').style.display = 'none';

    $('#category-show').onclick =()=>{
        if($('#category-list').style.display == 'block'){
            $('#category-list').style.display = 'none';
            $('#category-icon').innerHTML = `<i class="fa-solid fa-caret-down"></i>`;
        }else{
            $('#category-list').style.display = 'block';
            $('#category-icon').innerHTML = `<i class="fa-solid fa-caret-up"></i>`;
        }
    }
    
})();