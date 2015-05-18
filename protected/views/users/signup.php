<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sign-form',
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
        'clientOptions'=>array(
		'validateOnSubmit'=>true,
            ),
)); ?>
<table align="center" class="registrationtab">
    <tr>
        <td width="20%" colspan="2" class="centeralign"><h1>Registration</h1></td>
    </tr>
    <tr>
        <td><?php echo $form->labelEx($model,'firstname'); ?></td>
        <td>
            <?php echo $form->textField($model,'firstname'); ?>
            <?php echo $form->error($model,'firstname'); ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form->labelEx($model,'lastname'); ?></td>
        <td>
            <?php echo $form->textField($model,'lastname'); ?>
            <?php echo $form->error($model,'lastname'); ?>
        </td>
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
        <td><?php echo $form->labelEx($model,'cpassword'); ?></td>
        <td>
            <?php echo $form->passwordField($model,'cpassword'); ?>
            <?php echo $form->error($model,'cpassword'); ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form->labelEx($model,'email'); ?></td>
        <td>
            <?php echo $form->textField($model,'email'); ?>
            <?php echo $form->error($model,'email'); ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form->labelEx($model,'dob'); ?></td>
        <td>
            <?php echo $form->textField($model,'dob'); ?>
            <?php echo $form->error($model,'dob'); ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form->labelEx($model,'contact_no'); ?></td>
        <td>
            <?php echo $form->textField($model,'contact_no'); ?>
            <?php echo $form->error($model,'contact_no'); ?>
        </td>
    </tr>
    <tr>
        <td><?php echo CHtml::submitButton('Create'); ?> <?php echo CHtml::Button('cancel',array('onclick'=>'fncancel();')); ?></td>
        <td></td>
    </tr>
</table>
<?php $this->endWidget(); ?>