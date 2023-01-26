<?php

namespace App\Services;

use App\Models\PetrolDesiel;
use Illuminate\Support\Facades\DB;

class petroldesielservices
{
 
    public static function create(array $data)
    {
        $data = PetrolDesiel::create($data);
        return $data;
    }
  
    public static function update(array $data,PetrolDesiel $petroldesial)
    {
        $data = $petroldesial->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = PetrolDesiel::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = PetrolDesiel::find($id);
        return $data;
    }
   
    public static function delete(PetrolDesiel $petroldesial)
    {
        $data = $petroldesial->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = PetrolDesiel::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('petroldesiels')->orderBy('created_at', 'asc')->get();
        return $data;
    }
    
}