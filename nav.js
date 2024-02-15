const navBar = document.getElementById('nav-bar')

const collapseIcon = document.getElementById('collapse')
const navBarList = document.getElementById('nav-bar-list').getElementsByTagName('li')

collapseIcon.onclick = function () {
    navBar.classList.toggle('open')
}
