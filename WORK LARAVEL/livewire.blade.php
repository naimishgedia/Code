<?
Livewire works with Laravel 8+.
php artisan --version

composer require livewire/livewire


Add inside <head>:
@livewireStyles


Add before </body>:
@livewireScripts


Create Livewire Login Component
php artisan livewire:make FoodItemComponent


This will make 
app/Http/Livewire/AdminLogin.php
resources/views/livewire/admin-login.blade.php	