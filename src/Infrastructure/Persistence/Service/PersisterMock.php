<?php

namespace App\Infrastructure\Persistence\Service;

/**
 * Summary of PersisterMock
 */
class PersisterMock implements PersisterMockInterface
{
    private const POST = 'App\Domain\Model\Post';

    /**
     * Summary of userId
     * @var int
     */
    private int $userId = 1;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
    }

    /**
     * Summary of setUserId
     * @param int $userId
     * @return PersisterMock
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Summary of persist
     * @param object $model
     * @return void
     */
    public function persist($model): void
    {
        $class = \get_class($model);

        switch ($class) {
            case self::POST:
                // Mocked userId.
                $model->setUserId($this->userId);
                // This is not required to code a real persistence.
                //dump($model); exit();
                //$this->persistModel($model);
                break;
        }
    }
}
