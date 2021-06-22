<!DOCTYPE html>
<html lang="en">
@include("templatepenjual.head")

<body class="light">

    @if(Auth::user()->role_id === 2)
    @include("templatepenjual.nav-penjual")
    <!-- #Top Bar -->


    <div class="" style="margin-top: 60px; background:white">
        {{-- <div class="row"> --}}

            @yield("content")

        {{-- </div> --}}

    </div>

    @include("templatepenjual.script")
    @endif


</body>

</html>