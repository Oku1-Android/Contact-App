<?php

namespace App\Http\Controllers;
use App\Http\Resources\ContactsCollection;
use App\Http\Resources\pagination;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Contacts;
use Illuminate\Validation\Validator;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
     /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Show all application contacts.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request ){



        //$user = Auth::user();
        $user = auth()->user();

            //var_dump($user);
            $companies = $user->companies()->orderBy('name')->pluck('name','id')->prepend('All Companies', '');

           // \DB::enableQueryLog();

            $Contacts = $user->contacts()->LatestFirst()->paginate(10);
            //dd(\DB::getQueryLog());

            return view('contacts.index', compact('Contacts', 'companies' ));
    }

    public function create(){
        $contact = new Contacts();

        $companies = Company::orderBy('name')->pluck('name','id')->prepend('All Companies', '');

        //$contact = Contacts::find($id);
        //return view('/contacts.create', compact('companies', 'contact'));
        return view('/contacts.create', compact('companies', 'contact'));
    }

     public function store(Request $request){
        //dd($request->segment());
        $request->validate([

            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            //to chect if company id exist in table companies.
            'company_id'=>'required|exists:companies,id'
        ]);
        Contacts::create($request->all());

        return redirect()->route('contacts.index')->with('message', 'Contact successfully saved');
     }

     public function edit($id){

       // $contact = Contacts::find($id);
       $contact = Contacts::findOrFail($id);

        $companies = Company::orderBy('name')->pluck('name','id')->prepend('All Companies', '');
       // return view('contacts.edit', compact('contact'));
        return view('/contacts.edit')->with('contact', $contact)->with('companies', $companies);

     }

    //  public function update($id, Request $request){
    //     $request->validate([

    //         'first_name'=>'required',
    //         'last_name'=>'required',
    //         'phone'=>'required',
    //         'email'=>'required|email',
    //         'address'=>'required',
    //         //to check if company id exist in table companies.
    //         'company_id'=>'required|exists:companies,id'
    //     ]);
    //     Contacts::create($request->all());

    //     return redirect()->route('contacts.index')->with('message', 'Contact added successfully');

    //  }


        public function show($id){


            $contact = Contacts::findOrFail($id);

        return view('contacts.show', compact('contact', $contact));

        //  return view('contacts.show')->with('contact', $contact);o
        }


        public function destroy($id){
         $contact = Contacts::findOrFail($id);
         $contact->delete();

         return back()->with('message', "Contact has been deleted successfully");
        }
}
