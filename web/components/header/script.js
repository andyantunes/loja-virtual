const loginHeader = document.querySelector('.wrapper');
const modalLogin = document.querySelector('.modal-login');
const loginArea = document.querySelector('.login-wrapper');
const loginBtn = document.querySelector('.login-wrapper .login');
const btnCloseModalLogin = document.querySelector('.modal-login .modal-title i');

const iconChevron = document.querySelector('.header .input-options .icon');

const modalRegister = document.querySelector('.modal-register');
const registerBtn = document.querySelector('.login-wrapper .register');
const btnCloseModaRegister = document.querySelector('.modal-register .modal-title i');

loginHeader.addEventListener('mouseover', () => {
  addDownIcon();
  showLoginHeader();
});

loginHeader.addEventListener('mouseout', () => {
  addUpIcon();
  hideLoginHeader();
});

loginBtn.addEventListener('click', showModalLogin);
btnCloseModalLogin.addEventListener('click', closeModalLogin);

registerBtn.addEventListener('click', showModalRegister);
btnCloseModaRegister.addEventListener('click', closeModalRegister);

function addUpIcon() {
  iconChevron.classList.remove('fa-chevron-down');
  iconChevron.classList.add('fa-chevron-up');
}

function addDownIcon() {
  iconChevron.classList.remove('fa-chevron-up');
  iconChevron.classList.add('fa-chevron-down');
}

function showLoginHeader() {
  loginArea.classList.add('show');
}

function hideLoginHeader() {
  loginArea.classList.remove('show');
}

function showModalLogin() {
  modalLogin.classList.remove('hide-element');
}

function closeModalLogin() {
  modalLogin.classList.add('hide-element');
}

function showModalRegister() {
  modalRegister.classList.remove('hide-element');
}

function closeModalRegister() {
  modalRegister.classList.add('hide-element');
}
