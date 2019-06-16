<?php

namespace common\components;

use common\models\User;

class UserFinder implements UserFinderInterface
{

    public function findById($id) : ?User
    {
        return User::findIdentity($id);
    }

}