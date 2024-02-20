<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $category, $description, $image, $directory, $imageName, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image         = $request->file('image');
        self::$imageName     = self::$image->getClientOriginalName();
        self::$directory     = 'upload/category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;

    }
    public static function newCategory($request)
    {
        self::$imageUrl = self::getImageUrl($request);

        self::$category = new Category();
        self::saveBasicInfo(self::$category,$request,self::$imageUrl);

    }

    public static function updateCategory($id, $request)
    {
        self::$category = Category::find($id);

        if ($request->hasFile('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$category->image;
        }
        self::saveBasicInfo(self::$category,$request,self::$imageUrl);
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if(file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }
    public static function saveBasicInfo($category,$request,$imageUrl)
    {
        $category->name          = $request->name;
        $category->description   = $request->description;
        $category->image         = $imageUrl;
        $category->save();
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

}
