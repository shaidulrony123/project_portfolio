
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend/assets/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
{{-- <script src="{{ asset('frontend/assets/js/script.js') }}"></script> --}}
<script>
      // Count Up Animation
  document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".counter");

    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute("data-count");
        const count = +counter.innerText;
        const increment = target / 200; // Adjust for speed of counting

        if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(updateCount, 10);
        } else {
          counter.innerText = target.toLocaleString(); // Format large numbers with commas
        }
      };
      updateCount();
    });
  });
</script>

<script>
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
</script>

<script>
  new WOW().init();
</script>
</body>
</html>
