<?php

namespace Tests\Feature\Http;

use App\Models\MessageCount;
use App\Models\Streamer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class StreamersControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_list_streamers()
    {
        $streamer = Streamer::factory()
            ->create();

        $response = $this->get(route('streamers.index'));

        $response->assertOk()
            ->assertSee($streamer->streamer_username);
    }
    public function test_can_register_new_streamer()
    {
        $payload = [
            'streamer_id' => '227168488',
            'streamer_username' => 'kalanedev'
        ];

        $response = $this->post(route('streamers.post'), $payload);
        $response->assertRedirectToRoute('streamers.index');
        $lol = MessageCount::where('streamer_id', $payload['streamer_id'])->first();

        $this->assertCount(1, Streamer::all());
        $this->assertEquals(1, $lol->messages_count->value());
    }

}
