// Выделение активного пункта меню с помощью jQuery
$(function(){

  var location = window.location.href;
  var cur_url = location.split('/').pop();

  // console.log(location);
  // console.log(cur_url);

  $('.navigation li').each(function () {
    var link = $(this).find('a').attr('href');
    if(cur_url == link){
      $(this).addClass('active');
    }
  });


  //Подключаем календарь с дэйтпикека
  $(".datepicker").datepicker({dateFormat:'dd.mm.yy'});

});







