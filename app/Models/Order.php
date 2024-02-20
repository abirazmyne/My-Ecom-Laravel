<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class
Order extends Model
{
    use HasFactory;

   public static $order;

    public static function deleteOrder($id)
    {
        self::$order = Order::find($id);
        self::$order->delete();
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }

//    public static $order, $description, $image, $directory, $imageName, $imageUrl;
//
//    public static function getImageUrl($request)
//    {
//        self::$image         = $request->file('image');
//        self::$imageName     = self::$image->getClientOriginalName();
//        self::$directory     = 'upload/category-images/';
//        self::$image->move(self::$directory, self::$imageName);
//        self::$imageUrl = self::$directory.self::$imageName;
//        return self::$imageUrl;
//
//    }
//    public static function newOrder($request)
//    {
//        self::$imageUrl = self::getImageUrl($request);
//
//        self::$order = new Order();
//        self::saveBasicInfo(self::$order,$request,self::$imageUrl);
//
//    }
//
//    public static function updateOrder($id, $request)
//    {
//        self::$order = Order::find($id);
//
//        if ($request->hasFile('image'))
//        {
//            if (file_exists(self::$order->image))
//            {
//                unlink(self::$order->image);
//            }
//            self::$imageUrl = self::getImageUrl($request);
//        }
//        else
//        {
//            self::$imageUrl = self::$order->image;
//        }
//        self::saveBasicInfo(self::$order,$request,self::$imageUrl);
//    }
//
//    public static function deleteOrder($id)
//    {
//        self::$category = Order::find($id);
//        if(file_exists(self::$order->image))
//        {
//            unlink(self::$order->image);
//        }
//        self::$order->delete();
//    }
//    public static function saveBasicInfo($order,$request,$imageUrl)
//    {
//        $order->name          = $request->name;
//        $order->description   = $request->description;
//        $order->image         = $imageUrl;
//        $order->save();
//    }

}
