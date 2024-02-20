<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static $product, $description, $image, $directory, $imageName, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image         = $request->file('image');
        self::$imageName     = self::$image->getClientOriginalName();
        self::$directory     = 'upload/product-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;

    }
    public static function newProduct($request)
    {
        self::$imageUrl = self::getImageUrl($request);
        self::$product = new Product();
        return self::saveBasicInfo(self::$product,$request,self::$imageUrl);

    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);

        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }

        else
        {
            self::$imageUrl = self::$product->image;
        }

        self::saveBasicInfo(self::$product, $request, self::$imageUrl );
    }

    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }
    public static function saveBasicInfo($product,$request,$imageUrl)
    {
        $product->category_id          = $request->category_id;
        $product->sub_category_id      = $request->sub_category_id;
        $product->brand_id             = $request->brand_id;
        $product->unit_id              = $request->unit_id;
        $product->product_capacity     = $request->product_capacity;
        $product->name                 = $request->name;
        $product->code                 = $request->code;
        $product->stock_amount         = $request->stock_amount;
        $product->regular_price        = $request->regular_price;
        $product->selling_price        = $request->selling_price;
        $product->short_description    = $request->short_description;
        $product->long_description     = $request->long_description;
        $product->product_status       = $request->product_status;
        $product->image                = $imageUrl;
        $product->save();
        return $product;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function otherImages()
    {
        return $this->hasMany(OtherImages::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }



}
