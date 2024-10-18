@extends('welcome')
@section('title', 'Cities')
@section('content')
@php
$showSidebar = true;
@endphp
<div class="w-full p-4">

    <x-error-validation/>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <h1 class="text-2xl text-white font-bold my-4">Cities</h1>
    <div class="m-2 mb-4">
        <a href="{{ route('city.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New City
        </a>
    </div>
    @forelse ($cities as $city)
        <div class="flex justify-between m-2 rounded items-center bg-white px-4 py-2 border-b">
            <div>
                <h1 class="text-blue-600">{{ $city->name }}</h1>
            </div>
            <div>
                <form action="{{ route('city.destroy', $city->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <div class="flex justify-center my-2 rounded items-center bg-white px-4 py-2 border-b">
            <p class="text-gray-600">No Cities Available</p>
        </div>
    @endforelse
</div>
@endsection

