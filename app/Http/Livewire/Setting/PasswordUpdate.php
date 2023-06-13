<?php

namespace App\Http\Livewire\Setting;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules;

class PasswordUpdate extends Component
{

    public $existing_password;
    public $password;
    public $password_confirmation;

    public function save()
    {
        $this->validate(
            [
                "existing_password" => "required",
                'password' => [
                    'required',
                    'confirmed', Rules\Password::defaults()
                ],
            ]
        );

        $user = User::findOrFail(auth()->id());
        if (Hash::check($this->existing_password, $user->password)) {
            DB::beginTransaction();
            try {
                $user->password = Hash::make($this->password);
                $user->save();
                Notification::create([
                    "type" => "password_update",
                    "user_id" => auth()->id(),
                    "url" => "#",
                    "message" => "Your Password his been updated"
                ]);

                $this->dispatchBrowserEvent('toastr:success', [
                    'message' => " Your Password his been updated.. " ,
                ]);
                // reset($this->existing_password);
                // reset($this->password);
                // reset($this->password_confirmation);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }
        } else {
            return $this->dispatchBrowserEvent('toastr:success', [
                'message' => " Incorrect existing Password .. " ,
            ]);
        }
    }
    public function render()
    {
        return view('livewire.setting.password-update');
    }
}
