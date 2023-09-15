<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class Todo extends Component
{
    public $users,$name,$email,$company,$user_id,$num=1;

    public function render()
    {
        $this->users=User::all();
        return view('livewire.todo');
    }

    public function store(){
        $id=$this->user_id;
        $validate=$this->validate([
            'name'=>'required',
            'email'=>'required',
            'company'=>'required'
        ]);

        User::updateOrCreate([
            'id'=>$id
        ],$validate);

        session()->flash('message', 'Successfully Saved');
    }
    public function edit($id){
        $user_edit=User::findorfail($id);
        $this->user_id=$id;
        $this->name=$user_edit->name;
        $this->email=$user_edit->email;
        $this->company=$user_edit->company;

    }
    public function resetInputFields(){
        $this->user_id='';
        $this->name = '';
        $this->email = '';
        $this->company='';
    }
    public function delete($id){
        User::destroy($id);
        session()->flash('message', 'User Deleted Successfully.');
    }
}
