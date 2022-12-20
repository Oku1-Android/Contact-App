<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function index(){

        $Contacts = Contacts::all();

        return view('contacts.index', compact('Contacts'));
    }

    public function create(){

        return view('/contacts.create');
    }

    public function show($id){

        $contact = Company::find($id);

        return view('contacts.show', compact('contact'));


    }


}
