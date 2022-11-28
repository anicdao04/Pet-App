<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trivia;

class TriviaController extends Controller
{
    public function index()
    {
        $this->data['trivia_count'] = Trivia::count();
        $this->data['trivias'] = Trivia::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.admin.triviaIndex', $this->data);
    }

    public function create()
    {
        return view('backend.admin.triviaCreate');
    }

    public function store(Request $request)
    {
        $date_created = date('Y-m-d');

        $data = new Trivia;
        $data->category_id = $request->input('category_id');
        $data->title = $request->input('header');
        $data->description = $request->input('content');
        $data->date_created = $date_created;
        $data->save();
        return redirect()->route('trivia.index')->with('trivias_created', 'New trivia has been added successfully');
    }

    public function edit($id)
    {
        $this->data['trivia'] = Trivia::find($id);
        return view('backend.admin.triviaEdit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $data = Trivia::find($id);
        $data->category = $request->category;
        $data->title = $request->header;
        $data->description = $request->description;
        $data->update();
        return redirect()->route('trivia.index')->with('trivias_updated', 'Trivia has been updated successfully!');
    }

    public function delete($id)
    {
        $data = Trivia::find($id);
        $data->delete();
        return redirect()->route('trivia.index')->with('trivias_deleted', 'Trivia has been deleted!');
    }

}
