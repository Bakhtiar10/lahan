<!DOCTYPE html>
<html lang="en">
@include("templatepenjual.head")

<body class="light">

    @if(Auth::user()->role_id === 2)
    @include("templatepenjual.nav-penjual")
    <!-- #Top Bar -->


    <div class="container-fluid" style="margin-top: 90px">
        <div class="block-header">
            <div class="row">

                @yield("content")

            </div>
        </div>

    </div>

    @include("templatepenjual.script")
    @endif


</body>

</html>