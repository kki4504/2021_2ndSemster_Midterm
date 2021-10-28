<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cars') }}
            </h2>
            <button 
                onclick=location.href="{{ route('cars.create') }}" 
                type="button" 
                class="btn btn-info hover:bg-blue-700 font-bold text-white"
                >
                    차량등록
            </button>
        </div>
    </x-slot>
    <x-cars-list :cars="$cars" />
</x-app-layout>