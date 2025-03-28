<div x-data="{ sidebarOpen: false }" class="flex min-h-screen bg-gray-100">
    <!-- Mobile menu button -->
    <div class="lg:hidden top-38 left-4 z-20">
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-md text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg x-show="!sidebarOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="sidebarOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Sidebar -->
    <div x-show="sidebarOpen" class="lg:hidden fixed inset-0 bg-gray-600 bg-opacity-75 z-10" @click="sidebarOpen = false"></div>

    <div :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" class="fixed lg:relative lg:translate-x-0 inset-y-0 left-0 w-64 transform transition-transform duration-300 ease-in-out bg-white shadow-lg z-20">
        <div class="p-4 bg-indigo-600">
            <h2 class="text-white text-2xl font-semibold">Dashboard</h2>
        </div>
        <nav class="mt-4">
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 {{request()->is('dashboard') ? 'bg-gray-200' : 'bg-white'}} hover:bg-gray-200 gap-3">
                <i class="fa-regular fa-user"></i>
                <span>Profile</span>
            </a>
            <a href="{{ route('dashboardmyrecipes.myrecipes') }}" class="flex items-center px-4 py-3 text-gray-600 {{request()->is('dashboard/myrecipes') ? 'bg-gray-200' : 'bg-white'}} hover:bg-gray-200 gap-3">
                <i class="fa-regular fa-bookmark"></i>
                <span>My Recipes</span>
            </a>
            <a href="{{route('favouriterecipes.index')}}" class="flex items-center px-4 py-3 text-gray-600 {{request()->is('dashboard/favouriterecipes') ? 'bg-gray-200' : 'bg-white'}} hover:bg-gray-200 gap-3">
                <i class="fa-regular fa-heart"></i>
                <span>Favorite Recipes</span>
            </a>
            @can('viewAny', App\Models\ContactUs::class)
                <a href="{{ route('dashboard.contact') }}" class="flex items-center px-4 py-3 text-gray-600 {{request()->is('dashboard/contact') ? 'bg-gray-200' : 'bg-white'}} hover:bg-gray-200 gap-3">
                    <i class="fa-regular fa-message"></i> 
                    <span>Contact</span>
                </a>
            @endcan

            @can('viewAny', App\Models\Event::class)
            <a href="{{route('events.index')}}" class="flex items-center px-4 py-3 text-gray-600 {{request()->is('events') ? 'bg-gray-200' : 'bg-white'}} hover:bg-gray-200 gap-3">
                <i class="fa-regular fa-calendar"></i>
                <span>Events Mangement</span>
            </a> 
            @endcan
            
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 min-w-0 flex flex-col">
        {{$slot}}
    </div>
</div>