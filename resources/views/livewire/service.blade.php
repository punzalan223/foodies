<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] 
#[Title('Foodies | Service')]
class extends Component {
}; ?>

<div>
    <section id="service-section" class="py-12 ">
        <div class="container px-6 mx-auto md:px-12">
            <div class="text-center">
                <h2 class="text-4xl font-bold tracking-wide text-gray-800 md:text-4xl">
                    Our Services
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    Discover the range of services we offer to help you make the most out of your dining experience.
                </p>
            </div>

            <div class="grid mt-20 -mx-4 md:grid-cols-2 xl:grid-cols-3 ">
                <!-- Service 1 -->
                <div class="w-full px-4 mb-8">
                    <div class="overflow-hidden bg-white border rounded-lg shadow-lg">
                        <img src="{{ asset('img/bg/personalized_menu.jpg') }}" alt="Service 1" class="object-cover object-center w-full h-64">
                        <div class="p-6">
                            <h3 class="mb-2 text-2xl font-semibold text-gray-800">Personalized Menu</h3>
                            <p class="text-gray-600">
                                Customize your dining experience with our personalized menu options tailored to your preferences.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="w-full px-4 mb-8">
                    <div class="overflow-hidden bg-white border rounded-lg shadow-lg">
                        <img src="{{ asset('img/bg/fast_delivery.jpg') }}" alt="Service 2" class="object-cover object-center w-full h-64">
                        <div class="p-6">
                            <h3 class="mb-2 text-2xl font-semibold text-gray-800">Fast Delivery</h3>
                            <p class="text-gray-600">
                                Enjoy fast and reliable delivery service to your doorstep, ensuring your food arrives hot and fresh.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="w-full px-4 mb-8">
                    <div class="overflow-hidden bg-white border rounded-lg shadow-lg">
                        <img src="{{ asset('img/bg/support.jpg') }}" alt="Service 3" class="object-cover object-center w-full h-64">
                        <div class="p-6">
                            <h3 class="mb-2 text-2xl font-semibold text-gray-800">Exceptional Support</h3>
                            <p class="text-gray-600">
                                Our dedicated support team is here to assist you with any questions or issues you may have.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

