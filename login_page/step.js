
const step = document.getElementsByClassName('steps'); 
let prevBtn = document.getElementById('prev');
let cntBtn = document.getElementById('cnt')
const form = document.getElementById('account')
let currentStep = 0; 


cntBtn.addEventListener('click', (e) => {
    step[0].style.display = "none"; 
    step[1].style.display = "block"
    prevBtn.style.display = "inline-block"
    cntBtn.innerText = "Create Account!"


    if(cntBtn.innerText === "Create Account!") {
    cntBtn.addEventListener('click', () => {
        cntBtn.type = "submit"
        form.submit();
        })
    } else {
        cntBtn.type = "button"
    }
})

prevBtn.addEventListener('click', () => {
    step[0].style.display = "block"
    step[1].style.display = "none"
    prevBtn.style.display = "none"
    cntBtn.innerText = "Continue"
})

