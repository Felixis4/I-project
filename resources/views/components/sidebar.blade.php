<div class="w-64 bg-gray-800 text-white h-screen fixed flex-col">

    <div class="p-4 font-bold text-xl">
        <a href="{{ route('home') }}">Home</a>
    </div>

    <nav class="flex flex-col p-4 space-y-4">

        {{-- Back button --}}
        <button onclick="window.history.back()" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            Back
        </button>

        {{-- Properties --}}
        <div class="relative inline-block text-left font-bold text-white">
            <button class="dropdown-button inline-flex justify-center w-full rounded-md px-4 py-2 bg-blue-500 hover:bg-blue-300 focus:outline-none">
                Properties
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <div class="dropdown-menu origin-top-right right-0 mt-2 w-56 rounded-md shadow-lg bg-black ring-1 ring-black ring-opacity-5 hidden">
                <div class="py-1">
                    <a href="{{route('property.create')}}" class="block px-4 py-2 text-sm hover:bg-black hover:text-gray-700">New Property</a>
                    <a href="{{route('house.index')}}" class="block px-4 py-2 text-sm hover:bg-black hover:text-gray-700">Houses</a>
                    <a href="{{route('apartment.index')}}" class="block px-4 py-2 text-sm hover:bg-black hover:text-gray-700">Apartments</a>
                </div>
            </div>
        </div>

        {{-- Cities --}}
        <div class=" inline-block text-left font-bold text-white">
            <button class="dropdown-button inline-flex justify-center w-full rounded-md px-4 py-2 bg-blue-500 hover:bg-blue-300 focus:outline-none">
                Cities
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <div class="dropdown-menu origin-top-right right-0 mt-2 w-56 rounded-md shadow-lg bg-black ring-1 ring-black ring-opacity-5 hidden">
                <div class="py-1">
                    <a href="{{route('city.index')}}" class="block px-4 py-2 text-sm hover:bg-black hover:text-gray-700">View Cities</a>
                    <a href="{{route('city.create')}}" class="block px-4 py-2 text-sm hover:bg-black hover:text-gray-700">New City</a>
                </div>
            </div>
        </div>

        {{-- Json --}}
        <a href="{{route('json')}}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">
            Json Endpoint
        </a>

    </nav>
</div>

<script>

    document.addEventListener('click', function(event) {
        // Close all dropdowns if clicked outside
        const dropdownMenus = document.querySelectorAll('.dropdown-menu');
        const dropdowns = document.querySelectorAll('.relative');

        dropdowns.forEach((dropdown) => {
            const isClickInside = dropdown.contains(event.target);
            const dropdownMenu = dropdown.querySelector('.dropdown-menu');

            if (!isClickInside) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });

    // Add click event listener to all dropdown buttons
    document.querySelectorAll('.dropdown-button').forEach((button) => {
        button.addEventListener('click', function(event) {
            // Toggle the corresponding dropdown menu visibility
            const dropdownMenu = this.nextElementSibling; // Assuming the next element is the dropdown menu
            dropdownMenu.classList.toggle('hidden');

            event.stopPropagation(); // Prevent the click event from bubbling up to the document
        });
    });

</script>
