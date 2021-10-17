import { readImageFile, passwordMatch, blankCk } from './file_process.js';
import { blankAllFields, setLocation, plainMsg } from './helpers.js';
import { dataSend } from './data_send.js';

const img = document.getElementById('upload-profile');
const formReg = document.getElementById('reg-form');
const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirm_pwd = document.getElementById('confirm_pwd');
const ckBox = document.getElementById('agreement');

/////////////////////
formReg.addEventListener('submit', async function (e) {
  e.preventDefault();

  if (
    blankCk(firstName) &&
    blankCk(lastName) &&
    blankCk(email) &&
    blankCk(password) &&
    blankCk(confirm_pwd) &&
    blankCk(img)
  ) {
    if (passwordMatch(password, confirm_pwd)) {
      const formData = new FormData(formReg);
      const data = await dataSend('file_process.php', 'post', formData);
      if (data !== 'success' && data !== 'confirmation') {
        console.log(data);
        plainMsg(data, 'red');
      } else if (data === 'confirmation') {
        setLocation('confirmation.php', 0);
      }
    }
  }
});

img.addEventListener('change', readImageFile);
