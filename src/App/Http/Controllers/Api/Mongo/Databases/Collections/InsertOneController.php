<?php

namespace Arpanext\Mongo\App\Http\Controllers\Api\Mongo\Databases\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class InsertOneController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/v1/mongo/databases/{database}/collections/{collection}",
     *     tags={"Collections"},
     *     description="",
     *     @OA\Parameter(
     *         name="database",
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
     *         name="collection",
     *         in="path",
     *         description="collection",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="string",
     *             example="collection",
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="",
     *         @OA\MediaType(
     *             mediaType="application/vnd.api+json",
     *             @OA\Schema(
     *                 type="object",
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Created",
     *         @OA\MediaType(
     *             mediaType="application/vnd.api+json",
     *             @OA\Schema(
     *                 type="object",
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Bad Request",
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
    public function __invoke(): JsonResponse
    {
        /*
        $client = new \MongoDB\Client(
            'mongodb+srv://root:password@127.0.0.1?retryWrites=true&w=majority'
        );

        $db = $client->test;

        dd($db);
        */

        //return response()->json($schema);
    }
}
