<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php
//Yii::app()->language='fr';
echo Yii::t('codexamples_translator','the quick brown fox jumped over the lazy dog');
?>
<br />
<?php echo CHtml::link('Create',Yii::app()->request->baseUrl.'/index.php/contacts/create')?>
<br /><br />
<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display: none;">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'contacts-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		array(            // display 'author.username' using an expression
                    'name'=>'groupname',
                    'header'=>'Group name',
                    'value'=>'$data->Groups->name',
                ),
		'firstname',
		'lastname',
		'contact_no',
		'email',
		/*
		'created',
		'modified',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>