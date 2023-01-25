<?php

namespace App\Services;

use App\Models\Towing;

use Illuminate\Support\Facades\DB;

class towingservices
{
 
    public static function create(array $data)
    {
        $data = Towing::create($data);
        return $data;
    }
  
    public static function update(array $data,Towing $towing)
    {
        $data = $towing->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = Towing::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = Towing::find($id);
        return $data;
    }
   
    public static function delete(Towing $towing)
    {
        $data = $towing->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = Towing::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('towings')->orderBy('created_at', 'asc')->get();
        return $data;
    }
}