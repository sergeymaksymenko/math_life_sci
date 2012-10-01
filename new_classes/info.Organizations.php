<?php

require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");


function makeOrg($eng, $ukr, $rus, $url)
{
	return new MLSOrganization(new LangStr($eng, $ukr, $rus), $url);
};

$orgs = array();

$orgs['imath'] = makeOrg(
                  'Institute of Mathematics of NAS of Ukraine',
                  'Інститут математики НАН України',
                  'Институт математики НАН Украины',
                  'http://www.imath.kiev.ua');

$orgs['immsp'] = makeOrg(
                  'Institute of Mathematical Machines and System Problems',
                  'Інститут проблем математичних машин та систем',
                  'Институт проблем математических машин и систем',
                  'http://www.immsp.kiev.ua');
                           
$orgs['feofaniya'] = makeOrg(
                  'Clinical Hospital \'Feofaniya\'',
                  'Клінічна лікарня \'Феофанія\'',
                  'Клиническая больница \'Феофания\'',
                  'http://www.feofaniya.org/');

$orgs['kpi'] = makeOrg(
                  'National Technical University of Ukraine \'Kyiv Polytechnic Institute\'',
                  'Національний Технічний Університет України (КПІ) ',
                  'Национальный Технический Университет Украины (КПИ) ',
                  'http://kpi.ua');
                  
$orgs['amosov'] = makeOrg(
                  'Amosov National Institute of Cardiovascular Surgery',
                  'Національний інститут серцево-судинної хірургії імені М.М. Амосова НАМН',
                  'Национальный институт сердечно-сосудистой хирургии имени М.М. Амосова НАМН',
                  'http://amosovinstitute.org.ua');

$orgs['feofaniya_sonogr'] = makeOrg(
                  'Center for ultrasound diagnosis and interventional sonography of Clinical Hospital \'Feofaniya\'',
                  'Центр ультразвукової діагностики та інтервенційної сонографії клінічної лікарні \'Феофанія\'',
                  'Центр ультразвуковой диагностики и интервенционной сонографии клинической больницы \'Феофания\'',
                  'http://www.feofaniya.org/department/diagnostichni/tsentr-ultrazvukovoyi-diagnostiki-ta-interventsiynoyi-sonografiyi.html');

$orgs['delta'] = makeOrg(
                  'Scientific State Enterprise \"Delta\"',
                  'Наукове державне підприємство \'Дельта\'',
                  'Научное государственное предприятие \'Дельта\'');
                  

$orgs['bogomolets_nmu'] = makeOrg(
                  'Bogomolets National Medical University',
                  'Національний медичний університет імені О. О. Богомольця',
                  'Национальный медицинский университет им. О. О. Богомольца',
                  'http://www.nmu.edu.ua/');


//$orgs[] = makeOrg();

print_r($orgs);



?>
