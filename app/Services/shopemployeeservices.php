<?php

namespace App\Services;

use App\Models\shopemployee;

use Illuminate\Support\Facades\DB;

class shopemployeeservices
{
 
    public static function create(array $data)
    {
        $data = shopemployee::create($data);
        return $data;
    }
  
    public static function update(array $data,shopemployee $shopemployee)
    {
        $data = $shopemployee->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = shopemployee::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = shopemployee::find($id);
        return $data;
    }
   
    public static function delete(shopemployee $shopemployee)
    {
        $data = $shopemployee->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = shopemployee::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('shopemployees')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}