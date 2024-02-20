<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public static $unit, $description, $image, $directory, $imageName, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image         = $request->file('image');
        self::$imageName     = self::$image->getClientOriginalName();
        self::$directory     = 'upload/unit-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;

    }
    public static function newUnit($request)
    {
        self::$imageUrl = self::getImageUrl($request);

        self::$unit = new Unit();
        self::saveBasicInfo(self::$unit,$request,self::$imageUrl);

    }

    public static function updateUnit($id, $request)
    {
        self::$unit = Unit::find($id);

        if ($request->hasFile('image'))
        {
            if (file_exists(self::$unit->image))
            {
                unlink(self::$unit->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$unit->image;
        }
        self::saveBasicInfo(self::$unit,$request,self::$imageUrl);
    }

    public static function deleteUnit($id)
    {
        self::$unit = Unit::find($id);
        if(file_exists(self::$unit->image))
        {
            unlink(self::$unit->image);
        }
        self::$unit->delete();
    }
    public static function saveBasicInfo($unit,$request,$imageUrl)
    {
        $unit->name          = $request->name;
        $unit->description   = $request->description;
        $unit->image         = $imageUrl;
        $unit->save();
    }
}
