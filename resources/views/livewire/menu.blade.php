<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] 
#[Title('Foodies | Menu')]
class extends Component {
}; ?>

<div>
    <section id="menu-section">
        <div class="container mx-auto my-10">
            <div class="text-center">
                <h2 class="text-4xl font-bold tracking-wide text-gray-800 md:text-4xl">
                    Explore Our Menu
                </h2>
                <p class="mt-4 text-gray-600 ">
                    Discover our delicious selection of meals, made fresh and ready to enjoy.
                </p>
            </div>
            @livewire('menu-items')
        </div>
    </section>
</div>

