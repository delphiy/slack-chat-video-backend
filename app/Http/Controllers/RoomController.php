<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
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

        $allUsers = User::where('id', '!=' , $loggedUserID)->get();

        return response()->json([
            'rooms' => Room::all(),
            'users' => $allUsers
        ]);
    }
}
