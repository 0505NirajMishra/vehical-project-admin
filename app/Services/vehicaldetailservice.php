<?php

namespace App\Services;

use App\Models\VehicalDetail;
use Illuminate\Support\Facades\DB;

class vehicaldetailservice
{
    
    public static function create(array $data)
    {
        $data = VehicalDetail::create($data);
        return $data;
    }

    
    public static function update(array $data, VehicalDetail $addvehicaldetail)
    {
        $data = $addvehicaldetail->update($data);
        return $data;
    }

    
    public static function updateById(array $data, $id)
    {
        $data = VehicalDetail::whereId($id)->update($data);
        return $data;
    }

    
    public static function getById($id)
    {
        $data = VehicalDetail::find($id);
        return $data;
    }

   
    
    public static function delete(VehicalDetail $addvehicaldetail)
    {
        $data = $addvehicaldetail->delete();
        return $data;
    }

     
    public static function deleteById($id)
    {
        $data = VehicalDetail::whereId($id)->delete();
        return $data;
    }

   
    public static function datatable()
    {
        $data = DB::table('vehicaladddetails')->orderBy('created_at', 'asc')->get();
        return $data;
    }
}