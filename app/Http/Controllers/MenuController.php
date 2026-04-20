<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index() {
        $categories = Category::where('is_deleted', 0)
        ->with('children')
        ->get();

        $nav_lists = Menu::all();

        return view('admin-menu.menu-list', [
            'categories' => $categories,
            'nav_lists' => $nav_lists
        ]);
    }

    public function single($name) {
        $nav = str_replace('-', '', $name);
        $single_nav = Menu::where('menu_name', $nav)->first();
        // dd($single_nav);

        $categories = Category::where('is_deleted', 0)
        ->whereNull('parent_id')
        ->orderBy('created_at', 'DESC')
        ->get();

        return view('admin-menu.single-menu', [
            'categories' => $categories,
            'single_nav' => $single_nav
        ]);
    }

    public function update(Request $request, $id) {

        $rules = [
            'menu_name' => 'required|string|min:3|max:255',
            'cat_id' => 'required|array',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
        }

        $single_nav = Menu::where('id', $id)->first();

        $single_nav->menu_name = $request->menu_name;
        $single_nav->cat_ids = collect($request->cat_id)
            ->filter()
            ->map(fn ($id) => (int) $id)
            ->values()
            ->toArray();

        $single_nav->save();

        return redirect()
        ->route('menu.index')
        ->with('success', 'Menu successfully edited');
    }
}
