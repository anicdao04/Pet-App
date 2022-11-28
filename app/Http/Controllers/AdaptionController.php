<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdoptionRequest;
use App\Models\Pet;
use DB;

class AdaptionController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $this->data['adopt_count'] = AdoptionRequest::count();
        $this->data['todays_count'] = AdoptionRequest::where('date_created', '=', $today)->count();
        $this->data['successful_count'] = AdoptionRequest::where('status', '=', '1')->count();
        $this->data['adaptors'] = AdoptionRequest::orderBy('date_created', 'desc')->paginate(5);
        return view('backend.admin.requestIndex', $this->data);
    }
    
    public function preview($id)
    {
        $this->data['adaptor'] = AdoptionRequest::find($id);
        return view('backend.admin.requestPreview', $this->data);
    }

    public function delete($id)
    {
        $data = AdoptionRequest::find($id);
        $data->delete();
        return redirect()->route('request.index')->with('pets_deleted', 'Pet has been deleted!');
    }

    public function approve(Request $request, $id)
    {
        $data = AdoptionRequest::find($id);
        $data->status = 1;
        $data->update();

        $pet_id = $data['pet_id'];
        $pet = Pet::find($pet_id);
        $pet->status = 1;
        $pet->update();

        return redirect()->route('request.index')->with('pets_approve', 'Pet has been approved successfully!');
    }

    public function disapprove($id)
    {
        $data = AdoptionRequest::find($id);
        $data->status = 0;
        $data->update();

        $pet_id = $data['pet_id'];
        $pet = Pet::find($pet_id);
        $pet->status = 0;
        $pet->update();

        return redirect()->route('request.index')->with('pets_disapprove', 'Pet has been disapproved successfully!');
    }

}
