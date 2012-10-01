
<?php $id_values = $my_sem->GetListOfFieldValues("id"); ?>

<form action="<?=$cur_script?>" method="POST">
<table>
<tr>
<td align='right'>Edit record with id = </td>
<td>
<select name='edit_rec'>
<?php foreach($id_values as $i) { ?>
   <option value="<?=$i?>"><?=$i?></option>
<?php }; ?>
</select>
<input type="submit" value="Edit" name="curAction">
</td>
</tr>
</table>
</form>

<form action="<?=$cur_script?>" method="POST" onsubmit="return confirm_deletion(this.form);">
<table>
<tr>
<td align='right'>Delete record with id = </td>
<td>
<select name='delete_rec'>
<?php  foreach($id_values as $i){ ?>
   <option value="<?=$i?>"><?=$i?></option>
<?php }; ?>
</select>
<input type="submit" value="Delete" name="curAction">
</td></tr>
</table>

</form>





