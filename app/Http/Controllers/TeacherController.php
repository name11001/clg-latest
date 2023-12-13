<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Http\Requests;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;

Session_start();

class TeacherController extends Controller
{
    public function index(){
        $teacher=Teacher::count();
        $students=Student::count();
        $users=User::all();
        $subscribe=FacadesDB::table('subscribe')->count();
        $req=FacadesDB::table('requestquote')->count();
        return view('admin.dashboard', compact('teacher', 'students', 'subscribe', 'users','req'));
    }
    public function showform(){
        return view('admin.addnew');
    }
    public function addnewteacer(Request $request){
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'instructor' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
        'image.required' => 'The image field is required.',
    ]);

        //  image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('teacher_images', 'public');
        } else {
            $imagePath = null;
        }

        // Insert data into the database
        Teacher::insert([
            'name' => $request->name,
            'department' => $request->department,
            'instructor' => $request->instructor,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imagePath,
        ]);

        return redirect()->route('info')->with('message', "Teacher Profile Added Successfully!");
    }
    public function allteacherifno(){
        $teachers=Teacher::all();
        return view('admin.allteacherslist', compact('teachers'));
    }
    public function edit($id) {
        $teacher = Teacher::find($id);
        return view('admin.edit', compact('teacher'));
    }
    public function update(Request $request) {
        $teacherid = $request->teacher_id;
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'instructor' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'image.required' => 'The image field is required.',
        ]);

        $imagePath = null;

        // Handle image update
        if ($request->hasFile('image')) {

            // Delete the previous image if it exists
            $existingImagePath = Teacher::find($teacherid)->image;

            if ($existingImagePath) {
                Storage::disk('public')->delete($existingImagePath);
            }

            // Upload the new image
            $imagePath = $request->file('image')->store('teacher_images', 'public');
        }


        Teacher::find($teacherid)->update([
            'name' => $request->name,
            'department' => $request->department,
            'instructor' => $request->instructor,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imagePath,
        ]);

        return redirect()->route('info')->with('message', 'Teacher profile updated successfully');
    }
    public function destroy($id){
        Teacher::find($id)->delete();
        return redirect()->route('info')->with('message', 'Teacher Profile Deleted Successfully!');
    }



    // SUBSCRIPE***MXB**
    public function allsubscribe()
    {
        $all_subscribe_info=FacadesDB::table('subscribe')->get();
        $manage_subscribe=view('admin.subscribe')
            ->with('all_subscribe_info',$all_subscribe_info);
        return view('admin.layouts.app')
            ->with('admin.subscribe',$manage_subscribe);
    }

    public function subscribedestroy($email)
    {
        FacadesDB::table('subscribe')
            ->where('email',$email)
            ->delete();
            FacadesSession::put('message','Subscribe Deleted Successfully!');
        return Redirect::to('subscribe');
    }

    // CONTACT INFO***MXB**
    public function allcontactinfo()
    {
        $all_contactinfo_info=FacadesDB::table('contactinfo')->get();
        $manage_contactinfo=view('admin.contactinfo')
            ->with('all_contactinfo_info',$all_contactinfo_info);
        return view('admin.layouts.app')
            ->with('admin.contactinfo',$manage_contactinfo);
    }

    public function contactinfodelete($email)
    {
        FacadesDB::table('contactinfo')
            ->where('email',$email)
            ->delete();
            FacadesSession::put('message','Contact Information Deleted Successfully!');
        return Redirect::to('contactinfo');
    }
    public function requestinfo(){
       $requestinfo=FacadesDB::table('requestquote')->get();
        return view('admin.requestquote', compact('requestinfo'));
    }
    public function requestinfodelete($id)
    {
        FacadesDB::table('requestquote')
            ->where('id',$id)
            ->delete();
            FacadesSession::put('message','RequestQuote Information Deleted Successfully!');
        return Redirect::to('/admin/requestinfo');
    }


}
