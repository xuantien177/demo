<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SanPham */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sản Phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="san-pham-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập Nhật', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xoá', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xoá sản phẩm này?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'mo_ta_ngan_gon',
            'mo_ta_chi_tiet:ntext',
            'ban_chay',
            'noi_bat',
            'moi_ve',
            'gia_ban',
            'gia_canh_tranh',
            'anh_dai_dien',
            'ngay_dang',
            'ngay_sua',
            'thuong_hieu_id',
            'nguoi_tao_id',
            'nguoi_sua_id',
        ],
    ]) ?>

</div>
