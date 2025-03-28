<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    // trường hợp nếu để bảng mặc định có trường timestamps
    // thì sử dụng hàm sau để tắt timestamps (create_at và update_at)
    public $timestamps = false;
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image',
        'category_id',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
