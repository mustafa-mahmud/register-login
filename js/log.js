import { blankCk } from './file_process.js';
import { dataSend } from './data_send.js';
import { plainMsg, setLocation } from './helpers.js';

const form = document.getElementById('log-form');
const email = document.getElementById('email');
const password = document.getElementById('password');
const imgEl = document.querySelector('img');

///////////////
form.addEventListener('submit', async (e) => {
  e.preventDefault();

  if (blankCk(email) && blankCk(password)) {
    const emVal = email.value;
    const passVal = password.value;
    const logCk = 'login';
    const result = await dataSend(
      'read.php',
      'post',
      JSON.stringify([emVal, passVal, logCk])
    );

    if (result.search('success') === -1) {
      plainMsg(result, 'red');
    } else {
      plainMsg('Login successfully', 'green');
      const img = result.split('#').pop();
      imgEl.src = `assets/profile/${img}`;

      setLocation('index.php', 2);
    }
  }
});
