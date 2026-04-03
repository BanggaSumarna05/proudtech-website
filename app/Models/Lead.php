<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /** @use HasFactory<\Database\Factories\LeadFactory> */
    use HasFactory;

    public const STATUSES = [
        'new',
        'contacted',
        'deal',
        'rejected',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'business',
        'budget',
        'message',
        'status',
    ];
}
