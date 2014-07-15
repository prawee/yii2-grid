<?php
namespace api\app\controllers;

use Yii;
use yii\rest\ActiveController;

/**
 * Site controller
 */
class UsersController extends ActiveController
{
	public $modelClass = 'common\models\User';
}