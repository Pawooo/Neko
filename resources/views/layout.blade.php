<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('favicon.ico') }}">  
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/splide.min.css">
        <script type="module" src="/js/splide.min.js" defer></script>
        <script type="module" src="/js/splide-extension-auto-scroll.min.js" defer></script>
        <script type="module" src="/js/logic.js" defer></script>
        <script type="module" src="/js/splide-checker.js" defer></script>
        <script type="module" src="/js/lottie.min.js" defer></script>
        <title>Nekos</title>
    </head>
    <body>
        @auth
        <section id="navmenu">
            <nav>
                <ul class="navigation">
                    <li id="logo"><a href="/"><x-si-caterpillar /></a></li>
                    {{-- <li class="navigation-item"><a href="/login">Manage Nekos</a></li> --}}
                    <li class="navigation-item"><a href="/neko/create">Add Neko</a></li>
                    <li class="navigation-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit">
                                Logout
                            </button>
                        </form>    
                    </li>
                    <li id="dark-mode" class="navigation-item"><a href=""><x-si-caterpillar /></a></li>
                    <li id="burger-icon" class=""><x-majestic-menu-solid /></li>
                    <li id="burger-menu-close" class="stealth"><x-icomoon-cross /></li>
                </ul>
            </nav>
            <nav id="burger-menu" class="burger-menu stealth">
                {{-- <li id="logo"><a href="/"><x-si-caterpillar /></a></li> --}}
                {{-- <a href="/login"><li class="navigation-item">Manage Nekos</li></a> --}}
                <a href="/neko/create"><li class="navigation-item">Add Neko</li></a>
                <div id="logout-burger" class="navigation-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit">
                            Logout
                        </button>
                    </form>
                </div>
                {{-- <li id="burger-icon"><x-majestic-menu-solid /></li> --}}
            </nav>
        </section>
        @else
        <section id="navmenu">
            <nav>
                <ul class="navigation">
                    <li id="logo"><a href="/"><x-si-caterpillar /></a></li>
                    <li class="navigation-item"><a href="/login">Login</a></li>
                    <li class="navigation-item"><a href="/register">Register</a></li>
                    <li id="dark-mode" class="navigation-item"><a href=""><x-si-caterpillar /></a></li>
                    <li id="burger-icon" class=""><x-majestic-menu-solid /></li>
                    <li id="burger-menu-close" class="stealth"><x-icomoon-cross /></li>
                </ul>
            </nav>
            <nav id="burger-menu" class="burger-menu stealth">
                {{-- <li id="logo"><a href="/"><x-si-caterpillar /></a></li> --}}
                <a href="/login"><li class="navigation-item">Login</li></a>
                <a href="/register"><li class="navigation-item">Register</li></a>
                {{-- <li id="burger-icon"><x-majestic-menu-solid /></li> --}}
            </nav>
        </section>
        @endauth
        <main>
            @yield('content')
        </main>
        <footer>
            <div class="footer-links">
                <ul>
                    <li><a href="/hiring">Hiring</a></li>
                    <li><a href="/firing">Contact Us</a></li>
                    <li><a href="/faq">FAQ</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul>
                    <li><a href="https://www.facebook.com/"><x-entypo-facebook-with-circle /></li></a>
                    <li><a href="https://www.instagram.com/?hl=en"><x-entypo-instagram-with-circle /></li></a>
                    <li><a href="https://discord.com/"><x-fontisto-discord /></li></a>
                </ul>
            </div>
        </footer>
        <x-flash-message />
    </body>
    </html>