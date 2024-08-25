<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new 
#[Layout('components.layouts.app')] 
#[Title('Foodies | Home')]
class extends Component {
    public $title = "Foodies | Home";
}; ?>

<div>
    <div class="fixed top-0 left-0 w-full h-full -z-10">
        <div class="absolute top-0 z-[-2] h-screen w-screen bg-white bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(224,122,95,0.3),rgba(255,255,255,0))]"></div>
    </div>
    <section id="hero-section">
        <div class="container mx-auto my-20">
            <div class="flex flex-col gap-16 px-5 xl:gap-0 xl:flex-row">
                <div class="w-full space-y-8 xl:w-1/2">
                    <div class="flex flex-wrap gap-4">                        
                        <div class="inline-block py-2 pl-4 bg-orange-200 rounded-full">
                            <div class="flex items-center gap-8">
                                <span class="text-orange-700">Bike Delivery</span>
                                <div class="w-10 p-2 mr-2 bg-white rounded-full shadown-lg">
                                    <img src="{{ asset('img/icons/delivery-bike.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="inline-block py-2 pl-4 bg-blue-200 rounded-full">
                            <div class="flex items-center gap-8">
                                <span class="text-blue-700">Car Delivery</span>
                                <div class="w-10 p-2 mr-2 bg-white rounded-full shadow-lg">
                                    <img src="{{ asset('img/icons/hatchback.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative text-3xl font-bold tracking-wide sm:text-5xl md:text-7xl">
                        <img class="absolute hidden max-w-sm xl:top-24 2xl:top-10 xl:-right-14 2xl:-right-5 -z-10 xl:filter xl:invert xl:block 2xl:invert-0" src="{{ asset('img/icons/arrow.png') }}" alt="">
                        <p>Delicious Meals</p>
                        <p>Delivered Fast</p>
                        <p>To <span class="text-orange-500">Your Doorstep</span></p>
                    </div>
                    <p class="max-w-lg text-gray-700">Order your favorite meals from the comfort of your home and enjoy fresh, tasty food delivered right to your door.</p>
                    <div class="flex items-center gap-8">
                        <a href="{{ route('menu') }}" wire:navigate>
                            <button class="px-6 py-4 text-white bg-orange-500 shadow-2xl rounded-2xl hover:bg-orange-600">Order Now</button>
                        </a>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center p-2 bg-white rounded-full shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                </svg>
                            </div>
                            <span class="text-gray-700">Watch our video</span>
                        </div>
                    </div>
                </div>
                <div class="m-auto max-w-56 sm:max-w-lg md:max-w-7xl xl:w-1/2">
                    <div class="flex xl:justify-end">                        
                        <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-2 xl:max-w-lg">
                            <div class="p-5 text-center bg-white bg-opacity-50 border border-gray-100 shadow-sm xl:border-gray-50 backdrop-filter backdrop-blur-sm rounded-2xl">
                                <img class="" src="{{ asset('img/foods/Pizza_3D.png') }}" alt="">
                                <p class="text-xl font-bold text-slate-700">Pizza</p>
                                <p class="text-gray-700">Main Course</p>
                                <p><span class="text-orange-500">₱</span> 250.00</p>
                            </div>
                            <div class="p-5 text-center bg-white bg-opacity-50 border border-gray-100 shadow-sm xl:border-gray-50 backdrop-filter backdrop-blur-sm rounded-2xl">
                                <img src="{{ asset('img/foods/Burger_3D.png') }}">
                                <p class="text-xl font-bold text-slate-700">Burger</p>
                                <p class="text-gray-700">Snacks</p>
                                <p><span class="text-orange-500">₱</span> 150.00</p>
                            </div>
                            <div class="p-5 text-center bg-white bg-opacity-50 border border-gray-100 shadow-sm xl:border-gray-50 backdrop-filter backdrop-blur-sm rounded-2xl">
                                <img src="{{ asset('img/foods/toast Sandwich_3D.png') }}">
                                <p class="text-xl font-bold text-slate-700">Toast Sandwich</p>
                                <p class="text-gray-700">Toast Sandwich</p>
                                <p><span class="text-orange-500">₱</span> 180.00</p>
                            </div>
                            <div class="p-5 text-center bg-white bg-opacity-50 border border-gray-100 shadow-sm xl:border-gray-50 backdrop-filter backdrop-blur-sm rounded-2xl">
                                <img src="{{ asset('img/foods/Toast and eggs_3D.png') }}">
                                <p class="text-xl font-bold text-slate-700">Toast and Eggs</p>
                                <p class="text-gray-700">Breakfast</p>
                                <p><span class="text-orange-500">₱</span> 150.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
