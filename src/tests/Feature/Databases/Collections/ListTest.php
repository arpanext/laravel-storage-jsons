<?php

namespace Tests\Feature\Databases\Collections;

use Tests\TestCase;

class ListTest extends TestCase
{
    /**
     * Dtabases list.
     *
     * @return void
     */
    public function testOK()
    {
        $response = $this->get('http://127.0.0.1:8000/api/v1/mongo/shell/databases/database/collections/list?' . http_build_query([
            'options' => '{"filter": {"name": {"$regex": ""}}, "maxTimeMS": 1000}',
        ]));

        $response->assertStatus(200);
    }
}
