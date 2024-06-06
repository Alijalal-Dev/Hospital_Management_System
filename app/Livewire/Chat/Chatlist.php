<?php
namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Chatlist extends Component
{
    public $conversations;
    public $auth_email;
    public $receiverUser;
    public $selected_conversation;

    public function mount()
    {
        $this->auth_email = auth()->user()->email;
    }

    public function getUsers(Conversation $conversation, $request)
    {
        if ($conversation->sender_email == $this->auth_email) {
            $this->receiverUser = Doctor::firstWhere('email', $conversation->receiver_email);
        } else {
            $this->receiverUser = Patient::firstWhere('email', $conversation->sender_email);
        }

        if (isset($request)) {
            return $this->receiverUser->$request;
        }
    }

    public function chatUserSelected(Conversation $conversation, $receiver_id)
    {
        $this->selected_conversation = $conversation;
        $this->receiverUser = Doctor::find($receiver_id);

        $payload = [
            'conversationId' => $this->selected_conversation->id,
            'receiverUserId' => $this->receiverUser->id
        ];

        if (Auth::guard('patient')->check()) {
            $this->dispatch('load-conversation-doctor', $payload)->to('chat.chatbox');
        } else {
            $this->dispatch('load-conversation-patient', $payload)->to('chat.chatbox');
        }
        $this->dispatch('updateMessage',$payload)->to('chat.send-message');

    }

    public function render()
    {
        $this->conversations = Conversation::where('sender_email', $this->auth_email)
            ->orWhere('receiver_email', $this->auth_email)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('livewire.chat.chatlist');
    }
}
