<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\money\MaskMoney;
use app\models\Asset;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="container">

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Yii::t('app', 'General information')?>
                </div>
                <div class="panel-body">

                    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>
                    

                    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

                    <?= $form->field($model, 'ubication')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'id_model')->textInput() ?>

                    <?= $form->field($model, 'id_asset_type')->textInput() ?>

                    
                
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Yii::t('app', 'Finance information')?>
                </div>
                <div class="panel-body">

                    <?= $form->field($model, 'status')->dropDownList(
                        Asset::STATUS_ARRAY,
                        ['prompt'=>' ']);

                    ?>

                    <?= $form->field($model, 'purchase_date')->widget(DatePicker::classname(), [
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,

                        'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy/m/dd']
                    ]) ?>


                    <?= $form->field($model, 'price')->widget(MaskMoney::classname(), [
                            'pluginOptions' => [
                            'allowNegative' => false
                        ]
                    ]);?>

                    <?= $form->field($model, 'currency')->dropDownList(

                        ['MNX' => 'MNX',
                        'USD' => 'USD'],
                        ['prompt'=>' ']);

                    ?>



                    <?= $form->field($model, 'sales_check')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'id_leasing')->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>

                    
                </div>
            </div>

        </div>
    </div>
</div>


<?php ActiveForm::end(); ?>