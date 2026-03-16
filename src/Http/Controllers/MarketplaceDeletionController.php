<?php declare(strict_types=1);

namespace Rat\eBaySDK\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Rat\eBaySDK\Services\MarketplaceDeletionService;

class MarketplaceDeletionController extends Controller
{
    /**
     *
     * @param MarketplaceDeletionService $service
     * @return void
     */
    public function __construct(
        private readonly MarketplaceDeletionService $service
    ) {}

    /**
     *
     * @param Request $request
     * @return Response|JsonResponse
     */
    public function handle(Request $request): Response|JsonResponse
    {
        if ($request->isMethod('GET')) {
            $challengeCode = $request->query('challenge_code');

            if (!is_string($challengeCode) || empty($challengeCode)) {
                return response()->json([
                    'error' => 'Missing challenge_code.',
                ], Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json([
                    'challengeResponse' => $this->service->build($challengeCode),
                ], Response::HTTP_OK);
            }
        }

        if ($request->isMethod('POST')) {
            $verified = $this->service->verify(
                payload: $request->getContent(),
                signatureHeader: (string) $request->headers->get('x-ebay-signature', ''),
                headers: $request->headers->all()
            );

            return $verified
                ? response('', Response::HTTP_OK)
                : response('', Response::HTTP_PRECONDITION_FAILED);
        }

        return response('', Response::HTTP_METHOD_NOT_ALLOWED);
    }
}
