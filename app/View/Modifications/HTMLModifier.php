<?php

namespace App\View\Modifications;

use Symfony\Component\DomCrawler\Crawler;

abstract class HTMLModifier
{
    /**
     * @param $content
     *
     * @return Crawler
     */
    public function crawler($content): Crawler
    {
        $crawler = new Crawler();

        $crawler->addHtmlContent(mb_convert_encoding($content, 'UTF-8'));

        return $crawler;
    }
}
