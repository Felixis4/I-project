<?php

namespace App\Http\Controllers;

use App\Http\Requests\JsonRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Apartment;
use App\Models\House;
use App\Models\Property;

class JsonController
{
    public function index(JsonRequest $request)
    {

        $property = Property::query()
            ->with(['propertyable'])


            // House and Department filters
            ->when($request->id, fn($query) => $query->whereHasMorph('propertyable', [House::class], fn($q) => $q->where('id', $request->id)))
            ->when($request->title, fn($query) => $query->whereHasMorph('propertyable', [House::class], fn($q) => $q->where('title', 'like', '%' . $request->title . '%')))

            ->when($request->priceFrom, fn($query) => $query->whereHasMorph('propertyable', [House::class], fn($q) => $q->where('price', '>=', $request->priceFrom)))
            ->when($request->price, fn($query) => $query->whereHasMorph('propertyable', [House::class], fn($q) => $q->where('price', $request->price)))
            ->when($request->priceTo, fn($query) => $query->whereHasMorph('propertyable', [House::class], fn($q) => $q->where('price', '<=', $request->priceTo)))

            ->when($request->totalAreaFrom, fn($query) => $query->whereHasMorph('propertyable', [House::class], fn($q) => $q->where('total_area', '>=', $request->totalAreaFrom)))
            ->when($request->totalArea, fn($query) => $query->whereHasMorph('propertyable', [House::class], fn($q) => $q->where('total_area', $request->totalArea)))
            ->when($request->totalAreaTo, fn($query) => $query->whereHasMorph('propertyable', [House::class], fn($q) => $q->where('total_area', '<=', $request->totalAreaTo)))

            ->when($request->coveredAreaFrom, fn($query) => $query->whereHasMorph('propertyable', [House::class], fn($q) => $q->where('covered_area', '>=', $request->coveredAreaFrom)))
            ->when($request->coveredArea, fn($query) => $query->whereHasMorph('propertyable', [House::class], fn($q) => $q->where('covered_area', $request->coveredArea)))
            ->when($request->coveredAreaTo, fn($query) => $query->whereHasMorph('propertyable', [House::class], fn($q) => $q->where('covered_area', '<=', $request->coveredAreaTo)))

            ->when($request->numberRoomsFrom, fn($query) => $query->whereHasMorph('propertyable', [House::class, Apartment::class], fn($q) => $q->where('rooms_number', '>=', $request->numberRoomsFrom)))
            ->when($request->numberRooms, fn($query) => $query->whereHasMorph('propertyable', [House::class, Apartment::class], fn($q) => $q->where('rooms_number', $request->numberRooms)))
            ->when($request->numberRoomsTo, fn($query) => $query->whereHasMorph('propertyable', [House::class, Apartment::class], fn($q) => $q->where('rooms_number', '<=', $request->numberRoomsTo)))


            // Property filters
            ->when($request->cityId, fn($q) => $q->where('city_id', $request->cityId))
            ->when($request->type, fn($q) => $q->where('type', $request->type))
            ->when($request->light, fn($q) => $q->where('light', filter_var($request->light, FILTER_VALIDATE_BOOLEAN) ))
            ->when($request->naturalGas, fn($q) => $q->where('natural_gas', filter_var($request->natural_gas, FILTER_VALIDATE_BOOLEAN) ))
            ->when($request->phone, fn($q) => $q->where('phone', filter_var($request->phone, FILTER_VALIDATE_BOOLEAN) ))
            ->when($request->water, fn($q) => $q->where('water', filter_var($request->water, FILTER_VALIDATE_BOOLEAN) ))
            ->when($request->sewers, fn($q) => $q->where('sewers', filter_var($request->sewers, FILTER_VALIDATE_BOOLEAN) ))
            ->when($request->internet, fn($q) => $q->where('internet', filter_var($request->internet, FILTER_VALIDATE_BOOLEAN) ))
            ->when($request->asphalt, fn($q) => $q->where('asphalt', filter_var($request->asphalt, FILTER_VALIDATE_BOOLEAN) ))

            // Sort by
            ->when($request->sortBy, fn($query) => $query->orderBy($request->sortBy))

            // Pagination
            ->paginate(10);


        return PropertyResource::collection($property)->response()->getData(true);
    }
}
