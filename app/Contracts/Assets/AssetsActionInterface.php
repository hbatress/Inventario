<?php

namespace App\Contracts\Assets;

interface AssetsActionInterface
{
    public function create(array $data);
    public function update( $id,  $data);
    public function delete(int $id);
}
