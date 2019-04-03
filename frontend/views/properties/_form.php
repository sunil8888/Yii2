<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Properties */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="properties-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_user_id')->textInput() ?>

    <?= $form->field($model, 'p_cat_id')->textInput() ?>

    <?= $form->field($model, 'p_country_id')->textInput() ?>

    <?= $form->field($model, 'p_city_id')->textInput() ?>

    <?= $form->field($model, 'p_state_id')->textInput() ?>

    <?= $form->field($model, 'p_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_images')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_zip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ '' => '', 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'p_bedrooms')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_bathrooms')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_features')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
