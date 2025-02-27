<x-layout>
    <div class="flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-3xl font-bold text-center mb-8 text-orange-600">Request a password reset email</h2>
            
            <form method="POST" action="{{route('password.request')}}" class="space-y-6" x-data="formSubmit" @submit.prevent="submit">
                @csrf
                
                <div>
                    <x-inputs.text id="email" name="email" type="email" label="Email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your Email" />
                </div>

                <button type="submit" x-ref="btn"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-layout>