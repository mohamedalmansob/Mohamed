<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BrandAssetExtraction extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'brand_asset_extractions';

    protected $fillable = [
        'brand_asset_id',
        'field_key',
        'proposed_value',
        'approved_value',
        'decision_status',
        'source_excerpt',
        'source_reference',
        'reviewed_at',
    ];

    protected $casts = [
        'proposed_value' => 'array',
        'approved_value' => 'array',
        'source_reference' => 'array',
        'reviewed_at' => 'datetime',
    ];

    /**
     * المعلومة المستخرجة تتبع ملفًا واحدًا.
     */
    public function brandAsset(): BelongsTo
    {
        return $this->belongsTo(BrandAsset::class, 'brand_asset_id');
    }
}