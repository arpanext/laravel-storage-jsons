<?php

namespace Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExecuteController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/v1/mongo/shell/databases/{databaseName}/commands/execute",
     *     tags={"Commands"},
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
"[
  {
    ""ok"": 1
  }
]"
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
        $cursor = app()->Mongo->getClient()->{$databaseName}->command(json_decode($request->getContent()));

        return response()->json(array_map(function ($bsonDocument) { return $bsonDocument; }, $cursor->toArray()));
    }
}
