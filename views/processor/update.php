<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Processor */

$this->title = Yii::t('app', 'Update Processor: {nameAttribute}', [
    'nameAttribute' => $model->id_processor,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Processors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_processor, 'url' => ['view', 'id' => $model->id_processor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="processor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
