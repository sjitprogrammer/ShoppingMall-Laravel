<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_login()
    {
       return view('user.auth.signin');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if(Auth::attempt(['username' => $username, 'password' => $password])){
            $user = User::where('username',$username)->first();

            return redirect('profile/'.$user['id'])->with(['user'=>$user]);
        }else{
            return redirect()->back()->withInput()->withErrors(['error_incorrect'=>'Username or password is incorrect!']);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
       return view('user.auth.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_user(Request $request)
    {
        if($request->password!=$request->confirm_password) return redirect()->back()->withInput()->withErrors(['error_pass'=>'password and confirm password not match please try again!!']);
        
        $check = User::CheckUser($request->username);

        if($check) return redirect()->back()->withInput()->withErrors(['error_username'=>'Username is duplicate!']);
        
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->save();

        return redirect('products/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile_user($id)
    {
        $user = User::find($id);

        if($user==null) return redirect('login');

        return view('user.profile',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
