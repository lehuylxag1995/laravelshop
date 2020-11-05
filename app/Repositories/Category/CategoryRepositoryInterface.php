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
    // public function update();
    // public function remove();

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
    public function recursive(int $parent_id = 0);
}
