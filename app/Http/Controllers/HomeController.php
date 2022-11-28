<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Trivia;
use App\Models\AdoptionRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data['pets'] = Pet::where('status', '=', '0')->get();
        $this->data['adopted'] = AdoptionRequest::where('status', '=', '1')->get();
        return view('main', $this->data);
    }

    public function pet($id)
    {
        $this->data['pet'] = Pet::find($id);
        return view('pet', $this->data);
    }

    public function adopt()
    {
        $this->data['pets'] = Pet::where('status', '=', '0')->get();
        return view('adopt', $this->data);
    }

    public function trivia()
    {
        $this->data['trivias'] = Trivia::get();
        return view('trivia', $this->data);
    }
}
