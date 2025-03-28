<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'status',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
