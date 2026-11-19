let clear = false;
function clean() {
    if (clear) {
        clear = false;
        document.getElementById('id_clean').classList.remove('selectClean');
    } else {
        clear = true;
        document.getElementById('id_clean').classList.add('selectClean');
    }
}

function select(id_lesson, id_day, td, id_schedule = null) {
    if (clear) {
        document.getElementById('id_schedule').value = id_schedule;
        document.getElementById('form_schedule').submit();
    } else {
        if (td.innerText.length !== 0) return alert('Уже занято, сначала удалите');

        let id_item = document.getElementById('id_item').value;
        let id_teacher = document.getElementById('id_teacher').value;
        let id_form = document.getElementById('id_form').value;
        let id_cabinet = document.getElementById('id_cabinet').value;
        let name_meeting = document.getElementById('id_meeting').value;

        if ((name_meeting || +id_item > 0) && id_teacher > 0 && id_form > 0 && (name_meeting ||id_cabinet > 0)) {
            document.getElementById('id_lesson').value = id_lesson;
            document.getElementById('id_day').value = id_day;
            document.getElementById('form_schedule').submit();
        } else {
            return alert('Вы не выбрали: Преподавателя, Предмет, Тип занятия или Аудиторию')
        }
    }
}

function selectMeeting(el) {
    const noSelectMeeting = document.getElementById('noSelectMeeting');
    const selectMeeting = document.getElementById('selectMeeting');

    if (el.value == 3) {
        noSelectMeeting.classList.add('d-none');
        selectMeeting.classList.remove('d-none');
    } else {
        noSelectMeeting.classList.remove('d-none');
        selectMeeting.classList.add('d-none');
    }
}
