<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $user = $this->user;
        return view('feedback.feedback', ['user' => $user]);
    }

    public function sendFeedBack(Request $request)
    {
        $data = $request->all();

        Mail::send('email.send', $data, function($message) use($request){
            $message->from('feedback@artisansw.com.br');
            $message->to('feedback@artisansw.com.br', 'OrçaMelhor')->subject('Novo feedback de usuário');
        });
        return response(['msg' => 'Mensagem enviada com sucesso!', 'status' => 'ok']);
    }
}
