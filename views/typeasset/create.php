<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TypeAsset */

$this->title = Yii::t('app', 'Create Type Asset');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type Assets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-asset-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
