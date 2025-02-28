<x-layout>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Upload Culinary Resource</h1>

        <form action="{{ route('culinary-resources.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <x-inputs.text label="Title" name="title" id="title" placeholder="e.g., Korean-Mexican Bulgogi Tacos" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500" />
            </div>

            <div>
                <x-inputs.text-area label="Description" name="description" id="description" placeholder="Describe your fusion recipe's inspiration and unique flavors" />
            </div>

            <div>
            <x-inputs.select label="Resource Type" name="type" id="type" :options="['recipe_card'=>'Recipe Card','tutorial'=>'Tutorial','video'=>'Video']" />
            </div>

            <!-- File Upload -->
            <div>
                <x-inputs.file label="File" name="file" id="file" />
                <p class="mt-1 text-sm text-gray-500">
                    Supported formats: PDF, DOC, DOCX, JPG, JPEG, PNG (Max: 10MB) Movies and MP4 (Max: 300MB)
                </p>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('culinary-resources.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Back
</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Upload Resource
                </button>
            </div>
        </form>
    </div>
</div>
</x-layout>
