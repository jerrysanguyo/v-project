@extends('layouts.home')

@section('content')
<!-- First Row: Full-width card -->
<div class="grid grid-cols-3 gap-4 p-3 h-190 lg:w-100 lg:max-w-7xl lg:mx-auto lg:h-200">
    <div class="col-span-3 row-span-2 flex items-center justify-center">
        <div class="bg-pink-200 p-4 rounded-lg shadow-md w-full flex flex-col items-center">
            <div id="track-info" class="flex items-center justify-center w-full">
                <img id="album-art" src="" class="w-15 h-15 rounded-lg shadow-md mr-4" alt="Album Art">
                <div class="text-left">
                    <h2 id="track-name" class="text-lg font-semibold text-center"></h2>
                    <p id="artist-name" class="text-sm text-gray-400 text-center"></p>
                </div>
            </div>
            <div class="flex items-center space-x-4 mt-3">
                <button onclick="previousTrack()" class="bg-gray-600 p-2 rounded-full">⏮</button>
                <button onclick="togglePlay()" class="bg-green-500 p-3 rounded-full">⏯️</button>
                <button onclick="nextTrack()" class="bg-gray-600 p-2 rounded-full">⏭️</button>
            </div>
        </div>
    </div>

    <div class="shadow rounded-lg row-span-2 col-span-2 h-0">
        <div x-data="calendar()" x-init="init()" class="border-0 w-full bg-white shadow-lg rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <button @click="prevMonth()" class="text-gray-600 hover:text-black">&larr;</button>
                <h2 class="text-lg font-semibold text-gray-800" x-text="monthYear"></h2>
                <button @click="nextMonth()" class="text-gray-600 hover:text-black">&rarr;</button>
            </div>

            <div class="grid grid-cols-7 text-center text-gray-500 text-sm mb-2">
                <div>Sun</div> <div>Mon</div> <div>Tue</div> <div>Wed</div> <div>Thu</div> <div>Fri</div> <div>Sat</div>
            </div>

            <div class="grid grid-cols-7 text-center">
                <template x-for="day in blankDays">
                    <div class="text-gray-300"></div>
                </template>
                <template x-for="day in days">
                    <div class="py-2 text-gray-700 text-sm font-medium rounded-md"
                         :class="{'bg-black text-white': isToday(day)}">
                        <span x-text="day"></span>
                    </div>
                </template>
            </div>
        </div>
    </div>
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg">
            <img src="https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg" alt="" class="rounded-lg">
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" 
            x-cloak @click.away="open = false">
            <div @click.stop class="bg-black shadow rounded-lg p-6">
                <p class="text-white">Modal for Grid Item</p>
                <button @click="open = false" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg">
            <img src="https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg" alt="" class="rounded-lg">
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" 
            x-cloak @click.away="open = false">
            <div @click.stop class="bg-black shadow rounded-lg p-6">
                <p class="text-white">Modal for Grid Item</p>
                <button @click="open = false" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
    
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg">
            <img src="https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg" alt="" class="rounded-lg">
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" 
            x-cloak @click.away="open = false">
            <div @click.stop class="bg-black shadow rounded-lg p-6">
                <p class="text-white">Modal for Grid Item</p>
                <button @click="open = false" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg">
            <img src="https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg" alt="" class="rounded-lg">
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" 
            x-cloak @click.away="open = false">
            <div @click.stop class="bg-black shadow rounded-lg p-6">
                <p class="text-white">Modal for Grid Item</p>
                <button @click="open = false" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg">
            <img src="https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg" alt="" class="rounded-lg">
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" 
            x-cloak @click.away="open = false">
            <div @click.stop class="bg-black shadow rounded-lg p-6">
                <p class="text-white">Modal for Grid Item</p>
                <button @click="open = false" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg">
            <img src="https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg" alt="" class="rounded-lg">
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" 
            x-cloak @click.away="open = false">
            <div @click.stop class="bg-black shadow rounded-lg p-6">
                <p class="text-white">Modal for Grid Item</p>
                <button @click="open = false" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg">
            <img src="https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg" alt="" class="rounded-lg">
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" 
            x-cloak @click.away="open = false">
            <div @click.stop class="bg-black shadow rounded-lg p-6">
                <p class="text-white">Modal for Grid Item</p>
                <button @click="open = false" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg">
            <img src="https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg" alt="" class="rounded-lg">
        </div>

        <div x-show="open" 
            x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black/50" 
            x-cloak @click.away="open = false">
            <div @click.stop class="bg-black/50 shadow rounded-lg p-6">
                <p class="text-white">Modal for Grid Item</p>
                <button @click="open = false" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

</div>
<!-- Second Row -->
<div class="grid grid-cols-1 gap-4 p-2 lg:w-100 lg:max-w-7xl lg:mx-auto">
    <div class="bg-pink-200/40 rounded-lg p-4 flex justify-center items-center">
        <div class="grid grid-cols-3 gap-10 place-items-center">
            <img src="{{ asset('images/message.webp') }}" alt="" class="w-16">
            <img src="{{ asset('images/gift.png') }}" alt="" class="w-20">
            <img src="{{ asset('images/google_map.png') }}" alt="" class="w-15">
        </div>
    </div>
</div>


<!-- Spotify Web Playback SDK Script -->
<script src="https://sdk.scdn.co/spotify-player.js"></script>
<script>
    // Retrieve the token from the session; if missing, redirect to login
    let token = '{{ session("spotify_access_token") }}';
    if (!token) {
        window.location.href = "{{ route('spotify.login') }}";
    }

    // Declare the player globally so that other functions can access it
    let player;

    window.onSpotifyWebPlaybackSDKReady = () => {
        // Initialize the Spotify player without redeclaring 'token'
        player = new Spotify.Player({
            name: 'Laravel Spotify Widget',
            getOAuthToken: cb => { cb(token); },
            volume: 0.5
        });

        // When the player is ready, transfer playback to this device
        player.addListener('ready', ({ device_id }) => {
            console.log('Ready with Device ID', device_id);
            transferPlayback(device_id);
        });

        // Update the UI when the player's state changes
        player.addListener('player_state_changed', state => {
            if (!state) return;
            updateTrackInfo(state.track_window.current_track);
        });

        // Connect the player
        player.connect().then(success => {
            if (success) {
                console.log('The Web Playback SDK is successfully connected to Spotify!');
            }
        });

        // Explicitly set robustness level to avoid warning
        navigator.requestMediaKeySystemAccess('com.widevine.alpha', [{
            initDataTypes: ['cenc'],
            videoCapabilities: [{
                contentType: 'video/mp4; codecs="avc1.64001E"',
                robustness: 'SW_SECURE_CRYPTO'
            }],
            audioCapabilities: [{
                contentType: 'audio/mp4; codecs="mp4a.40.2"',
                robustness: 'SW_SECURE_CRYPTO'
            }]
        }]).catch(error => {
            console.warn('Robustness level warning suppressed:', error);
        });
    };

    // Transfer playback to the device provided by Spotify
    function transferPlayback(device_id) {
        fetch("https://api.spotify.com/v1/me/player", {
            method: "PUT",
            headers: {
                "Authorization": "Bearer " + token,
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ device_ids: [device_id] })
        }).then(response => {
            if (response.status === 403) {
                alert("Spotify Premium is required to use the Web Playback SDK.");
            }
        });
    }

    // Control functions for playback
    function togglePlay() {
        if (player) {
            player.togglePlay();
        } else {
            console.error("Player is not initialized.");
        }
    }

    function nextTrack() {
        if (player) {
            player.nextTrack();
        }
    }

    function previousTrack() {
        if (player) {
            player.previousTrack();
        }
    }

    function updateTrackInfo(track) {
        if (track && track.album && track.album.images && track.album.images[0]) {
            document.getElementById("album-art").src = track.album.images[0].url;
        }
        if (track) {
            document.getElementById("track-name").innerText = track.name || '';
            document.getElementById("artist-name").innerText = (track.artists || []).map(a => a.name).join(", ");
        }
    }
</script>
@endsection
