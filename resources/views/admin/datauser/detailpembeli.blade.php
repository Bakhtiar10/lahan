@extends("template.index")
@section("content")

<div class="container">
    <div class="card">
        <div class="header">
            <h2><strong>Detail Pembeli</strong></h2>
        </div>
        <div class="card-body">
            <div class="product-store">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="product-gallery">
                            <div class="product-gallery-featured">
                            @if($detailpembeli->image !== null)
                                <img src="{{ asset($detailpembeli->image) }}" width="150" height="150" alt="User">
                                @else
                                <img src="{{ asset('assets/images/user_default.png') }}" width="150" height="150"
                                    alt="User">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="product-description">
                            <dl class="row mb-5">

                                <dt class="col-sm-3">Nama</dt>
                                <dd class="col-sm-9">{{ $detailpembeli->name }}</dd>

                                <dt class="col-sm-3">Email</dt>
                                <dd class="col-sm-9">{{ $detailpembeli->email }}</dd>

                                <dt class="col-sm-3">No Hp</dt>
                                <dd class="col-sm-9">{{ $detailpembeli->no_hp }}</dd>

                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection