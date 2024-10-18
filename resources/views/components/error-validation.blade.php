@if ($errors->any())
<div class="col-span-full bg-red-200 border-l-4 border-red-600 text-red-800 px-4 py-3 rounded relative mb-6" role="alert">
    <ul class="list-disc list-inside text-sm">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
