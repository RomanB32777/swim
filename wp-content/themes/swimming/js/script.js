 var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;

        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0px";
        } else if (prevScrollpos < 120 ){
            document.getElementById("navbar").style.top = "0px";
        }
        else {
            document.getElementById("navbar").style.top = "-120px";
          }
        prevScrollpos = currentScrollPos;
    }

    jQuery('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })

    
    jQuery(document).ready(function() {

        jQuery(".owl-carousel").owlCarousel({
            margin: 10,
            // loop: true,
            rewind: true,
            autoplay: true,
            lazyLoad: true,
            responsive: {
                320: {
                    items: 1
                },
                450: {
                    items: 2
                },
                600: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1100: {
                    items: 5
                }
            }
        });
    });