<?php

namespace App\Infrastructure\Persistence\Service;

/**
 * Summary of PersisterMockInterface
 */
interface PersisterMockInterface
{
    /**
     * Summary of setUserId
     * @param int $userId
     * @return PersisterMock
     */
    public function setUserId(int $userId): self;

    /**
     * Summary of persist
     * @param mixed $model
     * @return void
     */
    public function persist($model): void;
}
