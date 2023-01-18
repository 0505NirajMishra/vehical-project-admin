<?php

namespace App\Services;

use App\Models\VehicalEmployee;
use Illuminate\Support\Facades\DB;

class vehicalemployeeservice
{
 
    public static function create(array $data)
    {
        $data = VehicalEmployee::create($data);
        return $data;
    }
  
    public static function update(array $data,VehicalEmployee $vehicalemployee)
    {
        $data = $vehicalemployee->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = VehicalEmployee::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = VehicalCategory::find($id);
        return $data;
    }
   
    public static function delete(VehicalEmployee $vehicalemployee)
    {
        $data = $vehicalemployee->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = VehicalEmployee::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('vehicalemployees')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}