// Simulating user roles (you would get this information from the server)
const userRoles = {
    admin: true,
    user: false
};

// Function to show/hide elements based on user roles
function updateUI() {
    const homeLink = document.getElementById('homeLink');
    const adminLink = document.getElementById('adminLink');
    const userLink = document.getElementById('userLink');
    const logoutLink = document.getElementById('logoutLink');

    const adminContent = document.getElementById('adminContent');
    const userContent = document.getElementById('userContent');

    // Always show Home and Logout links
    homeLink.style.display = 'block';
    logoutLink.style.display = 'block';

    // Show/hide Admin and User links based on roles
    if (userRoles.admin) {
        adminLink.style.display = 'block';
        adminContent.style.display = 'block';
    } else {
        adminLink.style.display = 'none';
        adminContent.style.display = 'none';
    }

    if (userRoles.user) {
        userLink.style.display = 'block';
        userContent.style.display = 'block';
    } else {
        userLink.style.display = 'none';
        userContent.style.display = 'none';
    }
}

// Call the function on page load
updateUI();
