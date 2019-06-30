<?php

use Ramsey\Uuid\Codec\TimestampFirstCombCodec;
use Ramsey\Uuid\Generator\CombGenerator;
use Ramsey\Uuid\UuidFactory;
use UuidHelper\Uuid;

class UuidTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \UuidHelper\Uuid::uuid4
     */
    public function testUuid4()
    {
        $uuidFactoryMock = Mockery::mock(UuidFactory::class);

        $uuidFactoryMock->shouldReceive('setRandomGenerator')
            ->once()
            ->withAnyArgs()
            ->andReturn(true);

        $uuidFactoryMock->shouldReceive('setCodec')
            ->once()
            ->withAnyArgs()
            ->andReturn(true);

        $combGeneratorSpy = Mockery::spy(CombGenerator::class);

        $timestampFirstCombCodecSpy = Mockery::spy(TimestampFirstCombCodec::class);

        $uuidMock = Mockery::mock(Uuid::class)->makePartial();

        $uuidMock->shouldReceive('newUuidFactory')
            ->once()
            ->andReturn($uuidFactoryMock);

        $uuidMock->shouldReceive('newCombGenerator')
            ->once()
            ->andReturn($combGeneratorSpy);

        $uuidMock->shouldReceive('newTimestampFirstCombCode')
            ->once()
            ->andReturn($timestampFirstCombCodecSpy);

        $uuidMock->shouldReceive('staticGenerateUuid')
            ->andReturn('8e0a220c-0368-411c-809d-907026c83fec');

        $return = $uuidMock->uuid4();

        $this->assertEquals('8e0a220c-0368-411c-809d-907026c83fec', $return);
        $this->assertInternalType('string', $return);
    }
}
