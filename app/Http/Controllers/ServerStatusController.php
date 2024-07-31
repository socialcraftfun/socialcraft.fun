<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;
use xPaw\MinecraftQuery;

class ServerStatusController extends Controller
{
    public function index()
    {
        $online = $this->checkServerOnline();

        return response()->json([
            'data' => [
               'online' => $online
           ]
        ]);
    }

    private function checkServerOnline(): int
    {
        try
        {
            $query = new MinecraftPing('play.socialcraft.fun', 25567);
            $response = $query->Query();
            return $response['players']['online'];
        }
        catch(MinecraftPingException $e)
        {
            echo $e->getMessage();
        }
        finally
        {
            if( $query )
            {
                $query->Close();
            }
        }
    }
}
