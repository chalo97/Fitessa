<?php
/**
 * @author JoomlaShine.com Team
 * @copyright JoomlaShine.com
 * @link joomlashine.com
 * @package JSN ImageShow
 * @version 2.0
 * @license GNU/GPL v2 http://www.gnu.org/licenses/gpl-2.0.html
 */
defined('_JEXEC') or die( 'Restricted access' );
JHTML::_('behavior.tooltip');
JToolBarHelper::title( JText::_('JSN IMAGESHOW').': '.JText::_('SHOWLISTS MANAGER'), 'showlist');
JToolBarHelper::publishList();
JToolBarHelper::unpublishList();
JToolBarHelper::divider();
JToolBarHelper::deleteList();
JToolBarHelper::editList();
JToolBarHelper::addNew();
JToolBarHelper::divider();
$objJSNUtils = JSNISFactory::getObj('classes.jsn_is_utils');
$objJSNUtils->callJSNButtonMenu();
$ordering	= true;
$objJSNMsg = JSNISFactory::getObj('classes.jsn_is_displaymessage');
echo $objJSNMsg->displayMessage('SHOWLISTS');
?>
<form action="index.php?option=com_imageshow&controller=showlist" method="post" name="adminForm" id="adminForm">
<table border="0">

<tr>
	<td align="left" width="100%">
		<?php echo JText::_('FILTER'); ?> :
		<input type="text" name="showlist_stitle" id="showlist_stitle" value="<?php echo $this->lists['showlistTitle'];?>" class="text_area"/>&nbsp;
		<button onclick="this.form.submit();"><?php echo JText::_('GO'); ?></button>
		<button onclick="document.getElementById('access').value='';document.getElementById('filter_state').value=''; document.getElementById('showlist_stitle').value=''; this.form.submit();"><?php echo JText::_('RESET'); ?></button>
	</td>
 	<td>
 		<?php echo $this->lists['access'];?>
 	</td>
 	<td>
 		<?php echo $this->lists['state'];?>
 	</td>
 
</tr>
</table>
<table class="adminlist">
	<thead>
		<tr>
			<th width="10">#</th>
			<th width="5">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
			<th width="55%">
				<?php echo JHTML::_('grid.sort',  JText::_('TITLE'), 'sl.showlist_title', $this->lists['order_Dir'], $this->lists['order'] ); ?>		
			</th>
			<th width="70" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort', JText::_('PUBLISHED'), 'sl.published', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<th nowrap="nowrap" width="100">
				<?php echo JHTML::_('grid.sort',   'ORDER', 'ordering', $this->lists['order_Dir'], $this->lists['order'] ); ?>
				<?php 				
					if ($ordering) echo JHTML::_('grid.order',  $this->items ); 
				?>
			</th>
			<th width="70" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort', JText::_('ACCESS LEVEL'), 'sl.access', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<th width="15%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort', JText::_('IMAGE SOURCE'), 'sl.showlist_source', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<th width="50" nowrap="nowrap">				
				<?php echo JHTML::_('grid.sort', JText::_('IMAGES'), 'totalimage', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>					
			<th width="20" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort', JText::_('HITS'), 'sl.hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<th width="20" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort', JText::_('ID'), 'sl.showlist_id', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$k 		= 0;
	
	for ($i=0, $n=count( $this->items ); $i < $n; $i++){
		$row 			= &$this->items[$i];		
		$checked 		= JHTML::_('grid.id', $i, $row->showlist_id );
		$link 			= JRoute::_( 'index.php?option=com_imageshow&controller=showlist&task=edit&cid[]='.$row->showlist_id);
		$view 			= true;
		if($row->showlist_source == 1){
			$source = 'folder';
			$view 	= false;
			$txtSource = '<em>['.JText::_('IMAGE FOLDER').']</em>';
		}elseif($row->showlist_source == 2){
			$source = 'flickr';
			$txtSource = '<em>['.JText::_('FLICKR').']</em>';
		}elseif($row->showlist_source == 3){
			$source = 'picasa';
			$txtSource = '<em>['.JText::_('PICASA').']</em>';
		}elseif($row->showlist_source == 4){
			$source = 'phoca';
			$view 	= false;
			$txtSource = '<em>['.JText::_('PHOCA GALLERY').']</em>';
		}elseif($row->showlist_source == 5){
			$source = 'joomga';
			$view 	= false;
			$txtSource = '<em>['.JText::_('JOOMGALLERY').']</em>';
		}else{
			$txtSource = '';
			$source = '';
		}
		
		$access 		= JHTML::_('grid.access', $row, $i);
		$published 		= JHTML::_('grid.published', $row, $i );
	?>
		<tr class="<?php echo "row$k"; ?>">
			<td align="center">
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>
			<td  align="center"><?php echo $checked; ?></td>
			<td>
				<a href="<?php echo $link; ?>" title="<?php echo JText::_('EDIT SHOWLIST DETAILS'); ?>">
					<?php echo $this->escape($row->showlist_title); ?>
				</a>		
			</td>
			<td  align="center"><?php echo $published; ?></td>
			<td align="center" class="list-order">
				<p>
					<span><?php echo $this->pagination->orderUpIcon( $i, true, 'orderup', 'Move Up', $ordering ); ?></span>
					<span><?php echo $this->pagination->orderDownIcon( $i, $n, true, 'orderdown', 'Move Down', $ordering ); ?></span>
					<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
					<input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
                </p>
			</td>
			<td align="center"><?php echo $access;?></td>
			<td align="center">
				<?php
					echo $txtSource;
					if($view == true ){
						if($row->configuration_title!=''){						
							echo '<br />'.$this->escape($row->configuration_title); 
						}else{
							echo '<br />'.JText::_('N/A');
						}
					}		
				?>			
			</td>
			<td align="center"><?php echo $row->totalimage?></td>		
			<td align="center"><?php echo $row->hits;?></td>
			<td align="center"><?php echo $row->showlist_id;?></td>
		</tr>
	<?php
		$k = 1 - $k;
	}
	?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="10">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
</table>
<table class="note">
	<tbody>
		<tr>
			<td><?php echo JHTML::_( 'image.administrator', 'images/tick.png','');  ?></td>
			<td><?php echo JText::_('PUBLISHED');?><span class="line"> | </span></td>
			<td><?php echo JHTML::_( 'image.administrator', 'images/publish_x.png','');  ?></td>
			<td><?php echo JText::_('UNPUBLISHED');?><span class="line"></span></td>
		</tr>
		<tr>
			<td colspan="6" align="center"><?php echo JText::_('CLICK ON ICON TO TOGGLE STATE');?></td>
		</tr>
	</tbody>
</table>	
<input type="hidden" name="option" value="com_imageshow" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="showlist" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
<?php include_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'footer.php'); ?>