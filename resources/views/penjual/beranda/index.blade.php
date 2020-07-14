@extends("templatepenjual.index")
@section('title') Beranda Penjual @endsection
@section("content")

<div class="container">
@if(Session::has('message'))
<div class="alert alert-success" role="alert">
    {{Session::get('message')}}
</div>
@endif
    <div class="row clearfix">
        <div class="card-body">
        <form action="{{ route('penjual_koment') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Komentar</label>
                <input type="hidden" value="{{ Auth::user()->id }}" name="id_penjual">
                <textarea class="form-control" name="content" placeholder="Beri Komentar Untuk Website" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Kirim</button>
        </form>
    </div>
    </div>
</div>

@endsection