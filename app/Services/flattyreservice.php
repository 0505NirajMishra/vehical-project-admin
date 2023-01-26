<?php

namespace App\Services;

use App\Models\flattyre;
use Illuminate\Support\Facades\DB;

class flattyreservice
{
 
    public static function create(array $data)
    {
        $data = flattyre::create($data);
        return $data;
    }
  
    public static function update(array $data,flattyre $flattyre)
    {
        $data = $flattyre->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = flattyre::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = flattyre::find($id);
        return $data;
    }
   
    public static function delete(flattyre $flattyre)
    {
        $data = $flattyre->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = flattyre::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('flattyres')->orderBy('created_at', 'asc')->get();
        return $data;
    }
    
}