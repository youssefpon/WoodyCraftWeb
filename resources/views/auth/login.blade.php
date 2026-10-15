<body>
    <header>
        <a class="logo" href="{{ route('home') }}">WoodyCraft</a>
    </header>

    <main>
        <h2>Se connecter</h2>

        @if (session('status'))
            <div class="status" role="status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label>
                Email
                <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </label>
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror

            <label>
                Mot de passe
                <input type="password" name="password" required autocomplete="current-password">
            </label>
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror

            <label class="remember">
                <input type="checkbox" name="remember"> Se souvenir de moi
            </label>

            <button type="submit" class="btn">Se connecter</button>

            <small>Pas encore de compte ? <a href="{{ route('register') }}">Créer un compte</a></small>
        </form>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion – WoodyCraft</title>

    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@500;800&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #E9E4D8;
            --card: #F6F3EA;
            --ink: #2A1F17;
            --mut: #6F6254;
            --teal: #0F5C5A;
            --mus: #E3A82B;
            --line: #cfc6b3;
            --err: #B4462B;
        }

        * {
            box-sizing: border-box;
        }

        html {
            min-height: 100%;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--bg);
            color: var(--ink);
            font: 16px/1.55 'DM Sans', system-ui, sans-serif;
        }

        h1, h2 {
            font-family: 'Bricolage Grotesque', Georgia, sans-serif;
            line-height: 1.1;
            margin: 0;
        }

        a {
            color: inherit;
        }

        /* EN-TÊTE */
        header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 16px 5%;
            border-bottom: 2px solid var(--ink);
        }

        .logo {
            font: 800 26px 'Bricolage Grotesque', sans-serif;
            text-decoration: none;
            white-space: nowrap;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
            flex-wrap: wrap;
        }

        nav a {
            text-decoration: none;
            font-weight: 500;
        }

        nav a:hover {
            text-decoration: underline;
            text-underline-offset: 4px;
        }

        /* BOUTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            max-width: 100%;
            padding: 12px 22px;
            border: 0;
            border-radius: 999px;
            background: var(--ink);
            color: var(--bg);
            font: inherit;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .btn:hover {
            background: var(--teal);
            color: #fff;
        }

        :focus-visible {
            outline: 3px solid var(--mus);
            outline-offset: 3px;
        }

        /* CONTENU PRINCIPAL */
        main {
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
            padding: 56px 24px 40px;
        }

        h2 {
            font-size: clamp(28px, 5vw, 36px);
            font-weight: 800;
            margin-bottom: 24px;
            overflow-wrap: break-word;
        }

        /* MESSAGE DE CONFIRMATION */
        .status {
            width: 100%;
            margin-bottom: 16px;
            padding: 12px 14px;
            border-radius: 10px;
            background: var(--mus);
            color: var(--ink);
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        /* FORMULAIRE */
        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
            width: 100%;
            min-width: 0;
            padding: 24px;
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(42, 31, 23, 0.05);
        }

        label {
            display: flex;
            flex-direction: column;
            gap: 7px;
            width: 100%;
            min-width: 0;
            color: var(--mut);
            font-size: 14px;
            font-weight: 500;
        }

        input[type="email"],
        input[type="password"] {
            display: block;
            width: 100%;
            min-width: 0;
            min-height: 46px;
            padding: 11px 13px;
            border: 1.5px solid var(--line);
            border-radius: 10px;
            background: var(--bg);
            color: var(--ink);
            font: inherit;
            font-size: 16px;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: var(--teal);
            outline: 2px solid rgba(15, 92, 90, 0.15);
        }

        /* SE SOUVENIR DE MOI */
        label.remember {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 9px;
