<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property int $goods_id ID
 * @property string $name Название
 * @property string $code Артикул
 * @property string $price Цена
 * @property string $price_date Дата прайса
 * @property int $suppliers_id Поставщик
 *
 * @property Suppliers $suppliers
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'suppliers_id'], 'required'],
            [['price'], 'number'],
            [['price_date'], 'safe'],
            [['suppliers_id'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['code'], 'string', 'max' => 255],
            [['suppliers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::className(), 'targetAttribute' => ['suppliers_id' => 'suppliers_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_id' => 'ID',
            'name' => 'Название',
            'code' => 'Артикул',
            'price' => 'Цена',
            'price_date' => 'Дата прайса',
            'suppliers_id' => 'Поставщик',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuppliers()
    {
        return $this->hasOne(Suppliers::className(), ['suppliers_id' => 'suppliers_id']);
    }
}
