<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\ManagementService;
use Illuminate\Http\{JsonResponse, Request, Response};

class ManagementController extends Controller
{
    /** @var ManagementService $managementService */
    private $managementService;

    /**
     * ManagementController constructor.
     *
     * @param ManagementService $managementService
     */
    public function __construct(ManagementService $managementService)
    {
        $this->managementService = $managementService;
    }

    /**
     * Return management view.
     *
     * @return View
     */
    public function index(): View
    {
        return view('management');
    }

    /**
     * Save PDF details.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function savePdf(Request $request): JsonResponse
    {
        $this->validate($request, ['title' => 'required|string|max:100', 'pdf_file' => 'required|mimes:pdf|max:2048']);

        return $this->managementService->savePdfDetails($request->all())
            ? response()->json((object)[])
            : response()->json((object)[], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Save snippet details.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function saveSnippet(Request $request): JsonResponse
    {
        $this->validate(
            $request,
            [
                'title' => 'required|string|max:100',
                'description' => 'required|string|max:255',
                'snippet' => 'required|string|max:10000'
            ]
        );

        return $this->managementService->saveSnippetDetails($request->all())
            ? response()->json((object)[])
            : response()->json((object)[], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Save snippet details.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function saveLink(Request $request): JsonResponse
    {
        $this->validate(
            $request,
            [
                'title' => 'required|string|max:100',
                'link_url' => 'required|url|max:100',
                'open_in_new_page' => 'nullable||in:0,1'
            ]
        );

        return $this->managementService->saveLinkDetails($request->all())
            ? response()->json((object)[])
            : response()->json((object)[], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
