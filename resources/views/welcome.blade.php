<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MusicRec - Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-purple-600 to-indigo-800 text-white min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="bg-black bg-opacity-30 backdrop-blur-md shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-wide">🎵 MusicRec</h1>
            <nav class="space-x-6 text-sm font-medium">
                <a href="/" class="hover:text-yellow-300">Home</a>
                <a href="#features" class="hover:text-yellow-300">Features</a>
                <a href="{{ route('login') }}" class="hover:text-yellow-300">Login</a>
                <a href="{{ route('register') }}" class="hover:text-yellow-300">Register</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-grow flex items-center justify-center text-center px-6">
        <div>
            <h2 class="text-5xl font-extrabold mb-6 leading-tight">
                Discover Music You’ll Love 💖
            </h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto text-white/90">
                Personalized recommendations based on your taste, listening history, and trending tracks. Let the music find you.
            </p>
            <a href="{{ route('login') }}" class="bg-yellow-400 text-black font-bold px-6 py-3 rounded-full shadow-lg hover:bg-yellow-300 transition">
                Get Started
            </a>
        </div>
    </main>

    <!-- Features -->
    <section id="features" class="bg-white text-black py-16 px-6">
        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-10 text-center">
            <div>
                <h3 class="text-xl font-bold mb-2">🎧 Smart Recommendations</h3>
                <p>Our AI learns your tastes and delivers music you'll enjoy every day.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-2">📊 Personalized Dashboard</h3>
                <p>Track your favorites, playlists, and listening stats in one place.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-2">🌐 Explore Genres</h3>
                <p>Dive into global hits, indie gems, and niche genres with one click.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black bg-opacity-30 text-center text-sm py-6">
        &copy; {{ date('Y') }} MusicRec. All rights reserved.
    </footer>

</body>
</html>
