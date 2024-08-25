<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] 
#[Title('Foodies | Menu')]
class extends Component {
}; ?>

<div>
    <section id="menu-section" class="py-12">
        <div class="container px-6 mx-auto md:px-12">
            <div class="text-center">
                <h2 class="text-4xl font-bold tracking-wide text-gray-800 md:text-4xl">
                    Explore Our Menu
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    Discover our delicious selection of meals, made fresh and ready to enjoy.
                </p>
            </div>
            @livewire('menu-items')
        </div>
    </section>
</div>

