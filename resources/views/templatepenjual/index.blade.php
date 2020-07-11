<!DOCTYPE html>
<html lang="en">
@include("templatepenjual.head")

<body class="light">

    @if(Auth::guard('penjual'))
    @include("templatepenjual.nav-penjual")
    <!-- #Top Bar -->


    <div class="container-fluid" style="margin-top: 90px">
        <div class="block-header">
            <div class="row">

                @yield("content")

            </div>
        </div>

    </div>
    @endif

    @include("templatepenjual.script")


</body>

</html>