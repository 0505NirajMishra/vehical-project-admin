<?php

namespace App\Services;

use App\Models\CustomerDetail;
use Illuminate\Support\Facades\DB;

class customerdetailservice
{
 
    public static function create(array $data)
    {
        $data = CustomerDetail::create($data);
        return $data;
    }
  
    public static function update(array $data,CustomerDetail $customerdetail)
    {
        $data = $customerdetail->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = CustomerDetail::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = CustomerDetail::find($id);
        return $data;
    }
   
    public static function delete(CustomerDetail $customerdetail)
    {
        $data = $customerdetail->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = CustomerDetail::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('customerdetails')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}