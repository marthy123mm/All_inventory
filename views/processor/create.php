<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Processor */

$this->title = Yii::t('app', 'Create Processor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Processors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="processor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
