<?php

namespace Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;

class ReplaceOneController extends Controller
{
    /**
     * @OA\Put(
     *     path="/api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/replaceOne",
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
     *     @OA\RequestBody(
     *         description="Document",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/vnd.api+json",
     *             @OA\Schema(
     *                 type="object",
     *                 example=
"{
  ""id"": 1,
  ""name"": ""Leanne Graham"",
  ""username"": ""Bret"",
  ""email"": ""Sincere@april.biz"",
  ""address"": {
    ""street"": ""Kulas Light"",
    ""suite"": ""Apt. 556"",
    ""city"": ""Gwenborough"",
    ""zipcode"": ""92998-3874"",
    ""geo"": {
      ""lat"": ""-37.3159"",
      ""lng"": ""81.1496""
    }
  },
  ""phone"": ""1-770-736-8031 x56442"",
  ""website"": ""hildegard.org"",
  ""company"": {
    ""name"": ""Romaguera-Crona"",
    ""catchPhrase"": ""Multi-layered client-server neural-net"",
    ""bs"": ""harness real-time e-markets""
  }
}"
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Created",
     *         @OA\MediaType(
     *             mediaType="application/vnd.api+json",
     *             @OA\Schema(
     *                 type="object",
     *                 example=
"{
  ""matchedCount"": 1,
  ""modifiedCount"": 1,
  ""isAcknowledged"": true
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
    public function __invoke(Request $request, string $databaseName, string $collectionName): JsonResponse
    {
        $collection = app()->Mongo->getClient()->{$databaseName}->{$collectionName};

        $filter = json_decode($request->filter);

        ! isset($filter->_id->{'$oid'}) ?: $filter->_id = new ObjectId($filter->_id->{'$oid'});

        $updateResult = $collection->replaceOne($filter, json_decode($request->getContent()));

        return response()->json([
            'matchedCount' => $updateResult->getMatchedCount(),
            'modifiedCount' => $updateResult->getModifiedCount(),
            'isAcknowledged' => $updateResult->isAcknowledged(),
        ], 200);
    }
}
