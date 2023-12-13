<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;

Session_start();

class AdminController extends Controller
{
    public function admin_login()
    {
         return view('admin.admin_login');
    }
    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);
        $result=FacadesDB::table('admin')
                ->where('admin_email',$admin_email)
                ->where('admin_password',$admin_password)
                ->first();

                if ($result){
                    FacadesSession::put('admin_name',$result->admin_name);
                    FacadesSession::put('admin_id',$result->admin_id);
                    return redirect('/dashboard');
                }else{
                    FacadesSession::put('message','Email pr password Invalid');
                    return redirect('adminlogin');
                }

    }

    public function logout()
    {

        FacadesSession::flush();
        return redirect()->route('homepage');
    }
}
