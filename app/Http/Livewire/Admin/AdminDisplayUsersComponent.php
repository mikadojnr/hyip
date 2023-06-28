<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AdminDisplayUsersComponent extends Component
{
    use WithPagination;

    public $searchTerm;

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();
        session()->flash('message','User has been deleted succesfully!');
        $this->render();
    }

    public function makeAdmin($id) {
        $user = User::find($id);
        $user->utype = 'ADM';
        $user->save();
        session()->flash('message','User has been added as Admin successfully!');
        $this->render();
    }

    public function render()
    {

        if ($this->searchTerm) {

            $users = User::join('user_details', 'users.id', '=', 'user_details.user_id')
            ->where('users.name', 'LIKE', '%' . $this->searchTerm . '%')
            ->where('users.email', 'LIKE', '%' . $this->searchTerm . '%')
            ->where('utype', 'USR')
            ->orderBy('users.updated_at', 'desc')
            ->select('users.*')
            ->get();
        }
        else {
            $users = User::where('utype','USR')->paginate(20);
        }



        return view('livewire.admin.admin-display-users-component',[
            'users' => $users
        ])->layout('layouts.base');
    }
}
