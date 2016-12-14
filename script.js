$(document).ready(function() {
 
  $(".carousel").owlCarousel({
  	navigation : false,
  	slideSpeed : 300,
  	paginationSpeed : 400,
  	autoPlay : true,
  	singleItem : true
  });
 
});

/* 
 $(document).ready(function () {

  var $container = $('#item-image-large');

  var $image = $container.find('#largeImage');

  var $imageW = $image.width();

  var $imageH = $image.height();

  var $containerW = $container.innerWidth($imageW);

  var $containerH = $container.innerHeight($imageH);

  var $imageClone = $image.clone();

  var $imageLarge = $imageClone.width($imageW * 2);

  var imageLargeW = $image.width(); 

  var imageLargeH = $image.height();

  $image.width($imageW).height($imageH);

  $('#item-image-large').on({

    mouseenter: function () {

      //$imageLarge.hide().prependTo($container).fadeIn(3000);
      $image.css({'transform' : 'scale(1.5)'});

    },

    mousemove: function (e) {

      var mouseX = e.pageX - $(this).offset().left;

      var mouseY = e.pageY - $(this).offset().top;

      var amountMovedX = Math.round(mouseX / $imageW * 100) / 100 * ((imageLargeW) - $imageW);

      var amountMovedY = Math.round(mouseY / $imageH * 100) / 100 * ((imageLargeH) - $imageH);

      $image.css({

        'top': amountMovedY + 'px',

        'left': amountMovedX + 'px',

        'position': 'relative'

      });

    },

    mouseleave: function () {

      $image.css({'transform' : 'scale(1)'});

    }

});

});
*/