<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index')->with("tags", Tag::all())->with("posts", Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create')->with("tags", Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);
        if ($request->hasFile("thumbnail")) {
            $image = $request->file("thumbnail");
            $name = str::slug($request->input('title')) . '_' . time();
            $folder = 'uploads/thumbnail';
            $filePath = $folder . '/' . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $imageSize = getimagesize(storage_path('app/public/' . $filePath));
            $imageCompress = Image::make(storage_path('app/public/' . $filePath))->fit(round($imageSize[0] / 2.6), round($imageSize[1] / 2.6));;
            $imageCompress->save();
            $thumb = "storage/" . $filePath;
        }elseif ($request->has('thumbnailLink')){
            $thumb = $request->thumbnailLink;
        }else {
            $thumb = "";
        }
        $docName = str::slug($request->input('title')) . '_' . time();
        $blogSize = 5;
        $object = [];
        $object["thumbnail"] = $thumb;
        for ($x = 1; $x <= $blogSize; $x++) {
            $prodTitle = "titleProd_" . $x;
            $prodLink = "affLink_" . $x;
            $prodImage = "product_" . $x;
            $prodImageLink = "productLink_" . $x;
            $prodBody = "bodyProd_" . $x;
            if ($request->hasFile($prodImage)) {
                $image = $request->file($prodImage);
                $name = str::slug($request->input("titleProd_" . $x)) . '_' . time();
                $folder = 'uploads/posts/' . $docName;
                $filePath = $folder . '/' . $name . '.' . $image->getClientOriginalExtension();
                $this->uploadOne($image, $folder, 'public', $name);
                $imageSize = getimagesize(storage_path('app/public/' . $filePath));
                $imageCompress = Image::make(storage_path('app/public/' . $filePath))->fit(round($imageSize[0] / 1.2), round($imageSize[1] / 1.2));;
                $imageCompress->save();
                $prodProccedLink = "storage/" . $filePath;
            }elseif ($request->has($prodImageLink)) {
                $prodProccedLink = $request->$prodImageLink;
            }else {
                $prodProccedLink = "";
            }
            $product = "product_" . $x;
            $object[$product] = [
                "titleProd_" => $request->$prodTitle,
                "productImage" => $prodProccedLink,
                "productLink" => $request->$prodLink,
                "productBody" => $request->$prodBody
            ];
        }
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->props = json_encode($object);
        $post->user_id = Auth::user()->id;
        $post->save();

        $post->tags()->sync($request->tags, false);
        return redirect("/admin/post");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.post.edit")->with("post", $post)->with("tags", Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::user()->Role->name === "admin"){
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
            $post->tags()->sync($request->tags);
            return redirect("/admin/post");
        }
        return redirect("/admin");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
