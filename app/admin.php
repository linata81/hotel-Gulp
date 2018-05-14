<?php
  // Подключились к БЗ
  require_once("bd.php");

  // Устанавливаем с ней соединение
  $link = db_connect();

  //определим постоянную ROOT
  define('ROOT', dirname(__FILE__) . '/');

  //если кнопка отправить была нажата, то выполняем все действия
  if($_POST['app-add']){
    //Создаем переменные, в кот. хранятся содержимое полей формы(данные из POST массива)
    //trim для обрезки пробелов перед и после надписи
    $title = trim($_POST['app-title']);
    $price = trim($_POST['app-price']);
    $beds = trim($_POST['app-beds']);
    $desc = trim($_POST['app-desc']);

    //проверка, чтобы не отправляли пустую форму
    $errors = array();
    if(trim($title) == ''){
      $errors[] = 'Введите название номера';
    }
    if(empty($errors)){

      if(isset($_FILES['app-img'])){
        //получаем имя картинки
        $fileName = $_FILES['app-img']['name'];//room_03.jpg
        // echo $fileName;
    
        //получаем расширение картинки
        $k = explode(".", $fileName); //room_03 jpg
        $fileExt = end($k);//jpg
    
        //получаем адрес временного хранения картинки
        $tmpLocation = $_FILES['app-img']['tmp_name'];
    
        //делаем чтобы файл с картинкой получал случайное имя
        $dbFileName  = rand(0,9999999999999999) . "." . $fileExt;
    
        //определяем, где картинка должна храниться в проекте
        $imgLocation = ROOT . 'img/rooms/' . $dbFileName;
    
       //Фун-я перемещает загруженный файл в новое место
        $moveResult = move_uploaded_file($tmpLocation, $imgLocation);
        if($moveResult != true){
          die("File upload FAILED!");
        }
      }

      // Формируем запрос создание нового аппартамента, который будет добавлять наши данные в БД
      $t = "INSERT INTO appartments(title, description, beds, price, img) VALUES('%s','%s','%s','%s','%s')";

      $query = sprintf(
        $t,
        mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $desc),
        mysqli_real_escape_string($link, $beds),
        mysqli_real_escape_string($link, $price),
        mysqli_real_escape_string($link, $dbFileName)
      );

      // Выполняем запрос
      $result = mysqli_query($link, $query);
      if (!$result) {
        die(mysqli_error($link));
      }
      else {
        echo "<div class = 'message message--success'>";
        echo "Номер успешно добавлен";
        echo "</div>";
      }

    } else {
      echo "<div class = 'message message--error'>";
      echo "Заполните все поля";
      echo "</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Админ панель</title>
    <link rel="stylesheet" href="libs/bootstrap-4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="libs/jquery-ui-1.12.1.custom/jquery-ui.min.css"/>
    <link rel="stylesheet" href="libs/jquery-ui-1.12.1.custom/jquery-ui.structure.css"/>
    <link rel="stylesheet" href="libs/jquery-ui-1.12.1.custom/jquery-ui.theme.css"/>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"/>
  </head>
  <body>
    <div class="wrapper">
      <div class="section-header">
        <h3>Админ панель</h3>
      </div>
      <div class="section-content">

      <?php
      // отладочная инфа
      // echo "<pre>";
      // print_r($_POST);
      // print_r($_FILES);
      // echo "</pre>";

      //выводит сообщение до заполнения формы!!!!!!
      // if ($result) {
      //   echo "<div class = 'message message--success'>";
      //   echo "Номер успешно добавлен";
      //   echo "</div>";
      // }
      ?>

        <h1>Добавить номер</h1>
        <form class="contact-form" id="contact-form" action = "admin.php" method = "POST" enctype = "multipart/form-data">
          <div class="row" id="form-notify"></div>
          <div class="contact-form__row">
            <input class="input" type="text" id="app-title" name="app-title" placeholder="Название номера"/>
          </div>
          <div class="contact-form__row">
            <input class="input" type="text" id="app-price" name="app-price" placeholder="Цена за сутки"/>
          </div>
          <div class="contact-form__row">
            <input class="input" type="text" id="app-beds" name="app-beds" placeholder="Количество спальных мест"/>
          </div>
          <div class="contact-form__row">
            <input class="input" type="file" id="app-img" name="app-img"/>
          </div>
          <div class="contact-form__row">
            <textarea class="textarea" id="app-desc" name="app-desc" placeholder="Описание номера"></textarea>
          </div>
          <div class="contact-form__row">
            <input class="button" type="submit" id="app-add" name="app-add" value="Добавить номер"/>
          </div>
        </form>
      </div>
      <div class="section-footer">
        <div class="address">
          <p>© Админ панель</p>
        </div>
      </div>
      <script src="libs/libs.min.js"></script>
      <script src="libs/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
      <!-- <script src="js/main.js"></script> Оключила, т.к. js не дает отослать форму, надо разбираться -->
    </div>
  </body>
</html>