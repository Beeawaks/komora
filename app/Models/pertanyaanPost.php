<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pertanyaanPost extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'slug', 'excerpt', 'body'];
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
