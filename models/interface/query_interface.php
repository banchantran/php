<?php

interface QueryAdminInterface
{
    function getAll($field);

    function findById($id);

    function findItem($data);

    function deleteById($id);

    function create($data);

    function updateById($id, $data);

    function search($data);
}
