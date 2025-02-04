@extends('layouts.main')

@section('content')
<div class="flex flex-col justify-center items-center text-center">
    <p id="date" class="font-sans text-white text-3xl lg:text-6xl mt-30"></p>
    <p id="time" class="font-sans text-white text-6xl lg:text-9xl"></p>
</div>
<div class="fixed bottom-8 left-0 right-0 flex justify-center">
    <div class="relative w-80 h-16 bg-gray-400/50 rounded-full flex items-center pl-16 pr-4 overflow-hidden">
        <span class="w-full text-center text-white text-sm font-medium">
            Swipe to Unlock
        </span>
        <div id="slider"
            class="absolute left-0 top-0 w-16 h-16 bg-white rounded-full flex items-center justify-center cursor-pointer shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </div>
    </div>
</div>
@endsection