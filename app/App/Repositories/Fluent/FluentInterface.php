<?php
namespace App\Repositories\Fluent;

/**
 * Interface FluentInterface
 * @package App\Repositories\Fluent
 */
interface FluentInterface
{
    /**
     * @param array $attributes
     * @return mixed
     */
    public function add(array $attributes);

    /**
     * @param array $columns
     * @return mixed
     */
    public function all(array $columns = ['*']);

    /**
     * @param $id
     * @param array $columns
     * @param int $lifeTime
     * @return mixed
     */
    public function find($id, array $columns = ['*'], $lifeTime = 120);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);
} 