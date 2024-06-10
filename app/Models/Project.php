<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'date_of_creation', 'link', 'created_by', 'type_id', 'slug'
    ];


    public function type() {
        return $this->belongsTo(Type::class);
    }
}
