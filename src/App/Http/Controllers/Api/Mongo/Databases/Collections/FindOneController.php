<?php

namespace Arpanext\Mongo\App\Http\Controllers\Api\Mongo\Databases\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FindOneController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/mongo/databases/{databaseName}/collections/{collectionName}/findOne",
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
  ""data"": {
    ""type"": ""collection"",
    ""id"": ""5febd891dbf443384045c3c1"",
    ""attributes"": {
      ""_id"": {
        ""$oid"": ""5febd891dbf443384045c3c1""
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
    }
  }
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
        $client = new \MongoDB\Client(
            'mongodb://root:password@127.0.0.1:27017/admin?retryWrites=true&w=majority'
        );

        $collection = $client->{$databaseName}->{$collectionName};

        $filter = json_decode($request->filter);

        $options = json_decode($request->options, true);

        if (isset($filter->_id->{'$oid'})) {
            $filter->_id = new \MongoDB\BSON\ObjectId($filter->_id->{'$oid'});
        }

        $document = $collection->findOne($filter, $options);

        if (is_null($document)) {
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

        return response()->json([
            'data' => [
                'type' => $collectionName,
                'id' => (string) $document->_id,
                'attributes' => $document,
            ],
        ]);
    }
}
