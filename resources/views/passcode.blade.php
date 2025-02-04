@extends('layouts.main')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-black/40">
    <div class="p-6 rounded-lg text-center">
        <h1 class="text-white text-3xl">Enter Passcode</h1>
        <p class="text-white mb-4">Enter the 6-digit passcode to unlock</p>
        
        <div id="passcode-display" class="flex justify-center space-x-4 mb-6">
            <div class="w-4 h-4 border-2 border-white rounded-full"></div>
            <div class="w-4 h-4 border-2 border-white rounded-full"></div>
            <div class="w-4 h-4 border-2 border-white rounded-full"></div>
            <div class="w-4 h-4 border-2 border-white rounded-full"></div>
            <div class="w-4 h-4 border-2 border-white rounded-full"></div>
            <div class="w-4 h-4 border-2 border-white rounded-full"></div>
        </div>
        
        <p id="error-msg" class="text-red-500 mb-4 hidden">
            Wrong passcode. Hint: our anniversary
        </p>
        
        <div id="keypad" class="grid grid-cols-3 gap-4">
            <button
                class="key bg-white/40 text-white rounded-full flex items-center justify-center w-16 h-16 text-3xl p-13">1</button>
            <button
                class="key bg-white/40 text-white rounded-full flex items-center justify-center w-16 h-16 text-3xl p-13">2</button>
            <button
                class="key bg-white/40 text-white rounded-full flex items-center justify-center w-16 h-16 text-3xl p-13">3</button>
            <button
                class="key bg-white/40 text-white rounded-full flex items-center justify-center w-16 h-16 text-3xl p-13">4</button>
            <button
                class="key bg-white/40 text-white rounded-full flex items-center justify-center w-16 h-16 text-3xl p-13">5</button>
            <button
                class="key bg-white/40 text-white rounded-full flex items-center justify-center w-16 h-16 text-3xl p-13">6</button>
            <button
                class="key bg-white/40 text-white rounded-full flex items-center justify-center w-16 h-16 text-3xl p-13">7</button>
            <button
                class="key bg-white/40 text-white rounded-full flex items-center justify-center w-16 h-16 text-3xl p-13">8</button>
            <button
                class="key bg-white/40 text-white rounded-full flex items-center justify-center w-16 h-16 text-3xl p-13">9</button>
            <div></div>
            <button
                class="key bg-white/40 text-white rounded-full flex items-center justify-center w-16 h-16 text-3xl p-13">0</button>
            <button id="delete"
                class="key bg-white/40 text-white rounded-full flex items-center justify-center w-16 h-16 text-3xl p-13">&larr;</button>
        </div>
    </div>
</div>
@endsection