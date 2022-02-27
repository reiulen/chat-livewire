<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $user;
    public $userid;

    public $nama;

    public function mount()
    {
        $this->userid = Auth::user();
        $this->user = User::where('id', '!=' , $this->userid->id)->latest()->get();
    }

    public function render()
    {
        return view('livewire.home');
    }

    public function mulai()
    {
        $this->validate([
            'nama' => 'required'
        ]);

        $gr = Group::where('nama', $this->nama)->first();

        if($gr){
            $grid = $gr->group_id;
        }else{
            $grid = Group::max('id') + 1;
        }

        Group::create([
            'group_id' => $grid,
            'nama' =>  $this->userid->id,
            'user_id' => $this->nama,
        ]);

        $this->nama = null;
        return redirect(route('chat'));
    }
}
