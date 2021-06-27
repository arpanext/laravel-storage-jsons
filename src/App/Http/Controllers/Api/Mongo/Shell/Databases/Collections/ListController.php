<?php

namespace Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/mongo/shell/databases/{databaseName}/collections/list",
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
     *         name="filter",
     *         in="query",
     *         description="filter",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="string",
     *             example="{""name"": {""$regex"": """"}}",
     *         )
     *     ),
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
    ""name"": ""test2"",
    ""type"": ""collection"",
    ""options"": [],
    ""info"": {
      ""readOnly"": false,
      ""uuid"": {
        ""$binary"": ""PHpCr59sTwG8O3DMmppT+w=="",
        ""$type"": ""04""
      }
    },
    ""idIndex"": {
      ""v"": 2,
      ""key"": {
        ""_id"": 1
      },
      ""name"": ""_id_"",
      ""ns"": ""database.test2""
    }
  },
  {
    ""name"": ""test1"",
    ""type"": ""collection"",
    ""options"": [],
    ""info"": {
      ""readOnly"": false,
      ""uuid"": {
        ""$binary"": ""t8vllixZR82VRAEGA16+Cw=="",
        ""$type"": ""04""
      }
    },
    ""idIndex"": {
      ""v"": 2,
      ""key"": {
        ""_id"": 1
      },
      ""name"": ""_id_"",
      ""ns"": ""database.test1""
    }
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
    public function __invoke(Request $request, string $databaseName): JsonResponse
    {
        $options = json_decode($request->options);

        $options->filter = json_decode($request->filter);

        $collectionInfoIterator = app()->Mongo->getClient()->{$databaseName}->listCollections((array) $options);

        return response()->json(array_map(function ($collectionInfo) { return $collectionInfo->__debugInfo(); }, iterator_to_array($collectionInfoIterator, true)));
    }
}
