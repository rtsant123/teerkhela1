<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'button_text',
        'button_link',
        'display_rule',
        'delay_seconds',
        'show_every_x_visits',
        'target_pages',
        'is_active',
        'impressions',
        'clicks',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'target_pages' => 'array',
        'impressions' => 'integer',
        'clicks' => 'integer',
        'delay_seconds' => 'integer',
        'show_every_x_visits' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function incrementImpressions()
    {
        $this->increment('impressions');
    }

    public function incrementClicks()
    {
        $this->increment('clicks');
    }

    public function getClickRateAttribute()
    {
        if ($this->impressions === 0) {
            return 0;
        }
        return round(($this->clicks / $this->impressions) * 100, 2);
    }
}
