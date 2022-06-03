<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SanPhamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sản Phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="san-pham-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tạo Sản Phẩm', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            'mo_ta_ngan_gon',
            'mo_ta_chi_tiet:ntext',
            //'ban_chay',
            //'noi_bat',
            //'moi_ve',
            //'gia_ban',
            //'gia_canh_tranh',
            //'anh_dai_dien',
            //'ngay_dang',
            //'ngay_sua',
            //'thuong_hieu_id',
            //'nguoi_tao_id',
            //'nguoi_sua_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \common\models\SanPham $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
