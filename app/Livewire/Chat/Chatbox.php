<?php
namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;

class Chatbox extends Component
{
    protected $listeners = [
        'load-conversation-doctor' => 'loadConversationDoctor',
        'load-conversation-patient' => 'loadConversationPatient'
    ];

    public $selected_conversation;
    public $receiverUser;
    public $messages;
    public $auth_email;

    public function mount()
    {
        $this->auth_email = auth()->user()->email;
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
