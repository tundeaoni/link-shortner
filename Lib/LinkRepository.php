<?php

namespace Lib;
use \App\Links;

use Illuminate\Support\Facades\Hash;

class LinkRepository implements IRepository
{
    public function get($uniqId) {
        $urlDetails = Links::where('shortened_url', $uniqId)->first();
        if(is_null($urlDetails)){
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException();
        }
        return $urlDetails->first()->url;
    }

    public function create($uniqId,$url) {
        return Links::Create(
            [
                'shortened_url' => $uniqId,
                'url'=>$url,
            ]
        );
    }

    public function list() {
        return Links::all()->toArray();
    }
}
