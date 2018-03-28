<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PLAYLIST".
 *
 * @property int $USER_ID
 * @property int $MUSIC_ID
 *
 * @property MUSIC $mUSIC
 * @property MUSICUSER $uSER
 */
class PLAYLIST extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PLAYLIST';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MUSIC_ID'], 'required'],
            [['MUSIC_ID'], 'integer'],
            [['MUSIC_ID'], 'exist', 'skipOnError' => true, 'targetClass' => MUSIC::className(), 'targetAttribute' => ['MUSIC_ID' => 'MUSIC_ID']],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => MUSICUSER::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => 'User  ID',
            'MUSIC_ID' => 'Music  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMUSIC()
    {
        return $this->hasOne(MUSIC::className(), ['MUSIC_ID' => 'MUSIC_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(MUSICUSER::className(), ['USER_ID' => 'USER_ID']);
    }
}
