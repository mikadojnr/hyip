<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminDisplayAdminsComponent extends Component
{
    use WithPagination;

    public $searchTerm;

    public function deleteAdmin($id) {
        $admin = User::find($id);
        $admin->delete();
        session()->flash('message','Admin has been deleted succesfully!');
        $this->render();
    }

    public function makeUser($id) {
        $admin = User::find($id);
        $admin->utype = 'USR';
        $admin->save();
        session()->flash('message','Admin has been added as User successfully!');
        $this->render();
    }

    public function render()
    {
        if ($this->searchTerm) {

            $admins = User::join('user_details', 'users.id', '=', 'user_details.user_id')
            ->where('users.name', 'LIKE', '%' . $this->searchTerm . '%')
            ->where('users.email', 'LIKE', '%' . $this->searchTerm . '%')
            ->where('users.utype', 'ADM')
            ->where('users.id', '!=', Auth::user()->id)
            ->orderBy('users.updated_at', 'desc')
            ->select('users.*')
            ->get();
        }
        else {
            $admins = User::where('utype','ADM')->where('id', '!=', Auth::user()->id)
            ->orderBy('created_at', 'desc')->paginate(20);
        }

        return view('livewire.admin.admin-display-admins-component',[
            'admins' => $admins
        ])->layout('layouts.base');
    }
}
