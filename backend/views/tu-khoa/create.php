<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TuKhoa */

$this->title = 'Tạo Từ Khoá';
$this->params['breadcrumbs'][] = ['label' => 'Từ Khoá', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tu-khoa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
