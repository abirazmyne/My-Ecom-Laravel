<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public static $orderDetails;

    public static function deleteOrderDetail($id)
    {
        self::$orderDetails = OrderDetail::where('order_id' , $id)->get();
        foreach (self::$orderDetails as $orderDetail)
        {
            $orderDetail->delete();
        }

    }
}
