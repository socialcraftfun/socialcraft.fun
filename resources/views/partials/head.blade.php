<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Site icon -->
<link rel="shortcut icon" href="/img/sclogo.png" />
<link rel="apple-touch-icon" sizes="180x180" href="/img/icons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/img/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/icons/favicon-16x16.png">
<meta name="theme-color" content="#ffffff">
<link rel="manifest" href="/webmanifest.json">

<!-- For Search Indexing -->
<meta name="robots" content="index, follow">
<meta name="author" content="{{ $author }}">
<meta name="Search Engines" content="www.google.com, www.google.com.vn, www.yahoo.com, www.bing.com">
<meta name="revisit-after" content="1 hour">

<!-- Google site -->
<meta name="google-site-verification" content="" />

<!-- Perfmormance -->
<link rel="preconnect" href="https://srv.carbonads.net">
<link rel="preconnect" href="https://www.google-analytics.com">

<!-- Site info -->
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">

<!-- Open Graph Article -->
<meta property="og:type" content="article">
<meta property="og:url" content="{{ app('request')->get('a') }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:image" content="{{ $thumbnail }}">
<meta property="og:image:alt" content="{{ $title }}" />
<meta property="og:site_name" content="{{ $site_name }}" />
<meta property="og:description" content="{{ $description }}" />
<meta property="article:tag" content="{{ $keywords }}" />
<meta property="article:author" content="{{ $author }}">

<!-- Facebook info -->
<meta property="fb:app_id" content="" />

<!-- IOS icon -->
<meta name="apple-mobile-web-app-title" content="SocialCraft">
<meta name="application-name" content="SocialCraft">

<!-- Base CSS ans js-->
@vite(['resources/css/main.scss', 'resources/js/app.js'])

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
