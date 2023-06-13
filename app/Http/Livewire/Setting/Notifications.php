<?php

namespace App\Http\Livewire\Setting;

use App\Models\Notification;
use Livewire\Component;

class Notifications extends Component
{
    public $paginate_no = 9;

    public $listeners = [
        "load-more" => 'LoadMore'
    ];

    public function LoadMore()
    {
        $this->paginate_no = $this->paginate_no + 3;
    }

    public function readall()
    {
        $data=Notification::where(["user_id"=> auth()->id(),"read_at"=>Null])->get();
        foreach ($data as $item) {
            $item->read_at=now();
            $item->save();
        }

        $this->dispatchBrowserEvent('toastr:success', [
            'message' => "All Notifications marked as read.." ,
        ]);
    }

    public function clear()
    {
        Notification::where(["user_id"=> auth()->id()])->delete();
        $this->dispatchBrowserEvent('alert', [
            "type" => "success", "message" =>  "Notifications cleared successfullys.."
        ]);
        $this->dispatchBrowserEvent('toastr:success', [
            'message' => " Notifications cleared  successfully" ,
        ]);

    }
    public function render()
    {
        return view('livewire.setting.notifications',[
            "notification" => Notification::where('user_id', auth()->id())->latest()->paginate()
        ]);
    }
}
