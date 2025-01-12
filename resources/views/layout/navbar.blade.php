@include('cust.login.login')
@include('cust.login.register')

<!-- Header -->
<header class="fixed top-0 left-0 h-24 right-0 z-40 backdrop-blur-lg">
    <nav class="flex items-center justify-between px-6 pb-0">
        <!-- Logo -->
        <div class="w-24">
            <a href="{{ route('home') }}"> <img src="/images/logo.png" alt="Logo" class="w-full h-auto"></a>
        </div>
        @guest
        <!-- Desktop Links -->
        <div class="hidden md:flex items-center space-x-6 ">
            <!-- Login and Register Buttons -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="px-8 py-2 border-2 border-blue-500  rounded-md bg-transparent hover:border-blue-800 hover:text-blue-800">
                <span class="font-bold text-blue-500 ">LOGIN</span>
            </button>
            <button data-modal-target="registration-modal" data-modal-toggle="registration-modal"
                class="px-6 py-2 rounded-md bg-blue-500 hover:bg-blue-800 ">
                <span class="font-bold text-white">REGISTER</span>
            </button>
            @endguest
        @auth
        <!-- Profile Dropdown -->
        <div x-data="{ open: false }" class="relative ml-3">
            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-md">
                    Logout
                </button>
            </form>
        </div>
        @endauth

        </div>

        <!-- Mobile Menu Toggle -->
        <div class="md:hidden flex items-center">
            <button id="menu-toggle" class="text-black">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <span class="sr-only">Toggle menu</span>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden absolute inset-x-0 top-16 bg-zinc-600 p-8 space-y-4 lg:hidden">
        <a href="#" class="block text-white py-2 pl-4 hover:bg-zinc-800 rounded-md"
            data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
            onclick="closeMobileMenu()">
            LOGIN
        </a>
        <a href="#" data-modal-target="registration-modal" data-modal-toggle="registration-modal"
            class="block text-white py-2 pl-4 hover:bg-zinc-800 rounded-md" onclick="closeMobileMenu()">
            REGISTER
        </a>
    </div>
</header>


<script>
    // Toggle Mobile Menu
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Close Mobile Menu when clicking on a link
    function closeMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.add('hidden');
    }
</script>
