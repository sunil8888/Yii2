<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Properties */

$this->title = $model->p_id;
$this->params['breadcrumbs'][] = ['label' => 'Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="properties-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->p_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->p_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'p_id',
            'p_user_id',
            'p_cat_id',
            'p_country_id',
            'p_city_id',
            'p_state_id',
            'p_title',
            'p_description:ntext',
            'p_images',
            'p_price',
            'p_zip',
            'status',
            'p_bedrooms',
            'p_bathrooms',
            'p_features:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
