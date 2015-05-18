<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
        'clientOptions'=>array(
		'validateOnSubmit'=>true,
            ),
)); ?>
<table align="center" class="logintab">
    
    
    <tr>
        <td width="20%" colspan="2" class=""><?php
            foreach(Yii::app()->user->getFlashes() as $key => $message) {
                echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
            }
        ?>
        </td>
    </tr>
    <tr>
        <td width="20%" colspan="2" class="centeralign"><h1>Login</h1></td>
    </tr>
    <tr>
        <td><?php echo $form->labelEx($model,'username'); ?></td>
        <td>
            <?php echo $form->textField($model,'username'); ?>
            <?php echo $form->error($model,'username'); ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form->labelEx($model,'password'); ?></td>
        <td>
            <?php echo $form->passwordField($model,'password'); ?>
            <?php echo $form->error($model,'password'); ?>
        </td>
    </tr>
    <tr>
        <td><?php echo CHtml::submitButton('Login'); ?></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo CHtml::link('Sign Up',  Yii::app()->baseUrl.'/index.php/users/registration',array());?> | <?php echo CHtml::link('Forgot Password ?','#',array());?></td>
    </tr>
</table>
<?php $this->endWidget(); ?>