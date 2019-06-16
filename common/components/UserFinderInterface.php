<?php

namespace common\components;
 
use common\models\User;

interface UserFinderInterface
{
    public function findById($id) : ?User;
}