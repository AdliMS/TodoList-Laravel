<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo List</title>

        <!-- Styles / Scripts -->
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 m-0 p-0 h-screen flex-1 flex justify-center bg-slate-100">
        @livewire('todo-page')
    </body>
</html>
