<div class="control-group">
<label class="control-label"><?php echo $form->labelEx($model,'dob'); ?></label>
<div class="controls">
<?php  echo CHtml::dropDownList('VkUsers[month]', '', UtilityHtml::getMonthsArray());?>
<?php  echo CHtml::dropDownList('VkUsers[day]', '', UtilityHtml::getDaysArray());?>
<?php  echo CHtml::dropDownList('VkUsers[year]', '', UtilityHtml::getYearsArray());?>
</div>
</div>