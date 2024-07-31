@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row gx-5">
            <div class="col-12 col-lg-8 my-5 aniFadeIn">
                <x-markdown-body :content="$content"/>
            </div>
        </div>
    </div>
@endsection
