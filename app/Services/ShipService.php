<?php

namespace App\Services;

use App\Models\Ship;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class ShipService
{
    protected function getAuthenticatedUser()
    {
        $user = auth()->guard('api')->user();

        if (!$user) {
            abort(401, 'Unauthenticated.');
        }

        return $user;
    }

    /**
     *
     * uri: /api/ships/listShips
     * @return JssonResponse
     *
     */
    public function listShips($request)
    {
        $user = $this->getAuthenticatedUser();

        $query = Ship::where('company_id', $user->company_id);

        // Filtering
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        return $query->paginate(10);
    }

    /**
     *
     * uri: /api/ships/createShip
     * @return JsonResponse
     *
     */
    public function createShip(array $data)
    {
        $user = $this->getAuthenticatedUser();

        $data['company_id'] = $user->company_id;

        return Ship::create($data);
    }

    /**
     *
     * uri: /api/ships/updateShip/{id}
     * @return JsonResponse
     *
     */
    public function updateShip($id, array $data)
    {
        $user = $this->getAuthenticatedUser();

        $ship = Ship::where('company_id', $user->company_id)
            ->findOrFail($id);

        $ship->update($data);

        return $ship;
    }

    /**
     *
     * uri: /api/ships/deleteShip/{id}
     * @return JsonResponse
     *
     */
    public function deleteShip($id)
    {
        $user = $this->getAuthenticatedUser();

        $ship = Ship::where('company_id', $user->company_id)
            ->findOrFail($id);

        $ship->delete();

        return true;
    }
}
