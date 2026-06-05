<?php

namespace App\Models;

use Legato\Framework\Fluent;

class Link extends Fluent
{
    protected $fillable = [
        'user_id', 'title', 'url', 'description', 'channel_id',
        'sub_channel_id', 'approved', 'approved_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function subChannel()
    {
        return $this->belongsTo(SubChannel::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }

    public function scopePending($query)
    {
        return $query->where('approved', 0);
    }
}
