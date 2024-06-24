<div>
    <div class="main-chat-list" id="ChatList">
            @foreach($conversations as $conversation)
            <div wire:click="chatUserSelected({{$conversation}},{{ Auth::guard('patient')->check() ? $this->getDoctorName($conversation, 'id') : $this->getPatientName($conversation, 'id')}})" class="media new">
                <div class="media-body">
                    <div class="media-contact-name">
                        @if (Auth::guard('patient')->check())
                            <span>{{ $this->getDoctorName($conversation, 'name') }}</span>
                        @else
                            <span>{{ $this->getPatientName($conversation, 'name') }}</span>
                        @endif
                        <span>{{$conversation->messages->last()->created_at->shortAbsoluteDiffForHumans()}}</span>
                    </div>
                    <p>{{$conversation->messages->last()->body}}</p>
                </div>
            </div>
            @endforeach
    </div><!-- main-chat-list -->
</div>
