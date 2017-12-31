<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */

$this->title = Yii::t('app', 'Update Asset: {nameAttribute}', [
    'nameAttribute' => $model->id_asset,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Assets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_asset, 'url' => ['view', 'id' => $model->id_asset]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="asset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
