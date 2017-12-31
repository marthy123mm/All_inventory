<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Office */

$this->title = Yii::t('app', 'Update Office: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_office]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="office-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
