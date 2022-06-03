<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SanPham;

/**
 * SanPhamSearch represents the model behind the search form of `common\models\SanPham`.
 */
class SanPhamSearch extends SanPham
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ban_chay', 'noi_bat', 'moi_ve', 'thuong_hieu_id', 'nguoi_tao_id', 'nguoi_sua_id'], 'integer'],
            [['name', 'code', 'mo_ta_ngan_gon', 'mo_ta_chi_tiet', 'anh_dai_dien', 'ngay_dang', 'ngay_sua'], 'safe'],
            [['gia_ban', 'gia_canh_tranh'], 'number'],
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
        $query = SanPham::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ban_chay' => $this->ban_chay,
            'noi_bat' => $this->noi_bat,
            'moi_ve' => $this->moi_ve,
            'gia_ban' => $this->gia_ban,
            'gia_canh_tranh' => $this->gia_canh_tranh,
            'ngay_dang' => $this->ngay_dang,
            'ngay_sua' => $this->ngay_sua,
            'thuong_hieu_id' => $this->thuong_hieu_id,
            'nguoi_tao_id' => $this->nguoi_tao_id,
            'nguoi_sua_id' => $this->nguoi_sua_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'mo_ta_ngan_gon', $this->mo_ta_ngan_gon])
            ->andFilterWhere(['like', 'mo_ta_chi_tiet', $this->mo_ta_chi_tiet])
            ->andFilterWhere(['like', 'anh_dai_dien', $this->anh_dai_dien]);

        return $dataProvider;
    }
}
