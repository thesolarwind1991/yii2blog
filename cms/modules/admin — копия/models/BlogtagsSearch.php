<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Blogtags;

/**
 * BlogtagsSearch represents the model behind the search form of `app\modules\admin\models\Blogtags`.
 */
class BlogtagsSearch extends Blogtags
{
    /**
     * {@inheritdoc}
     */
    public $blogName;
    public $tagName;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['blog_id', 'tag_id', 'blogName', 'tagName'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Blogtags::find()->joinWith('blog')->joinWith('tags');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /*$dataProvider->setSort([
            'attributes' => [
                'id',
                'blogName' => [
                    'asc' => ['blog.title' => SORT_ASC],
                    'desc' => ['blog.title' => SORT_DESC],
                    'label' => 'ИМЯ блога'
                ],
                'tagName' => [
                    'asc' => ['tags.tag' => SORT_ASC],
                    'desc' => ['tags.tag' => SORT_DESC],
                    'label' => 'ИМЯ тега'
                ],
            ]
        ]);*/

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');

            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'blogtags.id' => $this->id
            //'blog_id' => $this->blog_id,
            //'tag_id' => $this->tag_id,
        ]);

        $query->andFilterWhere(['like', 'blog.title', $this->blog_id])
            ->andFilterWhere(['like', 'tags.tag', $this->tag_id]);
        /*$query->joinWith(['blog' => function($q) {
            $q->where('blog.title LIKE "%'.$this->blogName.'%"');
        }]);*/

        return $dataProvider;
    }
}
