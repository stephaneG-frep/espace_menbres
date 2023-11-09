const Btn = document.getElementById('btn');
const liste = 
document.querySelector('.ul');
const Btn2 = document.getElementById('btn2');
const liste2 =
document.querySelector('.ul2');
const Btn3 = document.getElementById('btn3');
const liste3 = document.querySelector('.ul3');
const Btn4 = document.getElementById('btn4');
const liste4 = document.querySelector('.ul4');
const Btn5 = document.getElementById('btn5');
const liste5 = document.querySelector('.ul5');
const Btn6 = document.getElementById('btn6');
const liste6 = document.querySelector('.ul6');
const Btn7 = document.getElementById('btn7');
const liste7 = document.querySelector('.ul7');


Btn.addEventListener("click", function() {
  const min = 1;
  const max = 50;
  const play = function() {
  Math.floor(Math.random()*
      (max - min));
 }

const newLi = document.createElement("li");
newLi.innerText = Math.floor(Math.random()*(max - min));
liste.appendChild(newLi);
liste.children[1].replaceWith(newLi);
ul.innerHTML = 'ul'
})

Btn2.addEventListener("click", function() {
  const min2 = 1;
  const max2 = 50;
  const play2 = function() {
  Math.floor(Math.random()*
      (max2 - min2));
 }

const newLi2 = document.createElement("li");
newLi2.innerText = Math.floor(Math.random()*(max2 - min2));
liste2.appendChild(newLi2);
liste2.children[1].replaceWith(newLi2);
ul2.innerHTMl = 'ul'
})

Btn3.addEventListener("click", function() {
  const min3 = 1;
  const max3 = 50;
  const play3 = function() {
  Math.floor(Math.random()*
      (max3 - min3));
 }

const newLi3 = document.createElement("li");
newLi3.innerText = Math.floor(Math.random()*(max3 - min3));
liste3.appendChild(newLi3);
liste3.children[1].replaceWith(newLi3);
ul3.innerHTMl = 'ul'
})

Btn4.addEventListener("click", function() {
  const min4 = 1;
  const max4 = 50;
  const play4 = function() {
  Math.floor(Math.random()*
      (max4 - min4));
 }

const newLi4 = document.createElement("li");
newLi4.innerText = Math.floor(Math.random()*(max4 - min4));
liste4.appendChild(newLi4);
liste4.children[1].replaceWith(newLi4);
ul4.innerHTML = 'ul'
})

Btn5.addEventListener("click", function() {
  const min5 = 1;
  const max5 = 50;
  const play = function() {
  Math.floor(Math.random()*
      (max5 - min5));
 }

const newLi5 = document.createElement("li");
newLi5.innerText = Math.floor(Math.random()*(max5 - min5));
liste5.appendChild(newLi5);
liste5.children[1].replaceWith(newLi5);
ul5.innerHTML = 'ul'
})

Btn6.addEventListener("click", function() {
  const min6 = 1;
  const max6 = 12;
  const play6 = function() {
  Math.floor(Math.random()*
      (max6 - min6));
 }

const newLi6 = document.createElement("li");
newLi6.innerText = Math.floor(Math.random()*(max6 - min6));
liste6.appendChild(newLi6);
liste6.children[1].replaceWith(newLi6);
ul6.innerHTML = 'ul'
})

Btn7.addEventListener("click", function() {
  const min7 = 1;
  const max7 = 12;
  const play7 = function() {
  Math.floor(Math.random()*
      (max7 - min7));
 }

const newLi7 = document.createElement("li");
newLi7.innerText = Math.floor(Math.random()*(max7 - min7));
liste7.appendChild(newLi7);
liste7.children[1].replaceWith(newLi7);
ul7.innerHTML = 'ul'
})

