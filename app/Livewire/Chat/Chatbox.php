<?php
namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class Chatbox extends Component
{
    /* protected $listeners = [
        'load-conversation-doctor' => 'loadConversationDoctor',
        'load-conversation-patient' => 'loadConversationPatient',
        'pushMessage',
        'broadcastMessage'
    ]; */

    public $selected_conversation;
    public $receiverUser;
    public $messages;
    public $auth_email;
    public $auth_id;
    public $event_name;
    public $chat_page;
    public $receiver;
    public function mount()
    {
        if (Auth::guard('patient')->check()) {
            $this->auth_email = Auth::guard('patient')->user()->email;
            $this->auth_id = Auth::guard('patient')->user()->id;
        } else {
            $this->auth_email = Auth::guard('doctor')->user()->email;
            $this->auth_id = Auth::guard('doctor')->user()->id;
        }

    }

    public function getListeners()
    {
        if (Auth::guard('patient')->check()) {
            $auth_id = Auth::guard('patient')->user()->id;
            $this->event_name = "MessageSent2";
            $this->chat_page = "chat2";

        } else {
            $auth_id = Auth::guard('doctor')->user()->id;
            $this->event_name = "MessageSent";
            $this->chat_page = "chat";
        }

        return [
            "echo-private:$this->chat_page.{$auth_id},$this->event_name" => 'broadcastMessage', 'loadConversationPatient', 'loadConversationDoctor', 'pushMessage'
        ];
    }

    public function broadcastMessage($event)
    {
        $broadcastMessage = Message::find($event['message']);
        $broadcastMessage->read = 1;
        $payload=['messageId' => $broadcastMessage->id];
        $this->pushMessage($payload);
    }

    public function pushMessage($payload){
        $newMessage = Message::find($payload['messageId']);
        $this->messages->push($newMessage);

    }

    public function loadConversationDoctor($payload)
    {
        $this->selected_conversation = Conversation::find($payload['conversationId']);
        $this->receiverUser = Doctor::find($payload['receiverUserId']);
        $this->messages = Message::where('conversation_id', $this->selected_conversation->id)->get();
    }

    public function loadConversationPatient($payload)
    {
        $this->selected_conversation = Conversation::find($payload['conversationId']);
        $this->receiverUser = Patient::find($payload['receiverUserId']);
        $this->messages = Message::where('conversation_id', $this->selected_conversation->id)->get();
    }

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
