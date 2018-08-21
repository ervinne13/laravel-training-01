<?php

namespace App\Modules\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Providers\Auth\Illuminate;

class JWTTokenTheftProtectedAuthProvider extends Illuminate
{

    /** @var Request */
    private $request;

    public function __construct(\Illuminate\Contracts\Auth\Guard $auth, Request $request)
    {
        parent::__construct($auth);
        $this->request = $request;
    }

    public function byId($id)
    {
        $keys = json_decode(decrypt($id));
        
        if ($keys->ip != $this->request->ip()) {
            throw new HttpException('IP Address did not match', 401);
        }
        
        return parent::byId($keys->key);
    }

}
