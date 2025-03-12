<x-layout>
        <div class="flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-3xl font-bold text-center mb-8 text-orange-600">Create Account</h2>
                
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-inputs.text name="firstname" id="firstname" label="Firstname" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your Firstname..."/>
                    </div>

                    <div>
                        <x-inputs.text name="lastname" id="lastname" label="Lastname" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your lastname..."/>
                    </div>
                    
                    <div>
                        <x-inputs.text name="name" id="name" label="Username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your username..."/>
                    </div>
    
                    <div>
                        <x-inputs.text id="email" name="email" type="email" label="Email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your Email" />
                    </div>
    
                    <div>
                        <x-inputs.text id="password" name="password" type="password" label="Password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your Password" />
                    </div>
    
                    <div>
                        <x-inputs.text id="password_confirmation" name="password_confirmation" type="password" label="Confirm Password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Reenter your Password" />
                    </div>

                    <div>
                        <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                        @error('g-recaptcha')
                            <p class="text-red-500 text-sm mt-1">{{$message}}</p>    
                        @enderror
                    </div>
    
                    <button type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                        Register
                    </button>
                </form>
    
                <p class="mt-4 text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-medium text-orange-600 hover:text-orange-500">
                        Sign in
                    </a>
                </p>
            </div>
        </div>
</x-layout>