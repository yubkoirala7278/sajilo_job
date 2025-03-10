<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        if ($data['role'] === 'employee') {
            $rules['mobile_no'] = ['required', 'string', 'max:15'];
        } elseif ($data['role'] === 'employer') {
            $rules['industry'] = ['nullable', 'string', 'max:255'];
        }

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($data['role'] === 'employee') {
            Employee::create([
                'user_id' => $user->id,
                'mobile_no' => $data['mobile_no'],
            ]);
        } else {
            Employer::create([
                'user_id' => $user->id,
                'mobile_no' => $data['mobile_no'],
            ]);
        }
        $user->assignRole($data['role']);

        // Return the User instance, not a JSON response.
        return $user;
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // Log the user in using the actual User instance.
        $this->guard()->login($user);

        if ($request->ajax()) {
            return response()->json([
                'message' => 'User created and logged in successfully',
                'user' => $user
            ]);
        }

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
