
const dropdown = document.querySelector('.dropdown');
const iconAngleUp = document.querySelector('.fa-angle-up');
const iconAngleDown = document.querySelector('.fa-angle-down');

const userPhoto = document.querySelector('.user-photo');
const initials = document.querySelector('.user-photo span');
const currentPath = document.querySelector('.current-path');


let isDropdownVisible = false;
let cookieTimeout = typeof setTimeout;
let currentUser = {};

// on init
iconAngleUp.style.display = 'none';

// never validate user like this, done due to lack of time

    console.log(localStorage.getItem('currentUserId'))
if (localStorage.getItem('currentUserId')) {
    const nameByPath = {
        dashboard: 'Dashboard',
        settings: 'Settings',
        archived: 'Past activities'
    }

    currentUser.name = localStorage.getItem('name');
    currentUser.surname = localStorage.getItem('surname');
    currentUser.email = localStorage.getItem('email');
    currentUser.photo = localStorage.getItem('photo');
    currentUser.id = localStorage.getItem('currentUserId');

    if (currentUser.photo !== 'null' && currentUser.photo !== '') {
        userPhoto.innerHTML = `
            <div class="photo" style="background-image: url(${currentUser.photo})"></div>
        `;
    } else {
        initials.innerHTML = currentUser.name[0].toUpperCase() + ' ' + currentUser.surname[0].toUpperCase();
    }
    currentPath.innerHTML = nameByPath[window.location.pathname.split('/')[1]] || '404';

} else {
    window.location.href = '/login';
}

const toggleDropdown = () => {
    isDropdownVisible = !isDropdownVisible;
    if (isDropdownVisible) {
        dropdown.classList.add('dropdown-visible');
        iconAngleDown.style.display = 'none';
        iconAngleUp.style.display = 'initial';
    } else {
        dropdown.classList.remove('dropdown-visible');
        iconAngleDown.style.display = 'initial';
        iconAngleUp.style.display = 'none';
    }
}

const logout = () => {
    console.log('cleared');
    localStorage.clear();
}

cookieTimeout = setTimeout(() => {
    document.cookie = "username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC";
    console.log(document.cookie);
}, 200);


