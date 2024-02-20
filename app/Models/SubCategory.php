<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;


    public static $subcategory, $description, $image, $directory, $imageName, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image         = $request->file('image');
        self::$imageName     = self::$image->getClientOriginalName();
        self::$directory     = 'upload/sub-category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;

    }
    public static function newSubCategory($request)
    {
        self::$imageUrl = self::getImageUrl($request);

        self::$subcategory = new SubCategory();
        self::saveBasicInfo(self::$subcategory,$request,self::$imageUrl);

    }

    public static function updateSubCategory($id, $request)
    {
        self::$subcategory = SubCategory::find($id);

        if ($request->hasFile('image'))
        {
            if (file_exists(self::$subcategory->image))
            {
                unlink(self::$subcategory->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$subcategory->image;
        }
        self::saveBasicInfo(self::$subcategory,$request,self::$imageUrl);
    }

    public static function deleteSubCategory($id)
    {
        self::$subcategory = SubCategory::find($id);
        if(file_exists(self::$subcategory->image))
        {
            unlink(self::$subcategory->image);
        }
        self::$subcategory->delete();
    }
    public static function saveBasicInfo($subcategory,$request,$imageUrl)
    {
        $subcategory->category_id   = $request->category_id;
        $subcategory->name          = $request->name;
        $subcategory->description   = $request->description;
        $subcategory->image         = $imageUrl;
        $subcategory->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
