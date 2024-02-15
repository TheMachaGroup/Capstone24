addBtn = document.getElementById('add');
actionDiv = document.getElementById('add-option')


addBtn.addEventListener('click', () => {
    actionDiv.classList.toggle('active')
}) 


document.addEventListener('click', (e) => {
     if(e.target !== addBtn) {
         actionDiv.classList.remove('active')
     }
})
