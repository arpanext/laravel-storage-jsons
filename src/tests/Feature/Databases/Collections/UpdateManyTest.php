<?php

namespace Tests\Feature\Databases\Collections;

use Tests\TestCase;

class UpdateManyTest extends TestCase
{
    /**
     * Get many object.
     *
     * @return void
     */
    public function testOK()
    {
        $response = $this->json('POST', 'http://127.0.0.1:8000/api/v1/storage/jsons/databases/database/collections/collection/insertMany', [
            [
                "id" => 1,
                "name" => "Leanne Graham",
                "username" => "Bret",
                "email" => "Sincere@april.biz",
                "address" => [
                    "street" => "Kulas Light",
                    "suite" => "Apt. 556",
                    "city" => "Gwenborough",
                    "zipcode" => "92998-3874",
                    "geo" => [
                    "lat" => "-37.3159",
                    "lng" => "81.1496"
                    ]
                ],
                "phone" => "1-770-736-8031 x56442",
                "website" => "hildegard.org",
                "company" => [
                    "name" => "Romaguera-Crona",
                    "catchPhrase" => "Multi-layered client-server neural-net",
                    "bs" => "harness real-time e-markets"
                ]
            ],
            [
                "id" => 2,
                "name" => "Ervin Howell",
                "username" => "Antonette",
                "email" => "Shanna@melissa.tv",
                "address" => [
                    "street" => "Victor Plains",
                    "suite" => "Suite 879",
                    "city" => "Wisokyburgh",
                    "zipcode" => "90566-7771",
                    "geo" => [
                    "lat" => "-43.9509",
                    "lng" => "-34.4618"
                    ]
                ],
                "phone" => "010-692-6593 x09125",
                "website" => "anastasia.net",
                "company" => [
                    "name" => "Deckow-Crist",
                    "catchPhrase" => "Proactive didactic contingency",
                    "bs" => "synergize scalable supply-chains"
                ]
            ]
        ]);

        $response = $this->json('PATCH', 'http://127.0.0.1:8000/api/v1/storage/jsons/databases/database/collections/collection/updateMany?' . http_build_query([
            'filter' => '{ "$or": [ { "name": "Leanne Graham" }, { "name": "Ervin Howell" } ] }',
        ]), [
            '$set' => [
              'name' => 'N/A',
            ],
        ]);

        $response->assertStatus(200);
    }
}
