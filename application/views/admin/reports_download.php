<?php 
/**
 * Reports download view page.
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - http://source.ushahididev.com
 * @module     API Controller
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */
?>
<div class="bg">
	<h2>
		<?php admin::reports_subtabs("download"); ?>
	</h2>
	<!-- report-form -->
	<div class="report-form">
		<?php
		if ($form_error) {
		?>
			<!-- red-box -->
			<div class="red-box">
				<h3><?php echo Kohana::lang('ui_main.error');?></h3>
				<ul>
				<?php
				foreach ($errors as $error_item => $error_description)
				{
					// print "<li>" . $error_description . "</li>";
					print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
				}
				?>
				</ul>
			</div>
		<?php
		}
		?>
		<!-- column -->
		<div class="download_container">
			<p><?php echo Kohana::lang('ui_main.reports_download_csv');?>.</p>
			<span style="font-weight: bold; color: #00699b; display: block; padding-bottom: 5px;"><?php echo Kohana::lang('ui_main.choose_data_points');?>:</span>
			<?php print form::open(NULL, array('id' => 'reportForm', 'name' => 'reportForm')); ?>
			<table class="data_points">
        <tr>
          <td>
            <h4>Select Form</h4>
            <?php echo form::dropdown('form_id', $this->get_custom_forms());?>
          </td>
				<tr>
					<td colspan="2">
						<div class="date-box">
							<h4><?php echo Kohana::lang('ui_admin.from_date');?>: <span><?php echo Kohana::lang('ui_main.date_format');?></span></h4>
							<?php print form::input('from_date', $form['from_date'], ' class="text"'); ?>											    
						</div>
						<div class="date-box">
							<h4><?php echo Kohana::lang('ui_admin.to_date');?>: <span><?php echo Kohana::lang('ui_main.date_format');?></span></h4>
							<?php print form::input('to_date', $form['to_date'], ' class="text"'); ?>											    
						</div>
						<div id="form_error2"></div>
					</td>
				</tr>
			</table>
			<input id="save_only" type="image" src="<?php print url::file_loc('img'); ?>media/img/admin/btn-download.gif" class="save-rep-btn" />
			<?php print form::close(); ?>
		</div>
	</div>
</div>
