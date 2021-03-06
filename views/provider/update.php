<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Provider */

$this->title = Yii::t('app', 'Update Provider: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Providers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_provider]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="provider-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
