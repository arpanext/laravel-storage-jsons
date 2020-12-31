<?php

namespace Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/v1/storage/jsons/databases/{databaseName}/command",
     *     tags={"Databases"},
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
     *     @OA\RequestBody(
     *         description="Command",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/vnd.api+json",
     *             @OA\Schema(
     *                 type="object",
     *                 example="{""ping"":1}"
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
     *                 example=
"{
  ""data"": [
    {
      ""attributes"": {
        ""ok"": 1
      }
    }
  ]
}"
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
    public function __invoke(Request $request, string $databaseName): JsonResponse
    {
        $client = new \MongoDB\Client(
            'mongodb://root:password@127.0.0.1:27017/admin?retryWrites=true&w=majority'
        );

        $cursor = $client->{$databaseName}->command(json_decode($request->getContent()));

        return response()->json([
            'data' => array_map(function ($objectId) {
                return [
                    'attributes' => $objectId,
                ];
            }, $cursor->toArray())
        ]);
    }
}
