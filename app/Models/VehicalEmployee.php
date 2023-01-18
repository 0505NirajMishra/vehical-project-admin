<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicalEmployee extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'vehicalemployees';
    protected $primaryKey = 'vehical_employee_id';

    protected $fillable = [
       'vehical_service_type_exprt',
       'vehical_employee_name',
       'vehical_employee_profile',
       'vehical_company_name',
       'vehical_mobile',
    ];

}