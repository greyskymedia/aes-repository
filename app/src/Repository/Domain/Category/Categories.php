<?php declare(strict_types = 1);

namespace Alroniks\Repository\Domain\Category;

use Alroniks\Repository\AbstractRepository;
use Alroniks\Repository\Contracts\RepositoryInterface;
use Alroniks\Repository\Contracts\StorageInterface;

/**
 * Repository of categories
 * @package Alroniks\Repository\Domain\Category
 */
class Categories extends AbstractRepository implements RepositoryInterface
{
    protected $searchable = ['repository'];

    /**
     * @return StorageInterface
     */
    protected function getStorage() : StorageInterface
    {
        $storage = parent::getStorage();
        $storage->setConfig([
            'key.storage' => strtoupper((new \ReflectionClass(Category::class))->getShortName()),
            'fields' => $this->searchable
        ]);

        return $storage;
    }

}
