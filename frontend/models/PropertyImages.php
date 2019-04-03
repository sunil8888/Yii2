<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "property_images".
 *
 * @property int $p_img_id
 * @property int $p_pid
 * @property string $p_img_name
 * @property string $created_at
 */
class PropertyImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p_img_id', 'p_pid', 'p_img_name'], 'required'],
            [['p_img_id', 'p_pid'], 'integer'],
            [['created_at'], 'safe'],
            [['p_img_name'], 'string', 'max' => 255],
            [['p_img_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'p_img_id' => 'P Img ID',
            'p_pid' => 'P Pid',
            'p_img_name' => 'P Img Name',
            'created_at' => 'Created At',
        ];
    }
}
