<?php

namespace App\Actions;

use App\Mail\RegisterMail;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;

class RegisterAction{
    use ResponseTrait;

    public function handle(array $data)
    {

        $user = User::create([
            "username" => $data['username'],
            "email" => $data['email'],
            "password" => bcrypt($data['password']),
            "teacher" => $data['teacher'],
            "gender" => $data['gender'],
            "country" => $data['country'],
        ]);
    
        $str = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        $str = str_shuffle($str);
        $str = substr($str, 0, 15);

        $data['str'] = $str;

        DB::table('tempusers')->insert([
            "username" => $data['username'],
            "email" => $data['email'],
            "teacher" => $data['teacher'],
            "password" => $data['password'],
            "token" => $data['str'],
        ]);

        DB::table('email')->insert([
            "username" => $data['username'],
            "email" => $data['email'],
            "sent" => 'no'
        ]);

        DB::table('login_details')->insert([
            "username" => $data['username'],
            "user_id" => $user->id,
            "last_activity" => 0,
            "to_id" => 0,
        ]);

        $details = [
            'username' => $data['username'],
            'email' => $data['email'],
            'url' =>  "http://teacherx.org/activate_account.php?key='.$str.'"
        ];
       
        \Mail::to($data['email'])->send(new RegisterMail($details));
       
        return $this->success('A link have been sent to your email, click the link to proceed');
    }
}