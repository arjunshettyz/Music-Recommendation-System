<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ __('My Library') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-indigo-700 to-purple-800 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Hero Section -->
            <div class="mb-10 text-center">
                <h3 class="text-4xl font-bold text-white mb-2">🎧 Your Personal Music Collection</h3>
                <p class="text-gray-200 max-w-2xl mx-auto text-lg">
                    Revisit your favorite tracks, discover albums you've saved, and relive your listening journey.
                </p>
            </div>

            <!-- Optional Filter Bar (for future use) -->
            <div class="flex justify-between items-center mb-6 px-4">
                <div class="text-white font-medium">Showing: <span class="underline">All Items</span></div>
                <button 
                onclick="alert('Feature coming soon!')"
                class="bg-white text-indigo-700 font-semibold px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                    + Add to Library
                </button>
            </div>

            <!-- Music Library Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                    <img src="{{ asset('images/1st.avif') }}" 
                    alt="Album Art" 
                    class="w-full h-48 object-cover"
                    >

                    <div class="p-5">
                        <h4 class="text-xl font-bold mb-1">Midnight Echoes</h4>
                        <p class="text-sm mb-3 text-gray-600 dark:text-gray-300">By Aurora Lane</p>
                        <a href="#" class="text-indigo-600 font-semibold hover:underline">Listen Now</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                    <img src="{{ asset('images/2nd.avif') }}" 
                    alt="Playlist" 
                    class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h4 class="text-xl font-bold mb-1">Top Hits 2025</h4>
                        <p class="text-sm mb-3 text-gray-600 dark:text-gray-300">25 Tracks</p>
                        <a href="#" class="text-indigo-600 font-semibold hover:underline">Open Playlist</a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                    <img src="{{ asset('images/3rd.avif') }}" 
                    alt="Liked Songs"
                    class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h4 class="text-xl font-bold mb-1">Liked Songs</h4>
                        <p class="text-sm mb-3 text-gray-600 dark:text-gray-300">78 Favorites</p>
                        <a href="#" class="text-indigo-600 font-semibold hover:underline">Play All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
