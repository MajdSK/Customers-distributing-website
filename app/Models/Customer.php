<?php

namespace App\Models;

use Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['name', 'address', 'visited', 'visiting_salesman'])]
class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'address' => 'string',
            'visited' => 'boolean',
            'visiting_salesman' => 'integer',
            'visited_at' => 'date:d-m-Y',
        ];
    }

    public function salesman(): BelongsTo
    {
        return $this->belongsTo(User::class, 'visiting_salesman');
    }
}