<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\propertyImages;
use Illuminate\Support\Facades\Storage;

class ImageController
{
    public function destroy($id){
        $image = propertyImages::findOrFail($id);
        $path = $image->path;

        Storage::delete($path);

        $image->delete();

        return back()->with('success','Image Deleted');
    }
    public function edit($propertyId)
    {
        $images = Property::findOrFail($propertyId)->images;
        $id = Property::findOrFail($propertyId)->property_id;

        $type = Property::findOrFail($propertyId)->type;
        if ($type == "App\Models\Apartment")
        {
            $type = "apartment";

        }elseif($type == "App\Models\House")
        {
            $type = "house";

        }
        return view('images.edit', compact('images','id','type'));
    }
}
