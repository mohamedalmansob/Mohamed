<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BrandAsset extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'brand_assets';

    protected $fillable = [
        'brand_id',
        'section_key',
        'original_name',
        'file_path',
        'disk',
        'mime_type',
        'file_size',
        'source',
        'asset_approval_status',
        'processing_status',
        'review_status',
        'analysis_data',
        'metadata',
    ];

    protected $casts = [
        'file_size' => 'integer',
        'analysis_data' => 'array',
        'metadata' => 'array',
    ];

    /**
     * الملف يتبع علامة تجارية واحدة.
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * الملف قد يحتوي على عدة معلومات مستخرجة.
     */
    public function extractions(): HasMany
    {
        return $this->hasMany(BrandAssetExtraction::class, 'brand_asset_id');
    }
}