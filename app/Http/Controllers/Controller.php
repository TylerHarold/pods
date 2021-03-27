<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\Pod\PodUser;
use App\Models\User;
use App\Models\Pod\Pod;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $viewParams;

    public function index() {
        if (Auth::check()) return Redirect::to('/home');
        else return view('index');
    }

    public function viewLogin() {
        return view('login');
    }

    public function viewRegister() {
        return view('register');
    }

    public function about() {
        return view('about');
    }

    public function home() {
        $this->viewParams['pods'] = Auth::user()->pods();
        return view('home')->with($this->viewParams);
    }

    public function viewPod($id) {
        $this->viewParams['pod'] = Pod::find($id);
        return view('pod')->with($this->viewParams);
    }

    public function profile($username = null) {
        if ($username != null) $this->viewParams['user'] = User::where('username', $username)->first();
        else $this->viewParams['user'] = Auth::user();

        return view('profile')->with($this->viewParams);
    }
}
