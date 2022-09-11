 <!-- BEGIN: Theme JS-->
    <script src="{{ asset('frontend/theme1/assets/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('frontend/theme1/assets/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('frontend/theme1/assets/wow/wow.min.js') }}" defer></script>
    <script src="{{ asset('frontend/theme1/assets/magnific/jquery.magnific-popup.js') }}" defer></script>
    <script src="{{ asset('frontend/theme1/assets/js/menu.js') }}" defer></script>
    <script src="{{ asset('frontend/theme1/assets/owl-carousel/js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('frontend/theme1/assets/js/custom.js') }}" defer></script>
 <!-- END: Theme JS-->
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                        dots: false
                    },
                    600: {
                        items: 3,
                        nav: true,
                        dots: false
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        loop: false,
                        dots: false,
                        margin: 20
                    }
                }
            })
        })
    </script>
    <script>
        new WOW().init();
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.galleryss').magnificPopup({
                type:'image',
                delegate: 'a',
                gallery:{
                    enabled: true
                }
            });
        });

    </script>
@yield('script')
