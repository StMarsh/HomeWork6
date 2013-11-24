<?php
/**
 * @version     1.0.0
 * @package     com_student_list
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      StMarsh <milano_@mail.ru> - http://vk.com/id5666638
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$doc = & JFactory::getDocument();
$doc->addStyleSheet(JURI::root(true) . "/components/com_student_list/style.css");
$lang = JFactory::getLanguage();
$lang->load('com_student_list', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_student_list.' . $this->item->id);
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_student_list' . $this->item->id)) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">

        <ul class="fields_list">

            <!--<li><?php /*echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_ID'); */?>:
			<?php /*echo $this->item->id; */?></li>
			<li><?php /*echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_ORDERING'); */?>:
			<?php /*echo $this->item->ordering; */?></li>
			<li><?php /*echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_STATE'); */?>:
			<?php /*echo $this->item->state; */?></li>
			<li><?php /*echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_CHECKED_OUT'); */?>:
			<?php /*echo $this->item->checked_out; */?></li>
			<li><?php /*echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_CHECKED_OUT_TIME'); */?>:
			<?php /*echo $this->item->checked_out_time; */?></li>
			<li><?php /*echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_CREATED_BY'); */?>:
			<?php echo $this->item->created_by; ?></li>-->
			<li><?php echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_NAME_LASTNAME'); ?>:
			<?php echo $this->item->name_lastname; ?></li>
			<li><?php echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_INFORMATION'); ?>:
			<?php echo '<p>'.$this->item->information; ?></li>
			<li><?php echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_BIRTHDAY'); ?>:
			<?php echo $this->item->birthday; ?></li>
			<li><?php echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_GENDER'); ?>:
			<?php echo $this->item->gender; ?></li>
			<li><?php echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_GROUP'); ?>:
			<?php echo $this->item->group; ?></li>
			<li><?php echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_GPA'); ?>:
			<?php echo $this->item->gpa; ?></li>
			<li><?php echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_NUMBER_OF_ACADEMIC_RECORDS'); ?>:
			<?php echo $this->item->number_of_academic_records; ?></li>
			<li><?php echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_PHONE_NUMBER'); ?>:
			<?php echo '+380'.$this->item->phone_number; ?></li>
			<!--<li><?php /*echo JText::_('COM_STUDENT_LIST_FORM_LBL_TABLE1_PHOTO'); */?>:
			<?php /*echo $this->item->photo; */?></li>-->
            <?php $url = $this->item->photo; ?>
            <?php if ($url){ ?>
            <li>
                <img src="<?php echo $url ; ?>" alt="">
            </li>
            <?php }?>

        </ul>

    </div>
    <?php if($canEdit): ?>
		<a href="<?php echo JRoute::_('index.php?option=com_student_list&task=table1.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_STUDENT_LIST_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_student_list.table1.'.$this->item->id)):
								?>
									<a href="javascript:document.getElementById('form-table1-delete-<?php echo $this->item->id ?>').submit()"><?php echo JText::_("COM_STUDENT_LIST_DELETE_ITEM"); ?></a>
									<form id="form-table1-delete-<?php echo $this->item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_student_list&task=table1.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
										<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
										<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
										<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
										<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
										<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />
										<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />
										<input type="hidden" name="jform[name_lastname]" value="<?php echo $this->item->name_lastname; ?>" />
										<input type="hidden" name="jform[information]" value="<?php echo $this->item->information; ?>" />
										<input type="hidden" name="jform[birthday]" value="<?php echo $this->item->birthday; ?>" />
										<input type="hidden" name="jform[gender]" value="<?php echo $this->item->gender; ?>" />
										<input type="hidden" name="jform[group]" value="<?php echo $this->item->group; ?>" />
										<input type="hidden" name="jform[gpa]" value="<?php echo $this->item->gpa; ?>" />
										<input type="hidden" name="jform[number_of_academic_records]" value="<?php echo $this->item->number_of_academic_records; ?>" />
										<input type="hidden" name="jform[phone_number]" value="<?php echo $this->item->phone_number; ?>" />
										<input type="hidden" name="jform[photo]" value="<?php echo $this->item->photo; ?>" />
										<input type="hidden" name="option" value="com_student_list" />
										<input type="hidden" name="task" value="table1.remove" />
										<?php echo JHtml::_('form.token'); ?>
									</form>
								<?php
								endif;
							?>
<?php
else:
    echo JText::_('COM_STUDENT_LIST_ITEM_NOT_LOADED');
endif;
?>
