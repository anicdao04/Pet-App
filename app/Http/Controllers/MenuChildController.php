<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menuchild;
use App\Models\Menuparent;

class MenuChildController extends Controller
{
    public function index()
    {
        $this->data['parents'] = Menuparent::get();
        $this->data['menus'] = Menuchild::orderBy('name', 'asc')->paginate(5);
        return view('backend.admin.menu_child_list', $this->data);
    }

    public function create()
    {
        $this->data['categories'] = Menuparent::orderBy('name', 'asc')->get();
        return view('backend.admin.menu_child_create', $this->data);
    }

    public function store(Request $request)
    {
        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('uploads/images/menu_items/child/', $name);

        $data = new Menuchild;
        $data->category_id = $request->input('category_id');
        $data->name = $request->input('name');
        $data->image = $name;
        $data->save();
        return redirect()->route('menuchild.index')->with('child_created', 'New menu has been created');
    }

    public function edit($id)
    {
        $this->data['menu'] = Menuchild::find($id);
        $this->data['parents'] = Menuparent::get();
        return view('backend.admin.menu_child_edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        
        if($request->hasfile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('uploads/images/menu_items/child/', $name);

            $data = Menuchild::find($id);
            $data->category_id = $request->input('category_id');
            $data->name = $request->input('name');
            $data->image = $name;
            $data->update();
        }
        else{
            $data = Menuchild::find($id);
            $data->category_id = $request->input('category_id');
            $data->name = $request->input('name');
            $data->update();
        }
            
        return redirect()->route('menuchild.index')->with('child_updated', 'Menu has been updated successfully!');
    }


}
