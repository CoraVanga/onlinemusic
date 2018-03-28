<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ALBUM".
 *
 * @property int $ALBUM_ID
 * @property string $NAME
 * @property string $RELEASE_DATE
 * @property int $TOTAL_TRACKS
 * @property resource $IMAGE
 * @property int $GENRE_ID
 *
 * @property GENRE $gENRE
 */
class ALBUM extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ALBUM';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'IMAGE'], 'string'],
            [['RELEASE_DATE'], 'safe'],
            [['TOTAL_TRACKS', 'GENRE_ID'], 'integer'],
            [['GENRE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => GENRE::className(), 'targetAttribute' => ['GENRE_ID' => 'GENRE_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ALBUM_ID' => 'Album  ID',
            'NAME' => 'Name',
            'RELEASE_DATE' => 'Release  Date',
            'TOTAL_TRACKS' => 'Total  Tracks',
            'IMAGE' => 'Image',
            'GENRE_ID' => 'Genre  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGENRE()
    {
        return $this->hasOne(GENRE::className(), ['GENRE_ID' => 'GENRE_ID']);
    }
}
