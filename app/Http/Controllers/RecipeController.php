<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menuchild;
use App\Models\Menuparent;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {

        $this->data['parents'] = Menuparent::all();
        $this->data['menu'] = Menuchild::where('status_availability', '=', '1')->orderBy('name', 'asc')->get();
        return view('backend.admin.recipe_list', $this->data);
    }

    public function recipe_id($id)
    {
        $this->data['recipe_count'] = Recipe::where('menu_id','=', $id)->count();
        $this->data['recipe'] = Menuchild::find($id);
        $this->data['parents'] = Menuparent::all();
        $this->data['recipe_id'] = Menuchild::all();
        $this->data['recipes'] = Recipe::where('menu_id','=', $id)->get();
        return view('backend.admin.recipe_update', $this->data);
    }

    public function register()
    {
        $menu_id = $_GET['menu_id'];
        $category_id = $_GET['category_id'];
        $qty = $_GET['qty'];
        $uom = $_GET['uom'];
        $description = $_GET['description'];

        $data = new Recipe;
        $data->menu_id = $menu_id;
        $data->category_id = $category_id;
        $data->qty = $qty;
        $data->measurement = $uom;
        $data->description = $description;
        $data->save();

        $statusrecipe = Menuchild::find($menu_id);
        $statusrecipe->status_recipe = 1;
        $statusrecipe->update();

        return redirect()->to('admin/recipe/'.$menu_id);
        // return redirect()->route('recipe.index');
    }
}
