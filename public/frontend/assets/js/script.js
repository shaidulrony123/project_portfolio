function hideOffcanvas() {
    var offcanvas = document.getElementById('offcanvasSidebar');
    var bsOffcanvas = new bootstrap.Offcanvas(offcanvas);
    bsOffcanvas.hide();
}

function downloadCV() {
    // Replace this with your actual CV download logic
    alert('CV download initiated.');
}

document.getElementById('darkModeToggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
});

$('.feedback-slider').slick({
    slidesToShow: 2, // Number of slides to show at a time
    slidesToScroll: 1, // Number of slides to scroll at a time
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    dots: true,
    responsive: [
      {
        breakpoint: 1024, // Medium devices (tablets, 768px and up)
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 768, // Small devices (landscape phones, 576px and up)
        settings: {
          slidesToShow: 1,
        }
      },
      {
        breakpoint: 480, // Extra small devices (portrait phones, 0 to 576px)
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });
