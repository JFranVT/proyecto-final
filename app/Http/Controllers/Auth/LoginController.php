<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/panel'; // Cambia a tu panel principal

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // Usar Nombre_Usuario como campo de usuario
    public function username()
    {
        return 'Nombre_Usuario';
    }

    // Usar Contrasena como campo de contraseña
    protected function credentials(Request $request)
    {
        return [
            'Nombre_Usuario' => $request->get('Nombre_Usuario'),
            'Contrasena' => $request->get('Contrasena'),
        ];
    }

    protected function attemptLogin(Request $request)
    {
        $user = \App\Models\Usuario::where('Nombre_Usuario', $request->Nombre_Usuario)->first();

        if ($user && $user->Contrasena === $request->Contrasena) {
            \Auth::login($user);
            return true;
        }
        return false;
    }

    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'Nombre_Usuario' => 'required|string',
            'Contrasena' => 'required|string',
        ]);

        $user = \App\Models\Usuario::where('Nombre_Usuario', $request->Nombre_Usuario)->first();

        if ($user && $user->Contrasena === $request->Contrasena) {
            Auth::login($user);
            return redirect()->intended('panel');
        }

        return back()->withErrors(['Nombre_Usuario' => 'Usuario o contraseña incorrectos']);
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
