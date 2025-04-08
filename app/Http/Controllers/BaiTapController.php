<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BaiTapController extends Controller
{
    //
    function baitap1() {
        return view ('baitap1');
    }

    function themtheloai(Request $request) 
    {
        $id = $request->input("id");
        $theloai = $request->input("theloai"); 
        $data = ["id" => $id, "ten_the_loai" => $theloai];
        DB::table("the_loai")->insert($data);
        return "Thêm thành công!";
    }

    function baitap2() {
        return view ('baitap2');
    }

    function themtheloai2(Request $request) 
    {
        $id = $request->input("id");
        $theloai = $request->input("theloai"); 
        $add_data = [];
        foreach ($id as $key => $value)
        {
            $add_data[] = ["id" => $value, "ten_the_loai" => $theloai[$key]]; 
        }
        DB::table("the_loai")->insert($add_data);
        return "Thêm thành công!";
    }
}
