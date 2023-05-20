<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request) {
        if ($request->isMethod('POST')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:' . User::$minimumPasswordLength
            ]);

            $credential = $request->only('email', 'password');

            if (Auth::attempt($credential)) {
                if (\auth()->user()->status !== User::$statusArrays[1]) {
                    Auth::logout();
                    \Illuminate\Support\Facades\Session::flush();
                    return RedirectHelper::backWithInput('<strong>Sorry!!!</strong> Your not a active user.');
                }
                return to_route('dashboard');
            }
            return RedirectHelper::backWithInput('<strong>Sorry!!!</strong> Your email or password is wrong.');
        }
//    $data['images'] = BackgroundImage::where('status',BackgroundImage::$statusArray[0])->get();
        // return $data;
        return view('admin.auth.login');
    }

    public function register(Request $request) {
        if ($request->isMethod('POST')) {
            $message = '<strong>Congratulations!!!</strong> Successfully ';
            $rules = [
                'username' => 'required|string|unique:' . with(new User)->getTable() . ',username,',
                'full_name' => 'required|string|unique:' . with(new User)->getTable() . ',username,',
                'email' => 'required|email|unique:' . with(new User)->getTable() . ',email,',
                'password' => 'required|string|min:6|confirmed',
                'phone' => 'required|regex:' . CustomHelper::PhoneNoRegex,
            ];
            $message = $message . ' Register';
            $request->validate($rules);
            $user = new User();
            try {
                $user->username = $request->username;
                $user->full_name = $request->full_name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->phone = $request->phone;
                $user->status = User::$statusArrays[1];
                if ($user->save()) {
                    $user->assignRole('Customer');
//        return RedirectHelper::routeSuccess('register.step2', $message);
                    return RedirectHelper::routeSuccess('login', $message);
                }
                return RedirectHelper::backWithInput();
            } catch (QueryException $e) {
//                return $e;
                return RedirectHelper::backWithInputFromException();
            }
        }
        return view('site.registration.register');
    }




    public function resetPassword(Request $request,$token)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where('email', $request->email)
            ->first();
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $updatePassword->email)
            ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return RedirectHelper::routeSuccess('login','<strong>Congratulations!!!</strong> Password updated.');
    }
}
