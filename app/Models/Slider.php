<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    public static $slider, $description, $image, $directory, $imageName, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image         = $request->file('image');
        self::$imageName     = self::$image->getClientOriginalName();
        self::$directory     = 'upload/slider-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;

    }
    public static function newSlider($request)
    {
        self::$imageUrl = self::getImageUrl($request);

        self::$slider = new Slider();
        self::saveBasicInfo(self::$slider,$request,self::$imageUrl);

    }

    public static function updateSlider($id, $request)
    {
        self::$slider = Slider::find($id);

        if ($request->hasFile('image'))
        {
            if (file_exists(self::$slider->image))
            {
                unlink(self::$slider->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$slider->image;
        }
        self::saveBasicInfoe(self::$slider,$request,self::$imageUrl);
    }

    public static function deleteSlider($id)
    {
        self::$slider = Slider::find($id);
        if(file_exists(self::$slider->image))
        {
            unlink(self::$slider->image);
        }
        self::$slider->delete();
    }
    public static function saveBasicInfo($slider,$request,$imageUrl)
    {
        $slider->title                = $request->title;
        $slider->Description          = $request->description;
        $slider->product_price        = $request->product_price;
        $slider->product_name         = $request->product_name;
        $slider->image                = $imageUrl;
        $slider->save();
    }

    public static function saveBasicInfoe($slider,$request,$imageUrl)
    {
        $slider->title                = $request->title;
        $slider->Description          = $request->description;
        $slider->product_price        = $request->product_price;
        $slider->product_name         = $request->product_name;
        $slider->slider_status          = $request->slider_status;
        $slider->image                = $imageUrl;
        $slider->save();
    }

}
