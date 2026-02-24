<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShipStoreRequest;
use App\Http\Requests\ShipUpdateRequest;
use App\Http\Resources\ShipResource;
use App\Services\ShipService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShipController extends Controller
{
    protected $shipService;

    public function __construct(ShipService $shipService)
    {
        $this->shipService = $shipService;
    }

    /**
     *
     * uri: /api/ships/index
     * Method: GET
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $ships = $this->shipService->listShips(request());

            return response()->json([
                'success' => true,
                'message' => 'Ships fetched successfully',
                'data'    => ShipResource::collection($ships),
                'meta'    => [
                    'current_page' => $ships->currentPage(),
                    'last_page'    => $ships->lastPage(),
                    'per_page'     => $ships->perPage(),
                    'total'        => $ships->total(),
                ]
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server Error',
                'errors'  => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     *
     * uri: /api/ships/store
     * Method: POST
     * @return JsonResponse
     *
     */
    public function store(ShipStoreRequest $request): JsonResponse
    {
        try {
            $ship = $this->shipService->createShip($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Ship created successfully',
                'data'    => new ShipResource($ship),
            ], Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server Error',
                'errors'  => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     *
     * uri: /api/ships/update/{id}
     * Method: PUT
     * @return JsonResponse
     *
     */
    public function update(ShipUpdateRequest $request, $id): JsonResponse
    {
        try {
            $ship = $this->shipService->updateShip($id, $request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Ship updated successfully',
                'data'    => new ShipResource($ship),
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ship not found',
                'errors'  => null
            ], Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server Error',
                'errors'  => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     *
     * uri: /api/ships/destroy/{id}
     * Method: DELETE
     * @return JsonResponse
     *
     */
    public function destroy($id)
    {
        try {
            $this->shipService->deleteShip($id);

            return response()->json([
                'success' => true,
                'message' => 'Ship deleted successfully',
                'data'    => null
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ship not found',
                'errors'  => null
            ], Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server Error',
                'errors'  => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
