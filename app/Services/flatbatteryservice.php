<?php

namespace App\Services;

use App\Models\flatBattery;
use Illuminate\Support\Facades\DB;

class flatbatteryservice
{
 
    public static function create(array $data)
    {
        $data = flatBattery::create($data);
        return $data;
    }
  
    public static function update(array $data,flatBattery $flatbattery)
    {
        $data = $flatbattery->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = flatBattery::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = flatBattery::find($id);
        return $data;
    }
   
    public static function delete(flatBattery $flatbattery)
    {
        $data = $flatbattery->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = flatBattery::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('flatbatterys')->orderBy('created_at', 'asc')->get();
        return $data;
    }

    public static function status(array $data, $id)
    {
        $data = flatBattery::where('flatbattery_id', $id)->update($data);
        return $data;
    }
    
}