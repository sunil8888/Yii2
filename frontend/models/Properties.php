<?php

namespace frontend\models;

use Yii;
use common\models\User;
use backend\models\Category;

/**
 * This is the model class for table "properties".
 *
 * @property string $p_id
 * @property int $p_user_id
 * @property int $p_cat_id
 * @property int $p_country_id
 * @property int $p_city_id
 * @property int $p_state_id
 * @property string $p_title
 * @property string $p_description
 * @property string $p_images
 * @property string $p_price
 * @property string $p_zip
 * @property string $status
 * @property string $p_bedrooms
 * @property string $p_bathrooms
 * @property string $p_features
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Category $pCat
 * @property User $pUser
 */
class Properties extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'properties';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p_user_id', 'p_cat_id', 'p_country_id', 'p_city_id', 'p_state_id', 'p_description', 'status', 'p_features', 'created_at'], 'required'],
            [['p_user_id', 'p_cat_id', 'p_country_id', 'p_city_id', 'p_state_id'], 'integer'],
            [['p_description', 'status', 'p_features'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['p_title', 'p_images'], 'string', 'max' => 255],
            [['p_price'], 'string', 'max' => 20],
            [['p_zip', 'p_bedrooms'], 'string', 'max' => 10],
            [['p_bathrooms'], 'string', 'max' => 8],
            [['p_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['p_cat_id' => 'id']],
            [['p_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['p_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'p_id' => 'P ID',
            'p_user_id' => 'P User ID',
            'p_cat_id' => 'P Cat ID',
            'p_country_id' => 'P Country ID',
            'p_city_id' => 'P City ID',
            'p_state_id' => 'P State ID',
            'p_title' => 'P Title',
            'p_description' => 'P Description',
            'p_images' => 'P Images',
            'p_price' => 'P Price',
            'p_zip' => 'P Zip',
            'status' => 'Status',
            'p_bedrooms' => 'P Bedrooms',
            'p_bathrooms' => 'P Bathrooms',
            'p_features' => 'P Features',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPCat()
    {
        return $this->hasOne(Category::className(), ['id' => 'p_cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPUser()
    {
        return $this->hasOne(User::className(), ['id' => 'p_user_id']);
    }
}
