<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;


    public static $customer, $description, $image, $directory, $imageName, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image         = $request->file('image');
        self::$imageName     = self::$image->getClientOriginalName();
        self::$directory     = 'upload/customer-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;

    }
    public static function newCustomer($request)
    {
        self::$customer = new Customer();
        self::$customer->name = $request->firstname.' '.$request->lastname;
        self::$customer->email = $request->email;
        self::$customer->mobile = $request->mobile;
        self::$customer->password = bcrypt($request->password);
        self::$customer->save();
        return self::$customer;
    }

    public static function updateProfile($id, $request)
    {
        self::$customer = Customer::find($id);

        if ($request->hasFile('image'))
        {
            if (file_exists(self::$customer->image))
            {
                unlink(self::$customer->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$customer->image;
        }
        self::saveBasicInfo(self::$customer, $request ,self::$imageUrl);
    }



    public static function saveBasicInfo($customer,$request,$imageUrl)
    {
        $customer->name          = $request->name;
        $customer->address       = $request->address;
        $customer->nid          = $request->nid ;
        $customer->city         = $request->city;
        $customer->post_code    = $request->post_code;
        $customer->date_of_birth  = $request->date_of_birth;
        $customer->blood_group   = $request->blood_group;
        $customer->image         = $imageUrl;
        $customer->save();
        return $customer;
    }
}
