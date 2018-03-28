<?php
namespace app\controllers;
use yii\web\Controller;

class HelloController extends Controller{
	public function actionIndex(){
		//echo 'hello';
		$this->layout = 'onlinemusic';
		return $this->render('index');
	}
}