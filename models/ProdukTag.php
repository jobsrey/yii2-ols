<?php

namespace jobsrey\ols\models;

use creocoder\taggable\TaggableQueryBehavior;

class ProdukTag extends \yii\db\ActiveQuery
{
    public function behaviors()
    {
        return [
            TaggableQueryBehavior::className(),
        ];
    }
}
?>