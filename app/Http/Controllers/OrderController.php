<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menuparent;
use App\Models\Menuchild;

class OrderController extends Controller
{
    public function parent()
    {
        $this->data['parents'] = Menuparent::all();
        return view('backend.admin.order_parent', $this->data);
    }

    public function menu($id)
    {
        $o_id = $id;
        $this->data['category_id'] = $id;
        $this->data['menus'] = Menuchild::where('category_id', '=', $o_id)->get();
        $this->data['parents'] = Menuparent::all();
        return view('backend.admin.order_select_menu', $this->data);
    }
}
