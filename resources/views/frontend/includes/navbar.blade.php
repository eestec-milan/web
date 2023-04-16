<nav class="relative px-8 py-8 flex justify-items-end bg-white dark:bg-black pl-10">
    <a class="flex items-center md:pl-12 md:text-3xl font-bold leading-none" href="{{route('homepage')}}">
        <img class="w-24 md:w-40" src="{{asset('assets/images/mesa-logo.svg')}}">
    </a>
    <div class="lg:hidden ml-auto">
        <button class="navbar-burger flex justify-end text-blue-600 p-3">
            <svg class="block h-4 w-4 fill-current bg-red" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class="hidden absolute top-1/2 right-0 transform -translate-y-1/2 -translate-x-1/2
                    lg:flex lg:mx-auto lg:flex lg:items-right lg:w-auto lg:space-x-6 dark:text-white">
        <li><a class="text-sm {{ request()->routeIs('homepage') ? 'text-red' : ''}} hover:underline hover:decoration-2 hover:underline-offset-8 hover:decoration-red font-bold text-xl" href="{{route('homepage')}}">Home</a></li>
        <li><a class="text-sm {{ request()->routeIs('about') ? 'text-red' : ''}} hover:underline hover:decoration-2 hover:underline-offset-8 hover:decoration-red font-bold text-xl" href="{{route('about')}}">About us</a></li>
        <li><a class="text-sm {{ request()->routeIs('events') ? 'text-red' : ''}} hover:underline hover:decoration-2 hover:underline-offset-8 hover:decoration-red font-bold text-xl" href="{{route('events')}}">Events</a></li>
    </ul>
</nav>
<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="flex items-center md:pl-12 md:text-3xl font-bold leading-none" href="#">
                <img class="w-24 md:w-40" src="{{asset('assets/frontend/images/mesa-logo.svg')}}">
            </a>
            <button class="navbar-close">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Home</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">About us</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Events</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
