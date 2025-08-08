<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ValidateSignature as Middleware;

class ValidateSignature extends Middleware
{
    /**
     * The query string parameter names that should be excluded.
     *
     * @var array<int, string>
     */
    protected $except = [
        
    ];
} 