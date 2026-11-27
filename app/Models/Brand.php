<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'brands';

    protected $fillable = [
        'workspace_id',
        'profile_data',
        'approved_profile',
        'section_status',
        'profile_version',
        'approved_at',
    ];

    protected $casts = [
        'profile_data' => 'array',
        'approved_profile' => 'array',
        'section_status' => 'array',
        'profile_version' => 'integer',
        'approved_at' => 'datetime',
    ];

    /**
     * العلامة التجارية تتبع مساحة عمل واحدة.
     */
    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspace_id');
    }
}