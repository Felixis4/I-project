<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\StoreRequest;

class HouseController
{
    public function index(): View
    {
        $houses = House::all();
        return view('house.index', compact('houses'));
    }

    public function create(): View
    {
        return view('house.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {

        $house = House::create($request->validated());

        $request->merge([
            'property_id' => $house->id,
            'type' => House::class,
        ]);

        app(PropertyController::class)->store($request);

        return redirect()->route('house.index')->with('success', 'House published successfully!');
    }

    public function show(House $house): View
    {
        $images = $house->property->images;
        return view('house.show', compact('house','images'));
    }

    public function edit(House $house): View
    {
        $property = $house->property;
        $images = $house->property->images;
        return view('house.edit', compact('house','property','images'));
    }

    public function update(UpdateRequest $request, House $house): RedirectResponse
    {
        $house->update($request->toArray());
        $property = $house->property;
        if ($property) {
            app(PropertyController::class)->update($request,$property);
        }

        return redirect()->route('house.index')->with('success', 'House updated successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $house = House::findOrFail($id);

        $property = $house->property;

        if ($property) {
            app(PropertyController::class)->destroy($property);
        }

        $house->delete();

        return redirect()->route('house.index')->with('success', 'House and associated property deleted successfully!');
    }
}
