<!DOCTYPE html>
<html lang="en">
@include("template.head")

<body class="light">


    @include("template.nav")
    @include("template.sidebar")

    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        @yield("content")

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include("template.script")
    
    
</body>

</html>