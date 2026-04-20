<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Home;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index() {

        // FOR PRIMARY POST
        $primary_post = Blog::where('is_delete', 0)
                    ->orderBy('created_at', 'DESC')
                    ->first();

        // FOR SECONDARY POST
        $secondary_post = Blog::where('is_delete', 0)
                    ->orderBy('created_at', 'DESC')
                    ->skip(1)
                    ->first();

        // FOR ALL BLOG SHOW IN OPTION
        $all_blogs = Blog::where('is_delete', 0)
                    ->orderBy('created_at', 'DESC')
                    ->get();

        // FOR RANDOM BLOG
        $random_blogs = Blog::with('categories')
                    ->where('is_delete', 0)
                    ->inRandomOrder()
                    ->take(5)
                    ->get();

        // FOR BLOG & NEWS SECTION
        $section_blogs = Blog::with('categories')
                    ->where('is_delete', 0)
                    ->inRandomOrder()
                    ->take(3)
                    ->get();

        // FOR PRE SELECTED BLOGS
        $sections = Home::where('id', 1)->first();
        
        return view('dashborad.index', [
            'all_blogs' => $all_blogs,
            'primary_post' => $primary_post,
            'secondary_post' => $secondary_post,
            'random_blogs' => $random_blogs,
            'section_blogs' => $section_blogs,
            'sections' => $sections,
        ]);
    }
    public function adminIndex() {

        // FOR PRIMARY POST
        $primary_post = Blog::where('is_delete', 0)
                    ->orderBy('created_at', 'DESC')
                    ->first();

        // FOR SECONDARY POST
        $secondary_post = Blog::where('is_delete', 0)
                    ->orderBy('created_at', 'DESC')
                    ->skip(1)
                    ->first();

        // FOR ALL BLOG SHOW IN OPTION
        $all_blogs = Blog::where('is_delete', 0)
                    ->orderBy('created_at', 'DESC')
                    ->get();

        // FOR PRE SELECTED BLOGS
        $sections = Home::where('id', 1)->first();
        
        return view('admin-home.home', [
            'all_blogs' => $all_blogs,
            'primary_post' => $primary_post,
            'secondary_post' => $secondary_post,
            'sections' => $sections,    
        ]);
    }

    public function store(Request $request, $id) {

        // VALIDATION RULES
        $rules = [
            'post_id'   => 'required',
        ];

        // DATA VALIDATION
        $validation = Validator::make($request->all(), $rules);

        // CHECK VALIDATION FAIL
        if ($validation->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }
        
        // FETCH BLOG
        $section = Home::where('id', $id)->firstOrFail();

        $section->post_id = $request->post_id;
        $section->save();

        return redirect()
        ->route('home.index')
        ->with('success', 'blog added succesfully');
    }
}
