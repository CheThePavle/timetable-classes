<?php
    require_once 'components/header.php';
?>
<p class="heading">Составить расписание</p>
    <p class="description">Выбрать группу:</p>

    <div class="func">
      <div class="d">
          <input type="radio" class="btn-check" name="year" id="D19" autocomplete="off">
          <label class="btn btn-secondary" for="Д19">Д19</label>
          <input type="radio" class="btn-check" name="year" id="D20" autocomplete="off">
          <label class="btn btn-secondary" for="Д20">Д20</label>
          <input type="radio" class="btn-check" name="year" id="D21" autocomplete="off">
          <label class="btn btn-secondary" for="Д21">Д21</label>
          <input type="radio" class="btn-check" name="year" id="D22" autocomplete="off">
          <label class="btn btn-secondary" for="Д22">Д22</label>
      </div>

      <div class="selects">
        <div class="sel-block">
            <select class="form-select" aria-label="Profession">
                <option selected>Специальность</option>
                <option value="Программирование">Программирование</option>
                <option value="Дизайн">Дизайн</option>
            </select>
        </div>

        <div class="sel-block">
            <select class="form-select" aria-label="group">
                <option selected>Группа</option>
                <option value="191-1">191-1</option>
                <option value="191-2">191-2</option>
            </select>
        </div>
      </div>

      <div id="accept">
        <input class="btn btn-primary" type="submit" value="Показать" onclick="showTable()">
      </div>
    </div>
    <br>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">№</th>
          <th scope="col">Время</th>
          <th scope="col">Пн</th>
          <th scope="col">Вт</th>
          <th scope="col">Ср</th>
          <th scope="col">Чт</th>
          <th scope="col">Пт</th>
          <th scope="col">Сб</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <th>8:30-10:00</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <th>10:10-11:40</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <th>12:20-13:50</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <th>14:00-15:30</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <th>15:40-17:10</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <th>17:20-18:50</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <th>19:00-20:30</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>

    <p class="description">Задать параметры ячейки:</p>
    <div class="func">
      <div class="sel-block">
        <select class="form-select" id="teacher">
            <option selected>Преподаватель</option>
            <option value="Печкин А.В.">Печкин А.В.</option>
            <option value="Сердечкин Д.А.">Сердечкин Д.А.</option>
        </select>
      </div>

      <div class="sel-block">
        <select class="form-select" id="lesson_name">
            <option selected>Название предмета</option>
            <option value="Операционные системы">Операционные системы</option>
            <option value="Черчение">Черчение</option>
        </select>
      </div>

      <div class="sel-block">
        <select class="form-select" id="cabinet">
            <option selected>Аудитория</option>
            <option value="1-121">1-121</option>
            <option value="2-201">2-201</option>
        </select>
      </div>

      <div id="clean">
        <button class="btn_clean btn-primary" onclick="clean()"><img src="/public/assets/img/eraser.png" height="38px"></button>
      </div>
      <div id="accept">
        <input class="btn btn-primary" type="submit" value="Применить" onclick="createTd()">
      </div>
    </div>

    <div id="save">
        <input class="save-btn btn btn-primary" type="submit" value="Сохранить все изменения">
    </div>

    <script src="/public/assets/js/methodist_table.js"></script>
<?php
    require_once 'components/footer.php';
?>