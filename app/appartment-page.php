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
      <!-- <div class="section-header">
        <div class="logo"><a href="index.php"><img src="img/logo.png" alt="logo"/></a></div>
        <div class="navigation">
          <ul>
            <li><a href="index.php">Главная<span>Добро пожаловать</span></a></li>
            <li><a href="appartments.php">Аппартаменты<span>Выбор номера</span></a></li>
            <li><a href="guestbooks.php">Контакты<span>Напишите нам</span></a></li>
            <li class="reservation-btn custom-color-btn-back"><a href="#">Бронирование<span>Забронировать номер</span></a></li>
          </ul>
        </div>
      </div> -->
      <?php
        include ("header.tpl");
      ?>
      <div class="section-content">
        <div class="app-single__header">
          <h1>Двухспальный номер</h1>
          <div class="appartment__beds">
            <div class="fa fa-bed"></div>
            <div class="fa fa-bed"></div>
          </div>
        </div><img class="app-single-img" src="img/rooms/room_01.jpg" alt="Image - room photo"/>
        <div class="tags-block">
          <div class="tag-title">Удобства:</div>
          <div class="appartment__options">
            <div class="tag">air condition,</div>
            <div class="tag">free wi-fi,</div>
            <div class="tag">bath,</div>
            <div class="tag">flat TV</div>
          </div>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <div class="booking">
          <div class="booking__price">$14 <br><span>per night</span></div>
          <form class="booking-form" action="reservation.php" method="get">
            <input type="hidden" id="booking-room" name="booking-room" value="3"/>
            <div class="input-wrapper">
              <input class="input-wrapper__input datepicker" type="text" id="booking-checkin" name="booking-checkin" placeholder="31.01.2018"/>
              <div class="input-wrapper__icon">
                <div class="fa fa-calendar"></div>
              </div>
            </div>
            <div class="input-wrapper">
              <input class="input-wrapper__input datepicker" type="text" id="booking-checkout" name="booking-checkout" placeholder="31.01.2018"/>
              <div class="input-wrapper__icon">
                <div class="fa fa-calendar"></div>
              </div>
            </div>
            <input class="button button--full-width custom-color-btn-back" type="submit" value="Book now"/>
          </form>
        </div>
        <p class="extended-info">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
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
      <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script> -->
      <script src="libs/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
      <script src="js/main.js"></script>
    </div>
  </body>
</html>