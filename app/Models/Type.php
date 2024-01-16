<?php

namespace App\Models;

use App\Models\Tenant\Establishment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'svg_icon_path'
    ];

    public function establishments()
    {
        return $this->hasMany(Establishment::class);
    }
}
