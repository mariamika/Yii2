<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Tasks;

/**
 * TaskSearch represents the model behind the search form of `app\models\tables\Tasks`.
 */
class TaskSearch extends Tasks
{
    public $performer;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'priority', 'namePerformer'], 'integer'],
            [['taskName'],'string'],
            [['dateCreate', 'dateDeadline'], 'safe'],
            [['performer'], 'safe']
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
        $query = Tasks::find()
            ->joinWith(['performer'])
            ->select(['tasks.*','performer.*']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ]
        ]);

        $dataProvider->sort->attributes['performer'] = [
            'asc' => ['performer.name' => SORT_ASC],
            'desc' => ['performer.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'taskName', $this->taskName])
              ->andFilterWhere(['like', 'dateCreate', $this->dateCreate])
              ->andFilterWhere(['like', 'dateDeadline', $this->dateDeadline])
              ->andFilterWhere(['like', 'performer.name', $this->performer]);

        return $dataProvider;
    }
}
