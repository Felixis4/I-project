@extends('welcome')
@section('title','House')
@section('content')
@php
$showSidebar = true;
@endphp
<div class="flex text-black justify-center">
    <div class="bg-white shadow-md rounded p-6 mb-4">
        <h2 class="mb-6 text-2xl font-bold text-gray-900">Add a New House</h2>
        <x-property-form
        :action="route('house.store')"
        :isEdit="false"
        />
    </div>
</div>
@endsection
