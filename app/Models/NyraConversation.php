<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NyraConversation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
            'message_count' => 'integer',
        ];
    }

    public function scopeRated($query)
    {
        return $query->whereNotNull('rating');
    }

    public function scopeUnrated($query)
    {
        return $query->whereNull('rating');
    }

    public function incrementMessageCount(): void
    {
        $this->increment('message_count');
    }
}
