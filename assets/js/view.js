const app = (()=>{
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);
    // Navigation sticky
    window.addEventListener("scroll", ()=> {
        const navbar = $(".sticky-nav");
        navbar?.classList.toggle("sticky", window.scrollY > 0);
    });
    $('.nav__menu').onclick =()=> $('.nav__menu-list').style.display = 'block';
        
    $('#close-menu').onclick =()=> $('.nav__menu-list').style.display = 'none';

    $('#category-show').onclick ??=()=>{
        if($('#category-list').style.display == 'block'){
            $('#category-list').style.display = 'none';
            $('#category-icon').innerHTML = `<i class="fa-solid fa-caret-down"></i>`;
        }else{
            $('#category-list').style.display = 'block';
            $('#category-icon').innerHTML = `<i class="fa-solid fa-caret-up"></i>`;
        }
    }
    // Change state of btn group
    const btn_groups = $$('.btn-group');
    btn_groups?.forEach(btn_group=>{
        const btn_items = btn_group.querySelectorAll('button');
        btn_items.forEach(item=>{
            item.onclick = ()=>{
                btn_items.forEach(btn_itms=>{
                    btn_itms.classList.remove('active');
                })
                item.classList.add('active');
            }
        });
    });
    // Change state of recommend tab
    const tabs_recmd = $('.video__recommends-tab').querySelectorAll('button');
    tabs_recmd?.forEach(element => {
        element.onclick = ()=>{
            tabs_recmd.forEach(emt=>{
                emt.classList.remove('active');
            });
            element.classList.add('active');
        }
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
  
    // Showmore in description of videopage
    let flag = false;
    $('#showhide').onclick ??=()=>{
        if(!flag){
            $('#showmore').style.display = "block";
            $('#showhide').innerText = "Show less";
            flag = !flag;
        }else{
            $('#showmore').style.display = "none";
            $('#showhide').innerText = "Show more";
            flag = !flag;
        }
    }
    
    
})();