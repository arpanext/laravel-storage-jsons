<?php

namespace Arpanext\Mongo\App\Http\Controllers\Api\Mongo\Databases\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FindManyController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/mongo/databases/{databaseName}/collections/{collectionName}/findMany",
     *     tags={"Collections"},
     *     description="",
     *     @OA\Parameter(
     *         name="databaseName",
     *         in="path",
     *         description="database",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="string",
     *             example="database",
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="collectionName",
     *         in="path",
     *         description="collection",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="string",
     *             example="collection",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="OK",
     *         @OA\MediaType(
     *             mediaType="application/vnd.api+json",
     *             @OA\Schema(
     *                 type="object",
     *             ),
     *         ),
     *     ),
     * )
     */
    
    /**
     * Handle the incoming request.
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request, string $databaseName, string $collectionName): JsonResponse
    {
        $client = new \MongoDB\Client(
            'mongodb://root:password@127.0.0.1:27017/admin?retryWrites=true&w=majority'
        );

        $collection = $client->{$databaseName}->{$collectionName};

        $cursor = $collection->find([]);

        return response()->json([
            'data' => array_map(function ($document) use ($collectionName) {
                return [
                    'type' => $collectionName,
                    'id' => (string) $document->_id,
                    'attributes' => $document,
                ];
            }, $cursor->toArray())
        ]);
    }
}
