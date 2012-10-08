#  list of all speakers and talks
select t.id, p.surname_eng,t.title_eng, t.date  from MLSSTalks as t
join MLSSTalkSpeakers as s on t.id = s.talk_id
join MLSSParticipants as p on p.id = s.part_id;

