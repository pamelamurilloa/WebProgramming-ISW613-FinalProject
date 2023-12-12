<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Mail;
use App\Services\MailService;


class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request->input('password'));

        $mailController = new MailController();
        $response = $mailController->sendMail($input['email']);


        User::create($input);
        return redirect('login');
    }

    public function changeAccess() {
        $user = User::find(Auth::user()->id);

        if ($user->public == 1) {
            $user->public = 0;
        } else {
            $user->public = 1;
        }

        $user->save();
        return redirect(route('news-sources.index'));
    }


}
