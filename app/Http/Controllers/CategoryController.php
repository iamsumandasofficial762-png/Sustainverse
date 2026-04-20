<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index() {

        // FOR SELECT OPTION
        $categories = Category::where('is_deleted', 0)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'DESC')
            ->get();

        // FOR LIST
        $all_categories = Category::where('is_deleted', 0)
            ->orderBy('id', 'DESC')
            ->orderBy('parent_id', 'DESC')
            ->paginate(15);
            
        return view('admin-categories.categories-list', [
            'all_categories' => $all_categories,
            'categories' => $categories 
        ]);
    }

    public function add() {
        $categories = Category::where('is_deleted', 0)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('admin-categories.create', [
            'categories' => $categories
        ]);
    }
    public function store(Request $request) {
        
        $rules = [
            'category_name' => [
                'required',
                'min:3',
                Rule::unique('categories')->where(function ($query) use ($request) {
                    return $query->where('is_deleted', 0)
                        ->when(
                            $request->filled('parent_id'),
                            fn ($subQuery) => $subQuery->where('parent_id', $request->parent_id),
                            fn ($subQuery) => $subQuery->whereNull('parent_id')
                        );
                }),
            ],
            'parent_id' => 'nullable|integer|exists:categories,id',
            'description' => 'nullable|string',
        ];
        
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
        }

        // TURN NAME INTO SLUG
        $cat_slug = Str::slug($request->category_name);
        
        $categories = Category::create([
            'category_name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'category_slug' => $cat_slug,
            'description' => $request->description,
        ]);

        return redirect()
        ->route('posts.categories')
        ->with('success', 'category added successfully');
        
    }

    public function edit($id) {
        $categories = Category::where('is_deleted', 0)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'DESC')
            ->get();

        $category = Category::where('id', $id)->where('is_deleted', 0)->first();

        if (!$category) {
            return redirect()
            ->route('posts.categories')
            ->with('error', 'category not found');
        }

        return view('admin-categories.edit', [
            'categories' => $categories,
            'category' => $category
        ]);

    }
    
    public function update(Request $request, $id) {

        $rules = [
            'category_name' => [
                'required',
                'min:3',
                Rule::unique('categories')->ignore($id)->where(function ($query) use ($request) {
                    return $query->where('is_deleted', 0)
                        ->when(
                            $request->filled('parent_id'),
                            fn ($subQuery) => $subQuery->where('parent_id', $request->parent_id),
                            fn ($subQuery) => $subQuery->whereNull('parent_id')
                        );
                }),
            ],
            'parent_id' => [
                'nullable',
                'integer',
                'exists:categories,id',
                'not_in:' . $id,
            ],
            'description' => 'nullable|string',
        ];

        $messages = [
            'category_name.required' => 'Category name is required.',
            'category_name.min'      => 'Category name must be at least 3 characters.',
            'parent_id.exists'            => 'Selected parent category does not exist.',
            'parent_id.not_in'            => 'Main category cannot be the same as the category being edited.',
        ];

        $attributes = [
            'category_name' => 'Category Name',
            'parent_id' => 'Parent Category',
            'description' => 'Description',
        ];


        $validator = Validator::make(
            $request->all(),
            $rules,
            $messages,
            $attributes
        );

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
        }

        $categories = Category::where('id', $id)->where('is_deleted', 0)->first();

        if (!$categories) {
            return redirect()
                ->route('posts.categories')
                ->with('error', 'category not found');
        }

        $categories->category_name = $request->category_name;
        $categories->parent_id = $request->parent_id;
        $categories->category_slug = Str::slug($request->category_name);
        $categories->description = $request->description;
        $categories->save();

        return redirect()
        ->route('posts.categories')
        ->with('success', 'category edited successfully');
        
    }

    public function delete($id) {
        
        $categories = Category::where('id', $id)->where('is_deleted', 0)->first();

        $categories->is_deleted = 1;
        $categories->save();

        DB::table('blog_has_categories')
            ->where('category_id',$categories->id)
            ->delete();

        return redirect()
        ->route('posts.categories')
        ->with('success', 'category deleted successfully');
    }

}
