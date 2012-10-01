<?php include("form_choose_record.php"); ?>
<table width="100%">
<tr>
<td valign='top' width="20%">
<? include("form_search_params.php"); ?>
</td>
<td valign='top' width="80%">
<? $my_part->SearchForRecords(); ?>
</td>
</tr>
</table>

