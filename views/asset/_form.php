<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;
use yii\web\View;
use kartik\date\DatePicker;
use kartik\money\MaskMoney;
use app\models\Asset;
use app\models\Typeasset;
use app\models\Currency;
use app\models\StatusAsset;

use kartik\widgets\Select2;
use yii\web\JsExpression;

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
                    <?php

                     $data_type_asset = ArrayHelper::map(Typeasset::find()->all(), 'id_type_asset','type' );
                    
                    ?>
                    <?php
                    // Templating example of formatting each list element
                    $url = \Yii::$app->urlManager->baseUrl .'/icons/assets/';

$format = <<< SCRIPT
function format(typeasset) {
    if (!typeasset.id) return typeasset.text; // optgroup
    src = '$url' +  typeasset.id + '.png'
    return '<img class ="icon_type_asset" src="' + src + '"/>' + typeasset.text;
}
SCRIPT;
                    $escape = new JsExpression("function(m) { return m; }");
                    $this->registerJs($format, View::POS_HEAD);

                    ?>

                    <?= $form->field($model, 'id_asset_type')->widget(Select2::classname(),[
                            
                            'data' => $data_type_asset,
                            'options' => ['placeholder' => 'Selecciona un tipo'],
                            'pluginOptions' => [
                                'templateResult' => new JsExpression('format'),
                                'templateSelection' => new JsExpression('format'),
                                'escapeMarkup' => $escape,
                                'allowClear' => true
                            ],

                        ]);
                    ?>

                    
                
                </div>
            </div>

        </div>

        

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Yii::t('app', 'Finance information')?>
                </div>
                <div class="panel-body">

                    <?= $form->field($model, 'id_status')->widget(Select2::classname(),[
                        'data' => ArrayHelper::map(StatusAsset::find()->all(), 'id_status','status_name' ),
                        ]);

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

                    <?php $currency_list = ArrayHelper::map(Currency::LIST_CURRENCY, 'code','code' );?>

                

                    <?= $form->field($model, 'currency')->widget(Select2::classname(),[
                        'options' => ['placeholder' => Yii::t('app', 'Currency')],
                        'data' => $currency_list,
                        ]);

                    ?>



                    <?= $form->field($model, 'sales_check')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'id_leasing')->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>

                    
                </div>
            </div>
        </div>


        <div class="col-md-6" id="computing" >
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Yii::t('app', 'Computer information')?>
                </div>
                <div class="panel-body">

                    <?= $form->field($model, 'hard_disk')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'ram')->textInput(['maxlength' => true]) ?>

                    
                </div>
            </div>
        </div>

    </div>
</div>


<?php ActiveForm::end(); ?>