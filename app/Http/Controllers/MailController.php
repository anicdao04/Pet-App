<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicantMail;
use App\Models\AdoptionRequest;

class MailController extends Controller
{
    public function sendEmail()
    {
        $date_created = date('Y-m-d');
        $pet_id = $_GET['pet_id'];
        $pet = $_GET['pet_name'];
        $type = $_GET['pet_category'];
        $breed = $_GET['pet_breed'];
        $age = $_GET['pet_age'];
        $img = $_GET['pet_img'];

        $name = $_GET['name'];
        $address = $_GET['address'];
        $contact = $_GET['contact'];
        $email = $_GET['email'];
        $message = $_GET['message'];

        $data = new AdoptionRequest;
        $data->adopt_name = $name;
        $data->adopt_address = $address;
        $data->adopt_contact = $contact;
        $data->adopt_email = $email;
        $data->message = $message;
        $data->pet_id = $pet_id;
        $data->pet_name = $pet;
        $data->pet_category = $type;
        $data->pet_breed = $breed;
        $data->pet_age = $age;
        $data->pet_img = $img;
        $data->date_created = $date_created;
        $data->save();

        $details = [
            'applicant' => $name,
            'pet' => $pet,
            'type' => $type,
            'breed' => $breed,
        ];
        Mail::to($email)->send(new ApplicantMail($details));
        return view('notification', compact('name','pet','type','breed'));
    }
}
