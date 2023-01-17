<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href={{ route('movies.index')}}>
                        <svg width='46' height='46' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='32' height='32' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(1.4 0 0 1.4 16 16)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255, 255, 255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 4 4 C 2.9 4 2 4.9 2 6 L 2 9.1503906 C 2 9.5653906 2.2378594 9.9705625 2.6308594 10.101562 C 3.4248594 10.367563 4 11.12 4 12 C 4 12.88 3.4248594 13.632437 2.6308594 13.898438 C 2.2378594 14.029438 2 14.434609 2 14.849609 L 2 18 C 2 19.1 2.9 20 4 20 L 20 20 C 21.1 20 22 19.1 22 18 L 22 14.849609 C 22 14.434609 21.762141 14.029437 21.369141 13.898438 C 20.575141 13.632437 20 12.88 20 12 C 20 11.12 20.575141 10.367563 21.369141 10.101562 C 21.762141 9.9705625 22 9.5653906 22 9.1503906 L 22 6 C 22 4.9 21.1 4 20 4 L 4 4 z M 12 6.8007812 L 13.400391 10.099609 L 17 10.400391 L 14.300781 12.800781 L 15.099609 16.199219 L 12 14.400391 L 8.9003906 16.300781 L 9.6992188 12.800781 L 7 10.400391 L 10.599609 10.099609 L 12 6.8007812 z" stroke-linecap="round" />
                            </g>
                        </svg>
                    </a>
                </li>
                <li class="text-2xl pl-3 font-bold"><a href={{ route('movies.index')}}>MovieApp</a></li>
                <li class="md:pl-10 mt-3 md:mt-0" href="#">
                    <a href={{ route('movies.index')}} class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:pl-4 mt-3 md:mt-0" href="#">
                    <a href={{ route('tv.index')}} class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:pl-4 mt-3 md:mt-0" href="#">
                    <a href={{ route('actors.index')}} class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <img src="https://www.kindpng.com/picc/m/22-223863_no-avatar-png-circle-transparent-png.png" alt="avatar" class="rounded-full w-8 h-8 item-center">
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    @livewireStyles
    @livewireScripts
</body>
</html>