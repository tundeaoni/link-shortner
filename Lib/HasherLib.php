<?php

namespace Lib;

use Illuminate\Support\Facades\Hash;

class HasherLib implements IHasher
{
    public function hash() {
        return uniqid();
    }
}
