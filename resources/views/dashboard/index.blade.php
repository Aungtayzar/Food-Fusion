<x-layout>    

    <x-left-side-bar>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-semibold mb-6">Profile Settings</h2>
                    @if($user->avatar)
                        <div class="mt-2 flex justify-center">
                        <img
                            src="{{ asset('storage/' . $user->avatar) }}"
                            alt="Avatar"
                            class="w-32 h-32 object-cover rounded-full"
                        />
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-inputs.file label="Profile Picture" name="avatar" id="avatar"  />
                        </div>

                        <div>
                            <x-inputs.text label="Username" name="name" id="name" value="{{auth()->user()->name }} " class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500" />
                        </div>

                        <div>
                            <x-inputs.text label="Email" name="email" id="email" value="{{ auth()->user()->email }} " class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>

                <!-- User Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center">
                            <i class="fas fa-utensils text-3xl text-indigo-600"></i>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">My Recipes</h3>
                                <p class="text-2xl font-bold">{{ auth()->user()->recipes()->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center">
                            <i class="fas fa-heart text-3xl text-red-500"></i>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Favorite Recipes</h3>
                                <p class="text-2xl font-bold">{{ auth()->user()->favorites()->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center">
                            <i class="fas fa-comments text-3xl text-green-500"></i>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Comments</h3>
                                <p class="text-2xl font-bold">{{ auth()->user()->comments()->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-left-side-bar>
</x-layout>