<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\Group;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Message extends Component
{
    public $group;
    public $user;
    public $groups = NULL;

    public $pesan;

    public function mount()
    {
        $this->group = Group::get();
        $this->user = Auth::user();
    }
    public function render()
    {
        $chat = Null;
        if($this->groups != Null){
            $chat = Chat::with(['user'])->where(['group_id' => $this->groups->id])->latest()->get();
        }
        return view('livewire.message', compact('chat'));
    }
    public function selectGroup($id)
    {
        $this->groups = Group::find($id);
    }

    public function kirim()
    {
        $this->validate([
            'pesan' => 'required'
        ]);

        Chat::create([
            'group_id' => $this->groups->id,
            'user_id' => $this->user->id,
            'pesan' => $this->pesan
        ]);

        $this->pesan = null;

    }
}
