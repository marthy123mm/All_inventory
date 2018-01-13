<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StatusAsset */

$this->title = Yii::t('app', 'Create Status Asset');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Status Assets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-asset-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
