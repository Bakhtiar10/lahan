<!-- Plugins Js -->
    
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/table.min.js') }}"></script>
   
    <script src="{{ asset('assets/js/map.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/examples/pages.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="{{ asset('assets/js/pages/index.js') }}"></script>
    <script src="{{ asset('assets/js/pages/charts/jquery-knob.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/sparkline/sparkline-data.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/pages/medias/carousel.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"
        integrity="sha512-9CWGXFSJ+/X0LWzSRCZFsOPhSfm6jbnL+Mpqo0o8Ke2SYr8rCTqb4/wGm+9n13HtDE1NQpAEOrMecDZw4FXQGg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/pages/maps/jqvmap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                margin: 10,
                loop: true,
                autoWidth: true,
                items: 1,
                autoPlay: true
            });
        })
    </script>

    @yield('script')