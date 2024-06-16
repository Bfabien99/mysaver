<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function list()
    {
        return view('user.account.list', ['accounts' => Account::all()]);
    }

    public function createPage()
    {
        return view('user.account.create', ['categories' => Category::all()->toArray()]);
    }

    public function create()
    {
        $req = request()->validate([
            'name'        => 'nullable|max:200|unique:accounts,name',
            'url'         => 'nullable|url',
            'image_url'   => 'nullable|url',
            'username'    => 'nullable|max:200',
            'email'       => 'nullable|email',
            'phone'       => 'nullable|max:50',
            'password'    => 'nullable|max:100',
            'description' => 'required|min:5|max:500',
            'more'        => 'nullable|max:1000',
            'cat_id'      => 'required|exists:categories,id',
        ]);

        try {
            Account::create($req);
            return to_route('account');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function show(Account $account)
    {
        return view('user.account.show', ['account' => $account]);
    }

    public function editPage(Account $account)
    {
        return view('user.account.edit', ['account' => $account, 'categories' => Category::all()->toArray()]);
    }

    public function edit(Account $account)
    {
        $req = request()->validate([
            'name'        => 'nullable|max:200',
            'url'         => 'nullable|url',
            'image_url'   => 'nullable|url',
            'username'    => 'nullable|max:200',
            'email'       => 'nullable|email',
            'phone'       => 'nullable|max:50',
            'password'    => 'nullable|max:100',
            'description' => 'required|min:5|max:500',
            'more'        => 'nullable|max:1000',
            'cat_id'      => 'required|exists:categories,id',
        ]);
        try {
            $is_name = Account::where('name', $account->name)->first()?->toArray();
            if ($is_name && ($is_name['id'] != $account->id)) {
                return back()->withInput()->with('error', 'Name "' . $req['name'] . '" exist');
            }

            Account::where('id', $account->id)->first()->update([
                'name'        => $req['name'],
                'url'         => $req['url'],
                'image_url'   => $req['image_url'],
                'username'    => $req['username'],
                'email'       => $req['email'],
                'phone'       => $req['phone'],
                'password'    => $req['password'],
                'description' => $req['description'],
                'more'        => $req['more'],
                'cat_id'      => $req['cat_id'],
            ]);
            return to_route('edit-account', $account->id);
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function delete(Account $account)
    {
        $account->delete();
        return to_route('account');
    }

}
