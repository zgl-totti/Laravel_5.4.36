<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/27
 * Time: 11:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

    protected $redirectTo = '/index';

    public function __construct(){
        $this->middleware('guest:admin',['except'=>'logout']);
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

    }

    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ]);

    }

    public function login(Request $request){
        if($request->ajax()) {
            if (Auth::guard('admin')->attempt($request->all())) {
                return redirect()->to($this->redirectTo);
            } else {
                return redirect()->back();
            }
        }else{
            return view();
        }
    }

    public function register(Request $request){
        if($request->ajax()) {
            $this->validator($request->all())->validate();

            $this->guard('admin')->login($this->create($request->all()));

            return redirect()->intended($this->redirectTo);
        }else{
            return view();
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}