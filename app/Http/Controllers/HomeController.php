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

        // FOR REGIONAL NEWS TABS
        $regionalNewsTabs = collect([
            [
                'label' => 'India',
                'slug' => 'india',
                'icon' => 'assets/images/home-one/service/Flag_of_India.svg',
            ],
            [
                'label' => 'UAE',
                'slug' => 'uae',
                'icon' => 'assets/images/home-one/service/Flag_of_the_United_Arab_Emirates.svg',
            ],
            [
                'label' => 'Africa',
                'slug' => 'africa',
                'icon' => 'assets/images/home-one/service/africa.jpg',
            ],
            [
                'label' => 'Asia',
                'slug' => 'asia',
                'icon' => 'assets/images/home-one/service/asia.png',
            ],
            [
                'label' => 'Special Days',
                'slug' => 'special-days',
                'icon' => null,
            ],
        ])->map(function ($tab) {
            $category = Category::where('is_deleted', 0)
                ->where('category_slug', $tab['slug'])
                ->first();

            $posts = collect();

            if ($category) {
                $posts = Blog::with('categories')
                    ->where('is_delete', 0)
                    ->whereHas('categories', function ($query) use ($category) {
                        $query->where('categories.id', $category->id);
                    })
                    ->orderBy('created_at', 'DESC')
                    ->take(3)
                    ->get();
            }

            return [
                ...$tab,
                'category' => $category,
                'posts' => $posts,
            ];
        });

        // FOR PRE SELECTED BLOGS
        $sections = Home::where('id', 1)->first();
        
        return view('dashborad.index', [
            'all_blogs' => $all_blogs,
            'primary_post' => $primary_post,
            'secondary_post' => $secondary_post,
            'random_blogs' => $random_blogs,
            'section_blogs' => $section_blogs,
            'regionalNewsTabs' => $regionalNewsTabs,
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
