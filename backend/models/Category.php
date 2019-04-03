<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $image
 * @property int $order
 * @property int $parent_id
 * @property int $status 0=> inactive, 1=>active
 *
 * @property Properties[] $properties
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'description', 'image', 'order', 'parent_id'], 'required'],
            [['description'], 'string'],
            [['order', 'parent_id', 'status'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'description' => 'Description',
            'image' => 'Image',
            'order' => 'Order',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany(Properties::className(), ['p_cat_id' => 'id']);
    }
}
