<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Friend;
use App\Models\Like;
use App\Models\Post;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use Livewire\Component;

class Home extends Component
{
    public $paginate_no = 10;
    public $comment;

    public function saveComment($post_id){
        $this->validate([
            'comment'=> 'required|string'
        ]);
        DB::beginTransaction();
        try {
            Comment::firstOrCreate([
                "post_id"=> $post_id,
                "comment"=> $this->comment,
                "user_id"=> auth()->id()
            ]);
            $post = Post::findOrFail($post_id);
            $post->comments += 1;
            $post->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function like($id)
    {
        DB::beginTransaction();
        try {
            Like::firstOrCreate(["post_id"=>$id, "user_id"=>auth()->id()]);
            $post = Post::findOrFail($id);
            $post->likes += 1;
            $post->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function dislike($id)
    {
        DB::beginTransaction();
        try {
            $like = Like::where(["post_id"=>$id, "user_id"=>auth()->id()])->first();
            $like->delete();
            $post = Post::findOrFail($id);
            $post->likes -= 1;
            $post->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function acceptfriend($id){
        $user = User::where("id",$id)->first();


        DB::beginTransaction();
        try {
            $req = Friend::where([
                'user_id' => $id,
                "friend_id" => auth()->id(),
            ])->first();
            $req->status='accepted';
            $req->accepted_at=now();
            $req->save();
            Notification::create([
                "type" => "friend_accepted",
                "user_id" => $user->id,
                "message" => auth()->user()->name . " accepted your friend request",
                "url" => '#',
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function rejectfriend($id){
        $user = User::where("id",$id)->first();


        DB::beginTransaction();
        try {
            $req = Friend::where([
                'user_id' => $id,
                "friend_id" => auth()->id(),
            ])->first();
            $req->status='rejected';
            $req->save();
            Notification::create([
                "type" => "friend_rejected",
                "user_id" => $user->id,
                "message" => auth()->user()->name . " reject your friend request",
                "url" => '#',
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        $this->dispatchBrowserEvent('toastr:success', [
            'message' => " Friend request Rejected " ,
        ]);
    }
    public function render()
    {
        return view('livewire.home', [
            'posts'=>Post::with('user')->latest()->paginate($this->paginate_no),
            'friend_request' => Friend::where(["friend_id" => auth()->id(), "status" => "pending"])->with("user")->latest()->take(5)->get(),
        ]);
    }
}
