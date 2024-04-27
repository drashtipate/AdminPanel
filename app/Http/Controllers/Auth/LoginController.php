<?php

namespace App\Http\Controllers\Auth;

use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
// use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Intervention\Support\Facades\Image; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;




class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /** index page dashboard */
     public function index()
     {
        // $totals = DB::table('users')->selectRaw('count(*) as id')->get();
        $totals = User::count();
        return view('dashboard.home', compact('totals'));
     }

    /** index page login */
    public function login()
    {
        return view('auth.login');
    }

    /** login with databases */
    public function validate_login(Request $request) 
    {
    
        #validation
            $validatedData = $request->validate([
                'email'              => 'required|email|regex:/(.*)@gmail\.com/i',
                'password'           => 'required|string|min:8',
            ]);

            // Extract email and password from validated data
                $email = $validatedData['email'];
                $password = $validatedData['password'];     

            // Check if the admin exists with the given email
                $admin = Admin::where('email', $email)->first();

                if (!$admin || !Hash::check($password, $admin->password)) {
                    return back()->withErrors([
                        'email' => 'Username or Password does not match.',
                    ])->onlyInput('email');
                }

            // If the admin is found and the password is correct, attempt to authenticate
                if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/dashboard')->with('success','You are Login successfully.!!');
                }

                // If the authentication attempt fails for any other reason
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');

                
    }

    /** logout */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/')->with('success','Logout successfully :)');
    }
        
   
            
 }

