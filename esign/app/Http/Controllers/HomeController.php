<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setSession();
        return view('home');
    }
    public function myfiles()
    {
        $data = array();
        $dropboxToken = Session::get('dropboxToken');
        if($dropboxToken){
            $data['dropboxToken'] = 1;
        }
        $driveToken = Session::get('driveToken');
        if($driveToken){
            $data['driveToken'] = 1;
        }
        $driveToken = Session::get('isEnabledDropboxToken');
        if($driveToken){
            $data['isEnabledDropboxToken'] = 1;
        }
        $driveToken = Session::get('isEnabledDriveToken');
        if($driveToken){
            $data['isEnabledDriveToken'] = 1;
        }
        return view('myfiles',array('session_data'=>$data));
    }
    public function setSession(){
        $user = Auth::user();
        $userId = $user->id;
        $cloudTokens = \App\Models\UserCloudTokens::where('user_id',$userId)->get();
        $cloudTokens = $cloudTokens->toArray();
        foreach($cloudTokens as $token){
            if($token['type']=='Dropbox'){
                Session::put('dropboxToken',$token['access_token']);
                Session::put('isEnabledDropboxToken',$token['is_enabled']);
            }else{
                Session::put('driveToken',$token['access_token']);
                Session::put('isEnabledDriveToken',$token['is_enabled']);
            }
        }
    }
}
