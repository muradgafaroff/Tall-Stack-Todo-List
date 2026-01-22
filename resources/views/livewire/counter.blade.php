<div>
    <div class="flex flex-col items-center justify-center p-10 bg-white shadow-2xl rounded-3xl border-4 border-indigo-500">
        <h1 class="text-7xl font-black text-indigo-600 mb-6">{{ $count }}</h1>
        
        <button wire:click="increment" 
                class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-4 px-10 rounded-full transition-all active:scale-95 shadow-lg">
            Rəqəmi Artır
        </button>
        <button wire:click="resetCounter" 
                class="mt-4 text-red-500 hover:text-red-700 font-semibold text-sm transition-all active:scale-95">
            Sıfırla
        </button>
    </div>

    <div x-data="{ open: false }" class="mt-8 text-center">
        <button @click="open = !open" 
                class="text-sm font-medium text-indigo-500 hover:text-indigo-700 underline">
            Lahiyə haqqında məlumatı göstər
        </button>

        <div x-show="open" 
             x-transition 
             class="mt-4 p-3 bg-blue-50 text-blue-700 rounded-lg text-sm border border-blue-100 italic">
            💡 Bu mesaj Alpine.js ilə açıldı. Heç bir server sorğusu (Network request) getmədi!
        </div>
    </div>
</div>