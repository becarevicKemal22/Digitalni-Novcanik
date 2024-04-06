<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Categories';
    protected $primaryKey = 'id';
    protected $fillable = ['ime', 'boja'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'category', 'id');
    }
}

