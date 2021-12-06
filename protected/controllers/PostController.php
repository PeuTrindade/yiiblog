<?php

class PostController extends Controller
{
	private $_oldTags;
	private $_model;

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{
		$post = $this->loadModel();
		$coment = $this->newComent($post);
		$post->reverseDate();

		foreach ($post->coments as $key => $value) {
			$value->reverseDate();
		}

		$this->render('view',array(
			'model'=>$post,
			'coment'=>$coment,
		));
	}

	protected function newComent($post){
		$coment = new Coment;

		if(isset($_POST['ajax']) && $_POST['ajax'] === 'coment-form'){
			echo CActiveForm::validate($coment);
			Yii::app()->end();
		}

		if(isset($_POST['Coment'])){
			$coment->attributes = $_POST['Coment'];
			$coment->getCurrentDate();

			if($post->addComent($coment)){
				$this->refresh();
			}
		}
		return $coment;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Post;
		$model->scenario = 'create';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			$random = rand(0,9999);
			$file = CUploadedFile::getInstance($model, 'image');
			$fileName = $random.'-'.$file;
			$model->image = $fileName;

			$model->getCurrentDate();
			if($model->save()){
				$file->saveAs('uploads/'.$fileName); 
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=Post::model()->findByPk($id);
		$image = $model->image;

		if(isset($_POST['Post']))
		{   
			$formAttributes = $_POST['Post'];
			$file = CUploadedFile::getInstance($model, 'image');

			if(empty($formAttributes['image']) && !isset($file)){
				$formAttributes['image'] = $image;
			}

			else if(isset($file)){
				$formAttributes['image'] = $file;
				$model->image = $file;
			}

			$model->attributes = $formAttributes;
			$model->updateDate();

			if($model->save()){
				if(!empty($file)){
					$file->saveAs('uploads/'.$model->image);
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDeletePost($id)
	{
		if(isset($id)){
			Coment::model()->deleteAll('post_id='.$id);
			$this->loadModel()->delete();

			if(!isset($_GET['ajax'])){
				$this->redirect(array('site/index'));
			}
		} else {
			throw new CHttpException(400,'Requisição inválida. Por favor, informe o ID da publicação!');
		}
	}

	/**
	 * Lists all models.
	 */
	// public function actionIndex()
	// {
	// 	$criteria=new CDbCriteria(array(
	// 		'order'=>'update_time DESC',
	// 		'with'=>'comentCount',
	// 	));
	// 	if(isset($_GET['tag']))
	// 		$criteria->addSearchCondition('tags',$_GET['tag']);
	 
	// 	$dataProvider=new CActiveDataProvider('Post', array(
	// 		'pagination'=>array(
	// 			'pageSize'=>5,
	// 		),
	// 		'criteria'=>$criteria,
	// 	));
	 
	// 	$this->render('index',array(
	// 		'dataProvider'=>$dataProvider,
	// 	));
	// }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Post('search');
		if(isset($_GET['Post'])){
			$model->attributes = $_GET['Post'];
		}
		$this->render('admin',array(
			'model'=>$model
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$condition='';
				$this->_model=Post::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	// protected function beforeSave(){
	// 	if(parent::beforeSave()){
	// 		if($this->isNewRecord()){
	// 			date_default_timezone_set('America/Sao_Paulo');
	// 			$this->create_time = $this->update_time = date('d/m/y');
	// 			$this->author_id = Yii::app()->user->id;
	// 		} else {
	// 			$this->update_time = date('d/m/y');
	// 			return true;
	// 		}
	// 	} else {
	// 		return false;
	// 	}
	// }

	protected function afterSave(){
		parent::afterSave();
		Tag::model()->updateFrequency($this->_oldTags,$this->tags);
	}

	protected function afterFind(){
		parent::afterFind();
		$this->_oldTags = $this->tags;
	}

	protected function afterDelete($id){
		parent::afterDelete();
		Tag::model()->updateFrequency($this->tags,'');
	}
}
