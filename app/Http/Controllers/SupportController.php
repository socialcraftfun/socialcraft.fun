<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\View;
use App\Utils\ContentHelper;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function privacy(): \Illuminate\View\View
    {
        // page info
        $data = [
            'page' => 'support.privacy',
            'title' => 'Политика конфиденциальности | ' . View::getShared()['name'],
            'description' => '',
            'keywords' => "socialcraft privacy, " . View::getShared()['keywords'],
        ];

        // page content
        $data['content'] = ContentHelper::getContentMarkdown('privacy.md');

        return view('page.support', $data);
    }

    /**
     * @return \Illuminate\View\View|
     */
    public function terms(): \Illuminate\View\View
    {
        // page info
        $data = [
            'page' => 'support.terms',
            'title' => 'Пользовательское соглашение' . View::getShared()['name'],
            'description' => '',
            'keywords' => 'socialcraft terms' . View::getShared()['keywords'],
        ];

        // page content
        $data['content'] = ContentHelper::getContentMarkdown('terms.md');

        return view('page.support', $data);
    }
}
