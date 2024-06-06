<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use Livewire\Component;

class SendMessage extends Component
{

    public $body;
    public $selected_conversation;
    public $receiverUser;
    public $auth_email;
    protected $listeners = ['updateMessage'];

    public function mount()
    {
        $this->auth_email = auth()->user()->email;
    }


    public function updateMessage($payload){
        $this->selected_conversation = Conversation::find($payload['conversationId']);
        $this->receiverUser = Doctor::find($payload['receiverUserId']);
    }


    public function sendMessage()
    {

        if($this->body == null){

            return null;
        }

        $createdMessage = Message::create([
            'conversation_id' => $this->selected_conversation->id,
            'sender_email' => $this->auth_email,
            'receiver_email' => $this->receiverUser->email,
            'body' => $this->body,
        ]);
        
        $this->selected_conversation->last_time_message = $createdMessage->created_at;
        $this->selected_conversation->save();
        $this->reset('body');

        $payload=['messageId' => $createdMessage->id];

        $this->dispatch('pushMessage', $payload)->to('chat.chatbox');
        $this->dispatch('refresh')->to('chat.chatlist');


    }
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
