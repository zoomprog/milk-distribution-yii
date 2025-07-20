<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $cisterns app\models\Cistern[] */
/** @var $distributions app\models\MilkDistribution[] */
/** @var $allFull bool */
/** @var $model app\models\MilkDistribution */
?>

<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Система учета и распределения молока</h1>

    <?php $form = ActiveForm::begin(['options' => ['class' => 'mb-6']]); ?>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <?= $form->field($model, 'filled_by')->textInput([
                'class' => 'mt-1 block w-full border-gray-300 rounded-md shadow-sm'
            ])->label('Кто залил') ?>
        </div>
        <div>
            <?= $form->field($model, 'amount')->input('number', [
                'min' => 1,
                'max' => 300,
                'class' => 'mt-1 block w-full border-gray-300 rounded-md shadow-sm'
            ])->label('Количество (литры)') ?>
        </div>
    </div>
    <?php if ($allFull): ?>
        <p class="text-red-500 text-sm mt-2">Все цистерны полные. Заливка невозможна.</p>
    <?php endif; ?>
    <?= Html::submitButton('Добавить молоко', [
        'class' => 'mt-4 bg-blue-500 text-white px-4 py-2 rounded' . ($allFull ? ' opacity-50 cursor-not-allowed' : ''),
        'disabled' => $allFull
    ]) ?>
    <?php ActiveForm::end(); ?>



    <h2 class="text-xl font-semibold mb-4">Статистика цистерн</h2>
    <div class="grid grid-cols-5 gap-4 mb-6">
        <?php foreach ($cisterns as $cistern): ?>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold">Цистерна <?= Html::encode($cistern->cistern_number) ?></h3>
                <p><?= Html::encode($cistern->current_amount) ?> / 300 литров</p>
            </div>
        <?php endforeach; ?>
    </div>

    <h2 class="text-xl font-semibold mb-4">История заливок</h2>
    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Кто залил</th>
                <th class="p-2">Количество (литры)</th>
                <th class="p-2">Цистерна</th>
                <th class="p-2">Дата</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($distributions as $distribution): ?>
                <tr>
                    <td class="p-2"><?= Html::encode($distribution->filled_by) ?></td>
                    <td class="p-2"><?= Html::encode($distribution->amount) ?></td>
                    <td class="p-2"><?= Html::encode($distribution->cistern->cistern_number) ?></td>
                    <td class="p-2"><?= Html::encode(date('Y-m-d H:i', strtotime($distribution->created_at))) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>