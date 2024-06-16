<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    //
    public function list()
    {
        return view('user.note.list', ['notes' => Note::all()]);
    }

    public function createPage()
    {
        return view('user.note.create', ['categories' => Category::all()->toArray()]);
    }

    public function create()
    {
        $req = request()->validate([
            'title'       => 'required|unique:notes,title|min:2|max:200',
            'content' => 'required|min:10|max:3000',
            'url'         => 'nullable|url',
            'tags' => 'required|min:3',
            'cat_id'      => 'required|exists:categories,id',
        ]);
        $req['slug'] = Str::slug($req['title']);
        try {
            $is_slug = Note::where('slug', $req['slug'])->first()?->toArray();
            if ($is_slug) {
                return back()->withInput()->with('error', 'Slug "' . $req['slug'] . '" exist');
            }
            Note::create($req);
            return back()->with('success', 'New note added.');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function show(note $note)
    {
        return view('user.note.show', ['note' => $note]);
    }

    public function editPage(Note $note)
    {
        return view('user.note.edit', ['note' => $note, 'categories' => Category::all()->toArray()]);
    }

    public function edit(Note $note)
    {
        $req = request()->validate([
            'title'       => 'required|min:2|max:200',
            'content' => 'required|min:10|max:3000',
            'url'         => 'nullable|url',
            'tags' => 'required|min:3',
            'cat_id'      => 'required|exists:categories,id',
        ]);
        $req['slug'] = Str::slug($req['title']);
        try {
            $is_title = Note::where('title', $note->title)->first()?->toArray();
            if ($is_title && ($is_title['id'] != $note->id)) {
                return back()->withInput()->with('error', 'Title "' . $req['slug'] . '" exist');
            }
            $is_slug = Note::where('slug', $req['slug'])->first()?->toArray();
            if ($is_slug && ($is_slug['id'] != $note->id)) {
                return back()->withInput()->with('error', 'Slug "' . $req['slug'] . '" exist');
            }
            Note::where('slug', $note->slug)->first()->update([
                'slug'        => $req['slug'],
                'title'       => $req['title'],
                'content' => $req['content'],
                'url'         => $req['url'],
                'cat_id'         => $req['cat_id'],
                'tags'         => $req['tags'],
            ]);
            return to_route('edit-note', $req['slug'])->with('success', 'note updated.');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function delete(Note $note)
    {
        $note->delete();
        return to_route('note');
    }
}
