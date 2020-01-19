<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Products;
use App\Shortlinks;
use App\Tag;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use mysql_xdevapi\Exception;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }
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
    public function getNextId()
    {

        $statement = DB::select("show table status like 'products'");

        return $statement[0]->Auto_increment;
    }
    public function store(Request $request)
    {
        $request->validate([

        ]);
        // Thumbnail
        if ($request->hasFile("thumbnail")) {
            $image = $request->file("thumbnail");
            $name = str::slug($request->input('title')) . '_' . time();
            $folder = 'uploads/thumbnail';
            $filePath = $folder . '/' . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $imageSize = getimagesize(storage_path('app/public/' . $filePath));
            $imageCompress = Image::make(storage_path('app/public/' . $filePath))->fit(round($imageSize[0] / 2.6), round($imageSize[1] / 2.6));;
            $imageCompress->save();
            $thumb = "/storage/" . $filePath;
        }elseif ($request->has('thumbnailLink')){
            $thumb = $request->thumbnailLink;
        }else {
            $thumb = "";
        }
        $enabled = 0;
        if($request->enabled){
            $enabled = 1;
        }
        // Creating the post
        $post = new Post();
        $post->enabled = $enabled;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->thumbnail = $thumb;
        $post->user_id = Auth::user()->id;
        $post->save();

        $post->tags()->sync($request->tags, false);
        // Product info
        $docName = str::slug($request->input('title')) . '_' . time();
        $blogSize = (int)$request->prodCount;
        $object = [];
        $object["thumbnail"] = $thumb;
        for ($x = 1; $x <= $blogSize; $x++) {
            $prodTitle = "titleProd_" . $x;
            $prodLink = "affLink_" . $x;
            $prodImage = "product_" . $x;
            $prodImageLink = "productLink_" . $x;
            $prodBody = "bodyProd_" . $x;
            if (!$request->$prodTitle == "") {
                $customLink = $this->customLink($request->$prodLink, $post, $x, $request);
                if ($request->hasFile($prodImage)) {
                    $image = $request->file($prodImage);
                    $name = str::slug($request->input("titleProd_" . $x)) . '_' . time();
                    $folder = 'uploads/posts/' . $docName;
                    $filePath = $folder . '/' . $name . '.' . $image->getClientOriginalExtension();
                    $this->uploadOne($image, $folder, 'public', $name);
                    $imageSize = getimagesize(storage_path('app/public/' . $filePath));
                    $imageCompress = Image::make(storage_path('app/public/' . $filePath))->fit(round($imageSize[0] / 1.2), round($imageSize[1] / 1.2));;
                    $imageCompress->save();
                    $prodProccedLink = "/storage/" . $filePath;
                } elseif ($request->has($prodImageLink)) {
                    $prodProccedLink = $request->$prodImageLink;
                } else {
                    $prodProccedLink = "";
                }


                $newProduct = new Products();
                $newProduct->title = $request->$prodTitle;
                $newProduct->image = $prodProccedLink;
                $newProduct->link = $customLink->idlink;
                $newProduct->prod_id = $x;
                $newProduct->body = $request->$prodBody;
                $newProduct->post_id = $post->id;
                $newProduct->save();
            }
        }
        return redirect("/admin/post");
    }
    private function customLink($link, $post, $x, $request)
    {
        $newLink = new Shortlinks();
        $newLink->idlink = "/link/" . str::slug($request->input("titleProd_" . $x)) . '_' . time() . "/" . $post->id;
        $newLink->link = $link;
        $newLink->post_id = $post->id;
        $newLink->products_id = $this->getNextId();
        $newLink->save();

        return $newLink;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $tag, $title, $id)
    {
        return view("blogLayout.layout5")->with('post', Post::find($id));
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
        $getAdmin = Auth::user()->Role->where("name", "admin")->all();
        $getSuperUser = Auth::user()->Role->where("name", "superuser")->all();
        if (count($getAdmin) > 0 || count($getSuperUser) > 0) {
            if ($request->hasFile("thumbnail")) {
                $image = $request->file("thumbnail");
                $name = str::slug($request->input('title')) . '_' . time();
                $folder = 'uploads/thumbnail';
                $filePath = $folder . '/' . $name . '.' . $image->getClientOriginalExtension();
                $this->uploadOne($image, $folder, 'public', $name);
                $imageSize = getimagesize(storage_path('app/public/' . $filePath));
                $imageCompress = Image::make(storage_path('app/public/' . $filePath))->fit(round($imageSize[0] / 2.6), round($imageSize[1] / 2.6));;
                $imageCompress->save();
                $thumb = "/storage/" . $filePath;
            }elseif ($request->has('thumbnailLink')){
                $thumb = $request->thumbnailLink;
            }else {
                $thumb = "";
            }
            $enabled = 0;
            if($request->enabled){
                $enabled = 1;
            }
            $post->title = $request->title;
            $post->enabled = $enabled;
            $post->body = $request->body;
            $post->thumbnail = $thumb;
            $post->save();
            $post->tags()->sync($request->tags);

            $docName = str::slug($request->input('title')) . '_' . time();
            $blogSize = (int)$request->prodCount;
            $object = [];
            $object["thumbnail"] = $thumb;
            for ($x = 1; $x <= $blogSize; $x++) {
                $prodTitle = "titleProd_" . $x;
                $prodLink = "affLink_" . $x;
                $prodImage = "product_" . $x;
                $prodImageLink = "productLink_" . $x;
                $prodBody = "bodyProd_" . $x;
                if (!$request->$prodTitle == ""){
                    $customLink = $this->editcustomLink($request->$prodLink, $post, $x, $request);
                    if ($request->hasFile($prodImage)) {
                        $image = $request->file($prodImage);
                        $name = str::slug($request->input("titleProd_" . $x)) . '_' . time();
                        $folder = 'uploads/posts/' . $docName;
                        $filePath = $folder . '/' . $name . '.' . $image->getClientOriginalExtension();
                        $this->uploadOne($image, $folder, 'public', $name);
                        $imageSize = getimagesize(storage_path('app/public/' . $filePath));
                        $imageCompress = Image::make(storage_path('app/public/' . $filePath))->fit(round($imageSize[0] / 1.2), round($imageSize[1] / 1.2));;
                        $imageCompress->save();
                        $prodProccedLink = "/storage/" . $filePath;
                    } elseif ($request->has($prodImageLink)) {
                        $prodProccedLink = $request->$prodImageLink;
                    } else {
                        $prodProccedLink = "";
                    }

                    $editProduct = $post->product->find($x);
                    $editProduct->title = $request->$prodTitle;
                    $editProduct->image = $prodProccedLink;
                    $editProduct->link = $customLink->idlink;
                    $editProduct->body = $request->$prodBody;
                    $editProduct->save();
                }
            }
            return redirect("/admin/post");
        }
        return redirect("/admin");
    }
    private function editcustomLink($link, $post, $x, $request)
    {
//        Shortlinks::all()->where("products_id", $post->product->where('prod_id', $x)->first()->id)->first()
        $newLink = $post->product->where('prod_id', $x)->first()->shortlink;
        $newLink->idlink = "/link/" . str::slug($request->input("titleProd_" . $x)) . '_' . time() . "/" . $post->id;
        $newLink->link = $link;
        $newLink->post_id = $post->id;
        $newLink->save();

        return $newLink;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try{
            Shortlinks::where('post_id', $post->id)->delete();
        }catch (Exception $err){

        }
        try{
            Products::where('post_id', $post->id)->delete();
        }catch(Exception $err){

        }
        try{
            $post->tags()->sync([]);
        }catch(Exception $err){

        }
        $post->delete();
        return redirect("/admin/post");
    }
}
