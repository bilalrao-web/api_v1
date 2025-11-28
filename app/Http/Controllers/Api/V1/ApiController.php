<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function include(string $relationship): bool
{
    $include = request()->query('include');

    if (!$include) {
        return false;
    }

    $includes = explode(',', strtolower($include));

    return in_array(strtolower($relationship), $includes);
}
}
