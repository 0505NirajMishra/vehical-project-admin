<?php

namespace App\Services;

use App\Models\Addservice;
use Illuminate\Support\Facades\DB;

class addservices
{
 
    public static function create(array $data)
    {
        $data = Addservice::create($data);
        return $data;
    }
  
    public static function update(array $data,Addservice $addservice)
    {
        $data = $addservice->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = Addservice::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = Addservice::find($id);
        return $data;
    }
   
    public static function delete(Addservice $addservice)
    {
        $data = $addservice->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = Addservice::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('addservices')->orderBy('created_at', 'asc')->get();
        return $data;
    }
}