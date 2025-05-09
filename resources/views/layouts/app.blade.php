<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/onOff.css') }}">
    <style>
        /* Add a smooth transition for background-color and color */
        body {
            transition: background-color 0.3s ease, color 0.3s ease;
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        [x-cloak] {
            display: none !important;
        }


        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #4b5563;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        // Check local storage for dark mode preference immediately
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>

<body id="body" class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <nav class="bg-black text-white w-64 p-4 flex-col h-full hidden md:flex relative">
            <div class="p-4 flex flex-col h-full">
                <div class="flex-grow">
                    <div class="flex flex-col space-y-4">
                        <h2 class="text-center mb-6">
                            <img src="{{ asset('img/GuraPng.gif') }}" width="80" height="80"
                                class="mx-auto content-center" alt="Logo">
                            <span class="text-sm font-bold">AyserNii</span>
                        </h2>

                        <div class="space-y-3">
                            <a href="/" class="hover:bg-gray-800 p-2 rounded block">
                                <i class="fa-solid fa-house mr-1"></i>
                                Home
                            </a>
                            <a href="/about" class="hover:bg-gray-800 p-2 rounded block">
                                <i class="fas fa-info-circle mr-1"></i>
                                About
                            </a>
                            <a href="/contact" class="hover:bg-gray-800 p-2 rounded block">
                                <i class="fa-solid fa-phone mr-1"></i>
                                Contact
                            </a>
                        </div>

                        <hr class="my-4">

                        <div class="space-y-3">
                            <p class=" p-2 rounded block">
                                <i class="fa-solid fa-book mr-1"></i>
                                Tutorials Dasar
                            </p>
                            <a href="#" class="hover:bg-gray-800 p-2 rounded block">
                                <i class="fa-solid fa-code mr-1"></i>
                                Learn Coding
                            </a>
                            <!-- Tutorial Dropdown -->
                            <div class="ml-4 space-y-2">
                                <a href="#" class="hover:bg-gray-800 p-2 rounded block text-sm">
                                    <i class="fa-brands fa-html5 mr-1"></i>
                                    HTML 5
                                </a>
                                <a href="#" class="hover:bg-gray-800 p-2 rounded block text-sm">
                                    <i class="fa-brands fa-css3 mr-1"></i>
                                    CSS 3
                                </a>
                                <a href="/tutorJs" class="hover:bg-gray-800 p-2 rounded block text-sm">
                                    <i class="fa-brands fa-js mr-1"></i>
                                    JavaScript
                                </a>
                            </div>
                        </div>

                        <hr>

                        <div class="space-y-3">
                            <a href="#" class="hover:bg-gray-800 p-2 rounded block">
                                <i class="fa-solid fa-user mr-1"></i>
                                Profile
                            </a>
                            <a href="#" class="hover:bg-gray-800 p-2 rounded block">
                                <i class="fa-solid fa-cog mr-1"></i>
                                Settings
                            </a>
                            <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
                            <a href="#" class="hover:bg-gray-800 p-2 rounded block">
                                <i class="fa-solid fa-right-from-bracket mr-1"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Footer Section with Dark Mode Toggle -->
                <div class="mt-auto pt-8 space-y-4">
                    <div class="mb-3 flex justify-center">
                        <label class="switch">
                            <input id="input" type="checkbox" onclick="toggleDarkMode()" />
                            <div class="slider round">
                                <div class="sun-moon">
                                    <svg id="moon-dot-1" class="moon-dot" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="moon-dot-2" class="moon-dot" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="moon-dot-3" class="moon-dot" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="light-ray-1" class="light-ray" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="light-ray-2" class="light-ray" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="light-ray-3" class="light-ray" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>

                                    <svg id="cloud-1" class="cloud-dark" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="cloud-2" class="cloud-dark" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="cloud-3" class="cloud-dark" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="cloud-4" class="cloud-light" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="cloud-5" class="cloud-light" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="cloud-6" class="cloud-light" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                </div>
                                <div class="stars">
                                    <svg id="star-1" class="star" viewBox="0 0 20 20">
                                        <path
                                            d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z">
                                        </path>
                                    </svg>
                                    <svg id="star-2" class="star" viewBox="0 0 20 20">
                                        <path
                                            d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z">
                                        </path>
                                    </svg>
                                    <svg id="star-3" class="star" viewBox="0 0 20 20">
                                        <path
                                            d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z">
                                        </path>
                                    </svg>
                                    <svg id="star-4" class="star" viewBox="0 0 20 20">
                                        <path
                                            d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </div>

                    <div class="text-center text-xs text-gray-400">
                        <footer class="space-y-2">
                            <p>Version 1.0.0</p>
                            <p>© 2025 AyserNii. All rights reserved.</p>
                            <p>Made with ❤️ by Resya Anggara</p>
                        </footer>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

    <script>
        // Script untuk toggle dark mode
        function toggleDarkMode() {
            const body = document.documentElement;
            body.classList.toggle('dark');

            // Save the dark mode state to local storage
            const isDarkMode = body.classList.contains('dark');
            localStorage.setItem('darkMode', isDarkMode);
        }

        // Check local storage for dark mode preference on page load
        document.addEventListener('DOMContentLoaded', () => {
            const body = document.documentElement;
            const darkMode = localStorage.getItem('darkMode');

            if (darkMode === 'true') {
                body.classList.add('dark');
                const input = document.getElementById('input');
                if (input) {
                    input.checked = true;
                }
            }
        });
    </script>
</body>

</html>