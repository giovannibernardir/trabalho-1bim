<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Produtos')</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            background: #f4f5f7;
            color: #1f2937;
        }
        nav {
            background: #1f2937;
            padding: 1rem 2rem;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 1.5rem;
            font-weight: 600;
        }
        main {
            max-width: 960px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        h1 {
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,.1);
        }
        th, td {
            padding: .65rem .85rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        th {
            background: #f9fafb;
        }
        .card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,.1);
            margin-bottom: 1.5rem;
        }
        .btn {
            display: inline-block;
            padding: .5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: .9rem;
            cursor: pointer;
            border: none;
        }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-secondary { background: #e5e7eb; color: #1f2937; }
        .btn-danger { background: #dc2626; color: #fff; }
        form.inline { display: inline; }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: .25rem;
            margin-top: 1rem;
        }
        input, select {
            width: 100%;
            padding: .5rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
        }
        .error { color: #dc2626; font-size: .85rem; margin-top: .25rem; }
        .status {
            background: #dcfce7;
            color: #166534;
            padding: .75rem 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
        .itens-list { margin: 0; padding-left: 1.1rem; }
        .actions form { margin: 0; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('products.index') }}">Produtos</a>
        <a href="{{ route('products.create') }}">Novo produto</a>
    </nav>
    <main>
        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>
