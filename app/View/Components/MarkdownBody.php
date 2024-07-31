<?php

namespace App\View\Components;

use App\View\Modifications\BladeComponentModifier;
use App\View\Modifications\BlockquoteModifier;
use App\View\Modifications\HeaderLinksModifier;
use App\View\Modifications\HTMLCleanseModifier;
use App\View\Modifications\ImageAltModifier;
use App\View\Modifications\RemoveFirstHeaderModifier;
use App\View\Modifications\ResponsiveTableModifier;
use App\View\Modifications\TypografModifier;
use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class MarkdownBody extends Component
{
    /**
     * @var string
     */
    protected string $content;

    /**
     * Create a new component instance.
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return $this->view('components.markdown-body', ['content' => $this->content]);
    }
}
