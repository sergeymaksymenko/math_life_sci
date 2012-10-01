<!DOCTYPE HTML>
<html>
<meta charset="UTF-8">
<meta name="Description" content="<?=$page_description?>">
<meta http-equiv="Keywords" content="<?=$page_keywords?>">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html">
<link href="<?=$base_path?>style.css" rel=stylesheet TYPE="text/css">
<title><?=$page_title?></title>

<SCRIPT LANGUAGE='JavaScript'>
function setAll(thePref, theValue)
{
  var c = new Array();
  var pp=thePref.length;
  c = document.getElementsByTagName('input');
  for (var i = 0; i < c.length; i++)
  {
    if (c[i].type == 'checkbox')
    {
		if (c[i].name.substring(0,thePref.length)==thePref)
		   c[i].checked = theValue;
    }
  }
};

function changeVal(chbox)
{
	if (chbox.type=='checkbox')
	{
		chbox.value = (chbox.checked) ? 1 : 0;
	};
};

function confirm_deletion(form)
{
  if (confirm("Are you sure you want delete the record?")) { form.submit(); };
  return false;
  //else { alert("You decided to not submit the form!"); return false;};
};
</SCRIPT>
