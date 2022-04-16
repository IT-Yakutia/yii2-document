<?php

namespace ityakutia\document\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class DocumentCategorySearch extends Document 
{
    public function rules()
    {
        return [
            [['id', 'sort', 'is_publish', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'safe']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = DocumentCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['sort'=>SORT_ASC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'sort' => $this->sort,
            'is_publish' => $this->is_publish,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}