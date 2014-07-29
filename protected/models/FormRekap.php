<?php
class FormRekap extends CFormModel
{
	public $BULAN, $TAHUN;

    // ... other attributes
    public function rules()
    {
		return array(
			array('BULAN, TAHUN', 'required', 'message' => '{attribute} harus diisi'),
			array('BULAN, TAHUN', 'length', 'max' => 4),
		);
    }
	
	public function attributeLabels()
	{
		return array(
			'BULAN' => 'Bulan',
			'TAHUN' => 'Tahun',
		);
	}

	public function listBulan() {
		return array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);
	}

	public function listTahun() {
		$min = Yii::app()->params['tahun'];
		$max = date('Y');

		$list = array();
		for(;$min <= $max; $min++) {
			$list[$min] = $min;
		}

		return $list;
	}

}
?>