<div>
    @if($selected_conversation)
    <div class="main-content-body main-content-body-chat">
        <div class="main-chat-header">
            <div class="main-img-user"><img alt="" src="{{URL::asset('Dashboard/img/faces/logo_user.png')}}"></div>
            <div class="main-chat-msg-name">
                <h6>{{$receiverUser->name}}</h6>
            </div>
            <nav class="nav">
            </nav>
        </div><!-- main-chat-header -->
        <div class="main-chat-body" id="ChatBody" style="overflow-y: auto; max-height: 400px;">
            <div class="content-inner">
                @foreach($messages as $message)
                <div class="media {{$auth_email == $message->sender_email ?'':'flex-row-reverse'}}">
                    <div class="media-body">
                        <div class="main-msg-wrapper right">
                            {{$message->body}}
                        </div>
                        <div>
                            <span>9:48 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var chatBody = document.getElementById("ChatBody");
        chatBody.scrollTop = chatBody.scrollHeight;
    });
</script>
