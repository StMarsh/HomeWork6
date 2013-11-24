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
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_STUDENT_LIST_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-table1-delete-' + item_id).submit();
        }
    }
</script>

<div class="items">
    <ol class="items_list">
<?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>

            
				<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_student_list.table1.'.$item->id))):
						$show = true;
						?>
							<li>
								<a href="<?php echo JRoute::_('index.php?option=com_student_list&view=table1&id=' . (int)$item->id); ?>"><?php echo $item->name_lastname; ?></a>
								<?php
									if(JFactory::getUser()->authorise('core.edit.state','com_student_list.table1.'.$item->id)):
									?>
										<a href="javascript:document.getElementById('form-table1-state-<?php echo $item->id; ?>').submit()"><?php if($item->state == 1): echo JText::_("COM_STUDENT_LIST_UNPUBLISH_ITEM"); else: echo JText::_("COM_STUDENT_LIST_PUBLISH_ITEM"); endif; ?></a>
										<form id="form-table1-state-<?php echo $item->id ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_student_list&task=table1.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo (int)!((int)$item->state); ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="jform[checked_out_time]" value="<?php echo $item->checked_out_time; ?>" />
											<input type="hidden" name="jform[name_lastname]" value="<?php echo $item->name_lastname; ?>" />
											<input type="hidden" name="jform[information]" value="<?php echo $item->information; ?>" />
											<input type="hidden" name="jform[birthday]" value="<?php echo $item->birthday; ?>" />
											<input type="hidden" name="jform[gender]" value="<?php echo $item->gender; ?>" />
											<input type="hidden" name="jform[group]" value="<?php echo $item->group; ?>" />
											<input type="hidden" name="jform[gpa]" value="<?php echo $item->gpa; ?>" />
											<input type="hidden" name="jform[number_of_academic_records]" value="<?php echo $item->number_of_academic_records; ?>" />
											<input type="hidden" name="jform[phone_number]" value="<?php echo $item->phone_number; ?>" />
											<input type="hidden" name="jform[photo]" value="<?php echo $item->photo; ?>" />
											<input type="hidden" name="option" value="com_student_list" />
											<input type="hidden" name="task" value="table1.save" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
									if(JFactory::getUser()->authorise('core.delete','com_student_list.table1.'.$item->id)):
									?>
										<a href="javascript:deleteItem(<?php echo $item->id; ?>);"><?php echo JText::_("COM_STUDENT_LIST_DELETE_ITEM"); ?></a>
										<form id="form-table1-delete-<?php echo $item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_student_list&task=table1.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo $item->state; ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="jform[checked_out_time]" value="<?php echo $item->checked_out_time; ?>" />
											<input type="hidden" name="jform[created_by]" value="<?php echo $item->created_by; ?>" />
											<input type="hidden" name="jform[name_lastname]" value="<?php echo $item->name_lastname; ?>" />
											<input type="hidden" name="jform[information]" value="<?php echo $item->information; ?>" />
											<input type="hidden" name="jform[birthday]" value="<?php echo $item->birthday; ?>" />
											<input type="hidden" name="jform[gender]" value="<?php echo $item->gender; ?>" />
											<input type="hidden" name="jform[group]" value="<?php echo $item->group; ?>" />
											<input type="hidden" name="jform[gpa]" value="<?php echo $item->gpa; ?>" />
											<input type="hidden" name="jform[number_of_academic_records]" value="<?php echo $item->number_of_academic_records; ?>" />
											<input type="hidden" name="jform[phone_number]" value="<?php echo $item->phone_number; ?>" />
											<input type="hidden" name="jform[photo]" value="<?php echo $item->photo; ?>" />
											<input type="hidden" name="option" value="com_student_list" />
											<input type="hidden" name="task" value="table1.remove" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
								?>
							</li>
						<?php endif; ?>

<?php endforeach; ?>
        <?php
        if (!$show):
            echo JText::_('COM_STUDENT_LIST_NO_ITEMS');
        endif;
        ?>
    </ol>
</div>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>


									<?php if(JFactory::getUser()->authorise('core.create','com_student_list')): ?><a href="<?php echo JRoute::_('index.php?option=com_student_list&task=table1.edit&id=0'); ?>"><?php echo JText::_("COM_STUDENT_LIST_ADD_ITEM"); ?></a>
	<?php endif; ?>