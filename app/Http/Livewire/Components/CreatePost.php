<?php

namespace App\Http\Livewire\Components;

use App\Models\Post;
use App\Models\PostMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreatePost extends Component
{
    use WithFileUploads;


    public $message;
    public $content;
    public $images;
    public $video;
    public function render()
    {
        return view('livewire.components.create-post');
    }

    public function createpost()
    {
        $this->validate([
            'content' => "required|string"

        ]);

        DB::beginTransaction();
        try {
            // creating post

            $post = Post::create([
                "uuid" => Str::uuid(),
                "user_id" => auth()->id(),
                "content" => $this->content,
            ]);

            // if post his media

            // if post photo
            $images = "";
            if ($this->images) {
                foreach ($this->images as $image) {
                    $images = $image->store("posts/images", "public");
                }
                PostMedia::create([
                    "post_id" => $post->id,
                    "file_type" => "image",
                    "file" => $images,
                    "position" => "general",
                ]);
            }

            //  if post video media

            $video_file_name = "";
            if ($this->video) {
                $video_file_name = $this->video->store("posts/video", "public");
                PostMedia::create([
                    "post_id" => $post->id,
                    "file_type" => 'video',
                    "file" => $video_file_name,
                    "position" => "general",
                ]);

            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        $this->reset('content');
        $this->reset('images');
        $this->reset('video');


        $this->dispatchBrowserEvent('toastr:success', [
            'message' => "Your Post have been Published",
        ]);
        return redirect('/');

    }


}
