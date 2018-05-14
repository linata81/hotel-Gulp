<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Отель Лермонтов</title>
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
      <div class="section-content gallery">
        <div class="photos"><img class="showed" src="img/hotel/1.jpg" alt="hotel"/><img src="img/hotel/2.jpg" alt="holl"/><img src="img/hotel/3.jpg" alt="bassein"/><img src="img/hotel/4.jpg" alt="sport"/><img src="img/hotel/5.jpg" alt="cafe"/>
          <div class="buttons">
            <svg class="scroll prev">
              <use xlink:href="img/sprite.svg#arrow-scroll"></use>
            </svg>
            <svg class="scroll next">
              <use xlink:href="img/sprite.svg#arrow-scroll"></use>
            </svg>
          </div>
        </div>
        <p>Отель Лермонтов приветствует Вас. Расположение отеля на берегу Черного моря, оформление и комплектация номеров, домашняя русская и традиционная европейская кухня нашего кафе – все это оставит у Вас самые приятные впечатления о пребывании в Отеле Лермонтов!</p>
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
      <!-- <script src="libs/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script> -->
      <script src="js/main.js"></script>
      <script src="js/slider.js"></script>
    </div>
  </body>
</html>