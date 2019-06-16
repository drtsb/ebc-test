<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;

use yii\web\ForbiddenHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\BadRequestHttpException;

use common\services\SplitService;
use common\models\SplitRequestDto;

class SplitController extends Controller
{

    private $splitService;

    public function __construct($id, $module, SplitService $splitService, $config = [])
    {
        $this->splitService = $splitService;
        parent::__construct($id, $module, $config);
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class,
        ];
        $behaviors['access'] = [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];
        return $behaviors;
    }

    public function verbs()
    {
        return [
            'array' => ['post'],
        ];
    }

    public function actionArray()
    {
        $request = new SplitRequestDto();
        $request->load(Yii::$app->getRequest()->getBodyParams(), '');
        if (!$request->validate()) {
            throw new BadRequestHttpException(json_encode($request->getErrors()));
        }

        $result = $this->splitService->splitArray(
            $request,
            Yii::$app->user->identity
        );

        return $result;
    }

}