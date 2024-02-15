const moreBtn = document.getElementsByClassName('more-arrow-btn'); 
const arrowImg = document.getElementsByClassName('more-arrow'); 
const morePara = document.getElementsByClassName('desc')

for(let x = 0; x < moreBtn.length; x++ ) {
    moreBtn[x].addEventListener('click', (e) => {
        morePara[x].classList.toggle('active')
        if(morePara[x].classList.contains('active')) {
            arrowImg[x].src = '../img/icons/round-minus.svg'
        } else {
            arrowImg[x].src = '../img/icons/heavy-plus-sign.svg'
        }
    })
}
