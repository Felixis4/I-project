@extends('welcome')
@section('title', 'Edit Images')
@section('content')
@php
$showSidebar = true;
@endphp
<div class="w-full p-2">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg font-medium text-gray-900">House Images</h3>
        <div class=" my-4 grid grid-cols-4 gap-4">
            @foreach ($images as $image)
                <div class="relative">
                    <img src="{{ url('storage/'.$image->path) }}" alt="House Image" class="rounded-lg">
                    <form method="POST" action="{{ route('image.delete', $image->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-2 top-0 right-0 bg-red-600 text-white rounded-full px-2 py-1">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    <a href="{{ url($type.'/'.$id.'/edit') }}" class="inline-block px-6 py-2.5 bg-black text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out">
        Back
    </a>
</div>
@endsection
