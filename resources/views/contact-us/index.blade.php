<x-layout>
    <!-- Hero Section -->
    <section class="relative bg-orange-500 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Us</h1>
                <p class="text-xl opacity-90">We'd love to hear from you! Reach out with your questions, recipe requests, or feedback.</p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-white" style="clip-path: polygon(0 100%, 100% 0, 100% 100%, 0% 100%);"></div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    <!-- Contact Info -->
                    <div class="w-full md:w-1/3 bg-gray-50 p-8">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-6">Get in Touch</h3>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Our Location</h4>
                            <p class="text-gray-600">31 Sanchaung Street<br>Sanchaung Township<br>Yangon City, 31SC</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Email Us</h4>
                            <p class="text-gray-600">info@foodfusion.com</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Call Us</h4>
                            <p class="text-gray-600">(95+) 9785603866</p>
                        </div>
                        
                        <div class="flex space-x-4 mt-8">
                            <a href="#" class="text-gray-600 hover:text-orange-500 ">
                                <i class="fa-brands fa-facebook text-2xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-orange-500">
                                <i class="fa-brands fa-twitter text-2xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-orange-500">
                                <i class="fa-brands fa-instagram text-2xl"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Form -->
                    <div class="w-full md:w-2/3 p-8">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-6">Send Us a Message</h3>
                        @if(session('success'))
                        <div x-data="{show : true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                        @endif
                        
                        <form action="{{route('contactus.store')}}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <x-inputs.text name="name" id="name" label="Your Name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your Name..."/>
                                </div>
                                
                                <div>
                                    <x-inputs.text id="email" name="email" type="email" label="Email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter your Email" />
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <x-inputs.select label="Subject" name="subject" id="subject" :options="['General Inquiry'=>'General Inquiry','Recipe Request'=>'Recipe Request','Feedback'=>'Feedback','Partnership'=>'Partnership','Other'=>'Other']" />
                            </div>
                            
                            <div class="mb-6">
                                <x-inputs.text-area label="Your Message" name="message" id="message" placeholder="Write Something..." />
                            </div>
                            
                            <button type="submit" class="px-6 py-3 bg-orange-500 text-white font-medium rounded-lg hover:bg-orange-600 transition duration-300">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>