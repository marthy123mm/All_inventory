<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Os */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="os-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
    <div class="row">
        <div class="col-md-4">
        	<?= $form->field($model, 'os_name')->textInput(['maxlength' => true]) ?>

    		<?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
        </div>

        <div class="col-md-3">
        	<div class="form-group">
			    <?php echo '<label class="control-label">Imagen</label>';
				echo FileInput::widget([
			    	'name' => 'image_os',

			    	'options' => [
			    		'accept' => 'image/*',
			    		'required' => 'true',
			    	],
				]);
				?>
			</div>

			<div class="form-group">
		        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
		    </div>


        </div>
    </div>
	</div>

    

    
    
    <?php ActiveForm::end(); ?>

</div>
