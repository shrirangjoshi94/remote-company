<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\{Link, Snippet, MediaFile};

class ResourceService
{
    /**
     * Get visitor details.
     *
     * @return array
     */
    public function getDetails(): array
    {
        $mediaFile = MediaFile::first();

        if ($mediaFile) {
            $mediaFile->download_link = $mediaFile->download_link;
        }

        return [
            'pdfDetails' => $mediaFile,
            'snippetDetails' => Snippet::first(),
            'linkDetails' => Link::first(),
        ];
    }
}
