<?php

namespace App\Traits;

use App\Models\propertyImages;
use Illuminate\Support\Str;

trait UploadImages {
    public function uploadfile($propertyId, $images){

        foreach($images as $image){

            $filename = Str::random(5).$image->getClientOriginalName();

            $path = $image->storeAs(config('app.IMAGES_PATH').$propertyId,$filename,'public');


            $propertyImage = new propertyImages([
                'property_id' => $propertyId,
                'path' => $path,
                'mime_type' => $image->getClientOriginalExtension(),
            ]);
            $propertyImage->save();
        }
    }
}
