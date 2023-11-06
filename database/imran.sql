# 11.06.2023

UPDATE `plans` SET `plan_description` = '<p><strong>Everything in Free, plus:</strong></p><ul><li>3 Selectable Tone</li><li>Response Tab Features</li><li>Customize Profile</li><li>Access to Script Tab</li></ul>' WHERE `plans`.`id` = 2;
UPDATE `plans` SET `plan_description` = '<p><strong>Everything in Starter, plus:</strong></p><ul><li>3 Selectable Tone</li><li>Response Tab Features</li><li>Customize Profile</li><li>Access to Script Tab</li></ul>' WHERE `plans`.`id` = 3;
UPDATE `plans` SET `plan_description` = '<p><strong>Everything in Free, plus:</strong></p><ul><li>3 Selectable Tone</li><li>Response Tab Features</li><li>Customize Profile</li><li>Access to Script Tab</li></ul>' WHERE `plans`.`id` = 5;
UPDATE `plans` SET `plan_description` = '<p><strong>Everything in Starter, plus:</strong></p><ul><li>3 Selectable Tone</li><li>Response Tab Features</li><li>Customize Profile</li><li>Access to Script Tab</li></ul>' WHERE `plans`.`id` = 6;
UPDATE `plans` SET `plan_description` = '<ul><li>1 Selectable Tone</li><li>Response Tab Features</li></ul>' WHERE `plans`.`id` = 1;
UPDATE `plans` SET `plan_description` = '<ul><li>1 Selectable Tone</li><li>Response Tab Features</li></ul>' WHERE `plans`.`id` = 4;

# 14.06.2023

DELETE FROM `plans` WHERE `plans`.`id` = 2;
DELETE FROM `plans` WHERE `plans`.`id` = 5;
