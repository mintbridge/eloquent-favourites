<?php
namespace Mintbridge\EloquentFavourites\Test;

use Illuminate\Support\Facades\Config;
use Mintbridge\EloquentFavourites\Favourite;
use Mockery as m;

class FavouriteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_creates_the_morph_to_relationship()
    {
        $favourite = m::mock(Favourite::class)->makePartial();

        $favourite
            ->shouldReceive('morphTo')
            ->once()
            ->andReturn('ok');

        $this->assertEquals(
            $favourite->favouritable(),
            'ok'
        );
    }

    /**
     * @test
     */
    public function it_creates_the_user_relationship()
    {
        Config::shouldReceive('get')
            ->once()
            ->with('eloquent-favourites.user')
            ->andReturn('UserClass');

        $favourite = m::mock(Favourite::class)->makePartial();

        $favourite
            ->shouldReceive('belongsTo')
            ->once()
            ->andReturn('ok');

        $this->assertEquals(
            $favourite->user(),
            'ok'
        );
    }
}
