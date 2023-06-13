<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateGroup extends Component
{
    use WithFileUploads;
    public $name;
    public $location;
    public $type;
    public $icon;
    public $thumbnail;
    public $description;


    public function creategroup()
    {
        $this->validate([
            "name" => "required|string",
            "location" => "required|string",
            "type" => "required|string",
            "icon" => "required|image",
            "thumbnail" => "required|image",
            "description" => "required|string",
        ]);

        DB::beginTransaction();
        try {
            $page = Group::create([
                "uuid " => Str::uuid(),
                "user_id" => auth()->id(),
                "icon" => $this->icon->store("groups", "public"),
                "thumbnail" => $this->thumbnail->store("groups", "public"),
                "description" => $this->description,
                "name" => $this->name,
                "location" => $this->location,
                "type" => $this->type
            ]);
            GroupMember::create([
                "user_id" => auth()->id(),
                "group_id" => $page->id
            ]);

            Notification::create([
                "type" => "create_page",
                "user_id" => auth()->id(),
                "message" => $page->name . " group his been created successfully.",
                "url" => route("groups", $page->uuid),
            ]);

            $this->dispatchBrowserEvent('toastr::success', [
               "message" =>  $page->name . " group  his been created successfully."
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        return redirect('/groups '. '/', $page->uuid);
    }
    public function render()
    {
        return view('livewire.create-group');
    }
}
