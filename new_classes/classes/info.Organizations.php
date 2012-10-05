<?php

require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");


function makeOrg($eng, $ukr, $rus, $url, $address)
{
	return new MLSOrganization(new LangStr($eng, $ukr, $rus), $url,$address);
};

$orgs = array();

$orgs['imath'] = makeOrg(
                  'Institute of Mathematics of NAS of Ukraine',
                  'Інститут математики НАН України',
                  'Институт математики НАН Украины',
                  'http://www.imath.kiev.ua',
                  '');

$orgs['immsp'] = makeOrg(
                  'Institute of Mathematical Machines and System Problems',
                  'Інститут проблем математичних машин та систем',
                  'Институт проблем математических машин и систем',
                  'http://www.immsp.kiev.ua',
                  '');
                           
$orgs['feofaniya'] = makeOrg(
                  'Clinical Hospital \'Feofaniya\'',
                  'Клінічна лікарня \'Феофанія\'',
                  'Клиническая больница \'Феофания\'',
                  'http://www.feofaniya.org',
                  'Kyiv, Ukraine 03680, Kyiv, Zabolotny ave., 21');

$orgs['kpi'] = makeOrg(
                  'National Technical University of Ukraine \'Kyiv Polytechnic Institute\'',
                  'Національний Технічний Університет України (КПІ) ',
                  'Национальный Технический Университет Украины (КПИ) ',
                  'http://kpi.ua',
                  '');
                  
$orgs['amosov'] = makeOrg(
                  'Amosov National Institute of Cardiovascular Surgery',
                  'Національний інститут серцево-судинної хірургії імені М.М. Амосова НАМН',
                  'Национальный институт сердечно-сосудистой хирургии имени М.М. Амосова НАМН',
                  'http://amosovinstitute.org.ua','');

$orgs['feofaniya_sonogr'] = makeOrg(
                  'Center for ultrasound diagnosis and interventional sonography of Clinical Hospital \'Feofaniya\'',
                  'Центр ультразвукової діагностики та інтервенційної сонографії клінічної лікарні \'Феофанія\'',
                  'Центр ультразвуковой диагностики и интервенционной сонографии клинической больницы \'Феофания\'',
                  'http://www.feofaniya.org/department/diagnostichni/tsentr-ultrazvukovoyi-diagnostiki-ta-interventsiynoyi-sonografiyi.html','');

$orgs['delta'] = makeOrg(
                  'Scientific State Enterprise \'Delta\'',
                  'Наукове державне підприємство \'Дельта\'',
                  'Научное государственное предприятие \'Дельта\'',
                  '','');
                  
$orgs['shevch_knu']  = makeOrg(
                  'T. Shevchenko National University of Kyiv',
                  'Київський національний університет ім. Тараса Шевченка',
                  'Киевский национальный университет им. Тараса Шевченко',
                  '',
                  'Department of Mechanics and Mathematics, 03127 Academician Glushkov prospectus, 2, building 7');

                  

$orgs['bogomolets_nmu'] = makeOrg(
                  'Bogomolets National Medical University',
                  'Національний медичний університет імені О. О. Богомольця',
                  'Национальный медицинский университет им. О. О. Богомольца',
                  'http://www.nmu.edu.ua','');




$orgs['bitph']  = makeOrg(
                  'Bogolyubov Institute for Theoretical Physics',
                  '',
                  '',
                  '',
                  '');

$orgs['rpcon_amsu']  = makeOrg(
                  'State Organization \'Research-practical center of endovascular neuroradiosurgery AMS of Ukraine\'',
                  '',
                  '',
                  '',
                  '');


                  
                  
$orgs['kteu']  = makeOrg(
                  'Kiev Trade and Economic University',
                  '',
                  '',
                  '',
                  'Department of Economic Cybernetics, Kioto St.19  02156 State Organization \'Research-practical center of endovascular neuroradiosurgery AMS of Ukraine\'');


$orgs['inst_geoch']  = makeOrg(
                  'Semenenko Institute of Geochemistry, Mineralogy and Ore Formation NASU',
                  '',
                  '',
                  '',
                  'Department of Radiospectroscopy of Mineral Matter, Kiev, Ukraine');
                  

$orgs['inst_hydro']  = makeOrg(
                  'Institute of Hydromechanics NAS of Ukraine',
                  '',
                  '',
                  '',
                  'Department of Vortex Motion');




$orgs['urpi']  = makeOrg(
                  'Ukrainian Radiation Protection Institute',
                  '',
                  '',
                  '',
                  '');


$orgs['rcrm_amcu']  = makeOrg(
                  'Research Center for Radiation Medicine of Academy of Medical Sciences of Ukraine',
                  '',
                  '',
                  '',
                  '');


$orgs['scrm_amcu']  = makeOrg(
                  'Scientific Center of Radiation Medicine, AMS of Ukraine',
                  '',
                  '',
                  '',
                  '');


$orgs['shupic_nma']  = makeOrg(
                  'P.L.Shupik National Medical Academy of Post-Graduate Education',
                  '',
                  '',
                  '',
                  '');
                  

//~ National M. Amosov Institute of Cardio-Vascular Surgery, National Technical University of Ukraine 'Kyiv Polytechnic Institute'(Intercollegiate College of Medical Engineering


//~ Head of the Laboratory for Cancer Epidemiology
//~ SI  “Research  Center  for Radiation Medicine  of  Academy of Medical Sciences   of  Ukraine”.




//Radiophysics Faculty, National T.Shevchenko University of Kyiv and
//Centre for Medical and Biotechnical Research NAS of Ukraine






                  
                  

//$orgs[] = makeOrg();

print_r($orgs);



?>
