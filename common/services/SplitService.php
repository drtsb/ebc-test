<?php

namespace common\services;

use common\repositories\SplitRepositoryInterface;
use common\components\ArraySplitterInterface;

use common\models\SplitRequestDto;
use common\models\User;

class SplitService
{

    private $splitRepository;
    private $arraySplitter;

    public function __construct(
        SplitRepositoryInterface $splitRepository,
        ArraySplitterInterface $arraySplitter
    )
    {
        $this->splitRepository = $splitRepository;
        $this->arraySplitter = $arraySplitter;
    }

    public function splitArray(SplitRequestDto $request, ?User $user) : int
    {
        $result = $this->arraySplitter->splitArray($request);

        $this->splitRepository->create($user, $request, $result);

        return $result;
    }

}