<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Tags;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Validator;


class BlogsController extends Controller
{
    public function index() {

        // FOR ALL BLOGS
        $blogs = Blog::with('categories')
                ->where('is_delete', 0)
                ->orderBy('created_at', 'DESC')
                ->paginate(12);

        // FOR SIDEBAR - RECENT POSTS
        $all_blogs = Blog::where('is_delete', 0)
                    ->orderBy('created_at', 'DESC')
                    ->take(5)
                    ->get();
        
        // FOR SIDEBAR - CATEGORIES
        // CATEGORY
        $categories = Category::where('is_deleted', 0)
                    ->whereNull('parent_id')
                    ->withCount('blogs')
                    ->get();

        // SUB-CATEGORY
        $sub_categories = Category::where('is_deleted', 0)->withCount('blogs')->get();

        // COUNT FOR BLOG
        $blog_count = Blog::where('is_delete', 0)->get();

        return view('blogs.index',[
            'blogs' => $blogs,
            'all_blogs' => $all_blogs,
            'blog_count' => $blog_count,
            'categories' => $categories,
            'sub_categories' => $sub_categories,
            'pageTitle' => 'All Posts',
            'pageDescription' => null,
            'selectedCategory' => null,
        ]);
    }

    public function single($slug) {

        // FOR SIDEBAR - RECENT POSTS
        $blogs = Blog::orderBy('created_at', 'DESC')
                        ->where('is_delete', 0)
                        ->take(7)
                        ->get();

        // FOR SINGLE BLOG
        $single_blog = Blog::with('categories')
                        ->where('is_delete', 0)
                        ->where('slug', $slug)
                        ->first();

        // FOR COMMENTS COUNT
        $commentsCount = Comment::where('blog_id', $single_blog->id)->count();

        // FOR COMMENTS LIST
        $comments = Comment::where('blog_id', $single_blog->id)
                            ->orderBy('created_at', 'DESC')
                            ->simplePaginate(20);

        // FOR SIDEBAR - CATEGORIES
        // CATEGORY
        $categories = Category::where('is_deleted', 0)
                    ->whereNull('parent_id')
                    ->withCount('blogs')
                    ->get();

        // SUB-CATEGORY
        $sub_categories = Category::where('is_deleted', 0)->withCount('blogs')->get();

        // COUNT FOR BLOG
        $blog_count = Blog::where('is_delete', 0)->get();

        return view('blogs.blog',[
            'single_blog' => $single_blog,
            'blogs' => $blogs,
            'comments' => $comments,
            'blog_count' => $blog_count,
            'commentsCount' => $commentsCount,
            'categories' => $categories,
            'sub_categories' => $sub_categories,
        ]);
    }

    public function list() {

        // FOR ALL BLOGS
        $blogs = Blog::with('categories')
        ->where('is_delete', 0)
        ->orderBy('created_at', 'DESC')
        ->paginate(10);

        return view('admin-blog.blogs-list',[
            'blogs' => $blogs,
        ]);
    }

    public function create() {

        // FOR MAIN CATEGORIES
        $categories = Category::where('is_deleted', 0)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'DESC')
            ->get();
        
        // FOR SUB CATEGORIES
        $sub_categories = Category::where('is_deleted', 0)
        ->whereNotNull('parent_id')
        ->orderByDesc('parent_id')
        ->orderByDesc('id')
        ->get();

        return view('admin-blog.create', [
            'categories' => $categories,
            'sub_categories' => $sub_categories,
        ]);
    }

    // public function store(Request $request) {
        
    //     // VALIDATION RULES
    //     $rules = [
    //         'title' => 'required|string|min:3|max:255',
    //         'content' => 'required|string|min:3',
    //         'new_tags' => 'nullable',
    //         'tags' => 'nullable',
    //         'image' => 'required|file|image|mimes:jpg,jpeg,png,gif,webp|max:10240',
    //         'category' => 'required|array|min:1',
    //     ];

    //     // CUSTOM MESSAGES
    //     $messages = [
    //         'category.required' => 'You must choose at least one category.',
    //         'category.*.exists' => 'One of the selected categories is invalid.',
    //         'image.uploaded' => 'The image could not be uploaded. Please use a JPG, PNG, GIF, or WEBP file under 10 MB.',
    //         'image.max' => 'The image must not be larger than 10 MB.',
    //     ];

    //     // VALIDATE DATA
    //     $validator = Validator::make($request->all(), $rules, $messages);
        
    //     // CHECK VALIDATION FAIL
    //     if ($validator->fails()) {
    //         return redirect()
    //         ->back()
    //         ->withInput()
    //         ->withErrors($validator);
    //     }

    //     // COLLECT ALL TAGS ID'S
    //     $tagIds = [];

    //     // CHECK IF TAGS SELECTED
    //     if ($request->has('tags')) {
    //         $tagIds = $request->tags;
    //     }

    //     // SAVING TAG
    //     if ($request->filled('new_tags')) {

    //         $tags = $request->new_tags;

    //         foreach ($tags as $tag) {
    //             $singleTag = Tags::create([
    //                 'tags_name' => $tag
    //             ]);

    //             $tagIds[] = $singleTag->id;
    //         }
    //     }

    //     // CONVERT STRING TO SLUG
    //     $baseSlug = Str::slug($request->title);

    //     $slug = $baseSlug;

    //     $count = 1;
        
    //     // CHECK IF SLUG EXISTS
    //     while (Blog::where('slug', $slug)->where('is_delete', 0)->exists()) {
    //         $slug = $baseSlug . '-' . $count;
    //         $count++;
    //     }

    //     // SAVING BLOG
    //     $blog = new Blog;
    //     $blog->title = $request->title;
    //     $blog->content = $request->content;
    //     $blog->author = $request->author;
    //     $blog->slug = $slug;
            
    //     // UPLOAD IMAGE
    //     if ($request->hasFile('image')) {
    //         $blog->image = $this->storeBlogImage($request->file('image'));
    //     }
        
    //     $blog->save();

    //     // SAVING CATEGORIES
    //     if ($request->has('category')) {
    //         $blog->categories()->sync($request->category);
    //     }

    //     // SAVING TAGS
    //     if ($request->has('tags')) {
    //         $blog->tags()->sync($tagIds);
    //     }

    //     return redirect()
    //     ->route('posts.list')
    //     ->with('success','Blog added succesfully');
        
    // }
    public function store(Request $request) {

        // VALIDATION RULES
        $rules = [
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'new_tags' => 'nullable|array',
            'new_tags.*' => 'string|max:50',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:10240',
            'category' => 'required|array|min:1',
            'category.*' => 'exists:categories,id',
        ];

        // CUSTOM MESSAGES
        $messages = [
            'category.required' => 'You must choose at least one category.',
            'category.*.exists' => 'One of the selected categories is invalid.',
            'image.uploaded' => 'The image could not be uploaded. Please use a JPG, PNG, GIF, or WEBP file under 10 MB.',
            'image.max' => 'The image must not be larger than 10 MB.',
        ];

        // VALIDATE
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }

        // COLLECT TAG IDS
        $tagIds = [];

        // EXISTING TAGS
        if ($request->filled('tags')) {
            $tagIds = $request->tags;
        }

        // NEW TAGS
        if ($request->filled('new_tags')) {
            foreach ($request->new_tags as $tagName) {

                // AVOID DUPLICATES
                $tag = Tags::firstOrCreate([
                    'tags_name' => trim($tagName)
                ]);

                $tagIds[] = $tag->id;
            }
        }

        // UNIQUE TAG IDS
        $tagIds = array_unique($tagIds);

        // GENERATE SLUG
        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug;
        $count = 1;

        while (Blog::where('slug', $slug)->where('is_delete', 0)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        // CREATE BLOG
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $this->sanitizeEditorContent($request->content);
        $blog->author = $request->author;
        $blog->slug = $slug;

        // IMAGE UPLOAD
        if ($request->file('image') && $request->file('image')->isValid()) {

            $file = $request->file('image');

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $path = public_path('uploads/blog');

            // create folder if not exists
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $filename);

            $blog->image = 'uploads/blog/' . $filename;
        }

        $blog->save();

        // SYNC CATEGORIES
        $blog->categories()->sync($request->category);

        // SYNC TAGS (IMPORTANT FIX)
        if (!empty($tagIds)) {
            $blog->tags()->sync($tagIds);
        }

        return redirect()
            ->route('posts.list')
            ->with('success', 'Blog added successfully');
    }

    public function search(Request $request) {

        // AJAX CHECK
        if (!$request->ajax()) {
            abort(404);
        }

        // GET SEARCH QUERY
        $query = $request->get('query');

        // EMPTY QUERY CHECK
        if (!$query) {
            return '';
        }

        // SEARCH IN BLOGS
        $results = Blog::where('title', 'LIKE', '%' . $query . '%')
                        ->where('is_delete', 0)
                        ->limit(5)
                        ->get();
    
        $output = '';

        // CHECK IF RESULTS FOUND
        if ($results->count()) {
            foreach ($results as $item) {
                $output .= '
                    <a href="'.route('blog.single', $item->slug).'"
                    class="list-group-item list-group-item-action">
                    '.$item->title.'
                    </a>
                ';
            }
        } else {
            $output = '<div class="list-group-item">No results found</div>';
        }

        return response($output);
    }

    public function category(Request $request, $category) {

        $categoryModel = Category::where('is_deleted', 0)
            ->where('category_slug', $category)
            ->firstOrFail();

        // FOR ALL BLOGS IN THAT CATEGORY
        $blogs = Blog::with('categories')
        ->whereHas('categories', function ($query) use ($categoryModel) {
            $query->where('id', $categoryModel->id);
        })
        ->where('is_delete', 0)
        ->orderBy('created_at', 'DESC')
        ->paginate(12);

        // FOR SIDEBAR - RECENT POSTS
        $all_blogs = Blog::where('is_delete', 0)
                    ->orderBy('created_at', 'DESC')
                    ->take(5)
                    ->get();
        
        // FOR SIDEBAR - CATEGORIES
        // CATEGORY
        $categories = Category::where('is_deleted', 0)
                    ->whereNull('parent_id')
                    ->withCount('blogs')
                    ->get();

        // SUB-CATEGORY
        $sub_categories = Category::where('is_deleted', 0)->withCount('blogs')->get();

        // COUNT FOR BLOG
        $blog_count = Blog::where('is_delete', 0)->get();

        return view('blogs.index',[
            'blogs' => $blogs,
            'all_blogs' => $all_blogs,
            'categories' => $categories,
            'blog_count' => $blog_count,
            'sub_categories' => $sub_categories,
            'pageTitle' => $categoryModel->category_name,
            'pageDescription' => $categoryModel->description,
            'selectedCategory' => $categoryModel,
        ]);
    }

    public function subCategory(Request $request, $category, $subcategory) {
        
        // FIND PARENT CAT'S ID
        $categoryModel  = Category::where('is_deleted', 0)
                        ->where('category_slug', $category)
                        ->firstOrFail();

        // FIND PARENT CAT'S ID
        $subCategoryModel  = Category::where('category_slug', $subcategory)
                        ->where('parent_id', $categoryModel->id)
                        ->where('is_deleted', 0)
                        ->firstOrFail();

        // FOR ALL BLOGS IN THAT CATEGORY
        $blogs = Blog::with('categories')
        ->whereHas('categories', function ($query) use ($subCategoryModel) {
            $query->where('id', $subCategoryModel->id);
        })
        ->where('is_delete', 0)
        ->orderBy('created_at', 'DESC')
        ->paginate(12);

        // FOR SIDEBAR - RECENT POSTS
        $all_blogs = Blog::where('is_delete', 0)
                    ->orderBy('created_at', 'DESC')
                    ->take(5)
                    ->get();
        
        // FOR SIDEBAR - CATEGORIES
        // CATEGORY
        $categories = Category::where('is_deleted', 0)
                    ->whereNull('parent_id')
                    ->withCount('blogs')
                    ->get();

        // SUB-CATEGORY
        $sub_categories = Category::where('is_deleted', 0)->withCount('blogs')->get();

        // COUNT FOR BLOG
        $blog_count = Blog::where('is_delete', 0)->get();

        return view('blogs.index',[
            'blogs' => $blogs,
            'all_blogs' => $all_blogs,
            'categories' => $categories,
            'blog_count' => $blog_count,
            'sub_categories' => $sub_categories,
            'pageTitle' => $subCategoryModel->category_name,
            'pageDescription' => $subCategoryModel->description,
            'selectedCategory' => $subCategoryModel,
        ]);
    }

    public function comment(Request $request) {

        // VALIDATION RULES
        $rules = [
            'blog_id' => 'required|integer',
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required',
        ];

        // VALIDATE DATA
        $validator = Validator::make($request->all(), $rules);

        // CHECK VALIDATION FAIL
        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
        }

        // SAVE COMMENT
        $comment = Comment::create([
            'blog_id' => $request->blog_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->message,
        ]);

        return redirect()
            ->route('blog.single',$request->blog_slug)
            ->withInput()
            ->with('success', 'Comment post...');
    }

    public function edit($slug) {

        // FOR SINGLE BLOG
        $blogs = Blog::with(['categories', 'tags'])
            ->where('slug', $slug)
            ->where('is_delete', 0)
            ->firstOrFail();

        // FOR MAIN CATEGORIES
        $categories = Category::where('is_deleted', 0)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'DESC')
            ->get();

        // FOR SUB CATEGORIES
        $sub_categories = Category::where('is_deleted', 0)
        ->whereNotNull('parent_id')
        ->orderByDesc('parent_id')
        ->orderByDesc('id')
        ->get();
        
        return view('admin-blog.edit', [
            'blogs' => $blogs,
            'categories' => $categories,
            'sub_categories' => $sub_categories
        ]);
    }

    public function update(Request $request, $slug) {

        // VALIDATION RULES
        $rules = [
            'title' => 'required|string|min:3|max:255',
            'edit_slug' => 'nullable|string|max:255',
            'content' => 'required|string|min:3',
            'new_tags' => 'nullable|array',
            'new_tags.*' => 'string|max:50',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|file|image|mimes:jpg,jpeg,png,gif,webp|max:10240',
            'category' => 'required|array|min:1',
            'category.*' => 'exists:categories,id',
        ];

        // CUSTOM MESSAGES
        $messages = [
            'category.required' => 'You must choose at least one category.',
            'category.*.exists' => 'One of the selected categories is invalid.',
            'image.uploaded' => 'The image could not be uploaded. Please use a JPG, PNG, GIF, or WEBP file under 10 MB.',
            'image.max' => 'The image must not be larger than 10 MB.',
        ];

        // VALIDATE DATA
        $validator = Validator::make($request->all(), $rules, $messages);

        // CHECK VALIDATION FAIL
        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
        }

        // COLLECT ALL TAGS ID'S
        $tagIds = [];
        
        // CHECK IF TAGS SELECTED
        if ($request->filled('tags')) {
            $tagIds = $request->tags;
        }
            
        // SAVING TAG
        if ($request->filled('new_tags')) {
            foreach ($request->new_tags as $tag) {
                $singleTag = Tags::firstOrCreate([
                    'tags_name' => trim($tag)
                ]);

                $tagIds[] = $singleTag->id;
            }
        }

        $tagIds = array_values(array_unique($tagIds));

        // FETCH BLOG
        $blog = Blog::where('slug', $slug)
            ->where('is_delete', 0)
            ->firstOrFail();

        // CONVERT STRING TO SLUG
        $slugSource = $request->filled('edit_slug')
            ? $request->edit_slug
            : $request->title;

        $baseSlug = Str::slug($slugSource);

        if ($baseSlug === '') {
            $baseSlug = Str::slug($request->title);
        }

        $slug = $baseSlug;

        $count = 1;

        // CHECK IF SLUG EXISTS
        while (Blog::where('slug', $slug)
            ->where('is_delete', 0)
            ->where('id', '!=', $blog->id)
            ->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }
        
        // UPDATE BLOG
        // SAVING BLOG
        $blog->title = $request->title;
        $blog->content = $this->sanitizeEditorContent($request->content);
        $blog->author = $request->author;
        $blog->slug = $slug;
            
        // UPLOAD IMAGE
        if ($request->hasFile('image')) {
            $blog->image = $this->storeBlogImage($request->file('image'));
        }
        $blog->save();

        // SAVING CATEGORIES
        $blog->categories()->sync($request->category ?? []);

        // SAVING TAGS
        $blog->tags()->sync($tagIds);

        return redirect()
        ->route('edit.post',$blog->slug)
        ->with('success','Blog updated successfully');
        
    }

    public function uploadEditorImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => 'required|file|image|mimes:jpg,jpeg,png,gif,webp|max:10240',
        ], [
            'upload.required' => 'Please choose an image to upload.',
            'upload.image' => 'The uploaded file must be an image.',
            'upload.mimes' => 'Only JPG, JPEG, PNG, GIF, and WEBP images are allowed.',
            'upload.max' => 'The image must not be larger than 10 MB.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => [
                    'message' => $validator->errors()->first('upload'),
                ],
            ], 422);
        }

        $path = $this->storeEditorImage($request->file('upload'));

        return response()->json([
            'url' => asset($path),
        ]);
    }

    public function delete(Request $request, $slug) {
        
        // FETCH BLOG
        $blog = Blog::where('slug', $slug)
            ->where('is_delete', 0)
            ->first();
        
        // SOFT DELETE BLOG
        $blog->is_delete = 1;
        $blog->save();

        // DELETE CATEGORY RELATIONSHIPS 
        DB::table('blog_has_categories')
            ->where('blog_id', $blog->id)
            ->delete();

        // DELETE TAG RELATIONSHIPS
        DB::table('blog_has_tags')
            ->where('blog_id', $blog->id)
            ->delete();

        return redirect()
        ->route('posts.list')
        ->with('success','Blog deleted succesfully');
    }

    private function storeBlogImage(UploadedFile $image): string
    {
        $uploadPath = public_path('uploads/blogs');

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $imageName = time().'_'.Str::random(10).'.'.$image->getClientOriginalExtension();

        $image->move($uploadPath, $imageName);

        return 'uploads/blogs/'.$imageName;
    }

    private function storeEditorImage(UploadedFile $image): string
    {
        $uploadPath = public_path('uploads/editor');

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $imageName = time().'_editor_'.Str::random(10).'.'.$image->getClientOriginalExtension();

        $image->move($uploadPath, $imageName);

        return 'uploads/editor/'.$imageName;
    }

    private function sanitizeEditorContent(string $content): string
    {
        return Purifier::clean($content);
    }
}
