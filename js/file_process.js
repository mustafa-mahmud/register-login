import { errorMsg } from './helpers.js';

export const blankCk = function (input) {
  if (!input.value) {
    errorMsg(input, input.getAttribute('name') + ' file is required.', 'red');
  } else {
    return true;
  }
};

export const readImageFile = function (e) {
  const target = e.target;
  const preview = document.querySelector('.img');
  const camera = document.querySelector('.camera-icon');

  const reader = new FileReader();
  reader.addEventListener('load', function () {
    preview.src = reader.result;
    camera.style.display = 'none';
  });

  if (target.files[0]) {
    reader.readAsDataURL(target.files[0]);
  }
};

export const passwordMatch = function (pass1, pass2) {
  if (pass1.value !== pass2.value) {
    errorMsg(
      pass2,
      pass2.getAttribute('name') + ' password does not match.',
      'red'
    );
  } else {
    return true;
  }
};
