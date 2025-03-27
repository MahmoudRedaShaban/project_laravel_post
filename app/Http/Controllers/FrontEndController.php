<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(1);
        $blogSliders = Blog::latest()->take(6)->get();
        return view('themes.index', compact('blogs', 'blogSliders'));
    }
    public function categories($id = 1)
    {
        $blogs = Blog::where('category_id', $id)->paginate(1);
        $categoryName =Category::find($id)?->name ?? 'Home';
        return view('themes.categories', compact('blogs','categoryName'));
    }
    public function contact()
    {
        return view('themes.contact');
    }
    public function blog()
    {
        return view('themes.blog');
    }

    public function login()
    {
        return view('themes.login');
    }

}