<?php

namespace App\Services;

use App\Models\Keyunlock;

use Illuminate\Support\Facades\DB;

class keyunlockservices
{
 
    public static function create(array $data)
    {
        $data = Keyunlock::create($data);
        return $data;
    }
  
    public static function update(array $data,Keyunlock $keyunlock)
    {
        $data = $keyunlock->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = Keyunlock::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = Keyunlock::find($id);
        return $data;
    }
   
    public static function delete(Keyunlock $keyunlock)
    {
        $data = $keyunlock->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = Keyunlock::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('keyunlocks')->orderBy('created_at', 'asc')->get();
        return $data;
    }
}