<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'purchase_date')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sales_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_status')->textInput() ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ubication')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_os')->textInput() ?>

    <?= $form->field($model, 'hard_disk')->textInput() ?>

    <?= $form->field($model, 'ram')->textInput() ?>

    <?= $form->field($model, 'id_processor')->textInput() ?>

    <?= $form->field($model, 'id_leasing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_model')->textInput() ?>

    <?= $form->field($model, 'id_asset_type')->textInput() ?>

    <?= $form->field($model, 'id_parent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
