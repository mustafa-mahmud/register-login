'use strict';
import { setLocation } from './helpers.js';

const strong = document.querySelector('strong');
let times = 20;

const countDown = () => {
  const stop = setInterval(() => {
    strong.textContent = times;
    times--;

    if (times === -1) {
      clearInterval(stop);
      times = 20;
      setLocation('logout.php', 0);
    }
  }, 1000);
};

countDown();
