<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;


    public static $courier, $description, $image, $directory, $imageName, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image         = $request->file('image');
        self::$imageName     = self::$image->getClientOriginalName();
        self::$directory     = 'upload/courier-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;

    }
    public static function newCourier($request)
    {
        self::$imageUrl = self::getImageUrl($request);

        self::$courier = new Courier();
        self::saveBasicInfo(self::$courier,$request,self::$imageUrl);

    }

    public static function updateCourier($id, $request)
    {
        self::$courier = Courier::find($id);

        if ($request->hasFile('image'))
        {
            if (file_exists(self::$courier->image))
            {
                unlink(self::$courier->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$courier->image;
        }
        self::saveBasicInfo(self::$courier,$request,self::$imageUrl);
    }

    public static function deleteCourier($id)
    {
        self::$courier = Courier::find($id);
        if(file_exists(self::$courier->image))
        {
            unlink(self::$courier->image);
        }
        self::$courier->delete();
    }
    public static function saveBasicInfo($courier,$request,$imageUrl)
    {
        $courier->name          = $request->name;
        $courier->description   = $request->description;
        $courier->image         = $imageUrl;
        $courier->save();
    }
}
