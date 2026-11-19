<?php
    require_once 'components/header.php';
?>

<p class="heading">Расписание</p>

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
        <input class="btn btn-primary" type="submit" value="Применить">
      </div>
    </div>

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
          <td>8:30-10:00</td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td></td>
          <td></td>
          <td></td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>10:10-11:40</td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td></td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td></td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>12:20-13:50</td>
          <td></td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td></td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>14:00-15:30</td>
          <td></td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td></td>
          <td></td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>15:40-17:10</td>
          <td></td>
          <td></td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>17:20-18:50</td>
          <td></td>
          <td></td>
          <td></td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <td>19:00-20:30</td>
          <td></td>
          <td></td>
          <td></td>
          <td><p id="name">Предмет</p><p id="subtxt">Фамилия И.О.</p>(<span id="num">1-215</span>)</td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>

<?php
    require_once 'components/footer.php';
?>