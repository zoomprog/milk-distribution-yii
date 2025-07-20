<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Cistern;
use app\models\MilkDistribution;

class MilkDistributionController extends Controller
{
    public function actionIndex()
    {
        $cisterns = Cistern::find()->orderBy('cistern_number')->all();
        $distributions = MilkDistribution::find()->orderBy(['created_at' => SORT_DESC])->all();
        $model = new MilkDistribution();

        $allFull = true;
        foreach ($cisterns as $c) {
            if ($c->current_amount < 300) {
                $allFull = false;
                break;
            }
        }

        if ($model->load(Yii::$app->request->post())) {
            $targetCistern = Cistern::find()
                ->where(['<', 'current_amount', 300])
                ->orderBy('current_amount ASC, cistern_number ASC')
                ->one();

            if ($targetCistern && ($targetCistern->current_amount + $model->amount) <= 300) {
                $model->cistern_id = $targetCistern->id;
                $model->created_at = date('Y-m-d H:i:s');
                if ($model->save()) {
                    $targetCistern->current_amount += $model->amount;
                    $targetCistern->save();
                    Yii::$app->session->setFlash('success', 'Молоко успешно добавлено в цистерну №' . $targetCistern->cistern_number);
                    return $this->refresh();
                }
            } else {
                Yii::$app->session->setFlash('amount', 'Нет подходящей цистерны или превышен лимит!');
            }
        }

        return $this->render('index', [
            'cisterns' => $cisterns,
            'distributions' => $distributions,
            'allFull' => $allFull,
            'model' => $model,
        ]);
    }
}