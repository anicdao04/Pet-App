<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menuparent;

class MenuParentController extends Controller
{
    public function index()
    {
        $this->data['menus'] = Menuparent::orderBy('name', 'asc')->paginate(5);
        return view('backend.admin.menu_parent_list', $this->data);
    }

    public function create()
    {
        return view('backend.admin.menu_parent_create');
    }

    public function store(Request $request)
    {
        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('uploads/images/menu_items/parent/', $name);

        $data = new Menuparent;
        $data->name = $request->input('name');
        $data->image = $name;
        $data->save();
        return redirect()->route('menuparent.index')->with('parent_created', 'New category has been created');
    }
}
