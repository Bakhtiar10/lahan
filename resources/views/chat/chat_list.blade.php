@extends("templatepenjual.index")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card" id="list-contact">
                    @forelse ($chat_list as $list)
                        <a href="javascript: void(0)" id="click-chat" data-id="{{ $list->room_id }}"
                            data-receive={{ $list->sender_id == Auth::user()->id ? $list->receive_id : $list->sender_id }} >
                            <div class="rounded border d-flex align-items-center" style="width : 100%">
                                <div class="border rounded-circle m-2"
                                    style="width: 60px; height: 60px; background: #e9e9e9">
                                    @if ($list->sender->image !== null)
                                        <img class="rounded-circle object-contain" src="{{ $list->sender->image }}"
                                            alt="">
                                    @else
                                        <img class="rounded-circle object-contain"
                                            src="{{ asset('assets/images/user_default.png') }}" alt="User">
                                    @endif
                                </div>
                                @if($list->receive_id == Auth::user()->id)
                                <div class="font-weight-bold text-uppercase">{{ $list->sender->name }}</div>
                                @else
                                <div class="font-weight-bold text-uppercase">{{ $list->receive->name }}</div>
                                @endif
                            </div>
                        </a>
                    @empty
                    <a href="javascript: void(0)" class=" text-center" style="text-decoration: none; color: black">
                        <div class="rounded border d-flex align-items-center justify-content-center" style="width : 100%; height: 100px">
                            <div class="font-weight-bold text-uppercase">Tidak ada Pesan</div>
                        </div>
                    </a>
                    @endforelse
                </div>
            </div>
            <div class="col-md-8">
                <div class="card" style="height: 80vh">
                    <div class="overflow-auto" style="height: 60vh" id="container-chat"></div>
                    <div class="" id="form-send"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // $(document).ready(function() {
            function showForm(room_id, receive_id, sender_id) {
                let html = ''
                html += `
                <div class="d-flex justify-content-center align-items-center m-5 gap-2">
                    @csrf
                    <input type="hidden" id="room_id" name="room_id" value="${room_id}">
                    <input type="hidden" id="sender" name="sender" value="{{ Auth::user()->id }}">
                    <input type="hidden" id="receive" name="receive" value="${receive_id}">
                    <textarea name="message" id="message" id="" cols="30" rows="10" class="w-80 border mr-2"></textarea>
                    <button class=" ml-auto rounded btn btn-primary d-flex justify-content-center align-items-center" id="submit-form">
                        <i class="fas fa-paper-plane ml--2"></i>
                    </button>
                </div>
            `

            $('#form-send').html(html);
            }

            function loadMessage(room_id, receive_id) {
                // setInterval(function() {
                    $.ajax({
                        type: 'GET',
                        url: `/chat-json/${room_id}`,
                        dataType: 'json',
                        success: function(data) {
                            let authSender = {!! Auth::user()->id !!}
                            var html = '';
                            html +=
                                '<div class="overflow-auto" style="height: 60vh" id="container-message">'
                            $.each(data.data, function(index, item) {
                                if (item.sender_id === authSender) {
                                    html += `
                                        <div style="width: 200px"
                                            class="rounded ml-auto mt-3 mr-3 bg-primary text-white shadow border-1 p-2">
                                    ${item.message}</div>
                                        `
                                } else {
                                    html += `
                                        <div style="width: 200px" class="rounded ml-3 mt-3 bg-info text-white shadow border-1 p-2">
                                            ${item.message}</div>
                                        `
                                }
                            })
                            html += '</div>'
                            $('#container-chat').html(html);
                            var messageBody = document.querySelector('#container-message');
                            messageBody.scrollTop = messageBody.scrollHeight - messageBody
                                .clientHeight;
                        }
                    })
                // }, 1000)
            }
            $('#list-contact').on('click', '#click-chat', function() {
                var receive_id = $(this).data('receive');
                var room_id = $(this).data('id');

                loadMessage(room_id, receive_id);
                // var settime = setInterval(function(){
                //     loadMessage(room_id, receive_id)
                // },1000);
                // clearInterval(settime);
                showForm(room_id, receive_id);
            })

            $('#form-send').on('click', '#submit-form', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/chat/store',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "room_id": $('#room_id').val(),
                        "sender": $('#sender').val(),
                        "receive": $('#receive').val(),
                        "id_lahan" : $('#id_lahan').val(),
                        "message": $('#message').val(),
                    },
                    success: function() {
                        loadMessage($('#room_id').val(), $('#receive').val())
                        $('#message').val("")
                    },
                    error: function(error) {
                        console.log(error.responseText)
                    }

                })
            })
        // })

    </script>
@endsection
