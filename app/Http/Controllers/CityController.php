<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CityController
{
    public function index(): View
    {
        $cities = City::all();
        return view('city.index', compact('cities'));
    }

    public function create(): View
    {
        return view('city.create');
    }

    public function store(CityRequest $request): RedirectResponse
    {
        City::create($request->validated());

        return redirect()->route('city.index')->with('success', 'City published successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $city = City::findOrFail($id);

        $city->delete();

        return redirect()->route('city.index')->with('success', 'City deleted successfully!');
    }
}
