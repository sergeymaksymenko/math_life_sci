#  list of all speakers and talks
select t.id, p.surname_eng,t.title_eng, t.date  from MLSSTalks as t
join MLSSTalkSpeakers as s on t.id = s.talk_id
join MLSSParticipants as p on p.id = s.part_id;







# get new participant id
select max(id)+1 into @part_id from MLSSParticipants;
# create new participant
insert into MLSSParticipants values (
@part_id, 
"Олексій", "Алексей", "Olexiy",
"", "", "",
"Кулик", "Кулик", "Kulik",
1);

# get participantId
# select id into @part_id from MLSSParticipants where surname_eng="Kulik";

# get participant organizationId
select id into @org_id from MLSSOrganizations
where title_eng="Institute of Mathematics of NAS of Ukraine";

# insert participant organization
insert into MLSSParticipantOrganizations values(@part_id, @org_id);
# insert participant email
insert into MLSSParticipantEmails values(@part_id, "kulik.alex.m@gmail.com");


# insert talk
select max(id)+1 into @talk_id from MLSSTalks;
insert into MLSSTalks values(@talk_id, 
"Безмежно подільні випадкові міри в моделях теоретичної нейробіології",
"Бесконечно делимые случайные меры в моделях теоретической нейробиологии",
"Infinitely divisible random measures in models of theoretical neurobiology",
"2012-10-19 16:30:00",
1,
208
);
insert into MLSSTalkSpeakers values(@talk_id, @part_id);
