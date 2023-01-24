<?php

namespace App\Services;

use App\Models\VehicalCategory;
use Illuminate\Support\Facades\DB;

class vehicalcategoryservice
{
 
    public static function create(array $data)
    {
        $data = VehicalCategory::create($data);
        return $data;
    }
  
    public static function update(array $data,VehicalCategory $vehicaltype)
    {
        $data = $vehicaltype->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = VehicalCategory::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = VehicalCategory::find($id);
        return $data;
    }
   
    public static function delete(VehicalCategory $vehicaltype)
    {
        $data = $vehicaltype->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = VehicalCategory::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('vehicalcategorys')->orderBy('created_at', 'asc')->get();
        return $data;
    }
}