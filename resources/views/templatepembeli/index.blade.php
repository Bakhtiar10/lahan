<!DOCTYPE html>
<html lang="en">
@include("templatepembeli.head")

<body class="light">
    @if(Auth::user()->role_id === 3)
    @include("templatepembeli.nav-pembeli")
    <div class="container-fluid" style="margin-top: 90px">
        <div class="block-header">
            <div class="row">

                @yield("content")
            
            </div>
        </div>
    </div>
    @include("templatepembeli.script")
    @endif
    
</body>

</html>