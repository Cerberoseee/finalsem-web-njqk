import { profile } from '../../AJAX/fetch.js';
import {$, $$} from './module/config.js';
import * as conf from './module/config.js';
const app = (()=>{
    let errorText = '';
    try{
        // Navigation sticky
        window.addEventListener("scroll", ()=> {
            const navbar = $(".sticky-nav");
            navbar?.classList.toggle("sticky", window.scrollY > 0);
        });

        $('.nav__menu').onclick =()=> $('.nav__menu-list').style.display = 'block';
        
        $('#close-menu').onclick =()=> $('.nav__menu-list').style.display = 'none';
    }
    catch(e){
        errorText += e;
    }

    try{
        $('#category-show').onclick ??=()=>{
            if($('#category-list').style.display == 'block'){
                $('#category-list').style.display = 'none';
                $('#category-icon').innerHTML = `<i class="fa-solid fa-caret-down"></i>`;
            }else{
                $('#category-list').style.display = 'block';
                $('#category-icon').innerHTML = `<i class="fa-solid fa-caret-up"></i>`;
            }
        }
    }catch(e){
        errorText += e;
    }
    
    try{
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
    }
    catch(e){
        errorText += e;
    }

    try{
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
    }catch(e){
        errorText += e;
    }
    
    try{
        
        $$('.cmt__list-item').forEach(item=>{
            item.querySelector('.show__reply-btn').onclick =()=>{
                if(item.querySelector('.cmt__item-reply').style.display === 'block'){
                    item.querySelector('.show__reply-btn').innerHTML = "SHOW 12 REPLIES ▲";
                    item.querySelector('.cmt__item-reply').style.display = "none";
                }else{
                    item.querySelector('.show__reply-btn').innerHTML = "SHOW 12 REPLIES ▼";
                    item.querySelector('.cmt__item-reply').style.display = "block";
                }
            }
        }) 
    }catch(e){
        errorText += e;
    }

    try{
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
    }catch(e){
        errorText += e;
    }
    try{
        $('.btn__create-follow').onclick =()=>{
            $('.btn__create-follow').innerHTML = `Followed <small><i class="fa-solid fa-check"></i></small>`;
        }
    }catch(e){
        errorText += e;
    }
    
    try{
        $('.nav__notification-icon').onclick =()=>{
            if($('.nav__noti-list').style.display === 'block'){
                $('.nav__noti-list').style.display = "none";
            }else{
                $('.nav__noti-list').style.display = "block";
            }
        }
    }catch(e){
        errorText+=e;
    }

    // Carousel
    try{
        let isDrag = false, isDragging = false, prevPageX, prevScrollLeft, posDiff;
        const carousel = $('.carousel');
        let firstItem = carousel.querySelectorAll('.carousel__item')[0];
        let arrowIcons = $$('.wrapper__carousel > i');
        let firstWidth = firstItem.clientWidth;
        let scrollWidth = carousel.scrollWidth - carousel.clientWidth;

        const showHideIcon = ()=>{
            arrowIcons[0].style.display = carousel.scrollLeft == 0? "none":"block";
            arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth? "none":"block";
        }
        arrowIcons.forEach(icon=>{
            icon.addEventListener("click", ()=>{
                carousel.scrollLeft += icon.id == "carousel-left-arrow"? -firstWidth : firstWidth;
                setTimeout(()=> showHideIcon(), 60);
            });

        });
        const autoSlide = ()=> {
            if(carousel.scrollLeft == (carousel.scrollWidth - carousel.clientWidth)) return;
            posDiff = Math.abs(posDiff);
            let firstItemWidth = firstItem.clientWidth;
            let valDifference = firstItemWidth - posDiff;

            if(carousel.scrollLeft > prevScrollLeft){
                return carousel.scrollLeft += posDiff > firstItemWidth / 4? valDifference : posDiff;
            }
            carousel.scrollLeft -= posDiff > firstItemWidth / 4? valDifference : -posDiff;
        }
        const dragStart = (e)=>{
            isDrag = true;
            prevPageX = e.pageX || e.touches[0].pageX;
            prevScrollLeft = carousel.scrollLeft;
        }
        const dragStop = ()=>{
            carousel.classList.remove("dragging");
            if(!isDragging) return;
            isDragging = false;
            isDrag = false;
            autoSlide();
        }
        const dragging = (e)=>{
            if(!isDrag) return;
            e.preventDefault();
            isDragging = true;
            carousel.classList.add("dragging");
            posDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
            carousel.scrollLeft = prevScrollLeft - posDiff;
            showHideIcon();

        }
        carousel.addEventListener("mousemove", dragging);
        carousel.addEventListener("touchstart", dragStart);

        carousel.addEventListener("touchmove", dragging);
        carousel.addEventListener("mousedown", dragStart)
        carousel.addEventListener("mouseup", dragStop)
        carousel.addEventListener("touchend", dragStop)
        carousel.addEventListener("mouseleave", dragStop)
    }catch(e){
        console.log(e);
        errorText+= e;
    }
    // Account navigation
    try{
        $('#nav__avatar-id').onclick = ()=>{
            if($('.nav__profile-options').style.display === "none"){
                $('.nav__profile-options').style.display = "block";
            }else{
                $('.nav__profile-options').style.display = "none";
            }
        }
        
    }
    catch(e){
        errorText += e;
    }
    console.error(errorText);
})();