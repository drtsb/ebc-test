<?php

namespace api\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\Url;
use yii\rest\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\ServerErrorHttpException;

use api\models\PostSearch;
use common\models\Post;
use common\rbac\Rbac;

class SplitController extends Controller
{
    public $modelClass = 'common\models\Post';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];
        $behaviors['authenticator']['authMethods'] = [
            HttpBasicAuth::class,
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

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function actionSplit()
    {
        $model = new Post();
        $model->user_id = Yii::$app->user->id;
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
            $id = implode(',', array_values($model->getPrimaryKey(true)));
            $response->getHeaders()->set('Location', Url::toRoute(['view', 'id' => $id], true));
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }
        return $model;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if (in_array($action, ['update', 'delete'])) {
            if (!Yii::$app->user->can(Rbac::MANAGE_POST, ['post' => $model])) {
                throw  new ForbiddenHttpException('Forbidden.');
            }
        }
    }

}