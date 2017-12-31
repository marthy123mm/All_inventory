<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Employe */

$this->title = Yii::t('app', 'Update Employe: {nameAttribute}', [
    'nameAttribute' => $model->id_employe,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_employe, 'url' => ['view', 'id' => $model->id_employe]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="employe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
