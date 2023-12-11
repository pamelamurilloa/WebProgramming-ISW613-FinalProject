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
        // $response = $mailController->sendMail($input['email']);

        $response = $mailController->sendMail('proyectoprogra084@gmail.com');


        User::create($input);
        return redirect('login');
    }
}
