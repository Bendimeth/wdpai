const form = document.querySelector("form");
const changeFormsButton = document.querySelector('.change-form-button');
const popupHeader = document.querySelector('.popup-header');
const submitButton = form.querySelector('.register-button');

const confirmedPasswordInput = form.querySelector('input[name="confirmPassword"]');
const emailInput = form.querySelector('input[name="email"]');
const nameInput = form.querySelector('input[name="name"]');
const surnameInput = form.querySelector('input[name="surname"]');
const passwordInput = form.querySelector('input[name="password"]');

const showInputs = (formType) => {
    ['surname', 'name', 'confirmPassword'].forEach(name => {
        form.querySelector(`input[name=${name}]`).style.display = formType === 'login' ? 'none' : 'initial';
    })
}

const setHintMessage = (message) => {
    changeFormsButton.innerHTML = message;
}

const setHeaderMessage = message => {
    popupHeader.innerHTML = message;
}

const setSubmitButtonMessage = message => {
    submitButton.innerHTML = message;
}

const setFormAction = (formType) => {
    const action = document.createAttribute('action');
    action.value = formType;

    if (form.attributes.getNamedItem(formType)) {
        form.attributes.removeNamedItem('action');
    }

    if (formType === 'login') {
        form.attributes.setNamedItem(action);
    }
}

let currentForm = 'login';

setHintMessage('Create account');
showInputs(currentForm);
setFormAction(currentForm);


const changeFormsButtonClick = changeFormsButton
    .addEventListener('click', () => {
        console.log(form.attributes);
        currentForm = currentForm === 'login' ? 'registration' : 'login';
        if (currentForm === 'login') {
            setHintMessage('Create account');
            setHeaderMessage('Sign in to your ActivityLog account');
            setSubmitButtonMessage('Login');
        } else {
            setHintMessage('Back to login');
            setHeaderMessage('Sign up');
            setSubmitButtonMessage('Create new account');
        }
        setFormAction(currentForm);
        showInputs(currentForm);
    })

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value));
        },
        1000
    );
}

function validatePassword() {
    setTimeout(function () {
            const condition = arePasswordsSame(
                confirmedPasswordInput.previousElementSibling.value,
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition);
        },
        1000
    );
}

emailInput.addEventListener('keyup', validateEmail);
confirmedPasswordInput.addEventListener('keyup', validatePassword);

const registerNewUser = () => {
    if (!confirmedPasswordInput.classList.contains('no-valid') &&
        !!confirmedPasswordInput.value &&
        !!passwordInput.value &&
        !emailInput.classList.contains('no-valid') &&
        !!emailInput.value &&
        !!nameInput.value &&
        !!surnameInput.value
    ) {
        jQuery.post('src/utils/registerUser.php',{
                email: emailInput.value,
                password: passwordInput.value,
                name: nameInput.value,
                surname: surnameInput.value
            },
            (response) => {
            console.log(response);
                if (response === '0') {
                    document.querySelector('.info').innerHTML = 'New account created successfully, please sign in';
                    currentForm = 'login';
                    setHintMessage('Create account');
                    setHeaderMessage('Sign in to your ActivityLog account');
                    setSubmitButtonMessage('Login');
                    setFormAction(currentForm);
                    showInputs(currentForm);
                } else {
                    document.querySelector('.info').innerHTML = 'Registration failed, please check the form';
                }
            });
    }
}

const onSubmit = () => {
    currentForm === 'registration' && registerNewUser();
}