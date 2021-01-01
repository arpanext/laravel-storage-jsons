<?php

namespace Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InsertManyController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/insertMany",
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
     *     @OA\RequestBody(
     *         description="Document",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/vnd.api+json",
     *             @OA\Schema(
     *                 type="object",
     *                 example=
"[
  {
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
    ""id"": 2,
    ""name"": ""Ervin Howell"",
    ""username"": ""Antonette"",
    ""email"": ""Shanna@melissa.tv"",
    ""address"": {
      ""street"": ""Victor Plains"",
      ""suite"": ""Suite 879"",
      ""city"": ""Wisokyburgh"",
      ""zipcode"": ""90566-7771"",
      ""geo"": {
        ""lat"": ""-43.9509"",
        ""lng"": ""-34.4618""
      }
    },
    ""phone"": ""010-692-6593 x09125"",
    ""website"": ""anastasia.net"",
    ""company"": {
      ""name"": ""Deckow-Crist"",
      ""catchPhrase"": ""Proactive didactic contingency"",
      ""bs"": ""synergize scalable supply-chains""
    }
  }
]"
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
  ""insertedIds"": [
    {
      ""$oid"": ""5fee75d36f94007dbc35f2c5""
    },
    {
      ""$oid"": ""5fee75d36f94007dbc35f2c6""
    }
  ],
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
        $collection = app()->Mongo->client->{$databaseName}->{$collectionName};

        $insertManyResult = $collection->insertMany(json_decode($request->getContent()));

        return response()->json([
            'insertedIds' => array_map(function ($objectId) {
                return $objectId;
            }, $insertManyResult->getInsertedIds()),
            'isAcknowledged' => $insertManyResult->isAcknowledged(),
        ]);
    }
}
