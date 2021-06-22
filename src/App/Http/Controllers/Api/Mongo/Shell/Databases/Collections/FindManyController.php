<?php

namespace Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;
class FindManyController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/findMany",
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
     *             example="{ ""$or"": [ { ""name"": ""Leanne Graham"" }, { ""name"": ""Ervin Howell"" } ] }",
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
     *             example="{""sort"":{""_id"":-1}, ""limit"": 10}",
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
  },
  {
    ""_id"": {
      ""$oid"": ""5fee71d76f94007dbc35f2be""
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
    public function __invoke(Request $request, string $databaseName, string $collectionName): JsonResponse
    {
        $collection = app()->Mongo->getClient()->{$databaseName}->{$collectionName};

        $filter = json_decode($request->filter);

        $options = json_decode($request->options, true);

        ! isset($filter->_id->{'$oid'}) ?: $filter->_id = new ObjectId($filter->_id->{'$oid'});

        $cursor = $collection->find($filter, $options);

        return response()->json(array_map(function ($bsonDocument) { return $bsonDocument; }, $cursor->toArray()), 200);
    }
}
