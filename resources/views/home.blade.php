@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="text-3xl font-bold text-center">Welcome to the Dashboard</h1>
    <p class="text-center mt-4">Ini Adalah Halaman Utama</p>

    <!-- Cards Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="w-80 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-4">Website Info!🔔</h2>
                <p class="text-gray-700 dark:text-gray-300">
                    Website ini dibuat untuk memudah kan pengguna dalam belajar html, css, dan javascript dasar.😉
                </p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="w-80 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-4">Kegunaannya?🤔</h2>
                <p class="text-gray-700 dark:text-gray-300">
                    Website ini khusus untuk pemula atau orang yang baru terjun ke dunia pemrograman. 
                    <br>Dan ingin menjadi Web Developer.😍
                </p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="w-80 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-4">Keunggulannya?🤗</h2>
                <p class="text-gray-700 dark:text-gray-300">
                    website ini akan memberikan tutorial dan penjelasan tentang html, css, dan javascript dasar.😊
                </p>
            </div>
        </div>
    </div>

    {{-- card --}}
    <br>
    <hr class="my-8 border-t border-gray-300 dark:border-gray-700">

    <div class="container mx-auto px-4 py-8 mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div
                class="w-80 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
                <img src="{{ asset('img/js.jpg') }}" alt="Learning Platform" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Learning Platform</h3>
                    <p class="dark:text-gray-300">
                        Platform pembelajaran interaktif untuk Web Development dengan fokus pada Laravel dan TailwindCSS.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div
                class="w-80 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
                <img src="{{ asset('img/real3.jpg') }}" alt="Community" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Our Community</h3>
                    <p class="dark:text-gray-300">
                        Bergabunglah dengan komunitas developer kami untuk berbagi pengetahuan dan pengalaman.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div
                class="w-80 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
                <img src="{{ asset('img/real2.jpg') }}" alt="Our Mission" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Our Mission</h3>
                    <p class="dark:text-gray-300">
                        Membantu developer pemula untuk menguasai teknologi web modern dengan cara yang efektif.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection 