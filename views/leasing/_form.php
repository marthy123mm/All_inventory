<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Leasing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leasing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'leasing_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'months')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'id_provider')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
