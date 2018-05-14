<?php
//Добавление комментария в базу данных
  require_once("bd.php");
  $link = db_connect();
  define('ROOT', dirname(__FILE__) . '/');

  if($_POST['comment-add']){
    $name = trim($_POST['comment-name']);
    $email = trim($_POST['comment-email']);
    $text = trim($_POST['comment-text']);
    $date = date("H:m:s \ d.m.y");

    $errors = array();
    if(trim($text) == ''){
      $errors[] = 'Введите текст отзыва';
    }
    if(empty($errors)){
      $t = "INSERT INTO comments(name, email, text, date) VALUES('%s','%s','%s',NOW())";
      $query = sprintf(
        $t,
        mysqli_real_escape_string($link, $name),
        mysqli_real_escape_string($link, $email),
        mysqli_real_escape_string($link, $text)
      );
      $result = mysqli_query($link, $query);
      if (!$result) {
        die(mysqli_error($link));
      }
    }else {
      echo "<div class = 'message message--error'>";
      echo "Введите текст комментария";
      echo "</div>";
    }
  }

  //Выведение комментариев из БД  на сайт
  $query = "SELECT * FROM comments ORDER BY id DESC";

  $resultShow = mysqli_query($link, $query);
  if (!$resultShow) {
    die(mysqli_error($link));
  }

  $n = mysqli_num_rows($resultShow);
  $comments = array();
  for($i=0; $i<$n; $i++){
    $row = mysqli_fetch_assoc($resultShow);
    $comments[] = $row;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Отзывы</title>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="libs/jquery-ui-1.12.1.custom/jquery-ui.min.css"/>
    <link rel="stylesheet" href="libs/jquery-ui-1.12.1.custom/jquery-ui.structure.css"/>
    <link rel="stylesheet" href="libs/jquery-ui-1.12.1.custom/jquery-ui.theme.css"/>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"/>
  </head>
  <body>
    <div class="wrapper">
      <?php
        include ("header.tpl");
      ?>
      <div class="section-content">
        <h1>Отзывы наших гостей</h1>
        <div id ="comments">
          <?php
            foreach($comments as $value) {
          ?>
          <div class="appartment appartment__guestbook">
            <div class="appartment__desc">
              <div class="appartment__header">
                <div class="appartment__title comment-title"><?php echo ($value[name]);?></div>
              </div>
            </div>
            <div class="appartment__text appartment__text__guestbook">
              <p class ="comment-email"><?php echo $value[email];?></p>
              <p class = "comment-text"><?php echo $value[text];?></p>
            </div>
            <div class="appartment__footer">
              <div class="appartment__options appartment__options__guestbook">
                <div class="tag comment-date"><?php echo $value[date];?></div>
              </div>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
        <form class="contact-form" id="" action = "guestbook.php" method = "POST">
          <h2>Оставить отзыв</h2>
          <div class="row" id="form-notify"></div>
          <div class="contact-form__row">
            <input class="input input--half" type="text" id="comment-name" name="comment-name" placeholder="Введите имя"/>
            <input class="input input--half" type="text" id="comment-email" name="comment-email" placeholder="Введите email"/>
          </div>
          <div class="contact-form__row">
            <textarea class="textarea" id="comment-text" name="comment-text" placeholder="Ваше сообщение"></textarea>
          </div>
          <div class="contact-form__row">
            <input class="button" type="submit" id="comment-add" name="comment-add" value="Добавить отзыв"/>
          </div>
        </form>
        <?php
          if ($result){
          echo "<div class = 'message message--success'>";
          echo "Отзыв успешно добавлен";
          echo "</div>";
          }
        ?>
      </div>
      <div class="section-footer">
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5740.709414819223!2d115.1689508123794!3d-8.716764730321545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd246becfdf3a21%3A0xc9b3a559671f273b!2sBounty+Hotel!5e0!3m2!1sru!2sru!4v1516788876021" width="300" height="200" frameborder="0" style="border:0;" allowfullscreen="allowfullscreen"></iframe>
        </div>
        <div class="address">
          <p><strong>2 Commercial Road <br></strong>EH6 78H, Chicago <br>
            Ohio, United States <br>
            Full directions
          </p>
        </div>
        <div class="footer__social"><a href="#" target="_blank">
            <svg class="icon-cocial">
              <use xlink:href="img/sprite.svg#vk"></use>
            </svg></a><a href="#" target="_blank">
            <svg class="icon-cocial">
              <use xlink:href="img/sprite.svg#fb"></use>
            </svg></a><a href="#" target="_blank">
            <svg class="icon-cocial">
              <use xlink:href="img/sprite.svg#inst"></use>
            </svg></a><a href="#" target="_blank">
            <svg class="icon-cocial">
              <use xlink:href="img/sprite.svg#twitter"></use>
            </svg></a></div>
      </div>
      <script src="libs/libs.min.js"></script>
      <script src="js/main.js"></script>
      <script src="js/comments.js"></script>
    </div>
  </body>
</html>