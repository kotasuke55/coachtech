<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request){
        
        return view('index');
    }
    public function post(ClientRequest $request)
    {
        $items = $request->all();
        return view('confirm',$items);
    }
    public function regist(Request $request)
    {
        $action = $request->input('action');
        $inputs = $request->except('action');
        if($action !== 'submit'){
            return redirect('/')->withInput($inputs);
        }else{
            $this->validate($request,Contact::$rules);
            $form = $request->all();
            Contact::create($form);
            return view('thanks');
        }
    }
    public function management(Request $request)
        {
            $query = Contact::query();
            $fullname = $request->input('fullname');
            $gender = $request->input('gender');
            $email = $request->input('email');
            $from = $request->input('from');
            $until = $request->input('until');
            
            if(!empty($fullname)){
                $query->where('fullname','LIKE',"%{$request->fullname}%")->get();
            }
            if(!empty($email)){
                $query->where('email','LIKE',"%{$request->email}%")->get();
            }
            if(!empty($gender)){
                $query->where('gender','LIKE',"%{$request->gender}%")->get();
            }
            if(!empty($from) && !empty($until)){
                $query->whereDate('created_at', '>=', $from)
                ->whereDate('created_at', '<=', $until);
            }
            $items = $query->paginate(10);
            
            return view('management',compact('items','fullname','email','gender'));
        }
        public function remove(Request $request)
        {
            Contact::find($request->id)->delete();
            return redirect('management');
        }
        
}
