<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //
    function accountpanel()
    {
        $user = DB::table("users")->whereRaw("id=?",[Auth::user()->id])->first();
        return view("vidusach.account",compact("user"));
    }

    function saveaccountinfo(Request $request)
    {
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone' => ['nullable', 'string'],
        'photo' => ['nullable', 'image']
        ]);
        $id = $request->input('id');
        $data["name"] = $request->input("name");
        $data["phone"] = $request->input("phone");
        $data["email"] = $request->input("email");
        if($request->hasFile("photo"))
        {
            //Tạo tên file bằng cách lấy id của người dùng ghép với phần mở rộng của hình ảnh
            $fileName = Auth::user()->id . '.' . $request->file('photo')->extension();
            //File được lưu vào thư mục storage/app/public/profile
            $request->file('photo')->storeAs('public/profile', $fileName);
            $data['photo'] = $fileName;
        }
        DB::table("users")->where("id",$id)->update($data);
        return redirect()->route('account')->with('status', 'Cập
        nhật thành công');
    }

    function booklist()
    {
        $data = DB::table("sach")->get();
        return view("vidusach.book-mn",compact("data"));
    }

    function bookcreate()
    {
        $data = DB::table("sach")->get();
        return view("vidusach.bookcreate",compact("data"));
    }
    function addbook(Request $request)
    {
        $request->validate([
        'tieude' => ['required', 'string', 'max:200'],
        'nhacungcap' => ['required', 'string', 'max:50'],
        'nxb' => ['required', 'string', 'max:50'],
        'tacgia' => ['required', 'string', 'max:100'],
        'hinhthucbia' => ['nullable', 'string', 'max:50'],
        'giaban' => ['required', 'string', 'max:50'],
        'fileanhbia' => ['nullable', 'image']
        ]);
        $data["tieu_de"] = $request->input("tieude");
        $data["nha_cung_cap"] = $request->input("nhacungcap");
        $data["nha_xuat_ban"] = $request->input("nxb");
        $data["tac_gia"] = $request->input("tacgia");
        $data["hinh_thuc_bia"] = $request->input("hinhthucbia");
        $data["gia_ban"] = $request->input("giaban");
        if($request->hasFile("anhbia"))
        {
            //Tạo tên file bằng cách lấy id của sách ghép với phần mở rộng của hình ảnh
            $fileName = $request->file('anhbia');
            //File được lưu vào thư mục storage/app/public/profile
            $request->file('anhbia')->storeAs('public/book', $fileName);
            $data['file_anh_bia'] = $fileName;
        }
        DB::table("sach")->insert($data);
        return redirect()->route('account')->with('status', 'Thêm thành công');
    }

    function bookedit($id)
    {
        $data = DB::table("sach")->where("id",$id)->first();
        return view("vidusach.bookedit",compact("data"));
    }
    function edit(Request $request)
    {
        $request->validate([
        'tieude' => ['required', 'string', 'max:200'],
        'nhacungcap' => ['required', 'string', 'max:50'],
        'nxb' => ['required', 'string', 'max:50'],
        'tacgia' => ['required', 'string', 'max:100'],
        'hinhthucbia' => ['nullable', 'string', 'max:50'],
        'giaban' => ['required', 'string', 'max:50'],
        'fileanhbia' => ['nullable', 'image']
        ]);
        $id = $request->input('id');
        $data["tieu_de"] = $request->input("tieude");
        $data["nha_cung_cap"] = $request->input("nhacungcap");
        $data["nha_xuat_ban"] = $request->input("nxb");
        $data["tac_gia"] = $request->input("tacgia");
        $data["hinh_thuc_bia"] = $request->input("hinhthucbia");
        $data["gia_ban"] = $request->input("giaban");
        if($request->hasFile("anhbia"))
        {
            //Tạo tên file bằng cách lấy id của sách ghép với phần mở rộng của hình ảnh
            $fileName = Auth::sach()->id . '.' . $request->file('anhbia')->extension();
            //File được lưu vào thư mục storage/app/public/profile
            $request->file('anhbia')->storeAs('public/book', $fileName);
            $data['file_anh_bia'] = $fileName;
        }
        DB::table("sach")->where("id",$id)->update($data);
        return redirect()->route('account')->with('status', 'Cập nhật thành công');
    }

    function bookdelete(Request $request)
    {
        $id = $request->input("id");
        DB::table("sach")->where("id",$id)->delete();
        return redirect()->route('booklist')->with('status', 'Xóa thành công');
    }
}
