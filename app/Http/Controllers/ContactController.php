<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class ContactController extends Controller
{
    public function index(){

        return view('contacts.index');
    }

    public function create(){

        return view('/contacts.create');
    }

    public function show($id){

        $contact = Company::find($id);

        return view('contacts.show', compact('contact'));


    }


}
