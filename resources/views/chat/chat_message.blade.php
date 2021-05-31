@extends("templatepembeli.index")
@section('content')
    <div class="container">
        <div class="card">
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
@endsection
@section('script')
    <script>
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
                
                return `sender=${vars['sender']}&receive=${vars['receive']}`;
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
                        var messageBody = document.querySelector('#container-chat');
                        messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
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
