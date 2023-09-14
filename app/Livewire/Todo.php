<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class Todo extends Component
{
    public $users,$name,$email,$password,$user_id,$num=1,$show_edit_modal=false;

    public function render()
    {
        $this->users=User::all();
        $this->num;
        return view('livewire.todo');
    }
    public function show_edit_modal(){
        $this->show_edit_modal=true;
    }
    public function store(){
        $validate=$this->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        User::create($validate);
        session()->flash('message', 'User Created Successfully.');
    }
    public function edit($id){
        $user_edit=User::findorfail($id);
        $this->user_id=$id;
        $this->name=$user_edit->name;
        $this->email=$user_edit->email;
    }
    public function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password='';
    }
    public function delete($id){
        User::destroy($id);
        session()->flash('message', 'User Deleted Successfully.');
    }
}
