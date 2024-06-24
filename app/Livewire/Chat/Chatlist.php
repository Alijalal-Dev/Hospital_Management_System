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
    protected $listeners = ['chatUserSelected','refresh'=>'$refresh'];

    public function mount()
    {
        $this->auth_email = auth()->user()->email;
    }

    public function getPatientName($conversation, $request)
    {
        return Patient::Where('email', $conversation->sender_email)->orWhere('email', $conversation->receiver_email)->first()->$request;
    }
    public function getDoctorName($conversation, $request)
    {
        return Doctor::Where('email', $conversation->sender_email)->orWhere('email', $conversation->receiver_email)->first()->$request;
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
            $this->dispatch('loadConversationDoctor', $payload)->to('chat.chatbox');
            $this->dispatch('updateMessage', $payload)->to('chat.send-message');
        } else {
            $this->dispatch('loadConversationPatient', $payload)->to('chat.chatbox');
            $this->dispatch('updateMessage2', $payload)->to('chat.send-message');
        }


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
