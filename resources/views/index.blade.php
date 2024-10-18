@extends('welcome')
@section('content')

<div class="w-full p-4 text-white">
    <h1 class="mb-6 mr-64 text-center text-4xl font-bold">Welcome to I-project</h1>

    <div class="m-4 text-left">
        <h1 class="text-xl mb-4">First, add Cities!</h1>
        <a href="{{route('city.index')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mr-4 rounded">
            View Cities
        </a>
        <a href="{{route('city.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New City</a>
    </div>

    <div class="p-4">
        <h1 class="text-xl mb-4">Now add Properties!</h1>
        <a href="{{route('property.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            New Property
        </a>
    </div>

    <div class="p-4">
        <h1 class="text-xl mb-4">Or view your current Properties!</h1>
        <a href="{{route('house.index')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mr-4 rounded">
            View Houses
        </a>
        <a href="{{route('apartment.index')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            View Apartments
        </a>
    </div>

    <div class="m-4 text-left">
        <h1 class="text-xl mb-4">Get info of your properties in JSON!</h1>
        <a href="json" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Json endpoint</a>
    </div>
</div>

@endsection
@php
$showSidebar = false;
@endphp
