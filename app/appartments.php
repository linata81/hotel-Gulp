<?php
  require_once("bd.php");
  $link = db_connect();

  // Формируем запрос
  $query = "SELECT * FROM appartments";

  //Выполняем запрос
  $result = mysqli_query($link, $query);
  if (!$result) {
    die(mysqli_error($link));
  }

  //Записываем полученные данные в массив $appartments
  $n = mysqli_num_rows($result);
  $appartments = array();
  for($i=0; $i<$n; $i++){
    $row = mysqli_fetch_assoc($result);
    $appartments[] = $row;
  }
  //Отладочная информация
  // echo "<pre>";
  // print_r($appartments); //если нужно вывести все массивы
  // // print_r($appartments[0]); //если нужно вывести только 1 массив
  // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Размещение</title>
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
      <!-- <div class="section-header">
        <div class="logo"><a href="index.html"><img src="img/logo.png" alt="logo"/></a></div>
        <div class="navigation">
          <ul>
            <li><a href="index.html">Главная<span>Добро пожаловать</span></a></li>
            <li><a href="appartments.html">Аппартаменты<span>Выбор номера</span></a></li>
            <li><a href="contacts.html">Контакты<span>Напишите нам</span></a></li>
            <li class="reservation-btn custom-color-btn-back"><a href="#">Бронирование<span>Забронировать номер</span></a></li>
          </ul>
        </div>
      </div> -->
      <div class="section-content">
        <h1>Варианты для размещения</h1>

        <?php
        foreach($appartments as $value) {
        ?>
          <div class="appartment">
          <div class="appartment__img" style="background-image: url(img/rooms/<?php echo $value[img]; ?>);"></div>
          <div class="appartment__desc">
            <div class="appartment__header">
              <div class="appartment__title"><?php echo ($value[title] . " - " . $value[price] . "$"); ?></div>
              <div class="appartment__beds">

                <?php
                  for ($i=0; $i < $value[beds]; $i++) { 
                    echo'<div class="fa fa-bed"></div>';
                  }
                ?>
                
              </div>
            </div>
            <div class="appartment__text">
              <p><?php  echo $value[description]; ?></p>
            </div>
            <div class="appartment__footer"><a class="appartment__button button" href="appartment-page.php">Details</a>
              <div class="appartment__options">
                <div class="tag">air condition,</div>
                <div class="tag">free wi-fi,</div>
                <div class="tag">bath,</div>
                <div class="tag">flat tv</div>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>

        <!-- <div class="appartment">
          <div class="appartment__img" style="background-image: url(img/rooms/room_01.jpg);"></div>
          <div class="appartment__desc">
            <div class="appartment__header">
              <div class="appartment__title">Superior Double item</div>
              <div class="appartment__beds">
                <div class="fa fa-bed"></div>
                <div class="fa fa-bed"></div>
              </div>
            </div>
            <div class="appartment__text">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure .</p>
            </div>
            <div class="appartment__footer"><a class="appartment__button button" href="appartment-page.html">Details</a>
              <div class="appartment__options">
                <div class="tag">air condition,</div>
                <div class="tag">free wi-fi,</div>
                <div class="tag">bath,</div>
                <div class="tag">flat tv</div>
              </div>
            </div>
          </div>
        </div>
        <div class="appartment">
          <div class="appartment__img" style="background-image: url(img/rooms/room_02.jpg);"></div>
          <div class="appartment__desc">
            <div class="appartment__header">
              <div class="appartment__title">Superior Single item</div>
              <div class="appartment__beds">
                <div class="fa fa-bed"></div>
                <div class="fa fa-bed"></div>
              </div>
            </div>
            <div class="appartment__text">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure .</p>
            </div>
            <div class="appartment__footer"><a class="appartment__button button" href="appartment-page.html">Details</a>
              <div class="appartment__options">
                <div class="tag">air condition,</div>
                <div class="tag">free wi-fi</div>
              </div>
            </div>
          </div>
        </div>
        <div class="appartment">
          <div class="appartment__img" style="background-image: url(img/rooms/room_03.jpg);"></div>
          <div class="appartment__desc">
            <div class="appartment__header">
              <div class="appartment__title">Superior Single item</div>
              <div class="appartment__beds">
                <div class="fa fa-bed"></div>
                <div class="fa fa-bed"></div>
              </div>
            </div>
            <div class="appartment__text">
              <p>Lorem ipsum dolor sit amet. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure .</p>
            </div>
            <div class="appartment__footer"><a class="appartment__button button" href="appartment-page.html">Details</a>
              <div class="appartment__options">
                <div class="tag">air condition,</div>
                <div class="tag">free wi-fi</div>
              </div>
            </div>
          </div>
        </div>
        <div class="appartment">
          <div class="appartment__img" style="background-image: url(img/rooms/room_04.jpg);"></div>
          <div class="appartment__desc">
            <div class="appartment__header">
              <div class="appartment__title">Superior Double item</div>
              <div class="appartment__beds">
                <div class="fa fa-bed"></div>
                <div class="fa fa-bed"></div>
              </div>
            </div>
            <div class="appartment__text">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure .</p>
            </div>
            <div class="appartment__footer"><a class="appartment__button button" href="appartment-page.html">Details</a>
              <div class="appartment__options">
                <div class="tag">air condition,</div>
                <div class="tag">free wi-fi,</div>
                <div class="tag">bath,</div>
                <div class="tag">flat tv</div>
              </div>
            </div>
          </div>
        </div> -->
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
      <script src="libs/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
      <script src="js/main.js"></script>
    </div>
  </body>
</html>