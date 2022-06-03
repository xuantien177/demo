<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TuKhoa */

$this->title = 'Cập Nhật Từ Khoá: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Từ Khoá', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập Nhật';
?>
<div class="tu-khoa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
