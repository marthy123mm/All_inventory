<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Models */

$this->title = Yii::t('app', 'Update Models: {nameAttribute}', [
    'nameAttribute' => $model->id_model,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_model, 'url' => ['view', 'id' => $model->id_model]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="models-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
