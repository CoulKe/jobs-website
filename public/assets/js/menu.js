const menu = document.querySelector('#menu')
let nav = document.querySelector('.nav ul');
let cancelMenu = document.querySelector('#cancelMenu')
menu.addEventListener('click', ()=>{
    nav.style = 'display: flex;'
})
cancelMenu.addEventListener('click',()=>{
    nav.style = "display: none;";
})