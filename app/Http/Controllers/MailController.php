<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\SendMail;
use App\Models\User;
class MailController extends Controller
{
    public function getContactMail(){
        return view('pages.lienhe');
    }

    public function postContactMail(Request $req){
        $email=$req->email;
        //validate

        // kiểm tra có user có email như vậy không
        $user=User::where('email',$email)->get();
        if($user->count()!=0){
        $inp = $req->input('email');
        $name = $req->input('ten');
        $msg = $req->input('tinnhan');
        $data = [
            'title' => 'Thư phản hồi:',
            'body' => 'Cảm ơn bạn ' . $name . ' đã phản hồi, chúng tôi sẽ liên lạc lại bạn sớm nhất có thể!',
            'content' => 'Nội Dung phản hồi: ' . $msg
        ];
        Mail::to($req->user())->cc($inp)->bcc($inp)->send(New SendMail($data));
        Session::flash('message', 'Send email successfully!');
        return view('pages.lienhe');
    }
    else {
        return redirect()->route('getContactMail')->with('message','Your email is not right');
}
}}
