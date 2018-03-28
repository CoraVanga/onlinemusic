<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MUSIC".
 *
 * @property string $NAME
 * @property resource $MUSIC_FILE
 * @property int $MUSIC_ID
 * @property string $DURATION
 * @property resource $IMAGE
 * @property string $COUNTRY
 * @property int $SINGER_ID
 * @property int $AUTHOR_ID
 * @property int $GENRE_ID
 * @property int $TITLE_ID
 *
 * @property FREQUENCY[] $fREQUENCies
 * @property HISTORY[] $hISTORies
 * @property LYRICS[] $lYRICSs
 * @property HUMAN $sINGER
 * @property HUMAN $aUTHOR
 * @property GENRE $gENRE
 * @property TITLE $tITLE
 * @property PLAYLIST[] $pLAYLISTs
 * @property MUSICUSER[] $uSERs
 */
class MUSIC extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'MUSIC';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'MUSIC_FILE', 'DURATION', 'IMAGE', 'COUNTRY'], 'string'],
            [['SINGER_ID', 'AUTHOR_ID', 'GENRE_ID', 'TITLE_ID'], 'integer'],
            [['SINGER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => HUMAN::className(), 'targetAttribute' => ['SINGER_ID' => 'HUMAN_ID']],
            [['AUTHOR_ID'], 'exist', 'skipOnError' => true, 'targetClass' => HUMAN::className(), 'targetAttribute' => ['AUTHOR_ID' => 'HUMAN_ID']],
            [['GENRE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => GENRE::className(), 'targetAttribute' => ['GENRE_ID' => 'GENRE_ID']],
            [['TITLE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => TITLE::className(), 'targetAttribute' => ['TITLE_ID' => 'TITLE_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NAME' => 'Name',
            'MUSIC_FILE' => 'Music  File',
            'MUSIC_ID' => 'Music  ID',
            'DURATION' => 'Duration',
            'IMAGE' => 'Image',
            'COUNTRY' => 'Country',
            'SINGER_ID' => 'Singer  ID',
            'AUTHOR_ID' => 'Author  ID',
            'GENRE_ID' => 'Genre  ID',
            'TITLE_ID' => 'Title  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFREQUENCies()
    {
        return $this->hasMany(FREQUENCY::className(), ['MUSIC_ID' => 'MUSIC_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHISTORies()
    {
        return $this->hasMany(HISTORY::className(), ['MUSIC_ID' => 'MUSIC_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLYRICSs()
    {
        return $this->hasMany(LYRICS::className(), ['MUSIC_ID' => 'MUSIC_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSINGER()
    {
        return $this->hasOne(HUMAN::className(), ['HUMAN_ID' => 'SINGER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAUTHOR()
    {
        return $this->hasOne(HUMAN::className(), ['HUMAN_ID' => 'AUTHOR_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGENRE()
    {
        return $this->hasOne(GENRE::className(), ['GENRE_ID' => 'GENRE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTITLE()
    {
        return $this->hasOne(TITLE::className(), ['TITLE_ID' => 'TITLE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPLAYLISTs()
    {
        return $this->hasMany(PLAYLIST::className(), ['MUSIC_ID' => 'MUSIC_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSERs()
    {
        return $this->hasMany(MUSICUSER::className(), ['USER_ID' => 'USER_ID'])->viaTable('PLAYLIST', ['MUSIC_ID' => 'MUSIC_ID']);
    }
}
