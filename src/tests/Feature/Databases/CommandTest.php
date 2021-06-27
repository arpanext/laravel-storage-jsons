<?php

namespace Tests\Feature\Databases\Commands;

use Tests\TestCase;

class CommandTest extends TestCase
{
    /**
     * Command execute.
     *
     * @return void
     */
    public function testOK()
    {
        $response = $this->json('POST', 'http://127.0.0.1:8000/api/v1/mongo/shell/databases/database/command', [
            'ping' => 1,
          ]);

        $response->assertStatus(200);
    }
}
