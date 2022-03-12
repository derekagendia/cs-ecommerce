<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public string $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {

        return view('livewire.user-table',
            [
                'users' => User::where('name','like',"%{$this->search}%")
                    ->orWhere('email','like',"%{$this->search}%")->paginate(5)
            ]
        );
    }

    // function to active or disable user
    public function activeOrDisable(int $id)
    {
        $user = User::find($id);

        if($user->status)
        {
            $user->status = false;
            $user->save();
        }else
        {
            $user->status = true;
            $user->save();
        }
    }

    public function deleteCustomer(int $id)
    {
        User::find($id)->delete();

        $this->resetPage();

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'User successfully deleted.']);
    }

    public function updating($name,$value)
    {
        if($name === 'search')
        {
            $this->resetPage();
        }
    }

    // pagination customise
    public function paginationView()
    {
        return 'livewire.pagination';
    }
}
