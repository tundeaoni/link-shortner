<?php

namespace App\Http\Controllers;
use View;
use Lib\LinkShortner;
use App\Http\Requests\UrlShortener;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    protected $linkShortnerObject;

    public function __construct(LinkShortner $linkShortnerObject){
        $this->linkShortnerObject = $linkShortnerObject;
    }

    public function expand($uniqId){
        $url = $this->linkShortnerObject->expand($uniqId);
        return redirect($url);
    }

    public function process(UrlShortener $request){
        $input = $request->all();
        $url = $input['url'];
        $uniqId = $this->linkShortnerObject->shorten($url);
        return view('response',['url' => $uniqId , 'original_url' => $url ]);
    }

    public function list(){
        $values = $this->linkShortnerObject->list();
        return view('list',['values' => $values ]);
    }

    public function form(Request $request){
        return view('form');
    }
}

