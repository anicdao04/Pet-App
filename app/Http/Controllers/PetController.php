<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    function index()
    {
        $this->data['pet_count'] = Pet::count();
        $this->data['pets'] = Pet::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.admin.pets', $this->data);
    }

    function create()
    {
        return view('backend.admin.petsCreate');
    }

    function store(Request $request)
    {
        $name = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('public/images/', $name);
 
        $data = new Pet;
        $data->category = $request->input('category');
        $data->name = $request->input('name');
        $data->breed = $request->input('breed');
        $data->age = $request->input('age');
        $data->content = $request->input('content');
        $data->image = $name;
        $data->save();
        return redirect()->route('pet.index')->with('pets_created', 'New pet has been added successfully');
    }

    function edit($id)
    {
        $this->data['pet'] = Pet::find($id);
        return view('backend.admin.petsEdit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $name = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('public/images/', $name);

        $data = Pet::find($id);
        $data->category = $request->category;
        $data->name = $request->name;
        $data->breed = $request->breed;
        $data->age = $request->age;
        $data->content = $request->content;
        $data->image = $name;
        $data->update();
        return redirect()->route('pet.index')->with('pets_updated', 'Pet has been updated successfully!');
    }

    public function delete($id)
    {
        $data = Pet::find($id);
        $data->delete();
        return redirect()->route('pet.index')->with('pets_deleted', 'Pet has been deleted!');
    }
}
