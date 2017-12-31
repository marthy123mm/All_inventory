<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeAsset */

$this->title = Yii::t('app', 'Update Type Asset: {nameAttribute}', [
    'nameAttribute' => $model->id_type_asset,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type Assets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_type_asset, 'url' => ['view', 'id' => $model->id_type_asset]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="type-asset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
