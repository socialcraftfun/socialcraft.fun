<?php

namespace App;

use App\Models\Document;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Exception\CommonMarkException;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Yaml\Yaml;

class Docs
{/**
     * @var string The path to the Markdown file.
     */
    protected string $path;

    /**
     * @var array The array of variables extracted from the Markdown file's front matter.
     */
    protected array $variables = [];

    /**
     * @var string The file name.
     */
    public string $file;

    /**
     * @var Document
     */
    protected Document $model;

    /**
     * @var string The link name.
     */
    public string $name;

    /**
     * Create a new Docs instance.
     *
     * @param string $name    The link name.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->file = $name.'.md';
        $this->path = "/$this->file";
    }

    /**
     * @return string
     */
    public function raw(): string
    {
        return once(function () {
            $raw = Storage::disk('docs')->get($this->path);

            // Abort the request if the page doesn't exist
            abort_if(
                $raw === null,
                redirect(status: 300)->route('docs', ['page' => 'intro'])
            );

            return $raw;
        });
    }

    /**
     * @param string|null $key
     *
     * @return mixed
     */
    public function variables(?string $key = null): mixed
    {
        return once(function () use ($key) {
            $variables = [];
            $yaml = Str::of($this->raw())->betweenFirst('---', '---');

            try {
                $variables = Yaml::parse($yaml);
            } catch (\Throwable) {

            }

            return Arr::get($variables, $key);
        });
    }

    /**
     * once функция выполняется один аз
     *
     * @return string|null
     * @throws CommonMarkException
     */
    public function content(): ?string
    {
        return once(function () {
            return (new GithubFlavoredMarkdownConverter())->convert(Str::of($this->raw()));
        });
    }

    /**
     * Get the rendered view of a documentation page.
     * значения из массива $data доступны в использовании внутри компонента
     *
     * @param string $view The view name.
     *
     * @return View The rendered view of the documentation page.
     * @throws CommonMarkException
     */
    public function view(string $view): View
    {
        $data = Cache::remember('doc-file-view-data'.$this->path, now()->addMinutes(30), fn () => collect()->merge($this->variables())->merge([
            'docs'    => $this,
            'content' => $this->content(),
            '_page' => 'docs'
        ]));

        return view($view, $data);
    }

    /**
     * Get the title of the documentation page.
     *
     * @return string|null The title of the documentation page.
     * @throws CommonMarkException
     */
    public function title(): ?string
    {
        $crawler = new Crawler($this->content());

        $title = $crawler->filterXPath('//h1');

        return count($title) ? $title->text() : null;
    }

    /**
     * Get the menu array for the documentation index page.
     *
     * @return array The menu array.
     */
    public function getMenu(): array
    {
        return Cache::remember('doc-navigation', now()->addHours(2), function () {
            $page = Storage::disk('docs')->get('/documentation.md');

            $html = Str::of($page)
                ->markdown()
                ->toString();

            return $this->docsToArray($html);
        });
    }

    /**
     * Convert the HTML string to an array.
     *
     * @param string $html The HTML string.
     *
     * @return array The converted array.
     */
    public function docsToArray(string $html): array
    {
        $crawler = new Crawler();
        $crawler->addContent($html);

        $crawler = new Crawler($html);

        $menu = [];

        $crawler->filter('ul > li')->each(function (Crawler $node) use (&$menu) {
           $subList = $node->filter('ul > li')->each(fn (Crawler $subNode) => [
               'title' => $subNode->filter('a')->text(),
               'href' => url($subNode->filter('a')->attr('href')),
           ]);

           if (empty($subList)) {
               return null;
           }

           $menu[] = [
               'title' => $node->filter('h2')->text(),
               'list' => $subList,
           ];
        });

        return $menu;
    }

}
