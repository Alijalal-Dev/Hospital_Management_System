<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use App\Events\MessageSent;
use App\Models\Patient;
use App\Events\MessageSent2;
class SendMessage extends Component
{

    public $body;
    public $selected_conversation;
    public $receiverUser;
    public $auth_email;
    public $sender;
    public $createdMessage;
    protected $listeners = ['updateMessage','dispatchSentMassage','updateMessage2'];

    public function mount()
    {
        if (Auth::guard('patient')->check()) {
            $this->auth_email = Auth::guard('patient')->user()->email;
            $this->sender = Auth::guard('patient')->user();
        } else {
            $this->auth_email = Auth::guard('doctor')->user()->email;
            $this->sender = Auth::guard('doctor')->user();
        }
    }


    public function updateMessage($payload){
        $this->selected_conversation = Conversation::find($payload['conversationId']);
        $this->receiverUser = Doctor::find($payload['receiverUserId']);
    }


    public function updateMessage2($payload)
    {
        $this->selected_conversation = Conversation::find($payload['conversationId']);
        $this->receiverUser = Patient::find($payload['receiverUserId']);
    }


    public function sendMessage()
    {

        if($this->body == null){

            return null;
        }

        $this->createdMessage = Message::create([
            'conversation_id' => $this->selected_conversation->id,
            'sender_email' => $this->auth_email,
            'receiver_email' => $this->receiverUser->email,
            'body' => $this->body,
        ]);

        $this->selected_conversation->last_time_message = $this->createdMessage->created_at;
        $this->selected_conversation->save();
        $this->reset('body');

        $payload=['messageId' => $this->createdMessage->id];

        $this->dispatch('pushMessage', $payload)->to('chat.chatbox');
        $this->dispatch('refresh')->to('chat.chatlist');
        $this->dispatch('dispatchSentMassage');

    }

    public function dispatchSentMassage()
    {
        if (Auth::guard('patient')->check()) {
            broadcast(new MessageSent(
                $this->sender,
                $this->createdMessage,
                $this->selected_conversation,
                $this->receiverUser
            ));
        }
        else{
            broadcast(new MessageSent2(
                $this->sender,
                $this->createdMessage,
                $this->selected_conversation,
                $this->receiverUser
            ));
        }
    }
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
