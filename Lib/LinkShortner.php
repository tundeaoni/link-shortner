<?php

namespace Lib;

class LinkShortner
{
    private $hasher;
    private $linkRepository;

    public function __construct(IHasher $hasherObject , IRepository $linkRepository){
        $this->hasher = $hasherObject;
        $this->linkRepository = $linkRepository;
    }

    public function shorten($url) {
        // save and return shortened shortened uniqId
        $uniqID = $this->hasher->hash();

        $this->linkRepository->create($uniqID,$url);

        return $uniqID;
    }

    public function expand($uniqId){
        // given uniqId retrieve url from db
        return $this->linkRepository->get($uniqId);
    }

    public function list(){
        return $this->linkRepository->list();
    }
}
