<?php

/**
 * This is the model class for table "regla".
 *
 * The followings are the available columns in table 'regla':
 * @property integer $n
 * @property integer $id_usuarios
 * @property integer $id_puertas
 * @property string $fecha_y_hora_entrada
 * @property string $fecha_y_hora_salida
 */
class Regla extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'regla';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuarios, id_puertas, fecha_y_hora_entrada, fecha_y_hora_salida', 'required'),
			array('id_usuarios, id_puertas', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('n, id_usuarios, id_puertas, fecha_y_hora_entrada, fecha_y_hora_salida', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'n' => 'N',
			'id_usuarios' => 'Id Usuarios',
			'id_puertas' => 'Id Puertas',
			'fecha_y_hora_entrada' => 'Fecha Y Hora Entrada',
			'fecha_y_hora_salida' => 'Fecha Y Hora Salida',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('n',$this->n);
		$criteria->compare('id_usuarios',$this->id_usuarios);
		$criteria->compare('id_puertas',$this->id_puertas);
		$criteria->compare('fecha_y_hora_entrada',$this->fecha_y_hora_entrada,true);
		$criteria->compare('fecha_y_hora_salida',$this->fecha_y_hora_salida,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Regla the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
