<x-layout>
    <!-- Featured Recipes  -->
    <section class="container mx-auto py-12 px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-8">Featured Fusion Recipes</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            @forelse($recipes as $recipe)
            <x-recipe-card :recipe="$recipe"/>
            @empty
            <li>No recipe Found</li>
            @endforelse            
        </div>
    </section>
    
    <div class="container py-5">
        <!-- Featured Events Section -->
        @if($featuredEvents->count() > 0)
        <section class="mb-10">
            <h2 class="text-center text-2xl font-bold mb-6">Featured Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($featuredEvents as $featuredEvent)
                <div class="flex flex-col h-full rounded-lg shadow-md overflow-hidden bg-white">
                    @if($featuredEvent->image_path)
                    <img src="{{ asset('storage/' . $featuredEvent->image_path) }}" class="w-full h-48 object-cover" alt="{{ $featuredEvent->title }}">
                    @else
                    <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                        <i class="fa-regular fa-calendar"></i>
                    </div>
                    @endif
                    <div class="p-5 flex-grow">
                        <h3 class="text-lg font-semibold mb-2">{{ $featuredEvent->title }}</h3>
                        <p class="text-gray-500 flex items-center mb-2 space-x-2">
                            <i class="fa-regular fa-calendar"></i>
                            <span>{{ $featuredEvent->start_date->format('M d, Y - h:i A') }}</span>
                        </p>
                        @if($featuredEvent->location)
                        <p class="text-gray-500 flex items-center mb-3 space-x-2">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>{{ $featuredEvent->location }}</span>
                        </p>
                        @endif
                        <p class="text-gray-700 mb-4">{{ Str::limit($featuredEvent->description, 100) }}</p>
                    </div>
                    <div class="px-5 pb-5">
                        <a href="{{ route('events.show', $featuredEvent) }}" class="inline-block px-4 py-2 border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white transition duration-200 rounded">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
    
        <!-- All Upcoming Events Section -->
        <section class="py-8">
            <h2 class="text-center text-2xl font-bold mb-6">Upcoming Events</h2>
            
            @if($upcomingEvents->count() > 0)
                <!-- Slider main container -->
                <div class="swiper upcomingEventsSwiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach($upcomingEvents as $event)
                        <div class="swiper-slide p-2">
                            <div class="bg-white rounded-lg border border-gray-400 shadow-sm hover:shadow-lg transition duration-200 p-5 h-full">
                                <h3 class="text-lg font-semibold mb-2">{{ $event->title }}</h3>
                                <div class="flex items-center text-gray-500 mb-3 space-x-2">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span>{{ $event->start_date->format('M d, Y - h:i A') }}</span>
                                </div>
                                @if($event->location)
                                <div class="flex items-center text-gray-500 mb-3 space-x-2">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>{{ $event->location }}</span>
                                </div>
                                @endif
                                <p class="text-gray-700 mb-3">{{ Str::limit($event->description, 100) }}</p>
                                <a href="{{ route('events.show', $event) }}" class="text-blue-500 hover:text-blue-700 font-medium inline-flex items-center space-x-2">
                                    <span>Read More</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            @else
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 text-blue-700 text-center">
                    No upcoming events at the moment. Check back soon!
                </div>
            @endif
        </section>

        <x-culinary-trend />

        <!-- Add this to your layout or at the end of the file -->
        @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <style>
            .upcomingEventsSwiper {
                padding: 20px 40px !important;
            }
            .swiper-button-next,
            .swiper-button-prev {
                color: #3B82F6 !important;
            }
            .swiper-pagination-bullet-active {
                background: #3B82F6 !important;
            }
        </style>
        @endpush

        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.upcomingEventsSwiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        </script>
        @endpush
    </div>
</x-layout>