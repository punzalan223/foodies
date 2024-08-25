<div x-data="{ successModalOpen: $wire.entangle('successModalOpen') }">
    <div x-show="successModalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen p-5" x-cloak>
        <div x-show="successModalOpen" 
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
        <div x-show="successModalOpen"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative w-full py-6 space-y-4 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                <div class="flex items-center justify-between pb-2">
                    <h3 class="text-lg font-semibold">Success</h3>
                    <button type="button" @click="successModalOpen=false" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>  
                    </button>
                </div>
                <div class="relative w-auto">
                    <p>🎉 Your order has been placed successfully! We will prepare your meals and deliver them right to your door. 🥳</p>
                    <p class="mt-4">We will call you shortly to confirm your order.</p>
                    <p class="mt-4 font-medium text-orange-500">Thank you for choosing us.</p>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="button" @click="successModalOpen=false" class="px-4 py-2 text-white bg-orange-500 rounded-lg hover:bg-orange-600">Confirm</button>
                </div>
        </div>
    </div>
</div>