<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 * @property integer $author_id
 *
 * The followings are the available model relations:
 * @property Coments[] $coments
 * @property Users $author
 */
class Post extends CActiveRecord
{
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, tags', 'required'),
			array('image', 'required', 'on' => 'create'),
			array('title', 'length', 'max'=>128),
			array('tags','match','pattern'=>'/^[\w\s,]+$/','message'=>'Tags só podem conter palavras.'),
			array('image','file','types'=>'jpg, gif, png', 'allowEmpty'=>false, 'on'=>'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tags','normalizeTags'),
			array('title','safe','on'=>'search'),
		);
	}

	public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['image'];
		
		return $scenarios;
    }

	public function normalizeTags($attr,$params) {
		$this->tags = Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'coments' => array(self::HAS_MANY, 'Coment', 'post_id','order'=>'coments.create_time DESC'),
			'comentCount' => array(self::STAT,'Coment','post_id'),
			'author' => array(self::BELONGS_TO, 'Users', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Título',
			'image' => 'Imagem',
			'content' => 'Conteúdo',
			'tags' => 'Tags',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'author_id' => 'Author',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('author_id',$this->author_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function addComent($coment){
		$coment->post_id = $this->id;
		return $coment->save();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getUrl() {
		return Yii::app()->createUrl('post/view',array(
			'id'=>$this->id,
			'title'=>$this->title
		));
	}

	public function uploadImage($picture_name){
		$picture_file = '';
		$tmpImage = Yii::getPathOfAlias('webroot.uploaded').$picture_name;
		$picture_file->saveAs($tmpImage);
	}

	public function getCurrentDate(){
		date_default_timezone_set('America/Sao_Paulo');
	    $this->create_time = date('y/m/d');
		$this->update_time = date('y/m/d');
	}

	public function updateDate(){
		date_default_timezone_set('America/Sao_Paulo');
		$this->update_time = date('y/m/d');
	}

	public function reverseDate(){
		$this->create_time = implode('/', array_reverse(explode('-', $this->create_time)));
		$this->update_time = implode('/', array_reverse(explode('-', $this->update_time)));
	}
}
