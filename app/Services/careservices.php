<?php

namespace App\Services;

use App\Models\Care;

use Illuminate\Support\Facades\DB;

class careservices
{
 
    public static function create(array $data)
    {
        $data = Care::create($data);
        return $data;
    }
  
    public static function update(array $data,Care $care)
    {
        $data = $care->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = Care::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = Care::find($id);
        return $data;
    }
   
    public static function delete(Care $care)
    {
        $data = $care->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = Care::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('cares')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}