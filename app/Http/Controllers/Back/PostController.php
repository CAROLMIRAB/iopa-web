<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\PostRepo;
use App\BackPage\Collections\PostCollection;
use Yajra\Datatables\Datatables;
use App\Core\Core;
use Validator;

class PostController extends Controller
{

    private $postRepo;

    private $postCollection;
    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(PostRepo $postRepo, PostCollection $postCollection)
    {
        $this->postRepo = $postRepo;
        $this->postCollection = $postCollection;
    }

    /**
     * Show all posts blog
     * 
     * @return $post
     */
    public function allPosts()
    {
        $posts = $this->postRepo->showPosts();
        $post = $this->postCollection->allPostCollect($posts);
        $data = [
            'title' => __('Publicación fallida'),
            'message' => __('No se pudo obtener los post'),
            'data' => $post
        ];

        return Datatables::of($post)->make(true);

    }

    /**
     * Show all posts view blog
     * 
     * @return view
     */
    public function viewAllPosts()
    {
        return view('back.posts.posts');
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
        $categories = $this->postRepo->allCategories();
        return view('back.posts.create', compact('categories'));
    }

    /**
     * View post edit
     * 
     * @param string $slug
     * @return view
     */
    public function viewEditPost(Request $request)
    {
        $postdata = $this->postRepo->viewPostSlug($request->slug);
        $categories = $this->postRepo->allCategories();
        $post = $this->postCollection->editData($postdata);
   
        return view('back.posts.edit', compact('post', 'categories'));
    }

    /**
     * Stored post
     * 
     * @param Request $request
     * @return view
     */
    public function saveCreatePost(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'name' => 'required',
                'slug' => 'required',
                'excerpt' => 'required',
                'body' => 'required',
            ], [
                'category_id' => 'required',
                'name.required' => __('El título es requerido'),
                'excerpt.required' => __('Debe escribir un extracto'),
                'body.required' => __('Debe escribir algo en el blog'),
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => '¡Error!',
                    'message' => "Te falta algún campo",
                    'data' => $validator->errors()
                ]);
            }

            $image_url = "";
            $tags = explode(",", $request->tags);

            if ($request->file('image')) {
                $image_url = Core::uploadImage($request->file('image'));
            }

            $data = array(
                'user_id' => 2,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => $request->slug,
                'excerpt' => $request->excerpt,
                'body' => $request->body,
                'status' => $request->status,
                'file' => $image_url,
                'tags' => json_encode($tags)
            );

            if (!empty($image_url)) {
                $post = $this->postRepo->createPost($data);
                return response()->json([
                    'status' => 200,
                    'title' => '¡Exitoso!',
                    'message' => "Ha creado la noticia de forma correcta"
                ]);
            }

        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba su post. Por favor intente nuevamente'),
            ];

            return $ex;
        }
    }

    /**
     * Edit post
     * 
     * @param Request $request
     * @return mixed
     */
    public function editPost(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'name' => 'required',
                'slug' => 'required',
                'excerpt' => 'required',
                'body' => 'required',
            ], [
                'category_id' => 'required',
                'name.required' => __('El título es requerido'),
                'excerpt.required' => __('Debe escribir un extracto'),
                'body.required' => __('Debe escribir algo en el blog'),
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => '¡Error!',
                    'message' => "Te falta algún campo",
                    'data' => $validator->errors()
                ]);
            }

            $image_url = "";
            $tags = explode(",", $request->tags);

            if ($request->file('image')) {
                $image_url = Core::uploadImage($request->file('image'));
            }

            if (!empty($image_url)) {
                $data = array(
                    'category_id' => $request->category_id,
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'excerpt' => $request->excerpt,
                    'body' => $request->body,
                    'status' => $request->status,
                    'file' => $image_url,
                    'tags' => json_encode($tags, JSON_UNESCAPED_UNICODE)
                );

            } else {
                $data = array(
                    'category_id' => $request->category_id,
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'excerpt' => $request->excerpt,
                    'body' => $request->body,
                    'status' => $request->status,
                    'tags' => json_encode($tags, JSON_UNESCAPED_UNICODE)
                );
            }

            if ($data) {
                $post = $this->postRepo->editPostById($request->id_post, $data);
                return response()->json([
                    'status' => 200,
                    'title' => '¡Exitoso!',
                    'message' => "Ha modificado la noticia de forma correcta"
                ]);
            }
        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba su post. Por favor intente nuevamente'),
            ];

            return $ex;
        }
    }

}
