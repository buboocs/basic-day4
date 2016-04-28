<?php

namespace app\controllers;
use yii\data\ArrayDataProvider;
class ChartController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
      public function actionChart1()
    {
        return $this->render('chart1');
    }
     public function actionChart2()
    {
        return $this->render('chart2');
    }
         public function actionChart3()
    {
        $sql = "SELECT  k.kpiname,k.acol,k.bcol,k.target,d.divide,d.denom,d.byear,(d.divide*100)/d.denom as result
                FROM kpi k
                join kpidata d on k.id = d.kpiid
                WHERE d.byear = 2559 and k.target > 0";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data
        ]);
        return $this->render('chart3',[
            'dataProvider' => $dataProvider 
        ]);
    }

}
