<?php

declare(strict_types=1);

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Storage;
use App\Models\{Link, Snippet, MediaFile};

class ManagementService
{
    /**
     * Save PDF details.
     *
     * @param array $data
     * @return bool
     */
    public function savePdfDetails(array $data): bool
    {
        try {
            $pdfFile = $data['pdf_file'];
            $extension = $pdfFile->getClientOriginalExtension();
            Storage::disk('local')->putFileAs(
                'public/' . MediaFile::FILE_PATH,
                $pdfFile,
                MediaFile::FILE_NAME . '.' . $extension
            );

            $data = [
                'title' => $data['title'],
                'name' => MediaFile::FILE_NAME,
                'path' => MediaFile::FILE_PATH,
                'extension' => $extension
            ];
            $mediaFile = MediaFile::first();
            $mediaFile ? $mediaFile->update($data) : MediaFile::create($data);

            return true;
        } catch (Exception $exception) {
            report($exception);

            return false;
        }
    }

    /**
     * Save snippet details.
     *
     * @param array $data
     * @return bool
     */
    public function saveSnippetDetails(array $data): bool
    {
        try {
            $snippet = Snippet::first();
            $snippet ? $snippet->update($data) : Snippet::create($data);

            return true;
        } catch (Exception $exception) {
            report($exception);

            return false;
        }
    }

    /**
     * Save snippet details.
     *
     * @param array $data
     * @return bool
     */
    public function saveLinkDetails(array $data): bool
    {
        try {
            $link = Link::first();
            $link ? $link->update($data) : Link::create($data);

            return true;
        } catch (Exception $exception) {
            report($exception);

            return false;
        }
    }
}
