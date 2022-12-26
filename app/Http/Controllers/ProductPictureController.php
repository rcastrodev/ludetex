<?php

namespace App\Http\Controllers;

use App\ProductPicture;
use App\ProductPicture2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPictureController extends Controller
{
    public function destroy($id){
        $productPicture = ProductPicture::find($id);
        
        if(Storage::disk('custom')->exists($productPicture->image))
            Storage::disk('custom')->delete($productPicture->image);

        $productPicture->delete();
    }

    public function destroyBanner($id)
    {
        $productPicture = ProductPicture2::find($id);
        
        if(Storage::disk('custom')->exists($productPicture->image))
            Storage::disk('custom')->delete($productPicture->image);

        $productPicture->delete();
        return response()->json([], 200);
    }
}
