<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller
{
    public function index() {
        $tags = Tags::orderBy('created_at', 'DESC')->where('is_delete', 0)->paginate(10);
        return view('admin-tags.tags-list',[
            'tags' => $tags,
        ]);
    }

    public function store(Request $request) {
        
        $rules = [
            'tag_name' => 'required|min:3'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
        }

        $tag = Tags::create([
            'tags_name' => $request->tag_name
        ]);

        $tag->save();

        return redirect()
        ->route('posts.tags')
        ->with('success', 'Tag added successfully');
    }

    public function search(Request $request) {

        $query = $request->query('query');

        $results = Tags::where('tags_name', 'LIKE', "%{$query}%")
                        ->limit(5)
                        ->get();

        $output = '';

        if ($results->count() > 0) {
            foreach ($results as $item) {
                $output .= '
                    <li 
                        class="list-group-item list-group-item-action tag-item"
                        data-id="'.$item->id.'"
                        data-name="'.$item->tags_name.'"
                    >
                        #'.$item->tags_name.'
                    </li>
                ';
            }

        } else {
            $output = '<div class="list-group-item">No results found</div>';
        }

        return response($output);
    }

    public function update(Request $request) {
        // dd($request->all());
        $rules = [
            'edit_tag_name' => 'required|min:3'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
        }
        
        $tag = Tags::where('id', $request->edit_tag_id)->where('is_delete', 0)->first();

        // dd($tag);
        $tag->tags_name = $request->edit_tag_name;
        $tag->save();

        return redirect()
        ->route('posts.tags')
        ->with('success', 'Tag edited successfully');
        
    }

    public function delete($id) {
        
        $tag = Tags::where('id', $id)->where('is_delete', 0)->first();
        // dd($tag);
        $tag->is_delete = 1;
        $tag->save();
        // dd($tag->id);
        DB::table('blog_has_tags')
            ->where('tag_id',$tag->id)
            ->delete();

        return redirect()
        ->route('posts.tags')
        ->with('success', 'category deleted successfully');
    }
}
