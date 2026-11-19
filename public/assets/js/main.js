/*меню навигации*/
const nav = document.querySelector('#nav');
const navBtn = document.querySelector('#nav-btn');
const navBtnImg = document.querySelector('#nav-btn-img');

navBtn.onclick = function() {
    if (nav.classList.toggle('open')) {
        navBtnImg.src = "/public/assets/img/NAV CLOSE.svg";
    } else {
        navBtnImg.src = '/public/assets/img/NAV.svg';
    }
}

$(document).ready(function () {
    // эта функция получает наш результат проверки орфографии
    fix_spell = function (data) {
        data.forEach(function (elem) {
            // она находит наше поле ввода по имени
            $('#text_field').val(
                // и меняет всё на правильные слова без ошибок
            );
        });
    }
});
// обработчик нажатия на клавиши
document.addEventListener('keydown', function (e) {
    // если нажат пробел или энтер
    if ((e.keyCode == 32) || (e.keyCode == 13)) {
        // делим текст на строки
        var lines = $('#text_field').val().replace(/\r\n|\n\r|\n|\r/g, "\n").split("\n");
        // и обрабатываем каждую строчку:
        lines.forEach(function (line) {
            if (line.length) {
                // отправляем строку со словами на проверку в Спеллер, результат сразу отправляется в функцию fix_spell
                $.getScript('http://speller.yandex.net/services/spellservice.json/checkText?text=' + line + '&callback=fix_spell');
            }
        });
    }
});