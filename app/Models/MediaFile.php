<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    /** @var string FILE_NAME */
    const FILE_NAME = 'test_file';

    /** @var string FILE_PATH */
    const FILE_PATH = 'pdf';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'name',
        'path',
        'extension',
    ];

    /** @var bool $timestamps */
    public $timestamps = false;

    /**
     * Get file download link.
     *
     * @return string
     */
    public function getDownloadLinkAttribute(): string
    {
        return asset('storage/' . $this->path . '/' . $this->name . '.' . $this->extension);
    }
}
