<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatusAsset */

$this->title = Yii::t('app', 'Update Status Asset: {nameAttribute}', [
    'nameAttribute' => $model->id_status,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Status Assets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_status, 'url' => ['view', 'id' => $model->id_status]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="status-asset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
