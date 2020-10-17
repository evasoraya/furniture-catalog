<?php

namespace App\Http\Controllers;

use Airtable;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return Airtable::table('users')->all();
    }
    public function findByUsername($username)
    {
        $user = Airtable::table('users')->where('username', '=',$username)->get();

        return response()->json($user, 200);
    }
    public function create(Request $request)
    {
        $first_name = $request->has('first_name') ? $request->get('first_name') : '';
        $last_name = $request->has('last_name') ? $request->get('last_name') : '';
        $username = $request->has('username') ? $request->get('username') : '';
        $password = $request->has('password') ? $request->get('password') : '12345';
        $email = $request->has('email') ? $request->get('email') : '';

        error_log(strtoupper($first_name));
       $user = Airtable::table('users')->where('username', '=',$username)->get();

        if(count($user["records"]) > 0){
            return response()->json("User Already Exist", 200);
        }

        Airtable::table('users')->create([
            'First Name' => strtolower(strtoupper($first_name)),
            'Last Name' => strtolower(strtoupper($last_name)),
            'username' => strtolower(strtoupper($username)),
            'Password' =>  Crypt::encryptString($password),
            'email' => strtolower(strtoupper($email))
        ]);

        return response()->json([
            'message' => 'Create success'
        ], 200);
    }
    public function login(Request $request)
    {
        $session = new Session();

        $username = $request->get('username');
        $password = $request->get('password');

        $user = Airtable::table('users')->where('username', '=',$username)->get();

        if (count($user["records"]) > 0) {

            if (strtolower(strtoupper($password)) == Crypt::decryptString($user["records"][0]["fields"]['Password'])) {
                $session->set('loggedIn', true);
                $session->set('loggedInUser', strtoupper($username));

                return response()->json(['login' => true, 'msg' => 'Success'], 200);
            } else
                return response()->json(['login' => false, 'msg' => 'Something went wrong, check your credentials'], 200);
        } else
            return response()->json(['login' => false, 'msg' => 'Something went wrong, check your credentials'], 200);
    }
    public function logout(Request $request)
    {
        $session = new Session();
        if ($session->get('loggedIn')){
            $session->set('loggedIn', false);
            $session->set('loggedInUser', '');
        }
        return response()->json(['login' => false, 'user' => null, 'msg' => 'Success'], 200);
    }
    public function isLogged()
    {
        $session = new Session();
        $user =  Airtable::table('users')->where('username', '=',strtolower(strtoupper($session->get('loggedInUser'))))->get();

        if ($session->get('loggedIn'))
            return response()->json(['login' => true, 'user' => $user , 'msg' => 'Success'], 200);

        return response()->json(['login' => false, 'msg' => 'Not Logged In'], 200);
    }

}
