<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivateMessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index() {
        $loggedUserID = Auth::user()->id;

        $allUsers = User::where('user_id', '!=' , $loggedUserID)->get();

        return response()->json([
            'rooms' => Room::all(),
            'users' => $allUsers
        ]);
    }

    public function store(Request $request) {

    }
}
