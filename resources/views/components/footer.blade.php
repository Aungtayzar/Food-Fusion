<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
        <div class="text-center md:text-left mb-4 md:mb-0">
            <h4 class="font-bold mb-4">Quick Links</h4>
            <ul>
                <li class="mb-2"><a href="{{ route('aboutus.index') }}" class="hover:text-orange-300 transition-all duration-75 outline-none">About Us</a></li>
                <li class="mb-2"><a href="{{ route('policy.index') }}" class="hover:text-orange-300 transition-all duration-75 outline-none">Policy</a></li>
                <li class="mb-2"><a href="{{ route('contactus.index') }}" class="hover:text-orange-300 transition-all duration-75 outline-none">Contact Us</a></li>
            </ul>
        </div>
        <div class="text-center md:text-left mb-4 md:mb-0">
            <h4 class="font-bold mb-4">Connect</h4>
            <ul>
                <li class="mb-2"><a href="https://www.facebook.com/" class="hover:text-orange-300 transition-all duration-75 outline-none">Facebook</a></li>
                <li class="mb-2"><a href="http://www.instagram.com/" class="hover:text-orange-300 transition-all duration-75 outline-none">Instagram</a></li>
                <li class="mb-2"><a href="https://www.youtube.com/" class="hover:text-orange-300 transition-all duration-75 outline-none">YouTube</a></li>
            </ul>
        </div>
        <div class="text-center md:text-left">
            <h4 class="font-bold mb-4">Newsletter</h4>
            <x-text id="email" type="email" name="email" placeholder="Enter your email" class="w-full bg-white px-4 py-2 rounded mb-4 text-gray-800" />
            <button class="bg-orange-500 text-white w-full py-2 rounded">Subscribe</button>
        </div>
    </div>
</footer>