<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-3xl text-white leading-tight">
                {{ __('Welcome, ' . auth()->user()->name . '!') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-purple-600 to-indigo-800 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Navigation Tabs -->
            <div class="mb-8 flex justify-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-white font-semibold px-4 py-2 rounded-lg bg-indigo-700 hover:bg-indigo-600 transition">Dashboard</a>
                <a href="{{ route('library') }}" class="text-white font-semibold px-4 py-2 rounded-lg hover:bg-indigo-600 transition">My Library</a>
                <a href="{{ route('profile.edit') }}" class="text-white font-semibold px-4 py-2 rounded-lg hover:bg-indigo-600 transition">Profile</a>
            </div>


            

            <!-- Main Dashboard Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8">
                    <div class="text-center mb-10">
                        <h3 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            🎶 Your Music Journey Starts Here
                        </h3>
                        <p class="text-lg text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                            Explore personalized recommendations, revisit your recently played tracks, and dive into trending music.
                        </p>
                    </div>


                    <!-- 🎵 Modern Music Player Box -->
                    <div class="mt-12 mb-12 flex justify-center">
                        <div class="w-80 bg-gray-900 rounded-2xl shadow-xl p-6 text-white flex flex-col items-center">

                            <!-- Album Art -->
                            <img id="albumArt" 
                                src="https://strapi.hnux.com/uploads/large_Radio_Playlists_Tips_Create_the_Best_Music_Shows_9a6c0a5ec5.jpeg" 
                                alt="Album Cover" 
                                class="w-full h-56 object-cover rounded-xl mb-4">

                            <!-- Track Info -->
                            <div class="text-center mb-4">
                                <h3 id="trackTitle" class="text-xl font-semibold">Chasing Dreams</h3>
                                <p id="trackArtist" class="text-sm text-gray-400">Luminous Sound</p>
                            </div>

                            <!-- Progress Bar -->
                            <div class="w-full mb-4">
                                <input type="range" id="progressBar" value="0" class="w-full accent-indigo-500">
                            </div>

                            <!-- Controls -->
                            <div class="flex justify-between items-center w-full px-6">
                                <button onclick="prevTrack()" class="text-2xl hover:text-indigo-400">⏮️</button>
                                <button onclick="togglePlay()" id="playPauseBtn" class="text-3xl hover:text-indigo-400">▶️</button>
                                <button onclick="nextTrack()" class="text-2xl hover:text-indigo-400">⏭️</button>
                            </div>

                            <!-- Hidden Audio -->
                            <audio id="audioPlayer"></audio>

                        </div>
                    </div>

                    <!-- Hidden Audio -->
                    <audio id="audioPlayer"></audio>
                    </div>
                    </div>

                    <!-- Dynamic Content Container -->
                    <div id="dynamicContent"
                        class="mt-10 mb-10 bg-gray-800 text-white p-6 rounded-xl shadow-xl hidden transition duration-300 ease-in-out" >
                    </div>
                    

                    <!-- Interactive Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
                        <!-- Card 1 -->
                        <div class="bg-gradient-to-r from-green-400 to-blue-500 text-white p-6 rounded-xl shadow-md">
                            <h4 class="text-xl font-bold mb-2">Recommended For You</h4>
                            <p class="text-sm mb-4">Curated based on your listening history and taste.</p>
                            <button
                            onclick="showContent('recommendations')"
                            class="inline-block bg-yellow-300 text-black font-semibold px-4 py-2 rounded-full hover:bg-yellow-200 transition">
                                View Recommendations
                            </button>
                        </div>

                        <!-- Card 2 -->
                        <div class="bg-gradient-to-r from-yellow-400 to-red-500 text-white p-6 rounded-xl shadow-md">
                            <h4 class="text-xl font-bold mb-2">Recently Played</h4>
                            <p class="text-sm mb-4">Replay your recent tracks and favorites.</p>
                            <button
                            onclick="showContent('history')"
                            class="inline-block bg-white text-black font-semibold px-4 py-2 rounded-full hover:bg-gray-200 transition">
                                View History
                            </button>
                        </div>

                        <!-- Card 3 -->
                        <div class="bg-gradient-to-r from-pink-400 to-purple-600 text-white p-6 rounded-xl shadow-md">
                            <h4 class="text-xl font-bold mb-2">Trending Music</h4>
                            <p class="text-sm mb-4">Discover the latest global and local hits.</p>
                            <button 
                            onclick="showContent('trending')"
                            class="inline-block bg-white text-black font-semibold px-4 py-2 rounded-full hover:bg-gray-200 transition">
                                Play Trending Song
                            </button>

                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-10 flex flex-col sm:flex-row justify-center items-center sm:space-x-4 space-y-4 sm:space-y-0">
                        <a href="{{ route('profile.edit') }}"
                            class="bg-gray-900 text-white font-semibold py-2 px-6 rounded-full hover:bg-gray-800 transition duration-200">
                            Edit Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="bg-red-600 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-500 transition duration-200"
                            >
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>


<script>
    const tracks = [
        {
            title: "Udi Udi Jaye",
            artist: "Ram Sampath, Sukhwinder S, Bhoomi T",
            image: "{{ asset('images/cover1.jpg') }}",
            audio: "{{ asset('audio/song1.mp3') }}"
        },
        {
            title: "AGAR TUM SAATH HO",
            artist: "ALKA YAGNIK, ARIJIT SINGH",
            image: "{{ asset('images/cover2.jpg') }}",
            audio: "{{ asset('audio/song2.mp3') }}"
        },
        {
            title: "Roke Na Ruke Naina",
            artist: "Arijit Singh",
            image: "{{ asset('images/cover3.jpg') }}",
            audio: "{{ asset('audio/song3.mp3') }}"
        },
        {
            title: "Bolna Maahi Bol Na",
            artist: "Arijit Singh || Asees Kaur",
            image: "{{ asset('images/cover4.webp') }}",
            audio: "{{ asset('audio/song4.mp3') }}"
        }
    ];

    let currentTrack = 0;
    const audio = document.getElementById("audioPlayer");
    const titleEl = document.getElementById("trackTitle");
    const artistEl = document.getElementById("trackArtist");
    const albumArt = document.getElementById("albumArt");
    const progressBar = document.getElementById("progressBar");
    const playPauseBtn = document.getElementById("playPauseBtn");

    let isSeeking = false;

    function loadTrack() {
        const track = tracks[currentTrack];
        titleEl.textContent = track.title;
        artistEl.textContent = track.artist;
        albumArt.src = track.image;
        audio.src = track.audio;
        audio.play();
        playPauseBtn.textContent = "⏸️";
    }

    function prevTrack() {
        currentTrack = (currentTrack - 1 + tracks.length) % tracks.length;
        loadTrack();
    }

    function nextTrack() {
        currentTrack = (currentTrack + 1) % tracks.length;
        loadTrack();
    }

    function togglePlay() {
        if (audio.paused) {
            audio.play();
            playPauseBtn.textContent = "⏸️";
        } else {
            audio.pause();
            playPauseBtn.textContent = "▶️";
        }
    }

    // Handle seeking interaction
    progressBar.addEventListener("mousedown", () => isSeeking = true);
    progressBar.addEventListener("mouseup", () => {
        isSeeking = false;
        const seekTime = (progressBar.value / 100) * audio.duration;
        audio.currentTime = seekTime;
    });

    progressBar.addEventListener("touchstart", () => isSeeking = true);
    progressBar.addEventListener("touchend", () => {
        isSeeking = false;
        const seekTime = (progressBar.value / 100) * audio.duration;
        audio.currentTime = seekTime;
    });

    progressBar.addEventListener("input", () => {
        if (isSeeking && audio.duration) {
            const seekTime = (progressBar.value / 100) * audio.duration;
            audio.currentTime = seekTime;
        }
    });

    // Update progress bar with audio time
    audio.addEventListener("timeupdate", () => {
        if (!isSeeking && audio.duration) {
            const progress = (audio.currentTime / audio.duration) * 100;
            progressBar.value = progress;
        }
    });

    // Load first track when DOM is ready
    document.addEventListener("DOMContentLoaded", loadTrack);

    const recommendedTracks = [
        {
            title: "Raabta",
            artist: "Arijit Singh",
            image: "{{ asset('images/recommend1.jpg') }}",
            audio: "{{ asset('audio/recommend1.mp3') }}"
        },
        {
            title: "Shayad",
            artist: "Arijit Singh",
            image: "{{ asset('images/recommend2.jpg') }}",
            audio: "{{ asset('audio/recommend2.mp3') }}"
        },
        {
            title: "O Saathi",
            artist: "Atif Aslam",
            image: "{{ asset('images/recommend3.jpg') }}",
            audio: "{{ asset('audio/recommend3.mp3') }}"
        }
    ];

    const historyTracks = [
        {
            title: "Udi Udi Jaye",
            artist: "Sukhwinder Singh",
            image: "{{ asset('images/cover1.jpg') }}",
            audio: "{{ asset('audio/song1.mp3') }}"
        },
        {
            title: "Roke Na Ruke Naina",
            artist: "Arijit Singh",
            image: "{{ asset('images/cover2.jpg') }}",
            audio: "{{ asset('audio/song2.mp3') }}"
        },
        {
            title: "Bolna Maahi Bol Na",
            artist: "Arijit Singh",
            image: "{{ asset('images/cover3.jpg') }}",
            audio: "{{ asset('audio/song3.mp3') }}"
        }
    ];

    const trendingTracks = [
        {
            title: "Heeriye",
            artist: "Arijit Singh",
            image: "{{ asset('images/trending1.webp') }}",
            audio: "{{ asset('audio/trending1.mp3') }}"
        },
        {
            title: "Kesariya",
            artist: "Arijit Singh",
            image: "{{ asset('images/trending2.jpg') }}",
            audio: "{{ asset('audio/trending2.mp3') }}"
        },
        {
            title: "Pasoori",
            artist: "Ali Sethi",
            image: "{{ asset('images/trending3.webp') }}",
            audio: "{{ asset('audio/trending3.mp3') }}"
        }
    ];



    function showContent(type) {
    const contentBox = document.getElementById("dynamicContent");
    contentBox.classList.remove("hidden");

    let html = "";
    let selectedTracks = [];

    if (type === "recommendations") {
        selectedTracks = recommendedTracks;
        html = `
            <h3 class="text-lg font-semibold mb-2">🎧 Recommended for You</h3>
            <ul class="list-disc list-inside text-sm text-gray-300">
                ${selectedTracks.map(track => `<li>${track.title} - ${track.artist}</li>`).join("")}
            </ul>
        `;
    } else if (type === "history") {
        selectedTracks = historyTracks;
        html = `
            <h3 class="text-lg font-semibold mb-2">📜 Recently Played</h3>
            <ul class="list-disc list-inside text-sm text-gray-300">
                ${selectedTracks.map(track => `<li>${track.title} - ${track.artist}</li>`).join("")}
            </ul>
        `;
    } else if (type === "trending") {
        selectedTracks = trendingTracks;
        html = `
            <h3 class="text-lg font-semibold mb-2">🔥 Trending Now</h3>
            <ul class="list-disc list-inside text-sm text-gray-300">
                ${selectedTracks.map(track => `<li>${track.title} - ${track.artist}</li>`).join("")}
            </ul>
        `;
    }

    // Update content first
    contentBox.innerHTML = html;

    // Replace current tracks and play
    tracks.length = 0;
    selectedTracks.forEach(t => tracks.push(t));
    currentTrack = 0;
    loadTrack();
    playPause();
}



</script>

