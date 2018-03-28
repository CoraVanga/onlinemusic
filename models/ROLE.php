<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ROLE".
 *
 * @property int $ROLE_ID
 * @property string $NAME
 *
 * @property MUSICUSER[] $mUSICUSERs
 */
class ROLE extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ROLE';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ROLE_ID' => 'Role  ID',
            'NAME' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMUSICUSERs()
    {
        return $this->hasMany(MUSICUSER::className(), ['ROLE_ID' => 'ROLE_ID']);
    }
}
