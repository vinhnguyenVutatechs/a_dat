<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Users;
use App\Product;
use App\Footer;
class IndexController extends Controller
{
    public function getIndex()
    {
        $categories = Categories::all();
        $product = Product::all();
        $users = Users::orderBy('id', 'DESC')->limit(7)->get();
        $footer = Footer::all();
        $data = [
            'categories' => $categories,
            'product' => $product,
            'users' => $users,
            'footer' => $footer,
        ];
        return view('index', $data);
    }

    public function postNickUser(Request $request)
    {
        $nick_user = Users::insert([
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect()->route('Index');
    }
}
