<?php

namespace App\Http\Livewire\Setting;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccountInfomation extends Component
{
    use WithFileUploads;
    public $name;
    // public $email;
    public $country;
    public $address;
    public $thumbnial;
    public $profile;
    public $description;

    public function mount()
    {
        $this->name = auth()->user()->name;
        // $this->email = auth()->user()->email;
        $this->address = auth()->user()->address;
        $this->country = auth()->user()->location;
        $this->description = auth()->user()->description;
    }
    public function updateProfile()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'thumbnial' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'profile' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'description' => [ 'string', 'max:255'],
        ]);
        $user = User::find(auth()->id());
        $user->name = $this->name;
        $user->address = $this->address;
        $user->location = $this->country;
        $user->profile = $this->profile->store("profiles","public");
        $user->thumbnial = $this->thumbnial->store("profiles","public");
        $user->description = $this->description;
        $user->save();
        $this->dispatchBrowserEvent('toastr:success', [
            'message' => " Account Information update  Successfully " ,
        ]);
        return redirect()->route("setting.account_information");

    }

    public function render()
    {
        return view('livewire.setting.account-infomation');
    }
}
