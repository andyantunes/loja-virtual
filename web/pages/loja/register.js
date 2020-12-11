let name = document.querySelector('.form-register #name');
let email = document.querySelector('.form-register #email');
let cpf = document.querySelector('.form-register #cpf');
let phone = document.querySelector('.form-register #phone');
let password = document.querySelector('.form-register #password');
let avatar = document.querySelector('.form-register .avatar-block #avatar');

avatar.addEventListener('input', (event) => {
  let fileName = event.target.files[0].name;
  document.querySelector('#avatarLabel').innerText = fileName;
});

const btnRegister = document.querySelector('#btnRegister');

let formData = new FormData();
formData.append('full_name', name.value);
formData.append('email', email.value);
formData.append('cpf', cpf.value);
formData.append('phone', phone.value);
formData.append('password', password.value);
formData.append('created_at', returnDate());

// if (avatar.files.length > 0) {
//   formData.append('avatar', $('#avatar')[0].files[0]);
// }

btnRegister.addEventListener('click', (event) => {
  event.preventDefault();

  if (isFormRegisterValid()) {
    onRegister();
  }
});

function onRegister() {
  $.ajax({
    type: 'POST',
    url: `${URL_BASE}customers`,
    data: formData,
    processData: false,
    contentType: 'application/json',
    success: (data) => {
      console.log(data);
      //   let { status } = data;
      //   let user = data.data[0];

      //   if (status === 'success') {
      //     document.cookie = `user_email=${user.email}`;
      //     window.location.href = '';
      //   }
    },
  }).fail((jqXHR, textStatus, msg) => {
    console.log(msg, jqXHR, textStatus);
  });
}

function isFormRegisterValid() {
  let isValid = true;

  inputBorderReset();

  if (name.value === '') {
    modalLogin.querySelector('#email').style.border = '1px solid red';
    isValid = false;
  } else if (email.value === '') {
    modalLogin.querySelector('#password').style.border = '1px solid red';
    isValid = false;
  } else if (cpf.value === '') {
    modalLogin.querySelector('#password').style.border = '1px solid red';
    isValid = false;
  } else if (phone.value === '') {
    modalLogin.querySelector('#password').style.border = '1px solid red';
    isValid = false;
  } else if (password.value === '') {
    modalLogin.querySelector('#password').style.border = '1px solid red';
    isValid = false;
  }
  return isValid;
}

function inputBorderReset() {
  modalRegister.querySelector('#name').style.border = '1px solid rgba(0, 0, 0, 0.4)';
  modalRegister.querySelector('#email').style.border = '1px solid rgba(0, 0, 0, 0.4)';
  modalRegister.querySelector('#cpf').style.border = '1px solid rgba(0, 0, 0, 0.4)';
  modalRegister.querySelector('#phone').style.border = '1px solid rgba(0, 0, 0, 0.4)';
  modalRegister.querySelector('#password').style.border = '1px solid rgba(0, 0, 0, 0.4)';
}

function returnDate() {
  let nDate = new Date();
  let year = nDate.getFullYear();
  let month = nDate.getMonth() + 1;
  let day = nDate.getDate() < 10 ? `0${nDate.getDate()}` : nDate.getDate();

  return `${year}-${month}-${day}`;
}
