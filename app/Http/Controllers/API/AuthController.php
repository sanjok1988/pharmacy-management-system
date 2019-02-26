<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


/**
 * APIs typically use tokens to authenticate users and do not maintain session state between requests. 
 * Laravel makes API authentication a breeze using Laravel Passport, 
 * which provides a full OAuth2 server implementation for your Laravel application in a matter of minutes.
 * 
 * php artisan passport:install
 * It generates token in oauth_clients table
 * go to oauth_clients table and insert user_id manually 
 */

class AuthController extends Controller
{
    public function register()
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        return response()->json(['status' => 201]);
    }

    
/**
 * Authentication with passport
 *
 * @return json
 */
    public function login(Request $request)
    {
        // Check if a user with the specified email exists
        $user = User::whereEmail(request('username'))->first();
        
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
                'status' => 'error'
            ], 422);
        } 

        // If a user with the email was found - check if the specified password
        // belongs to this user
        if (!Hash::check(request('password'), $user->password)) {
            return response()->json([
                'message' => 'Wrong email or password',
                'status' => 'wrong password'
            ], 422);
        }else {
            $role = $user->roles->pluck('name');
            session(['user_id'=> $user->id]);
        }

        // Send an internal API request to get an access token
        $client = DB::table('oauth_clients')
            ->where('password_client', true)
            ->first();

        // Make sure a Password Client exists in the DB
        if (!$client) {
            return response()->json([
                'message' => 'Laravel Passport is not setup properly.',
                'status' => 500
            ], 500);
        }

        $data = [
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => request('username'),
            'password' => request('password'),
        ];

        $request = Request::create('/oauth/token', 'POST', $data);
        
        $response = app()->handle($request);
        

        // Check if the request was successful
        if ($response->getStatusCode() != 200) {
            return response()->json([
                'message' => $response->getStatusCode(),
                'status' => "failed"
            ], 422);
        }

        // Get the data from the response
        $data = json_decode($response->getContent());

        
        
        // Format the final response in a desirable format
        //when login success return json data
        return response()->json([
            'token' => $data->access_token,
            'user' => $user,
            'role' => $role,           
            'status' => 200
        ]);
    }

    public function logout()
    {
        $accessToken = auth()->user()->token();
        

        $refreshToken = DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();

        return response()->json(['status' => 200]);
    }
}
