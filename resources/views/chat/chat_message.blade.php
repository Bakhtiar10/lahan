@extends("templatepenjual.index")
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-6 mt-5">
          <div class="card border">
              @if (count($lahan->images) > 0)
                <img class="card-img-top" src="{{asset($lahan->images[0]->foto)}}" alt="Card image cap">
              @else
                <img class="card-img-top" src="{{asset('no-image-found.png')}}" alt="Card image cap">
              @endif
            <div class="card-body">
              <div class="col-12">
                  <div class="product-description">
                      <dl class="row mb-5">
                          <dt class="col-sm-3">Nama Penjual</dt>
                          <dd class="col-sm-9">{{ $lahan->user->name }}</dd>

                          <dt class="col-sm-3">Harga</dt>
                          <dd class="col-sm-9">Rp. {{ number_format($lahan->harga_lahan, 0, ',', '.') }}</dd>

                          <dt class="col-sm-3">Judul Lahan</dt>
                          <dd class="col-sm-9">{{ $lahan->judul_lahan }}</dd>

                          <dt class="col-sm-3">Luas Lahan</dt>
                          <dd class="col-sm-9">{{ $lahan->luas_lahan }} M2</dd>

                          <dt class="col-sm-3">Jenis Lahan</dt>
                          <dd class="col-sm-9">{{ $lahan->jenis_lahan }}</dd>

                          <dt class="col-sm-3">Sertifikat</dt>
                          <dd class="col-sm-9">{{ $lahan->sertifikat }}</dd>

                          <dt class="col-sm-3">Alamat</dt>
                          <dd class="col-sm-9">{{ $lahan->alamat }}</dd>

                          <dt class="col-sm-3">Deskripsi</dt>
                          <dd class="col-sm-9">{{ $lahan->deskripsi }}</dd>
                      </dl>
                      <br>
                  </div>
              </div>
            </div>
          </div>
      </div>
        <div class="col-md-6 border">
          <div class="card border-dark">
              <div class="overflow-auto" style="height: 60vh" id="container-chat"></div>
              {{-- <form action="{{ route('chat.store') }}" method="POST"> --}}
                  <div class="d-flex justify-content-center align-items-center m-5 gap-2">
                      @csrf
                      <input type="hidden" id="room_id" name="room_id" value="{{ $room_id }}">
                      <input type="hidden" id="sender" name="sender" value="{{ Auth::user()->id }}">
                      <input type="hidden" id="receive" name="receive" value={{ $receive_id }}>
                      <textarea name="message" id="message" cols="30" rows="10" class="w-80 border mr-2"></textarea>
                      <button class=" ml-auto rounded btn btn-primary d-flex justify-content-center align-items-center"
                          id="submit-form">
                          <i class="fas fa-paper-plane ml--2"></i>
                      </button>
              {{-- </form> --}}
          </div>
          </div>

        </div>
      </div>

    </div>
@endsection
@section('script')
    <script>
        const firstChat = '{!! session("chat_klik_first") !!}';
        $(document).ready(function() {
            function getUrlVars() {
                var vars = [],
                    hash;
                var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                for (var i = 0; i < hashes.length; i++) {
                    hash = hashes[i].split('=');
                    vars.push(hash[0]);
                    vars[hash[0]] = hash[1];
                }

                return `sender={!! Auth::user()->id !!}&receive=${vars['receive']}`;
            }

            function loadMessage(){
                $.ajax({
                    type: 'GET',
                    url: '/message-json',
                    data: getUrlVars(),
                    success: function(data){
                        let authSender = {!! Auth::user()->id !!}
                        let html = '';
                        $.each(data.data, function(index, item){
                            if(item.sender_id === authSender){
                                html += `
                                <div style="width: 200px"
                                    class="rounded ml-auto mt-3 mr-3 bg-primary text-white shadow border-1 p-2">
                            ${item.message}</div>
                                `
                            }else{
                                html +=`
                                <div style="width: 200px" class="rounded ml-3 mt-3 bg-info text-white shadow border-1 p-2">
                                    ${item.message}</div>
                                `
                            }
                        })

                        $('#container-chat').html(html);
                        // var messageBody = document.querySelector('#container-chat');
                        // messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
                    }
                })
            }

            loadMessage();

            setInterval(function() {
                loadMessage();
            }, 1000)

            $('#submit-form').on('click', function(e){
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url : '/chat/store',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "room_id" : $('#room_id').val(),
                        "sender" : $('#sender').val(),
                        "receive" : $('#receive').val(),
                        "message" : $('#message').val(),
                    },
                    success: function(){
                        loadMessage($('#room_id').val(), $('#receive').val())
                    },
                    error : function(error){
                        console.log(error.responseText)
                    }

                })
            })

        })

    </script>
@endsection
