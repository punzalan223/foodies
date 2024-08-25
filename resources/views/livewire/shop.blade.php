<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] 
#[Title('Foodies | Shop')]
class extends Component {
}; ?>

<div>
    <section id="shop-section" class="py-12">
        <div class="container px-6 mx-auto md:px-12">
            <div class="mb-12 text-center">
                <h2 class="text-4xl font-bold tracking-wide text-gray-800 md:text-4xl">
                    Get in Touch with Us
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    We are here to assist you with any inquiries or support you may need. Contact us through the information below.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Contact Info -->
                <div class="p-6 overflow-hidden bg-white border rounded-lg shadow-lg">
                    <h3 class="mb-4 text-2xl font-semibold text-gray-800">Email Us</h3>
                    <p class="mb-4 text-gray-600">
                        For any questions or support, please email us at:
                    </p>
                    <a href="mailto:support@foodies.com" class="text-blue-500 hover:underline">support@foodies.com</a>
                </div>

                <!-- Phone Contact -->
                <div class="p-6 overflow-hidden bg-white border rounded-lg shadow-lg">
                    <h3 class="mb-4 text-2xl font-semibold text-gray-800">Call Us</h3>
                    <p class="mb-4 text-gray-600">
                        Reach us by phone for immediate assistance:
                    </p>
                    <p class="text-gray-800">
                        <a href="tel:+1234567890" class="text-blue-500 hover:underline">+1 234 567 890</a>
                    </p>
                </div>

                <!-- Address Info -->
                <div class="p-6 overflow-hidden bg-white border rounded-lg shadow-lg">
                    <h3 class="mb-4 text-2xl font-semibold text-gray-800">Visit Us</h3>
                    <p class="mb-4 text-gray-600">
                        You can also visit our office at:
                    </p>
                    <p class="text-gray-800">
                        123 Foodie Lane, Flavor Town, FT 12345
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
