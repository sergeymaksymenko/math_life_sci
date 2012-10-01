<?php


$query="
(
  select s.id, 
         concat(p1.surname_{$lang}, ' ', p1.name_${lang}) as name1,
         p1.org1_{$lang} as org1,
         p1.org1_url as url1,
         concat(p2.surname_{$lang}, ' ', p2.name_${lang}) as name2,
         p2.org1_{$lang} as org2,
         p2.org1_url as url2,
         concat(p3.surname_{$lang}, ' ', p3.name_${lang}) as name3,
         p3.org1_{$lang} as org3,
         p3.org1_url as url3,
         concat(p4.surname_{$lang}, ' ', p4.name_${lang}) as name4,
         p4.org1_{$lang} as org4,
         p4.org1_url as url4,
         s.title_{$lang},
         s.date,
         s.time
  from {$seminar_table_name} as s
  join ({$partic_table_name} as p1, {$partic_table_name} as p2, {$partic_table_name} as p3, {$partic_table_name} as p4)
  on (s.speaker1=p1.id and s.speaker2=p2.id and s.speaker3=p3.id and s.speaker4=p4.id)
)
union
(
  select s.id, 
         concat(p1.surname_{$lang}, ' ', p1.name_${lang}) as name1,
         p1.org1_{$lang} as org1,
         p1.org1_url as url1,
         concat(p2.surname_{$lang}, ' ', p2.name_${lang}) as name2,
         p2.org1_{$lang} as org2,
         p2.org1_url as url2,
         concat(p3.surname_{$lang}, ' ', p3.name_${lang}) as name3,
         p3.org1_{$lang} as org3,
         p3.org1_url as url3,
         '' as name4,
         '' as org4,
         '' as url4,
         s.title_{$lang},
         s.date,
         s.time
  from {$seminar_table_name} as s
  join ({$partic_table_name} as p1, {$partic_table_name} as p2, {$partic_table_name} as p3)
  on (s.speaker1=p1.id and s.speaker2=p2.id and s.speaker3=p3.id and s.speaker4=0)
)
union
(
  select s.id, 
         concat(p1.surname_{$lang}, ' ', p1.name_${lang}) as name1,
         p1.org1_{$lang} as org1,
         p1.org1_url as url1,
         concat(p2.surname_{$lang}, ' ', p2.name_${lang}) as name2,
         p2.org1_{$lang} as org2,
         p2.org1_url as url2,
         '' as name3,
         '' as org3,
         '' as url3,
         '' as name4,
         '' as org4,
         '' as url4,
         s.title_{$lang},
         s.date,
         s.time
  from {$seminar_table_name} as s
  join ({$partic_table_name} as p1, {$partic_table_name} as p2)
  on (s.speaker1=p1.id and s.speaker2=p2.id and s.speaker3=0 and s.speaker4=0)
)
union
(
  select s.id, 
         concat(p1.surname_{$lang}, ' ', p1.name_${lang}) as name1,
         p1.org1_{$lang} as org1,
         p1.org1_url as url1,
         '' as name2,
         '' as org2,
         '' as url2,
         '' as name3,
         '' as org3,
         '' as url3,
         '' as name4,
         '' as org4,
         '' as url4,
         s.title_{$lang},
         s.date,
         s.time
  from {$seminar_table_name} as s
  join {$partic_table_name} as p1
  on (s.speaker1=p1.id and s.speaker2=0 and s.speaker3=0 and s.speaker4=0)
)
order by date desc;
";





$res = $db->run_query($query);

echo "<table width='80%' border='1'>" . PHP_EOL;

echo "<tr valign='top'>" . 
     "<th>" . phrase("Доповідач", "Speaker", $lang) . "</th>" .
     "<th>" . phrase("Назва доповіді", "Talk", $lang) . "</th>" .
     "<th>" . phrase("Дата та час проведення", "Date and time", $lang) . "</th>" .
     "</tr>" . PHP_EOL;
while ( ($row=mysql_fetch_array($res, MYSQL_ASSOC)) != false )
{
	echo "<tr valign='top'>";
	// participants
	echo "<td width='30%'><a class='SPEAKER'>" . $row["name1"] . "</a><br>(" . $row["org1"] . ")<br>" . PHP_EOL .
	     ( ( strlen($row["name2"])>0 ) ? "<a class='SPEAKER'>" . $row["name2"] . "</a><br>(" . $row["org2"] . ")<br>" . PHP_EOL : ""  ) .
	     ( ( strlen($row["name3"])>0 ) ? "<a class='SPEAKER'>" . $row["name3"] . "</a><br>(" . $row["org3"] . ")<br>" . PHP_EOL : ""  ) .
	     ( ( strlen($row["name4"])>0 ) ? "<a class='SPEAKER'>" . $row["name4"] . "</a><br>(" . $row["org4"] . ")<br>" . PHP_EOL : ""  ) .
	     "</td>";
	// title
	echo "<td width='50%'><a class='TALK'> " . $row["title_{$lang}"] . "</a></td>" . PHP_EOL;
	// date / time
	echo "<td width='20%'><a class='DATE_TIME'>" . $row["date"] . ", " . $row["time"] . "</a></td>" . PHP_EOL;
	echo "</tr>";
};
echo "</table>" . PHP_EOL;
//show_query_results($res, 0, false);

?>
