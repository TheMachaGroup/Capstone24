const profileOption = document.getElementsByClassName('profile-option')
const editProfile = document.getElementById('edit-profile')
const accountSetting = document.getElementById('account-settings')
const security = document.getElementById('security')

const profileNav = document.querySelectorAll('#profile-nav li')
console.log(profileNav)
for(let x = 0; x < profileOption.length; x++) {
    
    profileOption[x].onclick = function(e) {
        profileNav.forEach( f => f.classList.remove('active'))
        e.target.classList.add('active')

        if(e.target === profileOption[0]) {
            editProfile.style.display = 'block'
            accountSetting.style.display = 'none'
            security.style.display = 'none'
        } else if (e.target === profileOption[1]) {
            editProfile.style.display = 'none'
            accountSetting.style.display = 'block'
            security.style.display = 'none'
        } else if (e.target === profileOption[2]) {
            editProfile.style.display = 'none'
            accountSetting.style.display = 'none'
            security.style.display = 'block'
        }
    }
}