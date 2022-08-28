const form = document.querySelector('#registration-form');

const login = document.querySelector('#login');
const password = document.querySelector('#password');
const confirmPassword = document.querySelector('#confirm-password');
const email = document.querySelector('#email');
const name = document.querySelector('#user-name');
//errors element
let loginError = document.querySelector('#login + span.error');
let passwordError = document.querySelector('#password + span.error');
let confirmPassError = document.querySelector('#confirm-password + span.error');
let emailError = document.querySelector('#email + span.error');
let nameError = document.querySelector('#user-name + span.error');


form.addEventListener('submit', (e) => {
   if(!login.validity.valid || !password.validity.valid
       || !email.validity.valid || !name.validity.valid || (!confirmPassword.value !== password.value)){

       e.preventDefault();

       isValidLogin();
       isValidPassword();
       isValidEmail();
       isValidName();
       isPasswordConfirmed();

       return false;
   }
});

login.addEventListener('input', (e) => {
    if(login.validity.valid){
        loginError.textContent = '';
        loginError.className = 'error';
    }else{
        isValidLogin();
    }
});

password.addEventListener('input', (e) => {
    if(password.validity.valid){
        passwordError.textContent = '';
        passwordError.className = 'error';
    }else{
        isValidPassword();
    }
});

confirmPassword.addEventListener('input', (e) => {
    if(confirmPassword.validity.valid && (confirmPassword.value !== password.value)){
        confirmPassError.textContent = '';
        confirmPassError.className = 'error';
    }else{
        isPasswordConfirmed();
    }
});

email.addEventListener('input', (e) => {
    if(email.validity.valid){
        emailError.textContent = '';
        emailError.className = 'error';
    }else{
        isValidEmail();
    }
});

name.addEventListener('input', (e) => {
    if(name.validity.valid){
        nameError.textContent = '';
        nameError.className = 'error';
    }else{
        isValidName();
    }
});

// validateMessage error function
function isValidLogin(){
    if(login.validity.valueMissing){
        loginError.textContent = 'Это поле не модет быть пустым';
    }else if(login.validity.tooShort){
        loginError.textContent = 'Логин должен быть не менее 3 символов в длину';
    }

    loginError.className = 'error active';
}

function isValidPassword(){
    if(password.validity.valueMissing){
        passwordError.textContent = 'Это поле не модет быть пустым';
    }else if(login.validity.tooShort){
        passwordError.textContent = 'Пароль должен быть не менее 8 символов в длину';
    }else if(password.validity.patternMismatch){
        passwordError.textContent = 'Пароль должен удовлетворять указанным требованиям.';
    }

    passwordError.className = 'error active';
}

function isPasswordConfirmed(){
    if(confirmPassword.validity.valueMissing){
        confirmPassError.textContent = 'Это поле не может быть пустым';
    }else if(confirmPassword.value !== password.value ){
        confirmPassError.textContent = 'Пароли должны совпадать!';
    }

    confirmPassError.className = 'error active';
}

function isValidEmail(){
    if(email.validity.valueMissing){
        emailError.textContent = 'Это поле не модет быть пустым';
    }else if(email.validity.tooShort){
        emailError.textContent = 'Email должен быть не менее 6 символов в длину';
    }else if(email.validity.typeMismatch){
        emailError.textContent = 'Введите коректный Email';
    }

    emailError.className = 'error active';
}

function isValidName(){
    if(name.validity.valueMissing){
        nameError.textContent = 'Это поле не модет быть пустым';
    }else if(name.validity.tooShort){
        nameError.textContent = 'Имя должено быть не менее 3 символов в длину';
    }

    nameError.className = 'error active';
}