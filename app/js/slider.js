var images = document.querySelectorAll('.gallery .photos img');
var slider = new Slider(images);

setInterval(slider.next, 8000);

document.querySelector('.photos .prev').onclick = function(){
  slider.prev();
}
document.querySelector('.photos .next').onclick = function(){
  slider.next();
};

function Slider(images){
  this.images = images;
  var i = 0;
  var slider = this;

  slider.prev = function(){
    slider.images[i].classList.remove('showed');
    i--;
    if(i < 0){
      i = slider.images.length-1;
    }
  slider.images[i].classList.add('showed');
  }

  slider.next = function(){
    slider.images[i].classList.remove('showed');
    i++;
    if(i >= slider.images.length){
      i = 0;
    }
  slider.images[i].classList.add('showed');
  }
};





