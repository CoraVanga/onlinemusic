<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;

class HomeController extends Controller{
	public fucntion actionIndex(){
		return $this->render(index);
	}
}
