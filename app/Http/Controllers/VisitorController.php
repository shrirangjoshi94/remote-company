<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\ResourceService;

class VisitorController extends Controller
{
    /**
     * Return management view.
     *
     * @param ResourceService $resourceService
     * @return View
     */
    public function index(ResourceService $resourceService): View
    {
        return view('visitor', ['resourceDetails' => $resourceService->getDetails()]);
    }
}
