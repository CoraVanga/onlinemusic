<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MUSIC_USER".
 *
 * @property int $USER_ID
 * @property string $NAME
 * @property string $PASSWORD
 * @property int $HUMAN_ID
 * @property int $ROLE_ID
 *
 * @property FREQUENCY[] $fREQUENCies
 * @property HUMAN $hUMAN
 * @property ROLE $rOLE
 * @property PLAYLIST[] $pLAYLISTs
 * @property MUSIC[] $mUSICs
 */
class MUSICUSER extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'MUSIC_USER';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'PASSWORD'], 'string'],
            [['HUMAN_ID', 'ROLE_ID'], 'integer'],
            [['HUMAN_ID'], 'exist', 'skipOnError' => true, 'targetClass' => HUMAN::className(), 'targetAttribute' => ['HUMAN_ID' => 'HUMAN_ID']],
            [['ROLE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => ROLE::className(), 'targetAttribute' => ['ROLE_ID' => 'ROLE_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => 'User  ID',
            'NAME' => 'Name',
            'PASSWORD' => 'Password',
            'HUMAN_ID' => 'Human  ID',
            'ROLE_ID' => 'Role  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFREQUENCies()
    {
        return $this->hasMany(FREQUENCY::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHUMAN()
    {
        return $this->hasOne(HUMAN::className(), ['HUMAN_ID' => 'HUMAN_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getROLE()
    {
        return $this->hasOne(ROLE::className(), ['ROLE_ID' => 'ROLE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPLAYLISTs()
    {
        return $this->hasMany(PLAYLIST::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMUSICs()
    {
        return $this->hasMany(MUSIC::className(), ['MUSIC_ID' => 'MUSIC_ID'])->viaTable('PLAYLIST', ['USER_ID' => 'USER_ID']);
    }
}
