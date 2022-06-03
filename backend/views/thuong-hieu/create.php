<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ThuongHieu */

$this->title = 'Tạo Thương Hiệu';
$this->params['breadcrumbs'][] = ['label' => 'Thương Hiệu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thuong-hieu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
