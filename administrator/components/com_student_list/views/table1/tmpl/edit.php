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

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_student_list/assets/css/student_list.css');
?>
<script type="text/javascript">
    function getScript(url,success) {
        var script = document.createElement('script');
        script.src = url;
        var head = document.getElementsByTagName('head')[0],
        done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState
                || this.readyState == 'loaded'
                || this.readyState == 'complete')) {
                done = true;
                success();
                script.onload = script.onreadystatechange = null;
                head.removeChild(script);
            }
        };
        head.appendChild(script);
    }
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',function() {
        js = jQuery.noConflict();
        js(document).ready(function(){
            

            Joomla.submitbutton = function(task)
            {
                if (task == 'table1.cancel') {
                    Joomla.submitform(task, document.getElementById('table1-form'));
                }
                else{
                    
                    if (task != 'table1.cancel' && document.formvalidator.isValid(document.id('table1-form'))) {
                        
                        Joomla.submitform(task, document.getElementById('table1-form'));
                    }
                    else {
                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                    }
                }
            }
        });
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_student_list&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="table1-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_STUDENT_LIST_LEGEND_TABLE1'); ?></legend>
            <ul class="adminformlist">

                				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
				<li><?php echo $this->form->getLabel('state'); ?>
				<?php echo $this->form->getInput('state'); ?></li>
				<li><?php echo $this->form->getLabel('created_by'); ?>
				<?php echo $this->form->getInput('created_by'); ?></li>
				<li><?php echo $this->form->getLabel('name_lastname'); ?>
				<?php echo $this->form->getInput('name_lastname'); ?></li>
				<li><?php echo $this->form->getLabel('information'); ?>
				<?php echo $this->form->getInput('information'); ?></li>
				<li><?php echo $this->form->getLabel('birthday'); ?>
				<?php echo $this->form->getInput('birthday'); ?></li>
				<li><?php echo $this->form->getLabel('gender'); ?>
				<?php echo $this->form->getInput('gender'); ?></li>
				<li><?php echo $this->form->getLabel('group'); ?>
				<?php echo $this->form->getInput('group'); ?></li>
				<li><?php echo $this->form->getLabel('gpa'); ?>
				<?php echo $this->form->getInput('gpa'); ?></li>
				<li><?php echo $this->form->getLabel('number_of_academic_records'); ?>
				<?php echo $this->form->getInput('number_of_academic_records'); ?></li>
				<li><?php echo $this->form->getLabel('phone_number'); ?>
				<?php echo $this->form->getInput('phone_number'); ?></li>
				<li><?php echo $this->form->getLabel('photo'); ?>
				<?php echo $this->form->getInput('photo'); ?></li>


            </ul>
        </fieldset>
    </div>

    <div class="clr"></div>

<?php if (JFactory::getUser()->authorise('core.admin','student_list')): ?>
	<div class="width-100 fltlft">
		<?php echo JHtml::_('sliders.start', 'permissions-sliders-'.$this->item->id, array('useCookie'=>1)); ?>
		<?php echo JHtml::_('sliders.panel', JText::_('ACL Configuration'), 'access-rules'); ?>
		<fieldset class="panelform">
			<?php echo $this->form->getLabel('rules'); ?>
			<?php echo $this->form->getInput('rules'); ?>
		</fieldset>
		<?php echo JHtml::_('sliders.end'); ?>
	</div>
<?php endif; ?>

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
    <div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>