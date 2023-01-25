<?php

namespace App\Services;

use App\Models\Feedback;
use Illuminate\Support\Facades\DB;

class FeedbackServices
{
 
    public static function create(array $data)
    {
        $data = Feedback::create($data);
        return $data;
    }
  
    public static function update(array $data,Feedback $feedback)
    {
        $data = $feedback->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = Feedback::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = Feedback::find($id);
        return $data;
    }
   
    public static function delete(Feedback $feedback)
    {
        $data = $feedback->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = Feedback::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('feedbacks')->orderBy('created_at', 'asc')->get();
        return $data;
    }
}