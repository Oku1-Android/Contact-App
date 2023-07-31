<?php

namespace App\Http\Controllers;
use App\Http\Resources\ContactsCollection;
use App\Http\Resources\pagination;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
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

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(Request $request ){



            $companies = Company::userCompanies();
            //var_dump($companies);

        //    dd($companies);
           // \DB::enableQueryLog();
           $user = Auth::user();

           $Contacts = $user->contacts()->LatestFirst()->paginate(10);
          // dd($Contacts);

          if (Auth::check()) {
            // The user is logged in...
            return view('contacts.index', compact('Contacts', 'companies' ));
        }

    }

    public function create(){
        $contact = new Contacts();

        //Retreiving companies
       $companies = Company::orderBy('name')->pluck('name','id')->prepend('All Companies', '');
       //$companies = $this->userCompanies();
        //$contact = Contacts::find($id);
        return view('/contacts.create', compact('companies', 'contact'));
    }


     public function store(ContactRequest $request){
        //dd($request->segment());

       // $request->validate($this->validation());

        Contacts::create($request->all()+['user_id'=>auth()->id()]);

        return redirect()->route('contacts.index')->with('message', 'Contact successfully saved');

     }

    //  protected function Validation(){
    //      return[
    //     'first_name'=>'required',
    //      'last_name'=>'required',
    //      'phone'=>'required',
    //      'email'=>'required|email',
    //      'address'=>'required',
    //      //to chect if company id exist in table companies.
    //      'company_id'=>'required|exists:companies,id'
    //  ];
    //  }

    

     public function edit($id){

       // $contact = Contacts::find($id);
        $contact = Contacts::findOrFail($id);
        $companies = Company::userCompanies();
        return view('/contacts.edit')->with('contact', $contact)->with('companies', $companies);

     }

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
