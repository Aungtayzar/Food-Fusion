<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Fusion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @stack('styles')
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

<x-header />

@if(request()->is('/'))
<x-recipe-header headermsg="Discover Global Fusion Flavors" submsg="Explore recipes that blend culinary traditions from around the world"/>
@endif
@if(request()->is('/'))
@if (session('success'))
    <x-alert type="success" message="{{ session('success') }}" />
    @endif

    @if (session('status'))
    <x-alert type="status" message="{{ session('status') }}" />
    @endif

    @if (session('error'))
    <x-alert type="error" message="{{ session('error') }}" />
@endif
<x-home-mission />
@endif
@if(request()->is('recipes'))
<x-recipe-header headermsg="Fusion Recipes"/>
@endif
    <main class="container mx-auto p-4 mt-4">
        @if(!request()->is('/') && !request()->is('contactus'))
        @if (session('success'))
        <x-alert type="success" message="{{ session('success') }}" />
        @endif

        @if (session('status'))
        <x-alert type="status" message="{{ session('status') }}" />
        @endif

        @if (session('error'))
        <x-alert type="error" message="{{ session('error') }}" />
        @endif
        @endif 
        {{$slot}}
    </main>
@if(request()->is('/'))
<!-- Footer  -->
<x-footer />
{{-- in your blade template --}}
@include('cookie-consent::index')
@endif

<!-- Scripts -->
@stack('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dietary_preferences').select2({
            placeholder: "Choose Dietary Preferences",
            width: '100%'
        });
    });
</script>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('formSubmit', () => ({
            submit() {
                this.$refs.btn.disabled = true;
                this.$refs.btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                this.$refs.btn.classList.add('bg-indigo-400');
                this.$refs.btn.innerHTML =
                    `<span class="absolute left-2 top-1/2 -translate-y-1/2 transform">
                    <i class="fa-solid fa-spinner animate-spin"></i>
                    </span>Please wait...`;

                this.$el.submit()
            }
        }))
    })
</script>
</body>
</html>