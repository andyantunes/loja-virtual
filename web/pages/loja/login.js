let userEmail = document.querySelector('.form-login #email');
let userPassword = document.querySelector('.form-login #password');
let btnLogin = modalLogin.querySelector('#btnLogin');

btnLogin.addEventListener('click', () => {
  if (isFormLoginValid()) {
    onLogin();
  }
});

function onLogin() {
  $.ajax({
    type: 'GET',
    url: `${URL_BASE}customers/${userEmail.value}/${userPassword.value}`,
    success: (data) => {
      let { status } = data;
      let user = data.data[0];

      if (status === 'success') {
        document.cookie = `user_email=${user.email}`;
        window.location.href = '';
      }
    },
  });
}

function isFormLoginValid() {
  let isValid = true;
  if (userEmail.value === '') {
    modalLogin.querySelector('#email').style.border = '1px solid red';
    modalLogin.querySelector('#password').style.border = '1px solid rgba(0, 0, 0, 0.4)';
    isValid = false;
    console.log(userEmail.value);
  } else if (userPassword.value === '') {
    modalLogin.querySelector('#password').style.border = '1px solid red';
    modalLogin.querySelector('#email').style.border = '1px solid rgba(0, 0, 0, 0.4)';
    isValid = false;
    console.log(userPassword.value);
  }
  return isValid;
}
