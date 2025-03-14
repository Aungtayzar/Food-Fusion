<!--Sign up modal box--> 
<div x-data="{ open: false }" id="Signup-form">
<button
    @click="open = true"
    class="block px-4 py-2 bg-white hover:bg-gray-400 text-orange-500 hover:text-black rounded-xl"
  >
    Sign up
  </button>
<div
x-cloak
x-show="open"
class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-40"
>
<div @click.away="open = false" class="bg-white p-6 rounded-lg shadow-md w-full max-w-md text-black ">
  <h3 class="text-lg font-semibold mb-4">Sign up</h3>

  <form action="{{ route('register.store') }}" method="POST">
    @csrf
    <x-inputs.text name="firstname" id="firstname" label="Firstname" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your Firstname..." :required="true"/>
    <x-inputs.text name="lastname" id="lastname" label="Lastname" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your lastname..." :required="true"/>
    <x-inputs.text name="name" id="name" label="Username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your username..." :required="true"/>
    <x-inputs.text id="email" name="email" type="email" label="Email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your Email" :required="true"/>
    <x-inputs.text id="password" name="password" type="password" label="Password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your Password" :required="true"/>
    <x-inputs.text id="password_confirmation" name="password_confirmation" type="password" label="Confirm Password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Reenter your Password" :required="true"/>
      <button
        type="submit"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mt-2"
      >
        Register
      </button>
      <button
        type="button"
        @click="open = false"
        class="ml-2 bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded-md"
      >
        Cancel
      </button>
  </form>
</div>
</div>
</div>