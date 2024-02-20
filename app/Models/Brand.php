<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public static $brand, $description, $image, $directory, $imageName, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image         = $request->file('image');
        self::$imageName     = self::$image->getClientOriginalName();
        self::$directory     = 'upload/brand-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;

    }
    public static function newBrand($request)
    {
        self::$imageUrl = self::getImageUrl($request);

        self::$brand = new Brand();
        self::saveBasicInfo(self::$brand,$request,self::$imageUrl);

    }

    public static function updateBrand($id, $request)
    {
        self::$brand = Brand::find($id);

        if ($request->hasFile('image'))
        {
            if (file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$brand->image;
        }
        self::saveBasicInfo(self::$brand,$request,self::$imageUrl);
    }

    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if(file_exists(self::$brand->image))
        {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }
    public static function saveBasicInfo($brand,$request,$imageUrl)
    {
        $brand->name          = $request->name;
        $brand->description   = $request->description;
        $brand->image         = $imageUrl;
        $brand->save();
    }
}
