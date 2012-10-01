<p align="right"><a href="index.php">ukr</a> <a href="index.php?en">eng</a></p>

<div id="logo" class='FIELDSET' title="<?=$page_title?>">
<table border="0">
<tr>
<td><img src="<?=$base_path?>images/logo.jpg"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td align="center"><a class="S_LOGOTEXT">
<?=phrase("Семінар \"Математика і медицина\"", "Seminar \"Mathematics and medicine\"", $lang)?></a></td>
</tr>
</table>
</div>

<div id='menu' class='MENU'>
<table width="100%"><tr><td align='right'>
<a href="<?=$base_path?>index.php?<?=$lang?>" class='active'><?=phrase("Домашня сторінка", "Home", $lang)?></a> | 
<a href="<?=$base_path?>archive/index.php?<?=$lang?>"><?=phrase("Архів семінарів", "Archive", $lang)?></a>
<?php if (isset($_REQUEST["admin"]) ) : ?> |
<a href="<?=$base_path?>add_participant/index.php">Додати учасника</a> |
<a href="<?=$base_path?>add_seminar/index.php">Додати засідання</a> |
<a href="<?=$base_path?>search_participant/index.php">Пошук учасника</a> |
<a href="<?=$base_path?>search_seminar/index.php">Пошук засідання</a>
<?php endif; ?>
</td></tr></table>
</div>
