<?php

namespace Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;

class DeleteOneController extends Controller
{
    /**
     * @OA\Delete(
     *     path="/api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/deleteOne",
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
     *     @OA\Parameter(
     *         name="filter",
     *         in="query",
     *         description="filter",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="string",
     *             example="{""id"":1,""name"":""Leanne Graham"",""email"":""Sincere@april.biz""}",
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
"{
  ""deletedCount"": 1,
  ""isAcknowledged"": true
}"
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
        $collection = app()->Mongo->getClient()->{$databaseName}->{$collectionName};

        $filter = json_decode($request->filter);

        ! isset($filter->_id->{'$oid'}) ?: $filter->_id = new ObjectId($filter->_id->{'$oid'});

        $deleteResult = $collection->deleteOne($filter);

        return response()->json([
            'deletedCount' => $deleteResult->getDeletedCount(),
            'isAcknowledged' => $deleteResult->isAcknowledged(),
        ], 200);
    }
}
