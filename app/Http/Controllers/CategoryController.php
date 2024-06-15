<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function list()
    {
        return view('user.category.list', ['categories' => Category::all()]);
    }

    public function createPage()
    {
        return view('user.category.create');
    }

    public function create()
    {
        $req = request()->validate([
            'title'       => 'required|unique:categories,title|min:2|max:200',
            'description' => 'required|min:5|max:200',
        ]);
        $req['slug'] = Str::slug($req['title']);
        try {
            $is_slug = Category::where('slug', $req['slug'])->first()?->toArray();
            if ($is_slug) {
                return back()->withInput()->with('error', 'Slug "' . $req['slug'] . '" exist');
            }
            Category::create($req);
            return back()->with('success', 'New category added.');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function show(Category $category)
    {
        return view('user.category.show', ['category' => $category]);
    }

    public function editPage(Category $category)
    {
        return view('user.category.edit', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        $req = request()->validate([
            'title'       => 'required|min:2|max:200',
            'description' => 'required|min:5|max:200',
        ]);
        $req['slug'] = Str::slug($req['title']);
        try {
            $is_title = Category::where('title', $category->title)->first()?->toArray();
            if ($is_title && ($is_title['id'] != $category->id)) {
                return back()->withInput()->with('error', 'Title "' . $req['slug'] . '" exist');
            }
            $is_slug = Category::where('slug', $req['slug'])->first()?->toArray();
            if ($is_slug && ($is_slug['id'] != $category->id)) {
                return back()->withInput()->with('error', 'Slug "' . $req['slug'] . '" exist');
            }
            Category::where('slug', $category->slug)->first()->update([
                'slug'        => $req['slug'],
                'title'       => $req['title'],
                'description' => $req['description'],
            ]);
            return to_route('edit-category', $req['slug'])->with('success', 'Category updated.');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function delete(Category $category)
    {
        $category->delete();
        return to_route('category');
    }
}
