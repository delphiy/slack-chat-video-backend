<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class ApiTokenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function login(Request $request)
    {
        try {
            $user = Socialite::with($request->provider)->stateless()->userFromToken($request->access_token); //google
            $existingUser = User::where('email', $user->email)->first();
            $apiToken = Str::random(60);

            if($existingUser) {
                $existingUser->api_token = $existingUser;
                $existingUser->save();

                return response()->json([
                    'api_token' => $apiToken
                ]);
            } else {
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->password = Str::random(10);
                $newUser->api_token = $existingUser;
                $newUser->save();
                return response()->json([
                    'api_token' => $apiToken
                ]);
            }
        } catch (\Exception $ex) {
            return response()->json('Login failed', 401);
        }
    }
}
