<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use dosamigos\selectize\SelectizeTextInput;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\SanPham */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="san-pham-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/from-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mo_ta_ngan_gon')
        ->textarea(['maxlength' => true, 'rows'=>3]) ?>

    <?= $form->field($model, 'mo_ta_chi_tiet')->widget(CKEditor::className(), [
        'options' => ['rows' => 10],
        'preset' => 'full'
    ]) ?>

    <?php
    /*
    $form->field($model, 'name[]')->checkboxList(['a' => 'ban_chay', 'b' => 'noi_bat', 'c' => 'moi_ve']);
    */
    ?>
    <?= $form->field($model, 'ban_chay')->checkbox() ?>

    <?= $form->field($model, 'noi_bat')->checkbox() ?>

    <?= $form->field($model, 'moi_ve')->checkbox() ?>

    <?= $form->field($model, 'gia_ban')->textInput(['type'=>'number','min'=>0]) ?>

    <?= $form->field($model, 'gia_canh_tranh')->textInput(['type'=>'number','min'=>0]) ?>

    <?= $form->field($model, 'so_luong')->textInput(['type'=>'number','min'=>0]) ?>

    <?= $form->field($model, 'ngay_hang_ve')->widget(DatePicker::className(), [
        'language' => 'vi',
        'dateFormat' => 'dd/MM/yyyy',
        'options'=>[
            'class'=>'form-control'
        ]
    ]) ?>

    <?= $form->field($model, 'anh_dai_dien')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anh_san_phams[]')->fileInput(['multiple'=>'multiple']) ?>

    <?= $form->field($model, 'thuong_hieu_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\common\models\ThuongHieu::find()->all(),'id','name'),['prompt'=>'--Chọn--']
    ) ?>

    <?= $form->field($model, 'phan_loai_san_phams')->checkboxList(
        \yii\helpers\ArrayHelper::map(
        //               'index'=>'value'
            \common\models\PhanLoai::find()->all(),'id','code'
        )
    ) ?>

    <?= $form->field($model, 'tu_khoa_san_phams')->widget(SelectizeTextInput::className(), [
        // calls an action that returns a JSON object with matched
        // tags
        'loadUrl' => ['tu-khoa/list'],
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'plugins' => ['remove_button'],
            'valueField' => 'name',
            'labelField' => 'name',
            'searchField' => ['name'],
            'create' => true,
        ],
    ])->hint('Mỗi từ khoá cách nhau bằng một dấu phẩy') ?>


    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
