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
  },
  {
    ""id"": 3,
    ""name"": ""Clementine Bauch"",
    ""username"": ""Samantha"",
    ""email"": ""Nathan@yesenia.net"",
    ""address"": {
      ""street"": ""Douglas Extension"",
      ""suite"": ""Suite 847"",
      ""city"": ""McKenziehaven"",
      ""zipcode"": ""59590-4157"",
      ""geo"": {
        ""lat"": ""-68.6102"",
        ""lng"": ""-47.0653""
      }
    },
    ""phone"": ""1-463-123-4447"",
    ""website"": ""ramiro.info"",
    ""company"": {
      ""name"": ""Romaguera-Jacobson"",
      ""catchPhrase"": ""Face to face bifurcated interface"",
      ""bs"": ""e-enable strategic applications""
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
  ""data"": [
    {
      ""type"": ""collection"",
      ""id"": ""5febd7d9dbf443384045c3bd""
    },
    {
      ""type"": ""collection"",
      ""id"": ""5febd7d9dbf443384045c3be""
    },
    {
      ""type"": ""collection"",
      ""id"": ""5febd7d9dbf443384045c3bf""
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
    public function __invoke(Request $request, string $databaseName, string $collectionName): JsonResponse
    {
        $client = new \MongoDB\Client(
            'mongodb://root:password@127.0.0.1:27017/admin?retryWrites=true&w=majority'
        );

        $collection = $client->{$databaseName}->{$collectionName};

        $insertManyResult = $collection->insertMany(json_decode($request->getContent()));

        return response()->json([
            'data' => array_map(function ($objectId) use ($collectionName) {
                return [
                    'type' => $collectionName,
                    'id' => (string) $objectId,
                ];
            }, $insertManyResult->getInsertedIds())
        ]);
    }
}
