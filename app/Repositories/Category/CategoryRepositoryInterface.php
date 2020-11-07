<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    /**
     *  Create one model for Category, use Eloquent ORM
     *
     * @param array $attributes
     * @return $ID of model
     */
    public function create(array $attributes = []);

    /**
     * Update model use Eloquent ORM
     *
     * @param array $attributes
     * @return bool
     */
    public function update(int $id,array $attributes = []);

    /**
     * Delete model by category model
     *
     * @param int $id
     * @return bool
     */
    public function remove(int $id);

    /**
     * Get information of model by ID
     *
     * @param int $id
     * @return model
     */
    public function getInfoById(int $id);

    /**
     * Create pagination and search for all elements category
     *
     *  @return collection LengthAwarePagination
     */
    public function getElementsUsePaginationAndSearch(int $perPage, string $keyword = '');

    /**
     * Handling menu recursive
     *
     * @return string $htmlOptions
     */
    public function recursive(int $parent_id, int $root = 0, string $text = '');
}
