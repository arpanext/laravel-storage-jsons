<?php

namespace Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;
class ListController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/mongo/shell/databases/list",
     *     tags={"Databases"},
     *     description="",
     *     @OA\Parameter(
     *         name="options",
     *         in="query",
     *         description="options",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *             format="string",
     *             example="{""maxTimeMS"": 1000}",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="OK",
     *         @OA\MediaType(
     *             mediaType="application/vnd.api+json",
     *             @OA\Schema(
     *                 type="object",
     *                 example=
"[
  {
    ""name"": ""admin"",
    ""sizeOnDisk"": 1560612864,
    ""empty"": false
  },
  {
    ""name"": ""config"",
    ""sizeOnDisk"": 98304,
    ""empty"": false
  },
  {
    ""name"": ""database"",
    ""sizeOnDisk"": 73728,
    ""empty"": false
  },
  {
    ""name"": ""local"",
    ""sizeOnDisk"": 73728,
    ""empty"": false
  },
  {
    ""name"": ""nodes"",
    ""sizeOnDisk"": 49152,
    ""empty"": false
  }
]"
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
    public function __invoke(Request $request): JsonResponse
    {
        $options = json_decode($request->options, true);

        $databaseInfoIterator = app()->Mongo->getClient()->listDatabases($options);

        return response()->json(array_map(function ($databaseInfo) { return $databaseInfo->__debugInfo(); }, iterator_to_array($databaseInfoIterator, true)));
    }
}
