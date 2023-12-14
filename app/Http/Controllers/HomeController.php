<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\support\Facades\Redirect;
use Session;

Session_start();

class HomeController extends Controller
{
    public function index()
    {
        $totalteacher=Teacher::count();
        $totalstudent=Student::count();
        $teachers=Teacher::paginate(4);
        return view('welcome', compact('totalteacher','totalstudent','teachers'));
    }
    public function AboutUs()
    {
        return view('aboutus');
    }

    // <----Contact Info---->

    public function contactus()
    {
        return view('contactus');
    }

    public function contact_info(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
    ]);
     // Insert data into the database
     FacadesDB::table('contactinfo')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,

    //  contactinfo::insert([
    //     'name' => $request->name,
    //     'email' => $request->email,
    //     'subject' => $request->subject,
    //     'message' => $request->message,
        ]);
        return Redirect::to('cont')->with('message', "Your Fedback Send");
    }
    public function addsubscribe(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
    ]);
    FacadesDB::table('subscribe')->insert([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return Redirect::to('/');
    }

    public function addrequestquote(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'course_name' => 'required',
            'phone' => 'required',

    ]);

    FacadesDB::table('requestquote')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'course_name' => $request->course_name,
            'phone' => $request->phone,
        ]);
        return Redirect::to('/');
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'course_name' => 'required',
            'phone' => 'required',

    ]);

        FacadesDB::table('requestquote')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'course_name' => $request->course_name,
            'phone' => $request->phone,
        ]);
        return Redirect::to('/');
    }
        // <----Admin-iogin---->
        public function admin_login()
        {
            return view('admin.admin_login');
        }

        public function Deparment_ce()
        {
            return view('deparmentce');
        }
        public function Deparment_gd()
        {
            return view('deparmentgd');
        }

}
