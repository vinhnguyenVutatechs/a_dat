<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
class AccAdminController extends Controller
{
    public function getAccAdmin()
    {
        $admin = Users::where('type', 'admin')->paginate(12);
        $data = [
            'admin' => $admin,
        ];
        return view('admin.table.table_admin', $data);
    }

    public function getDeleteAdmin($id)
    {
        $delete_admin = Users::where('id', $id)->where('type', 'admin')->first();
        if (is_null($delete_admin)) {
            return redirect()->back()->with('alert_error', 'Xóa tài khoản admin không thành công');
        }elseif(!is_null($delete_admin)) {
            $delete_admin->delete();
            return redirect()->back()->with('alert_suscess', 'Xóa tài khoản admin thành công');
        }
    }

    public function postAddAdmin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'type' => 'admin',
            'updated_at' => now(),
        ];
        Users::insert($data);
        return redirect()->back()->with('alert_suscess', 'Thêm tài khoản admin thành công');
    }

    // public function postEditAdmin(Request $request, $id)
    // {
    //     $admin = Users::where('type', 'admin')->where('id', $id)->first();
    //     $data = [
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //     ];
    //     if (is_null($admin)) {
    //         return redirect()->back()->with('alert_error', 'Sửa tài khoản admin không thành công');
    //     }else {
    //         $admin->update($data);
    //         return redirect()->back()->with('alert_suscess', 'Sửa tài khoản admin thành công');
    //     }
    // }
}
