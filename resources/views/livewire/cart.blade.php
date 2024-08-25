<?php

use App\Models\Menu;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new 
#[Layout('components.layouts.app')] 
#[Title('Foodies | Cart')]
class extends Component {
    
    public $cart_items;
    public $modalPersonInfo = false;
    public $modalSubmission = false;
    public $successModalOpen = false;

    #[Validate('required|min:3')] 
    public $name = '';

    #[Validate('required|min:11')] 
    public $contact = '';

    #[Validate('required|min:11')] 
    public $address = '';
    
    public function mount()
    {
        $this->loadCartItems();
    }

    public function updated()
    {
        $this->validateCartItems();
        $this->syncCartWithSession();
    }

    public function validateInfo()
    {
        $this->validate();
        
        $this->modalPersonInfo = false;
        $this->modalSubmission = true;
    }

    public function submitCart()
    {
        $this->clearCart();
        $this->successModalOpen = true;
    }

    public function removeFromCart($id)
    {
        unset($this->cart_items[$id]);
        $this->syncCartWithSession();
        $this->dispatch('add-cart-items');
    }

    public function removeAll()
    {
        $this->clearCart();
    }

    /**
     * Load cart items from the session.
     */
    protected function loadCartItems()
    {
        $this->cart_items = session()->get('cart_items', []);
    }

    /**
     * Validate and sanitize the cart items.
     */
    protected function validateCartItems(): void
    {
        $this->cart_items = array_map(function($item) {
            $item['qty'] = isset($item['qty']) && (int) $item['qty'] > 0 ? abs((int) $item['qty']) : 1;
            return $item;
        }, $this->cart_items);
    }

    /**
     * Sync the cart items with the session.
     */
    protected function syncCartWithSession()
    {
        session()->put('cart_items', $this->cart_items);
    }

    /**
     * Clear the cart items both locally and in the session.
     */
    protected function clearCart()
    {
        $this->cart_items = [];
        session()->forget('cart_items');
        $this->dispatch('add-cart-items');
    }
}; ?>

<div>
    <section id="cart-section">
        <div class="container px-5 mx-auto">
            <div class="py-10 my-10 xl:px-20">
                @if(count($cart_items) == 0)
                    <div class="flex flex-col items-center justify-center space-y-4">
                        <p class="text-2xl font-semibold text-gray-800">Your cart is empty 😢</p>
                        <a class="transition-transform transform hover:scale-105" href="{{ route('menu') }}" wire:navigate>
                            <div class="inline-flex items-center px-6 py-3 text-white rounded-full shadow-lg bg-gradient-to-r from-orange-400 to-orange-600 hover:from-orange-500 hover:to-orange-700">
                                <span class="mr-2">🍽️</span> Browse Foods
                            </div>
                        </a>
                    </div>
                    @else
                    <form
                        x-data="{ modalOpen: false }" 
                        wire:submit="submitCart"
                    >
                        <div class="flex gap-8">
                            <div class="w-full md:w-1/2">
                                <div class="max-w-xl p-8 m-auto bg-white rounded-lg shadow-md">
                                    <div class="flex gap-4 mb-8">
                                        <button 
                                            class="relative px-4 py-2 text-white transition-all duration-300 ease-in-out transform bg-red-500 rounded-full shadow-lg hover:bg-red-600" 
                                            type="button"
                                            wire:click="removeAll"
                                        >
                                            Remove all
                                        </button>
                                        <a href="{{ route('menu') }}" wire:navigate>
                                            <button class="relative px-4 py-2 text-white transition-all duration-300 ease-in-out transform bg-orange-500 rounded-full shadow-lg hover:bg-orange-600" type="button">
                                                Add more
                                            </button>
                                        </a>
                                    </div>
                                    @foreach($cart_items as $key => $cart_item)
                                        <div class="flex items-center pb-6 mb-6 border-b border-gray-200">
                                            <!-- Image Section -->
                                            <div class="w-2/4 overflow-hidden rounded-lg bg-orange-50">
                                                <img class="object-cover w-full" src="{{ asset("img/foods/{$cart_item['filename']}") }}" alt="{{ $cart_item['filename'] }}">
                                            </div>
            
                                            <!-- Details Section -->
                                            <div class="flex flex-col w-3/4 pl-4">
                                                <p class="text-xl font-semibold text-gray-800">{{ $cart_item['title'] }}</p>
                                                <p class="text-sm text-gray-600">{{ $cart_item['category'] }}</p>
            
                                                <div class="flex items-center justify-between mt-4 space-x-4">
                                                    {{-- @dump($cart_item['qty']) --}}
                                                    <input 
                                                        class="w-20 h-10 p-2 text-center border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                                                        type="number" 
                                                        min="1" 
                                                        placeholder="Qty" 
                                                        wire:model.number.live.debounce.250ms="cart_items.{{ $key }}.qty"
                                                    >
                                                    <p class="text-xl font-semibold text-orange-500">₱{{ $cart_item['price'] }}</p>
                                                </div>
            
                                                <button 
                                                    type="button"
                                                    class="px-4 py-2 mt-4 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500"
                                                    wire:click="removeFromCart({{ $key }})"
                                                >
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="hidden w-1/2 md:block">
                                <div class="sticky px-4 py-8 bg-white rounded-lg shadow-md top-28">
                                    <div class="max-w-xl px-4 m-auto overflow-auto max-h-96 ">
                                        <p class="mb-8 text-2xl font-bold text-orange-500">Payment</p>
                                        <div class="pb-4 border-b">                                    
                                            @php
                                                $overallTotal = 0;
                                            @endphp
        
                                            @foreach ($cart_items as $cart_item)
                                                @php
                                                    $qty = isset($cart_item['qty']) ? $cart_item['qty'] : 1;
                                                    $price = isset($cart_item['price']) ? $cart_item['price'] : 0;
                                                    $total = $qty * $price;
                                                    $overallTotal += $total;
                                                @endphp
        
                                                <div class="flex flex-col flex-wrap justify-between mb-4 lg:gap-4 lg:flex-row" wire:key="checkout-top-{{ $cart_item['id'] }}">
                                                    <div class="flex-1">{{ $cart_item['title'] }}</div>
                                                    <div class="text-gray-700">
                                                        Qty: {{ $qty }} × {{ number_format($price, 2) }} = {{ number_format($total, 2) }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="flex justify-between mt-4 text-lg font-semibold">
                                            <div class="flex-1">Total</div>
                                            <div>{{ number_format($overallTotal, 2) }}</div>
                                        </div>
                                        <p class="text-teal-500 font-semin-bold">Cash on delivery</p>
                                        <div class="flex justify-end mt-4">
                                            <button 
                                                class="px-4 py-2 text-white bg-orange-500 rounded-lg shadow-lg hover:bg-orange-600"
                                                type="button"
                                                @click="$wire.modalPersonInfo=true"
                                            >
                                                Checkout
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fixed container for screens smaller than medium -->
                        <div x-data="{ open: false }">
                            <!-- Button to toggle checkout visibility -->
                            <div class="fixed bottom-0 left-0 right-0 bg-white border-t rounded-t-lg shadow-md md:hidden">
                                <div class="flex items-center justify-between max-w-xl px-4 py-2 mx-auto">
                                    <p class="text-xl font-bold text-orange-500">Payment</p>
                                    <!-- Toggle button -->
                                    <button type="button" @click="open = !open" class="text-xl text-orange-500">
                                        <span x-show="!open">+</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Checkout Section -->
                            <div x-show="open" class="fixed bottom-0 left-0 right-0 overflow-auto bg-white border-t rounded-t-lg shadow-md max-h-60 md:hidden">
                                <div class="max-w-xl px-10 py-5 mx-auto text-sm">
                                    <div class="flex justify-between mb-4">
                                        <p class="text-xl font-bold text-orange-500">Payment</p>
                                        <!-- Toggle button -->
                                        <button type="button" @click="open = !open" class="text-xl text-orange-500">
                                            <span x-show="open">-</span>
                                        </button>
                                    </div>
                                    <div class="pb-4 border-b">
                                        @php
                                            $overallTotal = 0;
                                        @endphp

                                        @foreach ($cart_items as $cart_item)
                                            @php
                                                $qty = isset($cart_item['qty']) ? $cart_item['qty'] : 1;
                                                $price = isset($cart_item['price']) ? $cart_item['price'] : 0;
                                                $total = $qty * $price;
                                                $overallTotal += $total;
                                            @endphp

                                            <div class="flex flex-wrap justify-between gap-4 mb-4" wire:key="checkout-bottom-{{ $cart_item['id'] }}">
                                                <div class="flex-1">{{ $cart_item['title'] }}</div>
                                                <div class="text-gray-700">
                                                    Qty: {{ $qty }} x {{ number_format($price, 2) }} = {{ number_format($total, 2) }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="flex justify-between mt-4 text-lg font-semibold">
                                        <div class="flex-1">Total</div>
                                        <div>{{ number_format($overallTotal, 2) }}</div>
                                    </div>
                                    <p class="text-teal-500 font-semin-bold">Cash on delivery</p>
                                    <div class="flex justify-end mt-4">
                                        <button 
                                            class="px-4 py-2 text-white bg-orange-500 rounded-lg shadow-lg hover:bg-orange-600"
                                            type="button"
                                            @click="$wire.modalPersonInfo=true" 
                                        >
                                        Checkout
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Submission --}}
                        @include('components.modal-submission')
                    </form>
                @endif
            </div>
        </div>
        {{-- Modal Person Information --}}
        @include('components.modal-information')
        {{-- Modal Success --}}
        @include('components.modal-success')
    </section>
</div>

@script
<script>
    document.querySelectorAll('input, textarea').forEach(input => {
        input.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
            }
        });
    });
</script>
@endscript