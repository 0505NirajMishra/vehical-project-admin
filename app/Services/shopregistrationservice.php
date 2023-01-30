<?php

namespace App\Services;

use App\Models\Shopregistration;
use Illuminate\Support\Facades\DB;

class shopregistrationservice
{
 
    public static function create(array $data)
    {
        $data = Shopregistration::create($data);
        return $data;
    }
  
    public static function update(array $data,Shopregistration $shopregistration)
    {
        $data = $shopregistration->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = Shopregistration::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = Shopregistration::find($id);
        return $data;
    }
   
    public static function delete(Shopregistration $shopregistration)
    {
        $data = $shopregistration->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = Shopregistration::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('shop_registrations')->orderBy('created_at', 'asc')->get();
        return $data;
    }
    
}