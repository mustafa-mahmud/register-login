const msg = document.querySelector('.msg');

export const blankAllFields = (...inputs) => {
  inputs.forEach((input) => {
    if (input.getAttribute('type') === 'file') {
      document.querySelector('.camera-icon').style.display = 'block';
      input.parentElement.querySelector('.img').src =
        './assets/profile/beard.png';
    }
    if (input.getAttribute('type') === 'checkbox') {
      input.checked = false;
    }

    input.value = '';
  });
};

export const setLocation = (url, s) => {
  setTimeout(() => {
    location.href = url;
  }, s * 1000);
};

export const plainMsg = (text, color) => {
  msg.textContent = text;
  msg.style.color = color;

  setTimeout(() => {
    msg.textContent = '';
  }, 2000);
};

export const errorMsg = function (obj, name, color) {
  const filedName = name
    .split('_')
    .map((letter) => letter.charAt(0).toUpperCase() + letter.slice(1))
    .join(' ');

  obj.style.border = `1px solid ${color}`;
  msg.style.color = color;
  msg.textContent = `${filedName}`;

  setTimeout(() => {
    obj.style.border = 0;
    obj.style.borderBottom = `1px solid #e5e5e5`;
    msg.style.color = color;
    msg.textContent = ``;
  }, 2000);
};
