const usernameEl = document.querySelector('#username');
const passwordEl = document.querySelector('#password');
const businessnameEl = document.querySelector('#businessname');
const addressEl = document.querySelector('#address');

const form = document.querySelector('#signup');


const checkUsername = () => {

    let valid = false;

    const min = 8,
        max = 15;

    const username = usernameEl.value.trim();

    if (!isRequired(username)) {
        showError(usernameEl, 'Username cannot be blank.');
    } else if (!isBetween(username.length, min, max)) {
        showError(usernameEl, `Username must be between ${min} and ${max} characters.`)
    } else {
        showSuccess(usernameEl);
        valid = true;
    }
    return valid;
};



const checkPassword = () => {
    let valid = false;


    const password = passwordEl.value.trim();

    if (!isRequired(password)) {
        showError(passwordEl, 'Password cannot be blank.');
    } else if (!isPasswordSecure(password)) {
        showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    } else {
        showSuccess(passwordEl);
        valid = true;
    }

    return valid;
};



const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,20})");
    return re.test(password);
};

const checkBusinessName = () => {

    let valid = false;

    const min = 5,
        max = 200;

    const businessname = businessnameEl.value.trim();

    if (!isRequired(businessname)) {
        showError(businessnameEl, 'Business name cannot be blank.');
    } 
    else if (!isBetween(businessname.length, min, max)) {
    showError(businessnameEl, `Business Name must be between ${min} and ${max} characters.`)
    }
     else {
        showSuccess(businessnameEl);
        valid = true;
    }
    return valid;
};

const checkAddress = () => {

    let valid = false;

    const min = 5,
        max = 200;

    const address = addressEl.value.trim();

    if (!isRequired(address)) {
        showError(addressEl, 'Address cannot be blank.');
    } 
    else if (!isBetween(address.length, min, max)) {
    showError(addressEl, `Address must be between ${min} and ${max} characters.`)
    }
     else {
        showSuccess(addressEl);
        valid = true;
    }
    return valid;
};

const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;



const showError = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = (input) => {
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
}


form.addEventListener('submit', function (e) {
    // prevent the form from submitting
    e.preventDefault();

    // validate fields
    let isUsernameValid = checkUsername(),
        isPasswordValid = checkPassword(),
        isBusinessNameValid = checkBusinessName(),
        isAddressValid = checkAddress();

    let isFormValid = isUsernameValid &&
        isPasswordValid &&
        isBusinessNameValid&&
        isAddressValid;

    // submit to the server if the form is valid
    if (isFormValid) {

    }
});


const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'username':
            checkUsername();
            break;
        
        case 'password':
            checkPassword();
            break;

        case 'businessname':
            checkBusinessName();
            break;

        case 'address':
            checkAddress();
            break;
        
    }
}));