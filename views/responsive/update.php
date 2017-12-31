<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Responsive */

$this->title = Yii::t('app', 'Update Responsive: {nameAttribute}', [
    'nameAttribute' => $model->id_responsive,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Responsives'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_responsive, 'url' => ['view', 'id' => $model->id_responsive]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="responsive-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
