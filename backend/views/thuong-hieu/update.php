<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ThuongHieu */

$this->title = 'Cập Nhật Thương Hiệu: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Thương Hiệu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập Nhật';
?>
<div class="thuong-hieu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
