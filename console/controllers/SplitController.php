<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;

use common\components\UserFinderInterface;
use common\services\SplitService;
use common\models\SplitRequestDto;

class SplitController extends Controller
{

	public $user = null;

	private $splitService;
	private $userFinder;

    public function __construct($id, $module, SplitService $splitService, UserFinderInterface $userFinder, $config = [])
    {
        $this->splitService = $splitService;
        $this->userFinder = $userFinder;
        parent::__construct($id, $module, $config);
    }

    public function options($actionID)
    {
        return ['user'];
    }
    
    public function optionAliases()
    {
        return ['u' => 'user'];
    }

	public function actionIndex(){

		$user = $this->userFinder->findById($this->user);

		$request = Yii::createObject([
			'class' => SplitRequestDto::class,
			'n' => Console::input("N: "),
			'array' => explode(',', Console::input("Набор целых чисел, через запятую: ")),
		]);

		if (!$request->validate()) {
			$this->stdout("Некорректные значения.\n", Console::FG_RED);
			return Controller::EXIT_CODE_ERROR;
		}

		$result = $this->splitService->splitArray($request, $user);

		$this->stdout("Результат: " . $result ."\n", Console::FG_GREEN);

		return Controller::EXIT_CODE_NORMAL;
	}

}