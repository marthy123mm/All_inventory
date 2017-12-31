<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Leasing */

$this->title = Yii::t('app', 'Update Leasing: {nameAttribute}', [
    'nameAttribute' => $model->id_leasing,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Leasings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_leasing, 'url' => ['view', 'id' => $model->id_leasing]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="leasing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
