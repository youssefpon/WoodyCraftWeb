<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'WoodyCraft – Puzzles en bois')</title>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@500;800&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root { --bg:#E9E4D8; --card:#F6F3EA; --ink:#2A1F17; --mut:#6F6254; --teal:#0F5C5A; --mus:#E3A82B; --line:#cfc6b3; }
        * { box-sizing: border-box; }
        body { margin:0; background:var(--bg); color:var(--ink); font:16px/1.55 'DM Sans', system-ui, sans-serif; }
        h1, h2, h3 { font-family:'Bricolage Grotesque', Georgia, sans-serif; line-height:1.05; margin:0; }
        a { color:inherit; }
        :focus-visible { outline:3px solid var(--mus); outline-offset:2px; }

        header { display:flex; align-items:center; gap:16px; padding:14px 5vw; border-bottom:2px solid var(--ink); flex-wrap:wrap; }
        .logo { font:800 26px 'Bricolage Grotesque', sans-serif; text-decoration:none; flex:1; }
        nav { display:flex; gap:18px; align-items:center; flex-wrap:wrap; }
        nav a { text-decoration:none; font-weight:500; }
        nav a:hover { text-decoration:underline; text-underline-offset:4px; }
        nav form { margin:0; }

        .btn { background:var(--ink); color:var(--bg); border:0; padding:12px 22px; border-radius:999px;
               font:inherit; font-weight:700; cursor:pointer; text-decoration:none; display:inline-block; }
        .btn:hover { background:var(--teal); color:#fff; }
        .link { background:none; border:0; padding:0; font:inherit; color:var(--mut); text-decoration:underline; cursor:pointer; }

        main { padding:0 5vw 60px; max-width:1200px; margin:auto; }
        h2.section { font-size:32px; font-weight:800; margin:40px 0 18px; }

        .hero { display:grid; grid-template-columns:1.1fr 1fr; gap:32px; align-items:center; padding:48px 0; }
        .hero h1 { font-size:clamp(40px, 7vw, 84px); font-weight:800; letter-spacing:-.03em; }
        .hero p { max-width:44ch; color:var(--mut); font-size:18px; }
        .board { display:grid; grid-template-columns:repeat(3, 1fr); }
        .board svg { width:100%; height:auto; display:block; margin:-6% -5%; }

        .cats { display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:14px; }
        .cat { padding:26px; border-radius:24px 24px 24px 4px; text-decoration:none; color:#fff; min-height:140px;
               display:flex; flex-direction:column; justify-content:flex-end; }
        .cat b { font:800 24px 'Bricolage Grotesque', sans-serif; }
        .cat span { opacity:.85; font-size:14px; }

        .grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(230px, 1fr)); gap:20px; }
        .pc { background:var(--card); border:1px solid var(--line); border-radius:20px; overflow:hidden; display:block; }
        .pc .im { aspect-ratio:1; display:grid; place-items:center; }
        .pc .im svg { width:62%; }
        .pc .t { padding:14px 16px; }
        .pc h3 { font-size:19px; }
        .pc small { color:var(--mut); }
        .price { font-weight:700; }

        @media (max-width:760px) { .hero { grid-template-columns:1fr; } }
    </style>
</head>
<body>
    <header>
        <a class="logo" href="{{ route('home') }}">WoodyCraft</a>
        <nav>
            <a href="{{ route('home') }}">Catégories</a>

            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('puzzles.index') }}">Administration</a>
                @endif

                <span>{{ Auth::user()->email }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn">Se déconnecter</button>
                </form>
            @else
                <a class="btn" href="{{ route('login') }}">Se connecter</a>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>