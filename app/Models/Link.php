<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'link_url',
        'open_in_new_page',
    ];

    protected $casts = [
        'open_in_new_page' => 'boolean',
    ];

    /** @var bool $timestamps */
    public $timestamps = false;
}
