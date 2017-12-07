<?php

namespace App\Http\Controllers;

use App\Department;
use App\Message;
use App\Responce;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{

    public function errorLogin(){

        return view('loginError')
            ->with('errorEmail', 'Invalid Email or Password')
            ->with('invalid', 'invalid');
    }

    public function signin(){

        return view('login')
            ->with('errorEmail', 'Invalid Email Address')
            ->with('errorPassword', '#');

    }

    public function login(Request $request){
        $user=User::all();
        foreach ($user as $use) {
            if ($use->email == $request->email && $use->password == $request->password) {
                $user = DB::table('users')->select('id', 'dep_id')->where('email', '=', $request->email)
                    ->where('password', '=', $request->password)
                    ->get();
                if($use->is_admin==1){
                    $dep=Department::all();
                    return View('admin',['dep'=>$dep],['name'=>$use->name])
                    ->with('id', $use->id);
                }
                else{
                    $allAnnouncements = DB::table('messages')
                        ->select('id')
                        ->where('dep_id', '=', $use->dep_id)
                        ->get();
                    $allResponces = DB::table('responces')
                        ->select('message_id')
                        ->where('user_id', '=', $use->id)
                        ->get();
                    $all_message = array();
                    for ($i=0; $i<$allAnnouncements->count(); $i++) { 
                        array_push($all_message, $allAnnouncements[$i]->id);
                    }
                    $all_responses = array();
                    for($i=0; $i<$allResponces->count(); $i++){
                        array_push($all_responses, $allResponces[$i]->message_id);
                    }
                    $new_announcement = array_diff($all_message, $all_responses);
                    $badge_array = count($new_announcement);
                    if($badge_array>0){
                        return View('client',['dep_id'=>$use->dep_id],['id'=>$use->id])
                        ->with('name', $use->name)
                        ->with('status', $badge_array)
                        ->with('badgeName', 'new badge');
                    }else{
                        $badge_array = 0;
                        return View('client',['dep_id'=>$use->dep_id],['id'=>$use->id])
                        ->with('name', $use->name)
                        ->with('status', $badge_array)
                        ->with('badgeName', 'badge');                        
                    }
                }
            }

        }
        return redirect()->route('loginError');
    }


    public function admin($id){
        $user = User::find($id);
        return view('admin')
         ->with('name', $user->name)
         ->with('id', $user->id)
         ->with('dep', $user->dep_id);
    }

    
    public function client($id){
        $user = User::find($id);
                    $allAnnouncements = DB::table('messages')
                        ->select('id')
                        ->where('dep_id', '=', $user->dep_id)
                        ->get();
                    $allResponces = DB::table('responces')
                        ->select('message_id')
                        ->where('user_id', '=', $user->id)
                        ->get();
                    $all_message = array();
                    for ($i=0; $i<$allAnnouncements->count(); $i++) { 
                        array_push($all_message, $allAnnouncements[$i]->id);
                    }
                    $all_responses = array();
                    for($i=0; $i<$allResponces->count(); $i++){
                        array_push($all_responses, $allResponces[$i]->message_id);
                    }
                    $new_announcement = array_diff($all_message, $all_responses);

                    $badge_array = count($new_announcement);

                    if($badge_array>0){
                        return View('client',['dep_id'=>$user->dep_id],['id'=>$user->id])
                        ->with('name', $user->name)
                        ->with('status', $badge_array)
                        ->with('badgeName', 'new badge');

                    }else{
                        $badge_array = 0;
                        return view('client')
                        ->with('name', $user->name)
                        ->with('id', $user->id)
                        ->with('dep_id', $user->dep_id)
                        ->with('status', $badge_array)
                        ->with('badgeName', 'badge');

                    }

    }

    public function archive($id){

            $user = User::find($id);
                    $allAnnouncements = DB::table('messages')
                        ->select('id')
                        ->where('dep_id', '=', $user->dep_id)
                        ->get();

                    $allResponces = DB::table('responces')
                        ->select('message_id')
                        ->where('user_id', '=', $user->id)
                        ->get();

                    $all_message = array();
                    for ($i=0; $i<$allAnnouncements->count(); $i++) { 
                        array_push($all_message, $allAnnouncements[$i]->id);
                    }


                    $all_responses = array();
                    for($i=0; $i<$allResponces->count(); $i++){
                        array_push($all_responses, $allResponces[$i]->message_id);
                    }
                    
                    $new_announcement = array_diff($all_message, $all_responses);

                    $badge_array = count($new_announcement);

                    if($badge_array>0){
                        $readAnnouncement = DB::table('messages')
                            ->select('title', 'text', 'created_at')
                            ->wherein('id', $all_responses)
                            ->get();

                            $unreadAnnouncement = DB::table('messages')
                            ->select('title', 'text', 'created_at')
                            ->wherein('id', $new_announcement)
                            ->get();    

                        return View('archive',['dep_id'=>$user->dep_id],['id'=>$user->id])
                        ->with('name', $user->name)
                        ->with('status', $badge_array)
                        ->with('badgeName', 'new badge')
                        ->with('read', $readAnnouncement)
                        ->with('unread', $unreadAnnouncement);

                    }else{

                        $readAnnouncement = DB::table('messages')
                            ->select('title', 'text', 'created_at')
                            ->wherein('id', $all_responses)
                            ->get();

                        $unreadAnnouncement = DB::table('messages')
                            ->select('title', 'text', 'created_at')
                            ->wherein('id', $new_announcement)
                            ->get();  

                        $badge_array = 0;
                        return View('archive',['dep_id'=>$user->dep_id],['id'=>$user->id])
                        ->with('name', $user->name)
                        ->with('status', $badge_array)
                        ->with('badgeName', 'badge')
                        ->with('read', $readAnnouncement)
                        ->with('unread', $unreadAnnouncement);                        
                    }
    }
    
    public function publish($id){
           
        return view('publish')
         ->with('user', User::find($id))
         ->with('dep', Department::all());
    }

    public function reg_view($id){
        $dep=Department::all();
        return view('register',['dep'=>$dep])
        ->with('user', User::find($id));


    }
    public function register(Request $request, $id){
        $use = User::find($id);
        $user=new User();

        $user->name = $request->firstName.' '.$request->lastName;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->dep_id = $request->department_id;
        if($request->department_id == 1){
            $user->is_admin = 1;
            $user->save();
        }else{
            $user->save();
        }

       return view('status')
        ->with('id', $id)
        ->with('name', $use->name)
        ->with('modalAction', 'Added!')
        ->with('success', 'An Employee Has Been Successsfuly Added!')
        ->with('url_announcement', url('registration_view', $id))
        ->with('btn1', 'Add Another Employee')
        ->with('url_home', url('admin', $id))
        ->with('btn2', 'Go Home');


    }

    public function send_message(Request $request, $id){
        $use = User::find($id);
        $user=new Message();

        $user->title = $request->title;
        $user->text = $request->message;
        $user->dep_id = $request->department_id;
        $user->save();


        return view('status')
        ->with('id', $id)
        ->with('name', $use->name)
        ->with('modalAction', 'Published!')
        ->with('success', 'Your Announcement has been successsfuly published!')
        ->with('url_announcement', url('publish', $id))
        ->with('btn1', 'Make Another Announcement')
        ->with('url_home', url('admin', $id))
        ->with('btn2', 'Go Home');


    }

    public function get_message($dep_id,$id){

        $use = User::find($id);  

        $allAnnouncements = DB::table('messages')
            ->select('id')
            ->where('dep_id', '=', $dep_id)
            ->get();

        $allResponces = DB::table('responces')
            ->select('message_id')
            ->where('user_id', '=', $id)
            ->get();

        $all_message = array();
        for ($i=0; $i<$allAnnouncements->count(); $i++) { 
            array_push($all_message, $allAnnouncements[$i]->id);
        }


        $all_responses = array();
        for($i=0; $i<$allResponces->count(); $i++){
            array_push($all_responses, $allResponces[$i]->message_id);
        }
        
        $new_announcement = array_diff($all_message, $all_responses);

        $new_count = count($new_announcement);

        $newAnnouncements = DB::table('messages')->select('id', 'text', 'dep_id', 'created_at', 'title')
            ->whereIn('id', $new_announcement)
            ->orderBy('id', 'desc')
            ->get();

        if($new_count>0){
            return view('show_message')
            ->with('name', $use->name)
            ->with('newAnnouncements', $newAnnouncements)
            ->with('user_id', $id)
            ->with('dep_id', $dep_id)
            ->with('new_count', $new_count);

            unset($all_message);
            unset($all_responses);
        }else{
            return view('show_message')
            ->with('name', $use->name)
            ->with('newAnnouncements', $newAnnouncements)
            ->with('user_id', $id)
            ->with('dep_id', $dep_id)
            ->with('noNew', 'You Have No New Announcements!')
            ->with('new_count', 0);

            unset($all_message);
            unset($all_responses);
        }
    }

    public function send_response(Request $request){


     $user=User::find($request->user_id);
     $dep=Department::find($request->dep_id);


        $user_name=$user->name;
        $dep_name=$dep->name;

        $resp= new Responce();

        $resp->responce=$request->responce;
        $resp->user_id=$request->user_id;
        $resp->message_id=$request->message_id;
        $resp->user_name=$user_name;
        $resp->dep_name=$dep_name;

        $resp->save();

        return redirect()->back();
      
    }

    public function responseQuery($id){

        $user = User::find($id);

        $announcement = message::all();


        return view('responseQuery')
            ->with('user', $user)
            ->with('announcement', $announcement);

    }

    public function sortResponse(Request $request, $id){

        $adminInfo = User::find($id);
        $m_id = $request->id;
        $m_info = message::find($m_id);


        $find_dep = DB::table('messages')
            ->select('dep_id')
            ->where('id', '=', $m_id)
            ->get();
        foreach ($find_dep as $dep_find) {
            $dep = $dep_find->dep_id;
            }    
       
        $findUser = array();
        $find_user = DB::table('users')
            ->select('id')    
            ->where('dep_id', '=', $dep)
            ->get();
        foreach ($find_user as $user_find) {
                array_push($findUser, $user_find->id);
            }    

        $readUsers = array();

        $read_users = DB::table('responces')
            ->select('user_id')
            ->where('message_id', '=', $m_id)
            ->get();
        foreach ($read_users as $read) {
            array_push($readUsers, $read->user_id);
        }

        $unreadUsers = array_diff($findUser, $readUsers);

        $readUser_info = DB::table('users')
            ->select('name')
            ->wherein('id', $readUsers)
            ->get();
        $unreadUsers_info = DB::table('users')
            ->select('name')
            ->wherein('id', $unreadUsers)
            ->get();

        return view('response')
                ->with('readUsers', $readUser_info)
                ->with('unreadUsers', $unreadUsers_info)
                ->with('adminInfo', $adminInfo)
                ->with('annInfo', $m_info)
                ->with('depInfo', Department::find($dep));


        

    }

    public function logout()
    {
        return redirect('/'); 
    }


}