<?php
 
namespace App\Http\Controllers\Auth;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    public function mostrarLogin(){
        return view('pages-login-2');
    }

    protected function validarLogin(Request $request){
        $this->validate($request,[
            'nombre_usuario' => 'required|string',
            'password' => 'required|string'
        ]);
 
    }
 
    public function login(Request $request){
        $this->validarLogin($request);        
 
        if (Auth::attempt(['nombre_usuario' => $request->nombre_usuario,'password' => $request->password])){
            return redirect()->route('main');
        }
         return back()
         ->withErrors(['nombre_usuario' => trans('auth.failed')])->withInput(request(['nombre_usuario']));
    }
 
    
 
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
