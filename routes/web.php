<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/home', 'home')->name('home');
Volt::route('/menu', 'menu')->name('menu');
Volt::route('/cart', 'cart')->name('cart');
Volt::route('/service', 'service')->name('service');
Volt::route('/shop', 'shop')->name('shop');
