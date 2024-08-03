<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

class ContentHelper
{
    /**
     * @param string $path in storage content disk
     * @return string html
     */
    public static function getContentMarkdown(string $path): string
    {

        $raw = Storage::disk('content')->get($path);

        // Abort the request if the page doesn't exist
        abort_if(
            $raw === null,
            404
        );

        return Str::of($raw)
            ->markdown()
            ->toString();
    }

    public static function checkServerOnline(): int
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
            return 0;
        }
    }
}
