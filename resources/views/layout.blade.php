<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Fusion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

<x-header />

@if(request()->is('/'))
<x-recipe-header headermsg="Discover Global Fusion Flavors" submsg="Explore recipes that blend culinary traditions from around the world"/>
@endif

@if(request()->is('recipes'))
<x-recipe-header headermsg="Fusion Recipes"/>
@endif
    <main class="container mx-auto p-4 mt-4">
    @if (session('success'))
    <x-alert type="success" message="{{ session('success') }}" />
    @endif

    @if (session('error'))
    <x-alert type="error" message="{{ session('error') }}" />
    @endif
        {{$slot}}
    </main>

@if(request()->is('/'))
<!-- Footer  -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
        <div class="text-center md:text-left mb-4 md:mb-0">
            <h4 class="font-bold mb-4">Quick Links</h4>
            <ul>
                <li class="mb-2">About Us</li>
                <li class="mb-2">Submit a Recipe</li>
                <li>Contact</li>
            </ul>
        </div>
        <div class="text-center md:text-left mb-4 md:mb-0">
            <h4 class="font-bold mb-4">Connect</h4>
            <ul>
                <li class="mb-2">Facebook</li>
                <li class="mb-2">Instagram</li>
                <li>YouTube</li>
            </ul>
        </div>
        <div class="text-center md:text-left">
            <h4 class="font-bold mb-4">Newsletter</h4>
            <x-text id="email" type="email" name="email" placeholder="Enter your email" class="w-full bg-white px-4 py-2 rounded mb-4 text-gray-800" />
            <button class="bg-orange-500 text-white w-full py-2 rounded">Subscribe</button>
        </div>
    </div>
</footer>
@endif

</body>
</html>