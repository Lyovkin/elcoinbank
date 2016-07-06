@extends('layouts.app')

@section('title')
    Чат
@endsection

@section('content')
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>

    <style type="text/css">
        #messages{
            border: 1px solid black;
            height: 300px;
            margin-bottom: 8px;
            overflow: scroll;
            padding: 5px;
        }
    </style>

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default" style="margin-top: 150px;">
                    <div class="panel-heading">ElCoinBank Messenger</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-8" >
                                <div id="messages" >
                                    @foreach($messages as $message)
                                        <strong>{{ $message->user->name }}</strong>
                                    @if(Auth::user()->hasRole('admin'))
                                            <form id="del" action="deletemessage" method="POST">
                                                <input type="hidden" name="id" value="{{ $message->id}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                                <input id="del_msg" style="float: right;
                                                color: #0a0c0e; background-color: #fff; border: none;
                                                margin-left: 5px;" type="submit" value="&cross;">
                                            </form>
                                    @endif
                                        <span id="time" style="float: right">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $message->createdAt }}
                                        </span>
                                        <p>{{ $message->message }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-8" >
                                <form action="sendmessage" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="user" value="{{ Auth::user()->name }}" >
                                    <textarea class="form-control msg"></textarea>
                                    <br/>
                                    <input type="button" value="Отправить" class="btn btn-success send-msg">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var socket = io.connect('{{ env('URL') }}:8890');
       //var socket = io.connect('http://localhost:8890')
        socket.on('message', function (data) {
            data = jQuery.parseJSON(data);
            //console.log(data.user);
            $( "#messages" ).append( "<strong>"+data.user+":</strong><p>"+data.message+"</p>" );
        });

       function sendMessage() {
           var token = $("input[name='_token']").val();
           var id = $("input[name='user_id']").val();
           var user = $("input[name='user']").val();
           var msg = $(".msg").val();
           if(msg != ''){
               $.ajax({
                   type: "POST",
                   url: '{!! URL::to("sendmessage") !!}',
                   dataType: "json",
                   data: {'_token':token,'message':msg,'user':user, 'id': id},
                   success:function(data){
                       console.log(data);
                       $(".msg").val('');
                   }
               });
           }else{
               alert("Пожалуйста, введите сообщение!");
           }
       }

        $("#del_msg").click(function(e) {
            e.preventDefault();
            var id = $("input[name='id']").val();
            $.ajax({
                type: "POST",
                url: '{!! URL::to("deletemessage") !!}',
                data: {'_token':token, 'id': id}
            })
        });

        $(".send-msg").click(function(e){
            e.preventDefault();
            sendMessage();
        });

       $('html').keydown(function(e){
           if (event.keyCode == 13) {
               e.preventDefault();
               sendMessage();
           }
       });
    </script>
@endsection