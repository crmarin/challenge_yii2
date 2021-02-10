<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "description_of_goods".
 *
 * @property int $id
 * @property int|null $oadode_id
 * @property int|null $user_id
 * @property string|null $description
 * @property string|null $ecl_group
 * @property string|null $ecl_item
 *
 * @property Oadode $oadode
 * @property User $user
 */
class DescriptionOfGoods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'description_of_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oadode_id', 'user_id'], 'integer'],
            [['description', 'ecl_group', 'ecl_item'], 'string', 'max' => 255],

            [['ecl_group', 'ecl_item'], 'match', 'pattern' => '/^[0-9,.]*$/i', 'message' => '0-9 . ,'],

            [['oadode_id'], 'exist', 'skipOnError' => true, 'targetClass' => Oadode::class, 'targetAttribute' => ['oadode_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'oadode_id' => Yii::t('app', 'Oadode ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'description' => Yii::t('app', 'Description'),
            'ecl_group' => Yii::t('app', 'Ecl Group'),
            'ecl_item' => Yii::t('app', 'Ecl Item'),
        ];
    }

    /**
     * Gets query for [[Oadode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOadode()
    {
        return $this->hasOne(Oadode::class, ['id' => 'oadode_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
