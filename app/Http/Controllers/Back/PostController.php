<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\PostRepo;


class PostController extends Controller
{

    private $postRepo;

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(PostRepo $postRepo)
    {
        $this->postRepo = $postRepo;
    }



    /**
     * Show all posts view blog
     * 
     * @return view
     */
    public function viewAllPosts()
    {
        $posts = $this->postRepo->showPosts();
        return view('front.posts', compact('posts'));
    }

    /**
     * View full post content
     * 
     * @return view
     */
    public function viewFullPost($slug)
    {
        $post = $this->postRepo->viewPostSlug($slug);
        return view('front.post', compact('post'));
    }

    /**
     * View post create
     * 
     * @return view
     */
    public function viewCreatePost()
    {
        return view('back.posts.create');
    }

    public function saveCreatePost(Request $request)
    {

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'tags' => json_decode($request->tags),
            'status' => $request->status,
            'file' => $request->file('image'),
            'category_id' => 1,
            'user_id' => 1
        ];
        //dd($data);

        $post = $this->postRepo->createPost($data);
       

     /*   if ($request->file('image')) {
            $path = Storage::disk('public')->put('image', $request->file('image'));
            $post->fill(['file' => asset($path)])->save();
        }*/
        $input = [];

        $image = $request->file('image');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();


        $destinationPath = public_path('/uploads/thumbnail');
        $img = \Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['imagename']);


        $destinationPath = public_path('/uploads/images');
        $image->move($destinationPath, $input['imagename']);


        return redirect()->back();
    }
}
