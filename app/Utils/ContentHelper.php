<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\CommonMark\GithubFlavoredMarkdownConverter;

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
}
