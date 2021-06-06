<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use App\Product;
use App\Categories;
use App\Footer;

class AdminController extends Controller
{

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($data)) {
            return redirect()->route('Admin');
        }else
        dd(Auth::attempt($data));
        return redirect()->back()->with('alert_error', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    public function getIndexAdmin()
    {
        $product  = Product::count();
        $all_user = Users::count();
        $data = [
            'all_user' => $all_user,
            'product' => $product
        ];
        return view('admin.index', $data);
    }

    public function postEditKhachHang(Request $request, $id)
    {
        $edit_users = Users::where('id', $id)->first();
        if (is_null($edit_users)) {
            return redirect()->back()->with('alert_error', 'Sửa trạng thái không thành công');
        }
        $data = [
            'status' => $request->status
        ];
        $edit_users->update($data);
        return redirect()->back()->with('alert_suscess', 'Sửa trạng thái thành công');
    }

    public function getKhachHang()
    {
        $users = Users::orderBy('id', 'desc')->where('type', 'user')->paginate(12);
        $data = [
            'users' => $users
        ];
        return view('admin.table.table_user', $data);
    }

    public function getProduct()
    {
        $products = Product::orderBy('id', 'desc')->paginate(12);
        $data = [
            'products' => $products
        ];
        return view('admin.table.table_product', $data);
    }

    public function getDeleteUser($id)
    {
        $delete_user = Users::where('id', $id)->first();
        if (is_null($delete_user)) {
            return redirect()->back()->with('alert_error', 'Xóa tài khoản không thành công');
        }elseif(!is_null($delete_user)) {
            $delete_user->delete();
            return redirect()->back()->with('alert_suscess', 'Xóa tài khoản thành công');
        }
    }

    public function getDeleteProduct($id)
    {
        $delete_product = Product::where('id', $id)->first();
        if (is_null($delete_product)) {
            return redirect()->back()->with('alert_error', 'Xóa sản phẩm không thành công');
        }elseif(!is_null($delete_product)) {
            $delete_product->delete();
            return redirect()->back()->with('alert_suscess', 'Xóa sản phẩm thành công');
        }
    }

    public function postAddProduct(Request $request)
    {
        $data = [
            'product' => $request->product,
            'ciento' => $request->ciento
        ];
        Product::insert($data);
        return redirect()->back()->with('alert_suscess', 'Thêm sản phẩm thành công');
    }

    public function postEditProduct(Request $request, $id)
    {
        $data = [
            'product' => $request->product,
            'ciento' => $request->ciento
        ];
        $edit_product = Product::where('id', $id)->first();
        if (is_null($edit_product)) {
            return redirect()->back()->with('alert_error', 'Sửa sản phẩm không thành công');
        }else{
        $edit_product->update($data);
        return redirect()->back()->with('alert_suscess', 'Sửa sản phẩm thành công');
        }
    }

    public function getDanhMuc()
    {
        $categories = Categories::paginate(10);
        $data = [
            'categories' => $categories,
        ];
        return view('admin.table.table_categories', $data);
    }

    public function postAddCategories(Request $request)
    {
        $data = [
            'name' => $request->categories,
            'slug' => $request->slug,
        ];
        Categories::insert($data);
        return redirect()->route('Categories')->with('alert_suscess', 'Thêm danh mục thành công');
    }

    public function postEditCategories(Request $request, $id)
    {

        $edit_categories = Categories::where('id', $id)->first();
        $data = [
            'name' => $request->edit_categories,
            'slug' => $request->edit_slug
        ];
        if (is_null($edit_categories)) {
            return redirect()->back()->with('alert_error', 'Sửa danh mục không thành công');
        }else {
            $edit_categories->update($data);
            return redirect()->back()->with('alert_suscess', 'Sửa danh mục thành công');
        }
    }

    public function getDeleteCategories($id)
    {
        $delete_categories = Categories::where('id', $id)->first();
        if (is_null($delete_categories)) {
            return redirect()->back()->with('alert_error', 'Xóa danh mục không thành công');
        }elseif(!is_null($delete_categories)) {
            $delete_categories->delete();
            return redirect()->back()->with('alert_suscess', 'Xóa danh mục thành công');
        }
    }

    public function getSesttings()
    {
        $sesttings = Footer::paginate();
        $data = [
            'sesttings' => $sesttings,
        ];
        return view('admin.table.table_sesttings', $data);
    }

    public function getDeleteSesttings($id)
    {
        $delete_sestting = Footer::where('id', $id)->first();
        if (is_null($delete_sestting)) {
            return redirect()->back()->with('alert_error', 'Xóa thông tin không thành công');
        }elseif(!is_null($delete_sestting)) {
            $delete_sestting->delete();
            return redirect()->back()->with('alert_suscess', 'Xóa thông tin thành công');
        }
    }

    public function postAddSesttings(Request $request)
    {
        $data = [
            'name' => $request->information,
            'type' => $request->type,
        ];
        Footer::insert($data);
        return redirect()->back()->with('alert_suscess', 'Thêm thông tin thành công');
    }

    public function postEditSesttings(Request $request, $id)
    {
        $data = [
            'name' => $request->information,
        ];
        $edit_sestting = Footer::where('id', $id)->first();
        if (is_null($edit_sestting)) {
            return redirect()->back()->with('alert_error', 'Sửa thông tin không thành công');
        }else{
        $edit_sestting->update($data);
        return redirect()->back()->with('alert_suscess', 'Sửa thông tin thành công');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('Login');
    }
}










