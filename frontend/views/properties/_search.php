<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PropertiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="properties-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'p_id') ?>

    <?= $form->field($model, 'p_user_id') ?>

    <?= $form->field($model, 'p_cat_id') ?>

    <?= $form->field($model, 'p_country_id') ?>

    <?= $form->field($model, 'p_city_id') ?>

    <?php // echo $form->field($model, 'p_state_id') ?>

    <?php // echo $form->field($model, 'p_title') ?>

    <?php // echo $form->field($model, 'p_description') ?>

    <?php // echo $form->field($model, 'p_images') ?>

    <?php // echo $form->field($model, 'p_price') ?>

    <?php // echo $form->field($model, 'p_zip') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'p_bedrooms') ?>

    <?php // echo $form->field($model, 'p_bathrooms') ?>

    <?php // echo $form->field($model, 'p_features') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
