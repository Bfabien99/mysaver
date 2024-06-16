<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    //
    public function list()
    {
        return view('user.site.list', ['sites' => Site::all()]);
    }

    public function createPage()
    {
        return view('user.site.create', ['categories' => Category::all()->toArray()]);
    }

    public function create()
    {
        $req = request()->validate([
            'title'       => 'required|unique:sites,title|min:2|max:200',
            'description' => 'required|min:5|max:200',
            'url'         => 'required|url',
            'cat_id'      => 'required|exists:categories,id',
        ]);
        $req['slug'] = Str::slug($req['title']);
        try {
            $is_slug = Site::where('slug', $req['slug'])->first()?->toArray();
            if ($is_slug) {
                return back()->withInput()->with('error', 'Slug "' . $req['slug'] . '" exist');
            }
            Site::create($req);
            return back()->with('success', 'New site added.');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function show(Site $site)
    {
        return view('user.site.show', ['site' => $site]);
    }

    public function editPage(Site $site)
    {
        return view('user.site.edit', ['site' => $site, 'categories' => Category::all()->toArray()]);
    }

    public function edit(Site $site)
    {
        $req = request()->validate([
            'title'       => 'required|min:2|max:200',
            'description' => 'required|min:5|max:200',
            'url'         => 'required|url',
            'cat_id'      => 'required|exists:categories,id',
        ]);
        $req['slug'] = Str::slug($req['title']);
        try {
            $is_title = Site::where('title', $site->title)->first()?->toArray();
            if ($is_title && ($is_title['id'] != $site->id)) {
                return back()->withInput()->with('error', 'Title "' . $req['slug'] . '" exist');
            }
            $is_slug = Site::where('slug', $req['slug'])->first()?->toArray();
            if ($is_slug && ($is_slug['id'] != $site->id)) {
                return back()->withInput()->with('error', 'Slug "' . $req['slug'] . '" exist');
            }
            Site::where('slug', $site->slug)->first()->update([
                'slug'        => $req['slug'],
                'title'       => $req['title'],
                'description' => $req['description'],
                'url'         => $req['url'],
                'cat_id'         => $req['cat_id'],
            ]);
            return to_route('edit-site', $req['slug'])->with('success', 'site updated.');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function delete(Site $site)
    {
        $site->delete();
        return to_route('site');
    }
}
