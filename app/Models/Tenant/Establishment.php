<?php

namespace App\Models\Tenant;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Contracts\SyncMaster;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;
use Stancl\Tenancy\Database\Models\TenantPivot;

class Establishment extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = [
        'name',
        'domain',
        'logo_path',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'type_id',
        'user_id',
        'tenant_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function preferences()
    {
        return $this->belongsTo(Preferences::class);
    }
}
