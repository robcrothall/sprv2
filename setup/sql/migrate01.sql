use afpxyykk_sprv_v1;
# address	
# address_type
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.address_type;
insert into afpxyykk_sprv_v1.address_type (id, addr_type, user_id, changed) 
select id, addr_type, user_id, changed 
from afpxyykk_sprv.address_type
order by id;
# ass01	
# ass02	
# ass03	
# asset_type	
delete from afpxyykk_sprv_v1.asset_type;
insert into afpxyykk_sprv_v1.asset_type (id, asset_description, user_id, changed) 
select id, description, user_id, changed 
from afpxyykk_sprv.asset_type
order by id;
# asset
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.asset;
insert into afpxyykk_sprv_v1.asset (id, asset_name, asset_seq, asset_type, asset_size, user_id, changed) 
select id, asset_name, asset_seq, asset_type, asset_size, user_id, changed 
from afpxyykk_sprv.asset
order by id;
# Still need to populate "elec-id" *****************************************
# asset_phone
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.asset_phone;

insert into afpxyykk_sprv_v1.asset_phone (id, asset_id, phone, descr, account_no, user_id, changed) 
select id, asset_id, phone, descr, account_no, user_id, changed 
from afpxyykk_sprv.asset_phone
order by id;
	
# atg_load
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.atg_load;

insert into afpxyykk_sprv_v1.atg_load (direction, license, name, co, cat, lic2, cre8, cre8_date, cre8_time,
profile, incidents, drv_lic_in, name_in, name_out, going, co2, visiting) 
select direction, license, name, company, category, dr_license, creation, recdate, rectime,
profile, incidents, dr_name, name_in, name_out, going, company2, visiting 
from afpxyykk_sprv.atthegate;

# users	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.users;

insert into afpxyykk_sprv_v1.users (id, username, hash, people_id, expiry, last_logon, notes, user_id, changed) 
select id, username, hash, person_id, member_exp, last_logon, notes, user_id, changed 
from afpxyykk_sprv.users;

# peoplex	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.people;
insert into afpxyykk_sprv_v1.people (id, surname, first_name, other_names, 
given_name, title, account_no, bd_disclose, sex, race, checked, user_id, changed) 
select id, surname, first_name, other_names, 
given_name, title, account_no, bd_disclose, sex, 1, checked, user_id, changed
from afpxyykk_sprv.peoplex;

update afpxyykk_sprv_v1.people set race = 6 
where id in (select id from afpxyykk_sprv.peoplex where race like "Not%");

update afpxyykk_sprv_v1.people set race = 2 
where id in (select id from afpxyykk_sprv.peoplex where race like "Bla%");

update afpxyykk_sprv_v1.people set race = 6 
where id in (select id from afpxyykk_sprv.peoplex where race is null);

# attendees	
# atthegate	
# atthegate2	
# audit	
# audit_log	
# cash_receipts	
# cities - loaded manually from "town_load"
# colour - created manually, then updated from HTML colours
# company
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.company;
insert into afpxyykk_sprv_v1.company (id, co_name, co_notes, user_id, changed) 
select id, co_name, notes, user_id, changed
from afpxyykk_sprv.company;

# Move all company addresses to "address"

# countries - Loaded manually from 2-character country list (ISO))
# dates	
# dept	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.dept;
insert into afpxyykk_sprv_v1.dept (id, dept_name, hod, task_email, user_id, changed) 
select id, dept_name, dept_manager_id, task_email, user_id, changed
from afpxyykk_sprv.dept;
# Changed "Care Centre" to "Care"

# dept_role - do something with Roles to replace this
# discipline - will have to populate this via the website
# docs
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.docs;
insert into afpxyykk_sprv_v1.docs (doc_group, doc_subgroup, doc_name, doc_file, submitted, approved, review, user_id, changed) 
select doc_group, doc_subgroup, doc_name, doc_file, submitted, approved, review, user_id, changed
from afpxyykk_sprv.docs;

# elec_load	
# electricity	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.electricity;
insert into afpxyykk_sprv_v1.electricity (meter, open_reading, close_reading, reading_date, cost, user_id, changed) 
select meter, open_reading, close_reading, reading_date, cost, user_id, changed
from afpxyykk_sprv.electricity;
# Still need to populate "asset_id" *****************************************************8

# email_type - populated manually
# emp01	
# groups - populated manually

# groups_old	
# history
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.history;
insert into afpxyykk_sprv_v1.history (people_id, event_date, notes, user_id, changed) 
select people_id, event_date, notes, user_id, changed
from afpxyykk_sprv.history;

# id_docs	
# id_type	
# int_category	
# int_type	
# interventions	
# tasks	
# tasks_hist	
# tasks_history	
# logon_log	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.logon_log;
insert into afpxyykk_sprv_v1.logon_log (id, user_name_given, password_given, success, user_id, changed) 
select id, user_name_given, password_given, success, user_id, changed
from afpxyykk_sprv.logon_log
order by id;

# med_category - will populate manually
# med_procedures
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.med_procedures;
insert into afpxyykk_sprv_v1.med_procedures (id, description, category_id, price, notes, user_id, changed) 
select id, description, category, price, notes, user_id, changed
from afpxyykk_sprv.med_procedures
order by id;

# med_history	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.med_history;
insert into afpxyykk_sprv_v1.med_history (people_id, proc_date, proc_id, charge, metric, note, user_id, changed) 
select people_id, proc_date, med_proc_id, price, value, comment, user_id, changed
from afpxyykk_sprv.med_history
order by id;

# med_sched	
# memberships	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.memberships;
insert into afpxyykk_sprv_v1.memberships (people_id, group_id, is_manager, join_date, expiry_date, status, 
status_date, user_id, changed) 
select person_id, group_id, is_manager, join_date, expiry_date, status, status_date, user_id, changed
from afpxyykk_sprv.memberships
order by id;

# news	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.news;
insert into afpxyykk_sprv_v1.news (id, title, content, effective_date, contact_id, user_id, changed) 
select id, title, content, effective_date, contact_id, user_id, changed
from afpxyykk_sprv.news
order by id;
# news_users	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.news_users;
insert into afpxyykk_sprv_v1.news_users (news_id, user_id, changed) 
select news_id, users_id, changed
from afpxyykk_sprv.news_users;
# occupation	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.occupation;
insert into afpxyykk_sprv_v1.occupation (id, occupation, notes, user_id, changed) 
select id, occupation, notes, user_id, changed
from afpxyykk_sprv.occupation
order by id;
# parms_char	- What to do...? *********************************************************
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.severity;
insert into afpxyykk_sprv_v1.severity (id, sev_description, hours, user_id, changed) 
select id, parm_value, parm_num, user_id, changed
from afpxyykk_sprv.parms_char
where parm_name = "severity"
order by id;

SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.discipline;
insert into afpxyykk_sprv_v1.discipline (id, description, user_id, changed) 
select id, parm_value, user_id, changed
from afpxyykk_sprv.parms_char
where parm_name = "discipline"
order by id;

SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.task_type;
insert into afpxyykk_sprv_v1.task_type (id, description, user_id, changed) 
select id, parm_value, user_id, changed
from afpxyykk_sprv.parms_char
where parm_name = "task_type"
order by id;

SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.relationships;
insert into afpxyykk_sprv_v1.relationships (id, primary_desc, secondary_desc, user_id, changed) 
select id, parm_value, parm_value, user_id, changed
from afpxyykk_sprv.parms_char
where parm_name = "relationship"
order by id;

SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.med_category;
insert into afpxyykk_sprv_v1.med_category (id, description, user_id, changed) 
select id, parm_value, user_id, changed
from afpxyykk_sprv.parms_char
where parm_name = "med_category"
order by parm_value;

SET FOREIGN_KEY_CHECKS=0;
# delete from afpxyykk_sprv_v1.med_procedures;
insert into afpxyykk_sprv_v1.med_procedures (id, description, category_id, price, notes, user_id, changed) 
select id, parm_value, 95, 0.00, null, user_id, changed
from afpxyykk_sprv.parms_char
where parm_name = "med_proc"
order by id;


# payments	- Empty, but created
# people_asset	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.people_asset;
insert into afpxyykk_sprv_v1.people_asset (people_id, asset_id, user_id, changed) 
select people_id, asset_id, user_id, changed
from afpxyykk_sprv.people_asset
order by people_id;
# people_bak	- not required
# people_category	- To be developed
# people_company	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.people_company;
insert into afpxyykk_sprv_v1.people_company (people_id, company_id) 
select id, company_id
from afpxyykk_sprv.peoplex
where company_id not in (0, 6, 7)
and id > 0
order by id;

# people_discipline	
# people_email	
SET FOREIGN_KEY_CHECKS=0;
TRUNCATE afpxyykk_sprv_v1.people_email;

/*delete from afpxyykk_sprv_v1.people_email;*/
insert into afpxyykk_sprv_v1.people_email (people_id, text_id, text_type_id, disclose, email) 
select id, 0, 13, he_disclose, home_email 
from afpxyykk_sprv.peoplex
where home_email is not null
and home_email > ""
and home_email not like "none%"
and home_email != "No"
and home_email not like "not%"
and he_disclose in ("Y","N")
order by id;

insert into afpxyykk_sprv_v1.people_email (people_id, text_id, text_type_id, disclose, email) 
select id, 0, 13, "N", home_email 
from afpxyykk_sprv.peoplex
where home_email is not null
and home_email > ""
and home_email not like "none%"
and home_email != "No"
and home_email not like "not%"
and he_disclose in ("?")
order by id;

insert into afpxyykk_sprv_v1.people_email (people_id, text_id, text_type_id, disclose, email) 
select id, 0, 14, "Y", work_email 
from afpxyykk_sprv.peoplex
where work_email is not null
and work_email > ""
and work_email not like "none%"
and work_email != "No"
and work_email not like "not%"
order by id;


# people_groups	
# people_interventions	
# people_tasks	
# people_log	
# people_news	
# people_occupation	
# people_phone	
SET FOREIGN_KEY_CHECKS=0;
insert into afpxyykk_sprv_v1.people_phone (ext, people_id, billable)
select work_phone, id, "N"
from afpxyykk_sprv.peoplex
where company_id = 2
and status = "Staff"
and work_phone != ""
order by work_phone;

# people_related	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.people_related;
insert into afpxyykk_sprv_v1.people_related (people_id, related_id, relationship, 
effective_date, notes, user_id, changed)
select a.people_id, a.related_id, b.id, a.relationship_date, a.notes, a.user_id, a.changed
from afpxyykk_sprv.people_related a, afpxyykk_sprv_v1.relationships b
where a.relationship = b.primary_desc
order by a.people_id;
select count(*) from afpxyykk_sprv.people_related;
select count(*) from afpxyykk_sprv_v1.people_related;

# people_role	- not needed?
# people_roles	- not needed?
# people_rs	
# people_skills	
# people_trip	
# people_trips	
# people_vehicle	
# pets	
# phone_history	
# phone_type	
# places	
# projects	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.projects;
insert into afpxyykk_sprv_v1.projects (id, proj_name, proj_manager, proj_start,
user_id, changed) 
select id, proj_name, 1081, "2021-03-01", user_id, changed
from afpxyykk_sprv.projects
order by id;

# regions	
# relationships	
# res01	
# res02	
# roles	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.roles;
insert into afpxyykk_sprv_v1.roles (id, role_name, role_days, user_id, changed) 
select id, role_name, role_days, user_id, changed
from afpxyykk_sprv.roles
order by id;


# rs_members	
# rs_reps	
# severity	
# skills	
# sql_log	
# task_assigned	
# task_history	
# task_type	
# tasks	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.tasks;
insert into afpxyykk_sprv_v1.tasks (id, originator_id, dept_id,  
subject, description, criteria, asset_id, create_id, create_date,
due_date, read_date, est_hours, sched_date, sched_time, actual_date, 
actual_time, closed, actual_hours, project_id, user_id, changed) 
select id, originator_id, dept_id, 
subject, description, criteria, asset_id, create_id, create_date, 
due_date, read_date, estimated_hours, sched_date, sched_time, actual_date,
actual_time, date_closed, actual_hours, project_id, user_id, changed
from afpxyykk_sprv.tasks
order by id;

update afpxyykk_sprv_v1.tasks a
set a.type = (select b.id from afpxyykk_sprv_v1.task_type b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.type = b.description limit 1)
where a.id between 1 and 1000;

update afpxyykk_sprv_v1.tasks a
set a.type = (select b.id from afpxyykk_sprv_v1.task_type b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.type = b.description limit 1)
where a.id between 1001 and 2000;

update afpxyykk_sprv_v1.tasks a
set a.type = (select b.id from afpxyykk_sprv_v1.task_type b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.type = b.description limit 1)
where a.id between 2001 and 3000;

update afpxyykk_sprv_v1.tasks a
set a.type = (select b.id from afpxyykk_sprv_v1.task_type b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.type = b.description limit 1)
where a.id between 3001 and 4000;

update afpxyykk_sprv_v1.tasks a
set a.type = (select b.id from afpxyykk_sprv_v1.task_type b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.type = b.description limit 1)
where a.id between 4001 and 5000;

update afpxyykk_sprv_v1.tasks a
set a.type = (select b.id from afpxyykk_sprv_v1.task_type b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.type = b.description limit 1)
where a.id between 5001 and 6000;
select type, count(*) from afpxyykk_sprv_v1.tasks group by type;

update afpxyykk_sprv_v1.tasks a
set a.severity = (select b.id from afpxyykk_sprv_v1.severity b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.severity = b.sev_description limit 1)
where a.id between 1 and 1000;

update afpxyykk_sprv_v1.tasks a
set a.severity = (select b.id from afpxyykk_sprv_v1.severity b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.severity = b.sev_description limit 1)
where a.id between 1001 and 6000;

update afpxyykk_sprv_v1.tasks a
set a.discipline = (select b.id from afpxyykk_sprv_v1.discipline b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.discipline = b.description limit 1)
where a.id between 0 and 1001;

update afpxyykk_sprv_v1.tasks a
set a.discipline = (select b.id from afpxyykk_sprv_v1.discipline b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.discipline = b.description limit 1)
where a.id between 999 and 2001;

update afpxyykk_sprv_v1.tasks a
set a.discipline = (select b.id from afpxyykk_sprv_v1.discipline b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.discipline = b.description limit 1)
where a.id between 1999 and 3001;

update afpxyykk_sprv_v1.tasks a
set a.discipline = (select b.id from afpxyykk_sprv_v1.discipline b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.discipline = b.description limit 1)
where a.id between 2999 and 4001;

update afpxyykk_sprv_v1.tasks a
set a.discipline = (select b.id from afpxyykk_sprv_v1.discipline b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.discipline = b.description limit 1)
where a.id between 3999 and 5001;

update afpxyykk_sprv_v1.tasks a
set a.discipline = (select b.id from afpxyykk_sprv_v1.discipline b, afpxyykk_sprv.tasks c
	where a.id = c.id and c.discipline = b.description limit 1)
where a.id between 4999 and 10001;

# user_roles
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.user_roles;
insert into afpxyykk_sprv_v1.user_roles (user_id, role_id, expiry, changed_id, changed) 
select user_id, role_id, role_expiry, changed_id, changed
from afpxyykk_sprv.user_roles
order by user_id;
	
# valid_accounts	
# veh01	
# veh01_bak	
	
# vehicle_make	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.vehicle_make;
insert into afpxyykk_sprv_v1.vehicle_make (id, manufacturer, user_id, changed) 
select id, manufacturer, user_id, changed
from afpxyykk_sprv.vehicle_make
order by id;
# vehicle_model	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.vehicle_model;
insert into afpxyykk_sprv_v1.vehicle_model (id, model_description, vehicle_make, user_id, changed) 
select id, model_name, make, user_id, changed
from afpxyykk_sprv.vehicle_model
order by id;
# vehicle	
SET FOREIGN_KEY_CHECKS=0;
delete from afpxyykk_sprv_v1.vehicles;
insert into afpxyykk_sprv_v1.vehicles (id, reg_no, model, colour, license_no, 
license_expiry, user_id, changed) 
select id, reg_no, model, colour, license, license_exp, user_id, changed
from afpxyykk_sprv.vehicle
order by id;

# account_responsibility	

insert into account_responsibility (account_no, responsible_acct, effective_date, expires) 
select a.account_no, b.account_no, CURRENT_DATE, "2050-12-31" 
from afpxyykk_sprv.peoplex a, afpxyykk_sprv.peoplex b
where b.acc_pref > a.acc_pref 
  and a.cottage_id = b.cottage_id 
  and a.status = "Resident" 
  and b.status = "Resident"
order by a.account_no;
#--#--#-----------------------------------------------------------
