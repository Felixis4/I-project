<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Apartment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ApartmentController
{
    public function index(): View
    {
        $apartments = apartment::all();
        return view('apartment.index', compact('apartments'));
    }

    public function create(): View
    {
        return view('apartment.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {

        $apartment = apartment::create($request->validated());

        $request->merge([
            'property_id' => $apartment->id,
            'type' => apartment::class,
        ]);

        app(PropertyController::class)->store($request);

        return redirect()->route('apartment.index')->with('success', 'Apartment published successfully!');
    }

    public function show(Apartment $apartment): View
    {
        $images = $apartment->property->images;
        return view('apartment.show', compact('apartment','images'));
    }

    public function edit(Apartment $apartment): View
    {
        $property = $apartment->property;
        $images = $apartment->property->images;
        return view('apartment.edit', compact('apartment','property','images'));
    }

    public function update(UpdateRequest $request, Apartment $apartment): RedirectResponse
    {
        $apartment->update($request->toArray());
        $property = $apartment->property;
        if ($property) {
            app(PropertyController::class)->update($request,$property);
        }

        return redirect()->route('apartment.index')->with('success', 'Apartment updated successfully!');
    }

    public function destroy($id): RedirectResponse
    {

        $apartment = Apartment::findOrFail($id);

        $property = $apartment->property;

        if ($property) {
            app(PropertyController::class)->destroy($property);
        }

        $apartment->delete();

        return redirect()->route('apartment.index')->with('success', 'Apartment and associated property deleted successfully!');
    }
}
