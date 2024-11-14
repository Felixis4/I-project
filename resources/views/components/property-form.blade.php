<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 bg-white p-6 rounded-lg shadow-lg">
    @csrf
    <input type="hidden" name="city_id" value="{{ request('city_id') }}">

    <x-error-validation/>

    {{-- Title --}}
    <div class="col-span-full">
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="title">Title</label>
        <input class="shadow appearance-none border border-gray-300 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-200" id="title" type="text" placeholder="Title" name="title">
        @error('title')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    {{-- Description --}}
    <div class="col-span-full">
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="description">Description</label>
        <textarea class="shadow appearance-none border border-gray-300 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-200" id="description" placeholder="Description" name="description"></textarea>
        @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    {{-- Price --}}
    <div>
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="price">Price</label>
        <input class="shadow appearance-none border border-gray-300 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-200" id="price" type="number" placeholder="Price" name="price">
        @error('price')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    {{-- Total Area --}}
    <div>
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="total_area">Total Area</label>
        <input class="shadow appearance-none border border-gray-300 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-200" id="total_area" type="number" placeholder="Total area" name="total_area">
        @error('total_area')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    {{-- Covered Area --}}
    <div>
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="covered_area">Covered Area</label>
        <input class="shadow appearance-none border border-gray-300 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-200" id="covered_area" type="number" placeholder="Covered area" name="covered_area">
        @error('covered_area')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    {{-- Number of Rooms --}}
    <div>
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="rooms_number">Number of Rooms</label>
        <input class="shadow appearance-none border border-gray-300 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-200" id="rooms_number" type="number" placeholder="Number of Rooms" name="rooms_number">
        @error('rooms_number')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    {{-- Features --}}
    <div class="col-span-full">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Features:</h3>
        <div class="grid grid-cols-2 gap-4">
            @foreach(['light', 'natural_gas', 'phone', 'water', 'sewers', 'internet', 'asphalt'] as $feature)
            <div class="flex items-center">
                <input type="hidden" name="{{ $feature }}" value="0">
                <input type="checkbox" class="mr-2 h-6 w-6">
                <label for="{{ $feature }}" class="text-black">{{ str_replace('_',' ',ucfirst($feature)) }}</label>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Images --}}
    <div class="col-span-full">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Images</h3>
        <div class="border-2 border-dashed border-gray-300 p-4 rounded-lg bg-gray-50">
            <label for="images" class="block text-sm text-gray-700 mb-2">Choose images to upload:</label>

            <div class="relative">
                <input type="file" name="images[]" id="images" multiple class="hidden" onchange="handleFiles(this.files)">
                <label for="images" class="bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">Select Images</label>
            </div>

            <div class="mt-3">
                <span id="file-name" class="ml-2 text-sm font-medium text-black">No files selected</span>
            </div>

            <div id="image-preview" class="grid grid-cols-3 gap-4 mt-5">
            </div>
        </div>
    </div>

    {{-- Submit Button --}}
    <div class="col-span-full">
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow focus:outline-none focus:ring-4 focus:ring-blue-300 w-full lg:w-auto transition-all duration-200">
            Create
        </button>
    </div>
</form>
<script>
function handleFiles(files) {
    const fileNames = Array.from(files).map(file => file.name).join(', ');
    document.getElementById('file-name').textContent = fileNames || 'No files selected';

    const preview = document.getElementById('image-preview');
    preview.innerHTML = '';

    Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = (e) => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('rounded-lg', 'shadow-md', 'object-cover', 'w-full', 'h-full');
            preview.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
}
</script>
