<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
<div
    class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <livewire:welcome.navigation/>
    @endif

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <x-svg.book w="full" h="20" />
        </div>

        <div class="mt-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                <x-box
                    title="Documentation"
                    link="https://laravel.com/docs"
                >
                    Laravel has wonderful documentation covering every aspect of the framework. Whether you are
                    a newcomer or have prior experience with Laravel, we recommend reading our documentation
                    from beginning to end.
                </x-box>

                <x-box
                    title="Laracasts"
                    link="https://laracasts.com"
                >
                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development.
                    Check them out, see for yourself, and massively level up your development skills in the
                    process.
                </x-box>

                <x-box
                    title="Laravel News"
                    link="https://laravel-news.com"
                >
                    Laravel News is a community driven portal and newsletter aggregating all of the latest and
                    most important news in the Laravel ecosystem, including new package releases and tutorials.
                </x-box>

                <x-box title="Laravel News">
                    Laravel's robust library of first-party tools and libraries, such as <a
                        href="https://forge.laravel.com"
                        class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Forge</a>,
                    <a href="https://vapor.laravel.com"
                       class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Vapor</a>,
                    <a href="https://nova.laravel.com"
                       class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Nova</a>,
                    and <a href="https://envoyer.io"
                           class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Envoyer</a>
                    help you take your projects to the next level. Pair them with powerful open source libraries
                    like <a href="https://laravel.com/docs/billing"
                            class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cashier</a>,
                    <a href="https://laravel.com/docs/dusk"
                       class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dusk</a>,
                    <a href="https://laravel.com/docs/broadcasting"
                       class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Echo</a>,
                    <a href="https://laravel.com/docs/horizon"
                       class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Horizon</a>,
                    <a href="https://laravel.com/docs/sanctum"
                       class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sanctum</a>,
                    <a href="https://laravel.com/docs/telescope"
                       class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Telescope</a>,
                    and more.
                </x-box>

            </div>
        </div>

        <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                <div class="flex items-center gap-4">
                    <a href="https://github.com/olsza/book-manager"
                       class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        <x-svg.heart />
                        Code by Olsza
                    </a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
</div>
</body>
</html>
