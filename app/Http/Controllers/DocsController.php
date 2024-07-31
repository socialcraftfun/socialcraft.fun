<?php

namespace App\Http\Controllers;

use App\Docs;
use Illuminate\View\View;
use League\CommonMark\Exception\CommonMarkException;

class DocsController extends Controller
{
    /**
     * Show a documentation page.
     *
     * @param string $page
     *
     * @return View|
     * @throws CommonMarkException
     */
    public function show(string $page = 'intro'): View
    {
        $docs = new Docs($page);

        return $docs->view('page.docs');
    }
}
