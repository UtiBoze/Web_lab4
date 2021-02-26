<?php
require_once('../includes/header.php');
$dbQuery = mysqli_query($link, "SELECT * FROM menu ORDER BY date DESC LIMIT 10");
$outputBd = mysqli_fetch_all($dbQuery);
$i=0;?>
    <h3 class="text-center pt-3 text-secondary mb-3">Добавить блюдо</h3>
    <div class="container pb-5">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="bg-light col-6 p-2">
                <form method="post" action="../php-logic/menu_include.php" name="form">
                    <div class="form-group" >
                        <label>Назвние блюда</label>
                        <input type="text" class="form-control" name="name" placeholder="название блюда" required>
                        <small id="name" class="form-text text-danger" hidden>введите блюдо</small>
                    </div>
                    <div class="form-group">
                        <label>Дата добавления в меню</label>
                        <input type="date" class="form-control" name="dateTo" placeholder="дата добавления" required>
                        <small id="dateTo" class="form-text text-danger" hidden>введите дату</small>
                    </div>
                    <div class="form-group">
                        <label>Цена $</label>
                        <input type="text" class="form-control" name="price" placeholder="цена (в долларах)" required>
                        <small id="price" class="form-text text-danger" hidden>введите цену (float число)</small>
                    </div>
                    <div class="form-group">
                        <label>Имя повара (необязательно)</label>
                        <input type="text" class="form-control" name="master" placeholder="имя повара, добавившего блюдо">
                    </div>
                    <button onclick="validateForm()" class="btn btn-primary">Записаться</button>
                </form>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
<br>
<h2 class="text-center pt-3 ">Наше меню</h2>
<div class="row p-3">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Наименование</th>
      <th scope="col">Дата добавления</th>
      <th scope="col">Цена</th>
        <th scope="col">Автор</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($outputBd as $elemBd): ?>
      <tr class="bg-light">
          <td><?php $i++;
              echo $i; ?></td>
          <td><?php echo $elemBd[1]; ?></td>
          <td><?php echo $elemBd[3]; ?></td>
          <td><?php echo $elemBd[2]; ?>$</td>
          <?php if(empty($elemBd[4])):?>
          <td>--</td>
          <?php else:?>
          <td><?php echo $elemBd[4]; ?></td>
          <?php endif;?>
      </tr>
  <?php endforeach; ?>
  </tbody>
    </table>
</div>
    <script>
        function validateForm() {
            var field1 = document.forms["form"]["name"].value;
            var field2 = document.forms["form"]["dateTo"].value;
            var field3 = document.forms["form"]["price"].value;
            if (field1 == "") {
                document.getElementById("name").hidden = false;
            } else {
                document.getElementById("name").hidden = true;
            }
            if (field2 == "") {
                document.getElementById("dateTo").hidden = false;
            } else {
                document.getElementById("dateTo").hidden = true;
            }
            if (field3 == "" || isNaN(parseFloat(field3))) {
                document.getElementById("price").hidden = false;
            } else {
                document.getElementById("price").hidden = true;
            }
        }
    </script>
<?php require_once('../includes/footer.php');
?>