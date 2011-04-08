<?php defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">
	function tableOrdering( order, dir, task ) {
	var form = document.adminForm;

	form.filter_order.value 	= order;
	form.filter_order_Dir.value	= dir;
	document.adminForm.submit( task );
}
</script>

<form action="<?php echo JFilterOutput::ampReplace($this->action); ?>" method="post" name="adminForm">
<div class="jsn-infofilter">
	<?php
		echo JText::_('Display Num') .'&nbsp;';
		echo $this->pagination->getLimitBox();
	?>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="jsn-infotable">
<?php if ( $this->params->def( 'show_headings', 1 ) ) : ?>
<tr class="jsn-tableheader">
	<td width="10" style="text-align:right;" class="sectiontableheader">
		<?php echo JText::_('Num'); ?>
	</td>
	<td width="90%" height="20" class="sectiontableheader">
		<?php echo JHTML::_('grid.sort',  'Web Link', 'title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</td>
	<?php if ( $this->params->get( 'show_link_hits' ) ) : ?>

	<td width="30" height="20" class="sectiontableheader" style="text-align:center;" nowrap="nowrap">
		<?php echo JHTML::_('grid.sort',  'Hits', 'hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</td>
	<?php endif; ?>
</tr>
<?php endif; ?>
<?php foreach ($this->items as $item) : ?>
<tr class="sectiontableentry<?php echo $item->odd + 1; ?>">
	<td align="right">
		<?php echo $this->pagination->getRowOffset( $item->count ); ?>
	</td>
	<td height="20">
		<?php if ( $item->image ) : ?>
		&nbsp;&nbsp;<?php echo $item->image;?>&nbsp;&nbsp;
		<?php endif; ?>
		<?php echo $item->link; ?>
		<?php if ( $this->params->get( 'show_link_description' ) ) : ?>
		<br /><span class="description"><?php echo nl2br($item->description); ?></span>
		<?php endif; ?>
	</td>
	<?php if ( $this->params->get( 'show_link_hits' ) ) : ?>
	<td align="center">
		<?php echo $item->hits; ?>
	</td>
	<?php endif; ?>
</tr>
<?php endforeach; ?>
</table>
	<div class="jsn-pagination-container"><?php echo $this->pagination->getPagesLinks(); ?></div>
	<p class="jsn-pageinfo"><?php echo $this->pagination->getPagesCounter(); ?></p>
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
</form>