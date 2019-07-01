<?php

namespace Uuid;

use Ramsey\Uuid\Codec\TimestampFirstCombCodec;
use Ramsey\Uuid\Generator\CombGenerator;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Ramsey\Uuid\UuidFactory;

/**
 * Class Uuid
 * Generate uuid hashs based on Ramsey/Uuid lib
 */
class Uuid
{
    /**
     * Method uuid4
     * Generate uuid hash
     *
     * @return string
     * @throws \Exception
     */
    public function uuid4()
    {
        $uuidFactory = $this->newUuidFactory();
        $combGenerator = $this->newCombGenerator($uuidFactory);
        $codec = $this->newTimestampFirstCombCode($uuidFactory);
        $uuidFactory->setRandomGenerator($combGenerator);
        $uuidFactory->setCodec($codec);
        return $this->staticGenerateUuid($uuidFactory);
    }

    /**
     * @codeCoverageIgnore
     * method newUuidFactory
     * create and return new UuidFactory object
     * (should not contain any logic, just instantiate the object and return it)
     * @return UuidFactory
     */
    public function newUuidFactory()
    {
        return new UuidFactory();
    }

    /**
     * @codeCoverageIgnore
     * method newCombGenerator
     * create and return new CombGenerator object
     * (should not contain any logic, just instantiate the object and return it)
     * @param UuidFactory $uuidFactory
     * @return CombGenerator
     */
    public function newCombGenerator(UuidFactory $uuidFactory)
    {
        return new CombGenerator(
            $uuidFactory->getRandomGenerator(),
            $uuidFactory->getNumberConverter()
        );
    }

    /**
     * @codeCoverageIgnore
     * method newTimestampFirstCombCodec
     * create and return new TimestampFirstCombCodec object
     * (should not contain any logic, just instantiate the object and return it)
     * @param UuidFactory $uuidFactory
     * @return TimestampFirstCombCodec
     */
    public function newTimestampFirstCombCode(UuidFactory $uuidFactory)
    {
        return new TimestampFirstCombCodec(
            $uuidFactory->getUuidBuilder()
        );
    }

    /**
     * @codeCoverageIgnore
     * method staticGenerateUuid
     * generate an uuid
     * (should not contain any logic,
     * just call the static method and return his response)
     * @param UuidFactory $uuidFactory uuidFactory
     * @return string
     * @throws \Exception
     */
    public function staticGenerateUuid(UuidFactory $uuidFactory)
    {
        RamseyUuid::setFactory($uuidFactory);
        return RamseyUuid::uuid4()->toString();
    }
}
