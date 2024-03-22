<head>
    @vite(['resources/css/app.css'])
</head>

<body class="container mx-auto mt-10 mb-10 max-w-3xl bg-slate-200">
    @if (session('success'))
        <div role="alert"
            class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
            <p class=" font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @yield('content')
</body>
