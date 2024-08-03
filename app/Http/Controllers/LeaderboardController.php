<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class LeaderboardController extends Controller
{
    public function index()
    {
//        $players = Storage::json('players.json');
//        return response()
//            ->json($players);

        $data = DB::select('SELECT * FROM `user_leaderboard` ORDER BY played_minutes DESC LIMIT 100');
        $players = [
            'data' => $data
        ];
        return response()->json($players);
    }
}
