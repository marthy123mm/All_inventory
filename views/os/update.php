<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Os */

$this->title = Yii::t('app', 'Update Os: {nameAttribute}', [
    'nameAttribute' => $model->id_os,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Os'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_os, 'url' => ['view', 'id' => $model->id_os]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="os-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
