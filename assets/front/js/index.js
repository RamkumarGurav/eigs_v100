$('.banner_slide').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: false,
  responsive: {
    0: {
      items: 1
    },
    400: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
})
$('.brands').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  navText: [
    "<i class='fa fa-caret-left'></i>",
    "<i class='fa fa-caret-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 2
    },
    800: {
      items: 2
    },
    1000: {
      items: 3
    }
  }
})


$('.brands_logo').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  navText: [
    "<i class='fa fa-caret-left'></i>",
    "<i class='fa fa-caret-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 2
    },
    400: {
      items: 3
    },
    600: {
      items: 3
    },
    840: {
      items: 4
    },
    1000: {
      items: 5
    }
  }
})



$('.testimonials').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  navText: [
    "<i class='fa fa-caret-left'></i>",
    "<i class='fa fa-caret-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    1000: {
      items: 2
    }
  }
})




$('.service_owl').owlCarousel({
  loop: true,
  margin: 5,
  nav: true,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 2
    },
    800: {
      items: 3
    },
    1000: {
      items: 4
    }
  }
})





// sdfsdffd


wow = new WOW(
  {
	animateClass: 'animated',
	offset:       100,
	callback:     function(box) {
	  console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
	}
  }
);
wow.init();
document.getElementById('moar').onclick = function() {
  var section = document.createElement('section');
  section.className = 'section--purple wow fadeInDown';
  this.parentNode.insertBefore(section, this);
};