<?php
namespace api\controllers;

use Yii;
use yii\rest\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public function actionIndex()
    {
        return 'api';
    }

}
