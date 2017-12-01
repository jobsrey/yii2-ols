<?php

namespace jobsrey\ols\models;

use Yii;
use creocoder\taggable\TaggableBehavior;
use hscstudio\cart\ItemInterface;
use hscstudio\cart\ItemTrait;
/**
 * This is the model class for table "shop_produk".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property int $qty
 * @property string $description
 * @property int $is_new
 */
class ProdukCart extends \yii\db\ActiveRecord implements ItemInterface
{

    use ItemTrait;


    public $msg_to_seller; // message to seller
    
    public $tagValues; //for tag widget string
    public $picture;
    // public $quantity;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_produk';
    }

    public function behaviors()
    {
        return [
            'taggable' => [
                'class' => TaggableBehavior::className(),
                // 'tagValuesAsArray' => false,
                // 'tagRelation' => 'tags',
                // 'tagValueAttribute' => 'name',
                // 'tagFrequencyAttribute' => 'frequency',
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new ProdukTag(get_called_class());
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('{{%shop_tag_assn}}', ['post_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'qty'], 'required'],
            [['price'], 'number'],
            [['quantity'],'integer'],
            [['qty', 'is_new','post_status'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['tagValues','slug'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'qty' => Yii::t('app', 'Qty'),
            'description' => Yii::t('app', 'Description'),
            'is_new' => Yii::t('app', 'Status'),
            'tagValues' => Yii::t('app','Tag'),
            'post_status' => Yii::t('app','Post Status'),
        ];
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
    }

}
