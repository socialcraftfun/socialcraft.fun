<?php

namespace App\Http\Controllers;

use App\Utils\ContentHelper;
use Illuminate\Http\Request;
use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;
use xPaw\MinecraftQuery;

class ServerStatusController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => [
               'online' => ContentHelper::checkServerOnline()
           ]
        ]);
    }
}
