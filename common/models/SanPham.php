<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%san_pham}}".
 *
 * @property int $id
 * @property string $name Tên Sản phẩm
 * @property string|null $code
 * @property string|null $mo_ta_ngan_gon Tóm tắt
 * @property string|null $mo_ta_chi_tiet Mô tả chi tiết
 * @property int $ban_chay Bán chạy
 * @property int $noi_bat Nổi bật
 * @property int $moi_ve Mới về
 * @property float $gia_ban Giá bán
 * @property float $gia_canh_tranh Giá cạnh tranh
 * @property string $anh_dai_dien
 * @property string $ngay_dang
 * @property string|null $ngay_sua
 * @property int $thuong_hieu_id
 * @property int $nguoi_tao_id
 * @property int $so_luong
 * @property string|null $ngay_hang_ve
 * @property int|null $nguoi_sua_id

 *
 * @property AnhSanPham[] $anhSanPhams
 * @property DonHangChiTiet[] $donHangChiTiets
 * @property User $nguoiSua
 * @property User $nguoiTao
 * @property PhanLoaiSanPham[] $phanLoaiSanPhams
 * @property ThuongHieu $thuongHieu
 * @property TuKhoaSanPham[] $tuKhoaSanPhams
 */
class SanPham extends \yii\db\ActiveRecord
{
    public $anh_san_phams;
    public $phan_loai_san_phams;
    public $tu_khoa_san_phams;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%san_pham}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nguoi_tao_id', 'ngay_dang','anh_san_phams', 'phan_loai_san_phams','tu_khoa_san_phams'], 'safe'],
            [['name', 'gia_ban', 'gia_canh_tranh', 'so_luong', 'thuong_hieu_id'], 'required','message'=>'{attribute} không được để trống'],
            [['mo_ta_chi_tiet'], 'string'],
            [['ban_chay', 'noi_bat', 'moi_ve', 'thuong_hieu_id', 'nguoi_tao_id', 'nguoi_sua_id'], 'integer'],
            [['gia_ban', 'gia_canh_tranh'], 'number'],
            [['ngay_dang', 'ngay_sua','ngay_hang_ve'], 'safe'],
            [['name', 'code'], 'string', 'max' => 150],
            [['mo_ta_ngan_gon'], 'string', 'max' => 500],
            [['anh_dai_dien'], 'string', 'max' => 100],
            [['thuong_hieu_id'], 'exist', 'skipOnError' => true, 'targetClass' => ThuongHieu::className(), 'targetAttribute' => ['thuong_hieu_id' => 'id']],
            [['nguoi_tao_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['nguoi_tao_id' => 'id']],
            [['nguoi_sua_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['nguoi_sua_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên Sản phẩm',
            'code' => 'Code',
            'mo_ta_ngan_gon' => 'Tóm tắt',
            'mo_ta_chi_tiet' => 'Mô tả chi tiết',
            'ban_chay' => 'Bán chạy',
            'noi_bat' => 'Nổi bật',
            'moi_ve' => 'Mới về',
            'gia_ban' => 'Giá bán',
            'gia_canh_tranh' => 'Giá Cạnh Tranh',
            'anh_dai_dien' => 'Ảnh Đại Diện',
            'ngay_dang' => 'Ngày Đăng',
            'ngay_sua' => 'Ngày Sửa',
            'thuong_hieu_id' => 'Thương Hiệu',
            'nguoi_tao_id' => 'Nguoi Tao ID',
            'nguoi_sua_id' => 'Nguoi Sua ID',
            'ngay_hang_ve'=>'Ngày Hàng Về',
            'so_luong'=>'Số Lượng',
            'anh_san_phams'=>'Ảnh Sản Phẩm',
            'phan_loai_san_phams'=>'Phân Loại Sản Phẩm',
            'tu_khoa_san_phams'=>'Từ khoá sản phẩm',
        ];
    }

    /**
     * Gets query for [[AnhSanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnhSanPhams()
    {
        return $this->hasMany(AnhSanPham::className(), ['san_pham_id' => 'id']);
    }

    /**
     * Gets query for [[DonHangChiTiets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonHangChiTiets()
    {
        return $this->hasMany(DonHangChiTiet::className(), ['san_pham_id' => 'id']);
    }

    /**
     * Gets query for [[NguoiSua]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiSua()
    {
        return $this->hasOne(User::className(), ['id' => 'nguoi_sua_id']);
    }

    /**
     * Gets query for [[NguoiTao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiTao()
    {
        return $this->hasOne(User::className(), ['id' => 'nguoi_tao_id']);
    }

    /**
     * Gets query for [[PhanLoaiSanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhanLoaiSanPhams()
    {
        return $this->hasMany(PhanLoaiSanPham::className(), ['san_pham_id' => 'id']);
    }

    /**
     * Gets query for [[ThuongHieu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getThuongHieu()
    {
        return $this->hasOne(ThuongHieu::className(), ['id' => 'thuong_hieu_id']);
    }

    /**
     * Gets query for [[TuKhoaSanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTuKhoaSanPhams()
    {
        return $this->hasMany(TuKhoaSanPham::className(), ['san_pham_id' => 'id']);
    }

    public function beforeSave($insert)
    {

        if($insert){
            $this->ngay_dang=new Expression("NOW()");
            $this->nguoi_tao_id=1; //Yii::$app->user->id;
        }

        else{
            $this->ngay_sua=new Expression("NOW()");
            $this->nguoi_tao_id=1; //Yii::$app->user->id;
        }

        $this->ngay_hang_ve=myAPI::convertDMYtoYMD($this->ngay_hang_ve);
        $this->code=myAPI::createCode($this->name);

        #region Upload File
        $file=\yii\web\UploadedFile::getInstance($this,'anh_dai_dien');
        if(!is_null($file)){
            $time=time();
            $type= myAPI::get_extension($file->type);
            $ten_file=myAPI::createCode($this->name);
            $ten_file="{$time}_logo-{$ten_file}{$type}";
            $this->anh_dai_dien=$ten_file;
            if(!$insert){
                $thuonghieu= self::findOne($this->id); // my-logo.png
                Yii::$app->session->set('old_name_logo',$thuonghieu->anh_dai_dien);
            }

        }else{
            if($insert)
                //khong Upload file
                $this->anh_dai_dien='no-image.jpeg';
            else{
                //trong truong hop update
                //B1: Lay lai gia tri logo cu: my-logo.png
                $thuonghieu= self::findOne($this->id); // my-logo.png
                //B2: Gan gia tri logo moi bang gia tri logo cu: my-logo.png
                $this->logo=$thuonghieu->anh_dai_dien;
            }
        }
        #endregion

//        $files = UploadedFile :: getInstances($this,  'anh_san_phams');
//        VarDumper :: dump($files);
//        exit;
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }


    public function afterSave($insert, $changedAttributes)
    {
        PhanLoaiSanPham::deleteAll(['san_pham_id'=>$this->id]);
        foreach ($this->phan_loai_san_phams as $phan_loai_san_pham) {
            $plsp = new PhanLoaiSanPham();
            $plsp->phan_loai_id = $phan_loai_san_pham;
            $plsp->san_pham_id = $this->id;
            $plsp->save();
        }

        TuKhoaSanPham::deleteAll(['san_pham_id'=>$this->id]);
        if($this->tu_khoa_san_phams !=''){
            $tukhoa=explode(',',$this->tu_khoa_san_phams);
            // Pha huy xâu chuyển thành mảng  => [Ram, Chip, O cung, Laptop]
            foreach ($tukhoa as $item){
                $old_tag=TuKhoa::findOne(['name'=>trim($item)]);
                if(!is_null($old_tag))
                    $id_tukhoa=$old_tag->id;
                else{
                    $new_tag=new TuKhoa();
                    $new_tag->name=$item;
                    $new_tag->save();
                    $id_tukhoa=$new_tag->id;
                }
                $tukhoa_sp=new TuKhoaSanPham();
                $tukhoa_sp->tu_khoa_id=$id_tukhoa;
                $tukhoa_sp->san_pham_id=$this->id;
                $tukhoa_sp->save();
            }
        }

        #region Upload file anh dai dien
        //Upload anh sau khi luu vao CSDL thanh cong
        $file=\yii\web\UploadedFile::getInstance($this,'anh_dai_dien');
        if(!is_null($file)){
            $ten_file=$this->anh_dai_dien;
            $path=dirname(dirname(__DIR__)).'/images/'.$ten_file;
            $file->saveAs($path);

            if(!$insert){
                $ten_file_cu=Yii::$app->session->get('old_name_logo');
                if($ten_file_cu!='no-image.jpeg'){
                    $path=dirname(dirname(__DIR__)).'/images/'.$ten_file_cu;
                    if(is_file($ten_file_cu))
                        unlink($path);
                }
            }

        }
        #endregion

        #region Upload file lien quan
        //Upload anh sau khi luu vao CSDL thanh cong
        $files=UploadedFile::getInstances($this,'anh_san_phams');
        foreach ($files as $file){
            $ten_file=time().$file->name;

            $anh_siler=new AnhSanPham();
            $anh_siler->san_pham_id=$this->id;
            $anh_siler->file=$ten_file;
            if($anh_siler->save()){
                $path=dirname(dirname(__DIR__)).'/images/'.$ten_file;
                $file->saveAs($path);
            }

        }
        #endregion

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
}
