<?php

namespace app\controllers;
use yii\data\ArrayDataProvider;

class KpiController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
       public function actionKpi1()
    {
           
        $sql = "SELECT  k.kpiname,k.acol,k.bcol,k.target FROM kpi k";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data
        ]);
        return $this->render('kpi1',[
            'dataProvider' => $dataProvider 
        ]);
    }

       public function actionKpi2()
    {
           
        $sql = "SELECT  k.kpiname,k.acol,k.bcol,k.target,d.divide,d.denom,d.byear,(d.divide*100)/d.denom as result
                FROM kpi k
                join kpidata d on k.id = d.kpiid
                WHERE d.byear = 2559";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data
        ]);
        return $this->render('kpi2',[
            'dataProvider' => $dataProvider 
        ]);
    }
           public function actionKpi3()
    {
           
        $sql = "SELECT  k.kpiname,k.acol,k.bcol,k.target,d.divide,d.denom,d.byear,(d.divide*100)/d.denom as result
                FROM kpi k
                join kpidata d on k.id = d.kpiid
                WHERE d.byear = 2559";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data
        ]);
        return $this->render('kpi3',[
            'dataProvider' => $dataProvider 
        ]);
    }
        public function actionKpi4()
    {
           
        $sql = "SELECT  k.kpiname,k.acol,k.bcol,k.target,d.divide,d.denom,d.byear,(d.divide*100)/d.denom as result
                FROM kpi k
                join kpidata d on k.id = d.kpiid
                WHERE d.byear = 2559";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data
        ]);
        return $this->render('kpi4',[
            'dataProvider' => $dataProvider 
        ]);
    }
}
