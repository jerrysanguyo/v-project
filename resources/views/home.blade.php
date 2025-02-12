@extends('layouts.home')

@section('content')
<!-- First Row: Full-width card -->
<div class="grid grid-cols-3 gap-4 p-3 h-190 lg:w-100 lg:max-w-7xl lg:mx-auto lg:h-200">
    <div class="col-span-3 row-span-2 flex items-center justify-center">
        <div class="bg-gradient-to-br from-pink-300 to-purple-300  p-4 rounded-lg shadow-md w-full flex flex-col items-center">
            <div id="track-info" class="flex items-center justify-center w-full">
                <img id="album-art" src="" class="w-15 h-15 rounded-lg shadow-md mr-4" alt="Album Art">
                <div class="text-left">
                    <h2 id="track-name" class="text-lg font-semibold text-center"></h2>
                    <p id="artist-name" class="text-sm text-gray-400 text-center"></p>
                </div>
            </div>
            <div class="flex items-center space-x-4 mt-3"><button onclick="previousTrack()" class="bg-gray-600 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7M18 19l-7-7 7-7" />
                </svg>
                </button>

                <button onclick="togglePlay()" class="bg-green-500 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.518-3.76A1 1 0 007 8.058v7.884a1 1 0 001.234.97l6.518-1.752a1 1 0 00.748-.97V12.14a1 1 0 00-.748-.97z" />
                </svg>
                </button>

                <button onclick="nextTrack()" class="bg-gray-600 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M6 5l7 7-7 7" />
                </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="rounded-lg row-span-2 col-span-2">
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
        <div @click="open = true" class="shadow border rounded-lg overflow-hidden w-full h-30">
            <img src="{{ asset('images/2nd.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        
        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black/70" 
            x-cloak @click.away="open = false">
            <div @click.stop class="shadow rounded-lg p-6">
                <img src="{{ asset('images/2nd.jpg') }}" alt="" class="w-full h-full object-cover">
                <div class="mt-6 text-right">
                    <button @click="open = false" class="bg-red-500 hover:bg-red-600 transition-colors duration-150 text-white px-6 py-2 rounded-full">
                    Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg overflow-hidden w-full h-30">
            <img src="{{ asset('images/1st.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        
        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black/70" 
            x-cloak @click.away="open = false">
            <div @click.stop class="shadow rounded-lg p-6">
                <img src="{{ asset('images/1st.jpg') }}" alt="" class="w-full h-full object-cover">
                <div class="mt-6 text-right">
                    <button @click="open = false" class="bg-red-500 hover:bg-red-600 transition-colors duration-150 text-white px-6 py-2 rounded-full">
                    Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg overflow-hidden w-full h-30">
            <img src="{{ asset('images/3rd.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        
        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black/70" 
            x-cloak @click.away="open = false">
            <div @click.stop class="shadow rounded-lg p-6">
                <img src="{{ asset('images/3rd.jpg') }}" alt="" class="w-full h-full object-cover">
                <div class="mt-6 text-right">
                    <button @click="open = false" class="bg-red-500 hover:bg-red-600 transition-colors duration-150 text-white px-6 py-2 rounded-full">
                    Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg overflow-hidden w-full h-30">
            <img src="{{ asset('images/4th.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        
        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black/70" 
            x-cloak @click.away="open = false">
            <div @click.stop class="shadow rounded-lg p-6">
                <img src="{{ asset('images/4th.jpg') }}" alt="" class="w-full h-full object-cover">
                <div class="mt-6 text-right">
                    <button @click="open = false" class="bg-red-500 hover:bg-red-600 transition-colors duration-150 text-white px-6 py-2 rounded-full">
                    Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg overflow-hidden w-full h-30">
            <img src="{{ asset('images/5th.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        
        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black/70" 
            x-cloak @click.away="open = false">
            <div @click.stop class="shadow rounded-lg p-6">
                <img src="{{ asset('images/5th.jpg') }}" alt="" class="w-full h-full object-cover">
                <div class="mt-6 text-right">
                    <button @click="open = false" class="bg-red-500 hover:bg-red-600 transition-colors duration-150 text-white px-6 py-2 rounded-full">
                    Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg overflow-hidden w-full h-30">
            <img src="{{ asset('images/6th.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        
        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black/70" 
            x-cloak @click.away="open = false">
            <div @click.stop class="shadow rounded-lg p-6">
                <img src="{{ asset('images/6th.jpg') }}" alt="" class="w-full h-full object-cover">
                <div class="mt-6 text-right">
                    <button @click="open = false" class="bg-red-500 hover:bg-red-600 transition-colors duration-150 text-white px-6 py-2 rounded-full">
                    Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg overflow-hidden w-full h-30">
            <img src="{{ asset('images/7th.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        
        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black/70" 
            x-cloak @click.away="open = false">
            <div @click.stop class="shadow rounded-lg p-6">
                <img src="{{ asset('images/7th.jpg') }}" alt="" class="w-full h-full object-cover">
                <div class="mt-6 text-right">
                    <button @click="open = false" class="bg-red-500 hover:bg-red-600 transition-colors duration-150 text-white px-6 py-2 rounded-full">
                    Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div x-data="{ open: false }">
        <div @click="open = true" class="shadow border rounded-lg overflow-hidden w-full h-30">
            <img src="{{ asset('images/8th.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        
        <div x-show="open" x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black/70" 
            x-cloak @click.away="open = false">
            <div @click.stop class="shadow rounded-lg p-6">
                <img src="{{ asset('images/8th.jpg') }}" alt="" class="w-full h-full object-cover">
                <div class="mt-6 text-right">
                    <button @click="open = false" class="bg-red-500 hover:bg-red-600 transition-colors duration-150 text-white px-6 py-2 rounded-full">
                    Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 gap-4 p-2 lg:w-100 lg:max-w-7xl lg:mx-auto">
    <div class="bg-gradient-to-br from-pink-300/80 to-purple-300/80  rounded-lg p-4 flex justify-center items-center">
        <div class="grid grid-cols-3 gap-10 place-items-center">

            <div x-data="{ open: false }" class="relative">
                <!-- Trigger: Message Icon -->
                <div @click="open = true" class="cursor-pointer overflow-hidden w-16">
                    <img src="{{ asset('images/message.webp') }}" alt="Message Icon" class="w-15 shadow-md">
                </div>
                <div x-show="open"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 flex items-center justify-center z-50 bg-black/80 bg-opacity-70"
                    x-cloak @click.away="open = false">
                        <div @click.stop class="bg-white rounded-xl shadow-lg p-8 max-w-lg mx-4">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Hello babe,</h2>
                            <p class="text-gray-700 mb-2">
                                I know you didn't expect this, but I hope it made you happy, even if it's in this small way.
                            </p>
                            <p class="text-gray-700 mb-2">
                                We've had so many arguments these past few weeks, yet we still chose to work things out.
                            </p>
                            <p class="text-gray-700 mb-2">
                                Yes, constantly fighting is exhausting, but I hope it doesn't lead to us breaking up.
                            </p>
                            <p class="text-gray-700 mb-2">
                                I'm sorry if sometimes I let you cry, but that doesn't mean I don't care or that I don't love you.
                            </p>
                            <p class="text-gray-700 mb-2">
                                I'm sorry if I haven't given you what you want, but I hope that someday I'll be able to give you everything you ask of me.
                            </p>
                            <p class="text-gray-700 mb-2">
                                I'm sorry for all my wrongdoings over our four years together—I take all the blame, and I promise it won't happen again.
                            </p>
                            <p class="text-gray-700 mb-2">
                                I know rebuilding trust is hard, but I'll do my best so you won't have to remember those moments that made you cry.
                            </p>
                            <p class="text-gray-700 mb-4">
                                I'm here for you, babe; I'll support you no matter what happens. I won't leave you—I'll always be by your side.
                            </p>
                            <p class="text-gray-800 font-semibold">
                                I love you so much, baby. Happy Valentine's Day.
                            </p>
                        <div class="mt-6 text-right">
                            <button @click="open = false" class="bg-red-500 hover:bg-red-600 transition-colors duration-150 text-white px-6 py-2 rounded-full">
                            Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div x-data="{ open: false }" class="relative">
                <!-- Trigger: Message Icon -->
                <div @click="open = true" class="cursor-pointer overflow-hidden w-16">
                    <img src="{{ asset('images/gift.png') }}" alt="Message Icon" class="w-16 h-16 object-cover shadow-md">
                </div>
                <div x-show="open"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 flex items-center justify-center z-50 bg-black/80 bg-opacity-70"
                    x-cloak @click.away="open = false">
                        <div @click.stop class="bg-white rounded-xl shadow-lg p-8 max-w-lg mx-4">
                            <div class="tenor-gif-embed mt-10" data-postid="7561922659784932011" data-share-method="host" data-aspect-ratio="1" data-width="100%">
                                <a href="https://tenor.com/view/wrapped-gifts-birthday-presents-blossom-flowers-hibiscus-gif-7561922659784932011"></a>
                                <a href="https://tenor.com/search/wrapped+gifts-stickers">Wrapped Gifts Stickers</a>
                            </div> 
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-5">My gift for you!</h2>
                            <p class="text-gray-700 mb-2">
                                I'm sorry I can't give you flowers today, so here's something for now, hehe.
                            </p>
                        <div class="mt-6 text-right">
                            <button @click="open = false" class="bg-red-500 hover:bg-red-600 transition-colors duration-150 text-white px-6 py-2 rounded-full">
                            Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            

            <div x-data="{ open: false }" class="relative">
                <!-- Trigger: Message Icon -->
                <div @click="open = true" class="cursor-pointer overflow-hidden w-16">
                    <img src="{{ asset('images/google_map.png') }}" alt="Message Icon" class="w-13 object-cover shadow-md">
                </div>
                <div x-show="open"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 flex items-center justify-center z-50 bg-black/80 bg-opacity-70"
                    x-cloak @click.away="open = false">
                        <div @click.stop class="bg-white rounded-xl shadow-lg p-8 max-w-lg mx-4">
                            <div class="tenor-gif-embed" data-postid="26823001" data-share-method="host" data-aspect-ratio="1.77778" data-width="100%">
                                <a href="https://tenor.com/view/samuraiaurora-gif-26823001"></a>
                                <a href="https://tenor.com/search/samuraiaurora-gifs">Samuraiaurora GIFs</a>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-5">Hopefully we visit this soon!</h2>
                            <p class="text-gray-700 mb-2">
                                I know this is the place you've always dreamed of going to, if you still remember when I asked you before.
                            </p>
                            <p class="text-gray-700 mb-2">
                                I hope we can visit that place. I love you.
                            </p>
                        <div class="mt-6 text-right">
                            <button @click="open = false" class="bg-red-500 hover:bg-red-600 transition-colors duration-150 text-white px-6 py-2 rounded-full">
                            Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let token = '{{ session("spotify_access_token") }}';
    if (!token) {
        window.location.href = "{{ route('spotify.login') }}";
    }

    let player;

    window.onSpotifyWebPlaybackSDKReady = () => {
        player = new Spotify.Player({
            name: 'Laravel Spotify Widget',
            getOAuthToken: cb => { cb(token); },
            volume: 0.5
        });

        player.addListener('ready', ({ device_id }) => {
            console.log('Ready with Device ID', device_id);
            transferPlayback(device_id);
        });

        player.addListener('player_state_changed', state => {
            if (!state) return;
            updateTrackInfo(state.track_window.current_track);
        });

        player.connect().then(success => {
            if (success) {
                console.log('The Web Playback SDK is successfully connected to Spotify!');
            }
        });

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
