<?php
    /* @var App\Docs $docs
     * @var string $content
    dwightwatson/active
     */
?>

@extends('layouts.app')

@section('content')
    {{--    Docs listing --}}
    <div class="container">
        <div class="row gx-5 docs-content">
            {{--            Docs navigation --}}
            <div class="col-12 col-lg-4 mb-5 mt-0 mt-lg-5 pt-3">
                <section class="docs-nav">
                    <ul class="docs-nav">
                        @foreach($docs->getMenu() as $item)
                            <li>
                                <button>{{ $item['title'] }}</button>

                                <ul class="docs-nav">
                                    @foreach($item['list'] as $link)
                                        <li class="{{ active(url($link['href']), 'item--active', '') }}">
                                            <a href="{{ $link['href'] }}">
                                                {{ $link['title'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </section>
            </div>

            {{--            Docs article content --}}
            <div class="col-12 col-lg-8 my-5">
                <article class="documentations">
                    <h1>{{ $docs->title() }}</h1>

                    <x-docs.content :content="$content"/>
                </article>
            </div>
        </div>
    </div>
@endsection
