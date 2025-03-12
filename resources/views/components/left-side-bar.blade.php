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
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 {{request()->is('dashboard') ? 'bg-gray-200' : 'bg-white'}} hover:bg-gray-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>Profile</span>
            </a>
            <a href="{{ route('dashboardmyrecipes.myrecipes') }}" class="flex items-center px-4 py-3 text-gray-600 {{request()->is('dashboardmyrecipes') ? 'bg-gray-200' : 'bg-white'}} hover:bg-gray-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z" />
                </svg>
                <span>My Recipes</span>
            </a>
            <a href="{{route('favouriterecipes.index')}}" class="flex items-center px-4 py-3 text-gray-600 {{request()->is('favouriterecipes') ? 'bg-gray-200' : 'bg-white'}} hover:bg-gray-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <span>Favorite Recipes</span>
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                <span>Comments</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 min-w-0 flex flex-col">
        {{$slot}}
    </div>
</div>