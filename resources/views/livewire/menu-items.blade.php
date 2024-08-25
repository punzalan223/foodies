<?php

use App\Models\Menu;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Volt\Component;

new class extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';
    public $cart_items = [];

    public function mount()
    {
        $this->initializeCart();
    }

    protected function initializeCart(): void
    {
        $this->cart_items = session()->get('cart_items', []);
    }

    public function with(): array
    {
        return [
            'menus' => $this->loadMenu(),
            'popular_picks' => $this->loadPopularPicks(),
        ];
    }

    public function addToCart(int $id): void
    {
        $this->toggleCartItem($id);
        session()->put('cart_items', $this->cart_items);
        $this->dispatch('add-cart-items');
    }

    protected function toggleCartItem(int $id): void
    {
        if (isset($this->cart_items[$id])) {
            unset($this->cart_items[$id]);
        } else {
            $menu = Menu::find($id);
            $this->cart_items[$id] = $this->createCartItem($menu);
        }
    }

    protected function createCartItem(Menu $menu): array
    {
        return [
            'id' => $menu->id,
            'title' => $menu->title,
            'category' => $menu->category,
            'qty' => 1,
            'price' => $menu->price,
            'filename' => $menu->filename,
        ];
    }

    protected function loadMenu()
    {
        return Menu::where(function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('category', 'like', '%' . $this->search . '%')
                ->orWhere('price', 'like', '%' . $this->search . '%');
        })->paginate(10);
    }

    protected function loadPopularPicks()
    {
        return Menu::whereIn('title', ['Pizza', 'Burger', 'Toast Sandwich', 'Toast and Eggs'])->get();
    }
}; ?>


<div class="px-5">
    @if (count($cart_items) != 0)
        <a class="fixed z-10 bottom-5 right-5" href="{{ route('cart') }}" wire:navigate>
            <div class="px-4 py-2 text-white bg-orange-500 rounded-lg hover:bg-orange-600">
                Checkout
            </div>
        </a>
    @endif
    <div class="my-20">
        <p class="mb-10 text-2xl font-bold text-orange-500">Popular Picks</p>
        <div class="grid gap-8 m-auto max-w-80 sm:max-w-full sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($popular_picks as $popular)
                <div 
                    class="relative p-5 text-center bg-white bg-opacity-50 border border-gray-200 shadow-sm backdrop-filter backdrop-blur-sm rounded-2xl"
                    wire:key="popular-menu-{{ $popular->id }}"
                >
                    <img class="w-48 m-auto sm:w-full" src="{{ asset( "img/foods/$popular->filename" ) }}" alt="">
                    <p class="mt-2 text-xl font-bold text-slate-700">{{ $popular->title }}</p>
                    <p class="text-gray-700">{{ $popular->category }}</p>
                    <p><span class="text-orange-500">₱</span> {{ $popular->price }}</p>
                    <button 
                        class="relative px-6 py-2 mt-4 font-bold text-orange-500 border border-orange-500 max-w-96 hover:bg-orange-500 hover:text-white {{ array_key_exists($popular->id, $cart_items) ? '!bg-orange-500 !text-white' : '' }} transition-transform hover:scale-105"
                        type="button"
                        wire:click="addToCart({{ $popular->id }})"
                        wire:loading.attr="disabled"
                        wire:target="addToCart({{ $popular->id }})"
                    >
                        <span wire:loading.remove wire:target="addToCart({{ $popular->id }})">
                            {{ array_key_exists($popular->id, $cart_items) ? "In Cart" : "🛍️ Add to Cart" }}
                        </span>
                        <div class="flex items-center justify-center w-full h-full mt-2" wire:loading wire:target="addToCart({{ $popular->id }})">
                            <svg class="animate-spin h-5 w-5 text-[#1F4B55]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 2.042.777 3.908 2.05 5.334l1.95-2.043z"></path>
                            </svg>
                        </div>
                    </button>
                </div>
            @endforeach

        </div>

        
        <div class="flex justify-end">
            <input 
                class="w-full px-4 py-2 mt-10 mb-5 border border-orange-200 rounded-lg shadow-sm focus:outline-none focus:border-2 focus:border-orange-500 max-w-96"
                id="menu-search"
                placeholder="Search..."
                type="search"
                wire:model.live.debounce.500ms="search"
            >
        </div>
        <p class="mb-10 text-2xl font-bold text-orange-500">Foods</p>
        <div class="grid gap-8 m-auto max-w-80 sm:max-w-full sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5">
            @foreach ($menus as $menu)
                <div 
                    class="relative p-5 text-center bg-white bg-opacity-50 border border-gray-200 shadow-sm backdrop-filter backdrop-blur-sm rounded-2xl"
                    wire:key="menus-menu-{{ $menu->id }}"
                >
                    <div class="absolute -top-6 right-5">          
                        <div 
                            class="grid items-center justify-center w-12 h-12 bg-white border rounded-full shadow-md border-yellow-50 text-teal-900 {{ array_key_exists($menu->id, $cart_items) ? "!bg-orange-500 !text-white" : '' }} hover:bg-orange-500 hover:text-white cursor-pointer"
                            wire:click="addToCart({{ $menu->id }})"
                            wire:loading.attr="disabled"
                            wire:target="addToCart({{ $menu->id }})"
                        > 
                            <span wire:loading.remove wire:target="addToCart({{ $menu->id }})">
                                <button class="flex items-center justify-center w-full h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                </button>
                            </span>   
                            <div class="flex items-center justify-center w-full h-full mt-6" wire:loading wire:target="addToCart({{ $menu->id }})">
                                <svg class="animate-spin h-5 w-5 text-[#1F4B55]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 2.042.777 3.908 2.05 5.334l1.95-2.043z"></path>
                                </svg>
                            </div>          
                        </div>
                    </div>
                    <img class="w-48 m-auto sm:w-full" src="{{ asset( "img/foods/$menu->filename" ) }}" alt="">
                    <p class="mt-2 text-xl font-bold text-slate-700">{{ $menu->title }}</p>
                    <p class="text-gray-700">{{ $menu->category }}</p>
                    <p><span class="text-orange-500">₱</span> {{ $menu->price }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-10">
            {{ $menus->links(data: ['scrollTo' => '#menu-search']) }}
        </div>
    </div>
</div>
