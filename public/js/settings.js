const settingsNameInput = document.querySelector('.settings-body input[name=name]');
const settingsSurnameInput = document.querySelector('.settings-body input[name=surname]');
const settingsEmailInput = document.querySelector('.settings-body input[name=email]');
const settingsPhotoInput = document.querySelector('.settings-body input[name=file]');
const settingsOldPasswordInput = document.querySelector('.settings-body input[name=oldPassword]');
const settingsNewPasswordInput = document.querySelector('.settings-body input[name=newPassword]');

// init

settingsNameInput.value = currentUser.name;
settingsSurnameInput.value = currentUser.surname;
settingsEmailInput.value = currentUser.email;

const updateUserDetails = () => {
    if (!!settingsEmailInput.value && !!settingsSurnameInput.value && !!settingsNameInput.value) {
        jQuery.post('src/utils/updateUserDetails.php', {
            name: settingsNameInput.value,
            surname: settingsSurnameInput.value,
            email: settingsEmailInput.value,
            photo: settingsPhotoInput.value ? parseFilePath(settingsPhotoInput.value) : '',
            id: String(currentUser.id)
        }, () => {
            if (settingsPhotoInput.value) {
                uploadImage($('.settings-body input[name=file]')[0].files[0]);
            }
            jQuery.post('src/utils/getUserById.php', {
                id: String(currentUser.id)
            }, response => {
                if (response === '1') {
                    console.log('Error - getUserById')
                } else {
                    const userData = JSON.parse(response);
                    console.log(userData);
                    Object.keys(userData).forEach(key => {
                        localStorage.setItem(key, userData[key]);
                    });
                }
            });
        });
    }
}

const updateUserPassword = () => {
    if (!!settingsOldPasswordInput.value && settingsNewPasswordInput.value) {
        jQuery.post('src/utils/updatePassword.php', {
            id: String(currentUser.id),
            newPassword: settingsNewPasswordInput.value,
            oldPassword: settingsOldPasswordInput.value
        });
    }
}
