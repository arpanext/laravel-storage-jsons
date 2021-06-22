<?php

namespace Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;
class FindOneController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/findOne",
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
     *     @OA\Parameter(
     *         name="options",
     *         in="query",
     *         description="options",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="string",
     *             example="{""sort"":{""_id"":-1}}",
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
  ""_id"": {
    ""$oid"": ""5fee74266f94007dbc35f2c0""
  },
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
     *         response="404",
     *         description="Not Found",
     *         @OA\MediaType(
     *             mediaType="application/vnd.api+json",
     *             @OA\Schema(
     *                 type="object",
     *                 example=
"{
  ""errors"": [
    {
      ""status"": 404,
      ""title"": ""Not Found"",
      ""detail"": ""Not Found"",
      ""links"": [
        {
          ""about"": {
            ""href"": ""https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/404""
          }
        }
      ]
    }
  ]
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

        $options = json_decode($request->options, true);

        ! isset($filter->_id->{'$oid'}) ?: $filter->_id = new ObjectId($filter->_id->{'$oid'});

        $bsonDocument = $collection->findOne($filter, $options);

        if ($bsonDocument) {
            return response()->json($bsonDocument, 200);
        }

        return response()->json([
            'errors' => [
                [
                    'status' => 404,
                    'title' => 'Not Found',
                    'detail' => 'Not Found',
                    'links' => [
                        [
                            'about' => [
                                'href' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/404',
                            ],
                        ],
                    ],
                ],
            ],
        ], 404);
    }
}
