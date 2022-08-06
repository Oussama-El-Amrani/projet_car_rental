let menu = document.querySelector('#header');
let myTop=menu.getBoundingClientRect().top+window.scrollY;
let onScroll =function(){
    if(window.scrollY>myTop && !menu.classList.contains('fixed')){
        menu.classList.add('fixed');
    }else if(scrollY<myTop && menu.classList.contains('fixed')){
        menu.classList.remove('fixed');
    }
}
window.addEventListener('scroll',onScroll);
