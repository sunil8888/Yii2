<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?-->

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <!--?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?-->

    <!--?= $form->field($model, 'order')->textInput() ?-->

    <!--?= $form->field($model, 'parent_id')->textInput() ?-->

    <!--?= $form->field($model, 'status')->textInput() ?-->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
