<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-blue-400">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? 'ToDo App - ' . $title : 'ToDo App'}}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bitcount+Prop+Single:wght@100..900&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <style type="text/tailwindcss">
            @theme {
                --font-robot: 'Bitcount Prop Single';
            }
        </style>
    </head>
    <body class="h-full font-robot text-lg">
        <div class="min-h-full w-3xl mx-auto py-7.5 px-5 bg-blue-300">
            <header>
                <a class="text-5xl text-center block w-fit mx-auto" href="{{ route('tasks.index') }}">ToDo App</a>
            </header>

            <main class="mt-7.5">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
