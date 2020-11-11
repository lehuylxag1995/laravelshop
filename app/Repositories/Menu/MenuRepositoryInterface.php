<?php

namespace App\Repositories\Menu;

interface MenuRepositoryInterface
{
    /**
     * Get list all data in model menu and use pagination and search keyword
     *
     * @return collection
     */
    public function getListUsePaginationAndSearch(int $perPage, string $keyword = '');

    /**
     * Create new instance model
     *
     * @return int $id
     */
    public function create(array $attributes = []);

    /**
     * Update information for model by Id
     *
     * @return bool
     */
    public function edit(int $id, array $attributes = []);

    /**
     * Remove instance model by id
     *
     * @return bool
     */
    public function remove(int $id);

    /**
     * Get information instance model by id
     *
     * @return collection model
     */
    public function getInfoById(int $id);

    /**
     * Create html of tag option in tag select by recursive of instance model menu
     *
     * @return string
     */
    public function recursive(int $parent_id,int $root=0,string $text='');
}
