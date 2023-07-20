<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use DB;
class UserController extends Controller
{
    public function index(){
        $users=User::orderBy('id','DESC')->paginate(2);
        return view('user',['users'=>$users]);
    }

    public function status_update($id){
        $userStatus = User::find($id)->status;
        User::where('id',$id)->update([
            'status' => $userStatus == 'active' ? 'deactive' : 'active' 
        ]);
        return back()->with('success','Status updated Successfully');
        
    }
}
