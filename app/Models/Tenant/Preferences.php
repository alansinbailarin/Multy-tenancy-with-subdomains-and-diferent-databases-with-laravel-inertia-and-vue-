<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    use HasFactory;

    protected $fillable = [
        'primary_color',
        'primary_text_color',
        'secondary_color',
        'secondary_text_color',
        'navbar_color',
        'background_color',
        'heading_text_color',
        'paragraph_text_color',
        'establishment_id'
    ];

    public function establishment()
    {
        return $this->hasOne(Establishment::class, 'id', 'establishment_id');
    }
}
