<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-page="{{ Route::currentRouteName() }}">
<head>
    @include('partials.head')
</head>

<body>
    <div id="app">
        <header id="appHeader">
            <nav class="navbar container">
                <a class="navbar-brand" href="/">SocialCraft</a>

                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('about') ? 'nav-item--active' : '' }}">
                        <a href="/about">О сервере</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('stats') ? 'nav-item--active' : '' }}">
                        <a href="/stats">Статистика</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('rules') ? 'nav-item--active' : '' }}">
                        <a href="/rules">Правила</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('docs') ? 'nav-item--active' : '' }}">
                        <a href="/docs">Вики</a>
                    </li>
{{--                    <li class="nav-item nav-submenu">
                        <a>Субменю</a>

                        <ul>
                            <li class="nav-item">
                                <a href="#">елемент субменю</a>
                            </li>
                        </ul>
                    </li>--}}
                </ul>
            </nav>
        </header>

        <main id="appContent" role="main">
            @yield('content')
        </main>

        <footer id="appFooter">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-socials">
                        <div class="line left-line"></div>
                        <div class="wrapper">
                            <a class="social-link" href="https://vk.com/serversocialcraft" target="_blank">
                                <svg width="100%" height="100%" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="white" d="M23.456 5.784a8.605 8.605 0 0 1-1.09 2.259l.019-.03q-.672 1.12-1.605 2.588-.8 1.159-.847 1.2a1.28 1.28 0 0 0-.267.618l-.001.007a.897.897 0 0 0 .268.535l.4.446q3.21 3.299 3.611 4.548a.89.89 0 0 1-.112.829l.002-.003a.965.965 0 0 1-.784.289h.004H20.418c-.337 0-.647-.118-.89-.314l.003.002a6.928 6.928 0 0 1-.951-.948l-.009-.012q-.691-.781-1.226-1.315-1.782-1.694-2.63-1.694a.788.788 0 0 0-.516.135l.003-.002a.767.767 0 0 0-.16.584v-.004a12.532 12.532 0 0 0-.038 1.403v-.017 1.159a.78.78 0 0 1-.266.757l-.001.001a3.179 3.179 0 0 1-1.617.267l.013.001a8.323 8.323 0 0 1-4.275-1.268l.035.02A11.931 11.931 0 0 1 4.176 14.3l-.027-.042a26.36 26.36 0 0 1-2.471-3.992l-.07-.154A24.657 24.657 0 0 1 .375 7.31l-.06-.185a6.646 6.646 0 0 1-.31-1.535l-.002-.025q0-.758.892-.758h2.63a1.058 1.058 0 0 1 .739.225l-.002-.002c.2.219.348.488.421.788l.003.012a25.422 25.422 0 0 0 1.587 3.615l-.067-.137a14.56 14.56 0 0 0 1.623 2.576l-.023-.031q.8.982 1.248.982l.032.001a.4.4 0 0 0 .347-.2l.001-.002a1.783 1.783 0 0 0 .111-.787v.006-3.879a3.211 3.211 0 0 0-.32-1.267l.008.019a2.956 2.956 0 0 0-.45-.695l.003.004a1.099 1.099 0 0 1-.311-.619l-.001-.006c0-.17.078-.323.2-.423l.001-.001a.678.678 0 0 1 .46-.178h4.154a.634.634 0 0 1 .559.222l.001.001a1.36 1.36 0 0 1 .159.763v-.005 5.173a.993.993 0 0 0 .136.584l-.002-.004a.401.401 0 0 0 .333.178h.001a.946.946 0 0 0 .471-.162l-.003.002c.272-.187.506-.4.709-.641l.004-.005a15.606 15.606 0 0 0 1.655-2.25l.039-.07c.344-.57.716-1.272 1.053-1.993l.062-.147.446-.892a1.122 1.122 0 0 1 1.117-.759h-.003 2.631q1.066 0 .8.981z"></path></svg>
                            </a>
                            <a class="social-link" href="https://discord.com/invite/Yap846T" target="_blank">
                                <svg width="100%" height="100%" viewBox="0 0 127.14 96.36" fill="white" xmlns="http://www.w3.org/2000/svg"><path fill="white" d="M107.7 8.07A105.15 105.15 0 0 0 81.47 0a72.06 72.06 0 0 0-3.36 6.83 97.68 97.68 0 0 0-29.11 0A72.37 72.37 0 0 0 45.64 0a105.89 105.89 0 0 0-26.25 8.09C2.79 32.65-1.71 56.6.54 80.21a105.73 105.73 0 0 0 32.17 16.15 77.7 77.7 0 0 0 6.89-11.11 68.42 68.42 0 0 1-10.85-5.18c.91-.66 1.8-1.34 2.66-2a75.57 75.57 0 0 0 64.32 0c.87.71 1.76 1.39 2.66 2a68.68 68.68 0 0 1-10.87 5.19 77 77 0 0 0 6.89 11.1 105.25 105.25 0 0 0 32.19-16.14c2.64-27.38-4.51-51.11-18.9-72.15ZM42.45 65.69C36.18 65.69 31 60 31 53s5-12.74 11.43-12.74S54 46 53.89 53s-5.05 12.69-11.44 12.69Zm42.24 0C78.41 65.69 73.25 60 73.25 53s5-12.74 11.44-12.74S96.23 46 96.12 53s-5.04 12.69-11.43 12.69Z"></path></svg>
                            </a>
                        </div>
                        <div class="line right-line"></div>
                    </div>
                    <div class="footer__text">
                        Мы на <a href="https://mineserv.top/socialcraft">Mineserv.top</a>
                    </div>
                    <div class="footer__text">
                        © 2020-{{ date("Y") }} SocialCraft
                    </div>
                </div>
            </div>
        </footer>
    </div>

    {{--Javascript stuff--}}
    @include('partials.foot')
</body>
</html>
