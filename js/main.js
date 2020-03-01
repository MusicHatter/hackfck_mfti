'use strict'

let month =["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];

let findOpen = document.querySelector(".find-open");
let findFilter = document.querySelector(".find-filter");

let modalClose = document.querySelector(".modal-close");
let modalLogin = document.querySelector(".modal-login");

let userListItem = document.querySelector(".user-list-item");
let timefff= document.querySelector("time");

let usersQuestion = document.querySelector(".users-question");
let modalQuestion = document.querySelector(".modal-question");
let questionClose = document.querySelector(".question-close")

findOpen.addEventListener('click', function() {
    findFilter.classList.toggle('find-active');
});

modalClose.addEventListener('click', function() {
    modalLogin.classList.toggle('modal-login-active');
});

userListItem.addEventListener('click', function() {
    modalLogin.classList.toggle('modal-login-active');
});

usersQuestion.addEventListener('click', function() {
    modalQuestion.classList.toggle('modal-question-active');
});

questionClose.addEventListener('click', function() {
    modalQuestion.classList.toggle('modal-question-active');
});

var elementsTime = document.getElementsByClassName("post-time");
for (var i = 0; i < elementsTime.length; i++) {

    let date = elementsTime[i].getAttribute('datetime');
    let newDate = new Date(date);

    let thisMonth = newDate.getMonth();
    let thisDate = newDate.getDate();
    let thisHours = newDate.getHours(); 
    let thisMinutes = newDate.getMinutes();

    let textMonth = '';

    if (thisMonth === 12) {
        textMonth = 'января';
    } else {
        textMonth = month[thisMonth];
    }

    elementsTime[i].textContent = thisDate + ' ' + textMonth + ' ' + thisHours + ':' + thisMinutes;
}

var elementsTimeComment = document.getElementsByClassName("comment-time");
for (var i = 0; i < elementsTimeComment.length; i++) {

    let date = elementsTimeComment[i].getAttribute('datetime');
    let newDate = new Date(date);

    let thisMonth = newDate.getMonth();
    let thisDate = newDate.getDate();
    let thisHours = newDate.getHours(); 
    let thisMinutes = newDate.getMinutes();

    let textMonth = '';

    if (thisMonth === 12) {
        textMonth = 'января';
    } else {
        textMonth = month[thisMonth];
    }

    elementsTimeComment[i].textContent = '(' + thisDate + ' ' + textMonth + ' ' + thisHours + ':' + thisMinutes + ')';
}


