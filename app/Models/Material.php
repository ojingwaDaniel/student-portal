<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'title',
        'type',
        'level',
        'file_path',
        'uploaded_by',
    ];
}
