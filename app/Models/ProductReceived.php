<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReceived extends Model
{
    use HasFactory;

    function rel_to_yarn()
    {
        return $this->belongsTo(Yarn::class, 'yarn_type_id');
    }
    function rel_to_brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    function rel_to_material()
    {
        return $this->belongsTo(Material::class, 'material_type_id');
    }
    function rel_to_department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    function rel_to_suplier_buyer()
    {
        return $this->belongsTo(Supplier::class, 'supplier_buyer_id');
    }
}
