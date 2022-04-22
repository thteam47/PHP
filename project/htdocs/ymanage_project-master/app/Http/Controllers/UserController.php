<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendEmailVerify;
use App\Models\ActivationCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function postRegister(RegisterRequest $request)
    {
        DB::transaction(function () use($request){
            try{
                $user = new User();
                $user->name = $request->name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                $this->sendActivationCode();
            } catch (Exception $e){
                DB::rollBack();
            }
        });

    }

    public function getLogin()
    {
        if(Auth::check()){
            return redirect('manage');
        }else{
            return view('auth.login');
        }

    }

    public function verification(){
        return view('auth.verify_email');
    }

    public function sendActivationCode(){
        $otp = rand(100000, 999999);

        SendEmailVerify::dispatch($otp, Auth::user()->email);
        $activation_model = new ActivationCode();
        $activation_model->user_id = Auth::user()->id;
        $activation_model->activation_code = $otp;
        $activation_model->save();
        return Redirect::back();
    }

    public function verifyEmail(Request $request){
        $otp_user = ActivationCode::where('user_id', Auth::user()->id)->first()->activation_code;
        if($otp_user == $request->otp){
            $update_user = User::find(Auth::user()->id);
            $update_user->email_verified_at = date('Y-m-d H:i:s');
            $update_user->save();

            ActivationCode::where('user_id', Auth::user()->id)->delete();

            return redirect('manage');
        }else{
            return redirect('verify/email');
        }
    }

    public function postLogin(LoginRequest $request)
    {
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            Auth::attempt(['email' => $request->username, 'password' => $request->password]);
        } else {
            Auth::attempt(['username' => $request->username, 'password' => $request->password]);
        }

        if (Auth::check()) {
            return redirect('manage');
        } else {
            return view('auth.login',[
                'errorfail' => 'Tài khoản hoặc mật khẩu chưa đúng'
            ]);
        }
    }

    public function forgetPassword()
    {

    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
