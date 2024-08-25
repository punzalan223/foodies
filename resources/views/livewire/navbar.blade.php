<?php

use Livewire\Attributes\On; 
use Livewire\Volt\Component;

new class extends Component {
    
    public $cart_length;

    public function mount()
    {
        // Initialize cart items from session
        $this->loadSessionCartItems();
    }

    #[On('add-cart-items')] 
    public function loadSessionCartItems()
    {
        $cart_items = session()->get('cart_items', []);

        $this->cart_length = count($cart_items);
    }
}; ?>

<div 
    x-data="{ isScrolled: window.scrollY > 0, isOpen: false }"
    x-init="
        // Update `isScrolled` based on the initial scroll position
        isScrolled = window.scrollY > 0;

        // Listen for scroll events to update the `isScrolled` state
        window.addEventListener('scroll', () => {
            isScrolled = window.scrollY > 0;
        });
    "
    :class="{ 'bg-white border-b': isScrolled }"
    class="sticky top-0 z-10 mx-auto transition-all duration-300"
>
    <nav class="container px-5 py-4 mx-auto">
        <div class="flex items-center justify-between">
            <a href="{{ route('home') }}" wire:navigate>
                <div class="text-2xl font-medium">Foodies</div>
            </a>
            <div class="absolute hidden -translate-x-1/2 left-1/2 md:block">
                <div class="flex gap-8 font-medium text-gray-700">                
                    <a class="{{ request()->routeIs('home') ? 'text-orange-500' : '' }} hover:text-orange-500" href="{{ route('home') }}" wire:navigate>
                        Home
                    </a>
                    <a class="{{ request()->routeIs('menu') ? 'text-orange-500' : '' }} hover:text-orange-500" href="{{ route('menu') }}" wire:navigate>
                        Menu   
                    </a>
                    <a class="{{ request()->routeIs('service') ? 'text-orange-500' : '' }} hover:text-orange-500" href="{{ route('service') }}" wire:navigate>
                        Service
                    </a>
                    <a class="{{ request()->routeIs('shop') ? 'text-orange-500' : '' }} hover:text-orange-500" href="{{ route('shop') }}" wire:navigate>
                        Shop
                    </a>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative flex items-center gap-3 px-4 py-1 bg-white border border-white rounded-full shadow-sm xl:gap-4">
                    <div class="absolute right-0 -top-2 {{ $cart_length ? "" : "hidden" }}">
                        <div class="flex items-center justify-center px-2 text-white bg-red-500 rounded-full shadow-lg">
                            {{ $cart_length }}
                        </div>
                    </div>
                    <div class="flex items-center p-2 xl:gap-2">
                        <label for="search">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </label>
                        <input class="w-0 placeholder-gray-500 bg-transparent border-none outline-none xl:w-full" id="search" type="search" placeholder="Search...">
                    </div>
                    <a class="hover:opacity-70" href="{{ route('cart') }}" wire:navigate>
                        <div class="px-4 border-l">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 {{ request()->routeIs('cart') ? 'text-orange-500' : '' }}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </div>
                    </a>
                </div>
                <div 
                    class="flex h-full px-3 py-3 bg-white rounded-lg shadow-sm cursor-pointer md:hidden hover:bg-orange-500 hover:text-white"
                    @click="isOpen=true"    
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </div>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
    <div 
        x-show="isOpen" 
        @click.outside="isOpen = false"
        x-transition:enter="transition-transform ease-out duration-300"
        x-transition:enter-start="transform -translate-x-full"
        x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition-transform ease-in duration-300"
        x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="fixed top-0 left-0 z-20 w-64 h-full bg-white shadow-lg"
    >
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold">Foodies</h3>
                <button @click="isOpen = false" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('home') }}" class="block text-lg text-gray-700 hover:text-orange-500" wire:navigate>Home</a>
                </li>
                <li>
                    <a href="{{ route('menu') }}" class="block text-lg text-gray-700 hover:text-orange-500" wire:navigate>Menu</a>
                </li>
                <li>
                    <a href="{{ route('service') }}" class="block text-lg text-gray-700 hover:text-orange-500" wire:navigate>Service</a>
                </li>
                <li>
                    <a href="{{ route('shop') }}" class="block text-lg text-gray-700 hover:text-orange-500" wire:navigate>Shop</a>
                </li>
                <!-- Add more links here as needed -->
            </ul>
        </div>
    </div>

</div>