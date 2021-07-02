const popup = document.querySelector('.popup');
const searchDropdown = document.querySelector('.dashboard-search .dropdown');
const searchIconAngleUp = document.querySelector('.dashboard-search .fa-angle-up');
const searchIconAngleDown = document.querySelector('.dashboard-search .fa-angle-down');

const activityList = document.querySelector('.activity-list');

const currentSearch = document.querySelector('.current-search');

const newActivityTitle = document.querySelector('.dashboard-body .popup input[name=title]');
const newActivityDesc = document.querySelector('.dashboard-body .popup textarea[name=description]')
const newActivityPhoto = document.querySelector('.dashboard-body .popup input[name=file]');

let popupVisibility = false;
let searchDropdownVisibility = false;
let searchMine = false;

//on init
popup.style.display = 'none';
searchDropdown.style.display = 'none';
searchIconAngleUp.style.display = 'none';

const changePopupVisibility = () => {
    popupVisibility = !popupVisibility;
    if (popupVisibility) {
        popup.style.display = 'initial';
    } else {
        popup.style.display = 'none';
    }
}

const toggleSearchDropdown = () => {
    searchDropdownVisibility = !searchDropdownVisibility;
    if (searchDropdownVisibility) {
        searchDropdown.style.display = 'initial';
        searchIconAngleDown.style.display = 'none';
        searchIconAngleUp.style.display = 'initial';


    } else {
        searchDropdown.style.display = 'none';
        searchIconAngleUp.style.display = 'none';
        searchIconAngleDown.style.display = 'initial';

    }
}

const renderItems = (activity) => {
    const newActivity = document.createElement('div');
    newActivity.classList.add('activity-item');
    newActivity.innerHTML = `
                    <div class="activity-header">
                        <div class="title">${activity.title}</div>
                        <div class="activity-user-details">
                            <div class="section-label">${activity.createdAt}</div>
                            <div>
                                <span>${activity.userName}</span>
                                <span>${activity.userSurname}</span>
                            </div>
                        </div>
                    </div>
                    <div class="activity-body">
                        <div class="activity-description">
                            <div class="section-label">Description:</div>
                            <div>${activity.description}</div>
                        </div>
                        ${activity.photo ? `
                            <div class="activity-photo-wrapper">
                                <div class="section-label">Attachments:</div>
                                <div style="background-image: url(${activity.photo})"></div>
                            </div>
                        ` : `
                        
                        `}
                    </div>
                    <div class="activity-footer">
                        ${activity.assignedById === parseInt(currentUser.id)  ? `
                            <button onclick="deleteActivity('${activity.activityId}')" class="delete-button">Delete</button>
                        ` : `
                            
                        `}    
                    </div>
                `;
    activityList.appendChild(newActivity);
}

const deleteActivity = (id) => {
    console.log(id);
    jQuery.post('src/utils/deleteActivity.php', {
        activityId: id
    }, () => {
        searchMine ? getMineActivities() : getAllActivities();
    })
}

const getMineActivities = () => {
    jQuery.post('src/utils/getMineActivities.php', {
        userId: currentUser.id
    }, (response) => {
        if (response !== '1') {
            searchMine = true;
            activityList.innerHTML = '';
            currentSearch.innerHTML = 'Mine activities';
            console.log('currentUser',currentUser);
            const activities = JSON.parse(response).map(activity => JSON.parse(activity));
            console.log(activities);
            activities.reverse().forEach(activity => {
                renderItems(activity);
            })
        }
    })
}

const getAllActivities = () => {
    jQuery.post('src/utils/getAllActivities.php', {}, (response) => {
        if (response !== '1') {
            searchMine = false;
            activityList.innerHTML = '';
            currentSearch.innerHTML = 'All activities';
            console.log('currentUser',currentUser)
            const activities = JSON.parse(response).map(activity => JSON.parse(activity));
            activities.reverse().forEach(activity => {
                renderItems(activity);
            })
        }
    })
}
getAllActivities();

const createActivity = () => {
    if (!!newActivityTitle.value && !!newActivityDesc.value) {
        jQuery.post('src/utils/setActivity.php', {
            title: newActivityTitle.value,
            description: newActivityDesc.value,
            assignedById: currentUser.id,
            photo: newActivityPhoto.value ? `public/uploads/${newActivityPhoto.value.split('\\')[newActivityPhoto.value.split('\\').length -1]}` : ''
        }, () => {
            changePopupVisibility();
            searchMine ? getMineActivities() : getAllActivities();
        })
        if (newActivityPhoto.value) {
            const fd = new FormData();
            const files = $('.dashboard-body .popup input[name=file]')[0].files[0];
            fd.append('file', files);

            $.ajax({
                url: 'src/utils/uploadFile.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false
            });
        }
    }
}
