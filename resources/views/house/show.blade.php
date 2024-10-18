@extends('welcome')
@section('title','House')
@section('content')
@php
$showSidebar = true;
@endphp
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">

        {{-- Title and Description --}}
        <div class="bg-gray-50 px-6 py-8">
            <h1 class="text-3xl font-bold text-gray-800">{{ $house->title }}</h1>
            <p class="text-lg text-gray-600 mt-2">{{ $house->description }}</p>
        </div>

        <div class="px-6 py-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- House Details --}}
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4">House Details</h3>
                <ul class="space-y-3">
                    <li class="text-gray-700"><span class="font-bold">ID:</span> {{ $house->id }}</li>
                    <li class="text-gray-700"><span class="font-bold">Price:</span> ${{ number_format($house->price, 2) }}</li>
                    <li class="text-gray-700"><span class="font-bold">Total Area:</span> {{ $house->total_area }} m²</li>
                    <li class="text-gray-700"><span class="font-bold">Covered Area:</span> {{ $house->covered_area }} m²</li>
                    <li class="text-gray-700"><span class="font-bold">Rooms:</span> {{ $house->rooms_number }}</li>
                </ul>
            </div>

            {{-- Features --}}
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Features</h3>
                <ul class="space-y-3">
                    @foreach(['light', 'natural_gas', 'phone', 'water', 'sewers', 'internet', 'asphalt'] as $feature)
                        @if($house->property->$feature)
                            <li class="text-gray-700">
                                <span class="font-bold">✔ {{ str_replace('_', ' ', ucfirst($feature)) }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- House Images --}}
        <div class="px-6 py-8 bg-gray-50">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">House Images</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($images as $image)
                    <div class="aspect-w-4 aspect-h-3">
                        <img src="{{ url('storage/'.$image->path) }}" alt="House Image" class="rounded-lg object-cover w-full h-full shadow-md">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
