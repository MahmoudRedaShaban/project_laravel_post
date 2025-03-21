<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::check()) return   abort(404);
        $categories = Category::all();
        return view('themes.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        // Upload Image
        if(!$request->hasFile('image')) throw new Exception("UPload Blog image");
        $image = $request->image;
        // Chang it's current image
        $newImageName = time() . '-'. $image->getClientOriginalName();
        $image->storeAs('blogs', $newImageName, 'public');

        $data['image'] = $newImageName;
        $data['user_id'] = $request->user()->id;

        Blog::create($data);
        return back()->with('blog-state', 'create Successfully Blogs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('themes.blog.single', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {      if(Auth::check() && $blog->user_id !== Auth::user()->id)  abort(403);
        $categories = Category::all();
        return view('themes.blog.edit', compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {

        if(Auth::check() && $blog->user_id !== Auth::user()->id)  abort(403);
        // Validated
        $data = $request->validated();

        // check if image
        if ($request->hasFile('image')) {
            // Delete old Image
            Storage::delete('public/blogs/'.$blog->image);
            // get image
            $image = $request->image;
            // new name image
            $imageNewName = time() . "-". $image->getClientOriginalName();
            // save new image in storage
            $image->storeAs('blogs', $imageNewName, 'public');
            $data['image'] = $imageNewName;
        }

        $blog->update($data);
        return back()->with('blog-state', 'Update Successfully Blogs');
    }

    /**
      */
    public function destroy(Blog $blog)
    {
        //
        if(Auth::check() && $blog->user_id !== Auth::user()->id)  abort(403);
        // Delete old Image
        Storage::delete('public/blogs/'.$blog->image);
        $blog->delete();
        return back()->with('state-delete','Successfully Deleted !');
    }
    /**
     * Desplay all blogs of user.
     */
    public function myblog()
    {
        if(!Auth::check()) return   abort(403);
        $blogs = Blog::where('user_id', Auth::user()->id)->paginate(10);
        return view('themes.blog.my-blog', compact('blogs'));
    }
}
