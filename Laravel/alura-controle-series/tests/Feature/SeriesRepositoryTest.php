<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_series_created_with_seasons_episodes_also_created()
    {
        // Arrange
        $repository = $this->app->make(SeriesRepository::class);

        /** @var $request */
        // $request = new SeriesFormRequest();
        // $request->name = 'Série de teste';
        // $request->seasonsNumber = 3;
        // $request->episodesNumber = 3;

        $request = new SeriesFormRequest();

        $request->setMethod('POST');

        $request->request->add([
            'name' => 'Série de teste',
            'seasonsNumber' => '3',
            'episodesNumber' => '3',
        ]);

        // Act
        $repository->add($request);

        // Assert
        $this->assertDatabaseHas('series', ['name' => 'Série de teste']);
        $this->assertDatabaseHas('seasons', ['number' => 3]);
        $this->assertDatabaseHas('episodes', ['number' => 3]);
    }
}
