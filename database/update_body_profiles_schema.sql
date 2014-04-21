DROP TABLE IF EXISTS `exercise_detail`;

DROP TABLE IF EXISTS `body_profiles`;

CREATE TABLE `body_profiles` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `body_part_name` varchar(45) NOT NULL,
  `weight_male` decimal(10,4) NOT NULL,
  `height_male` decimal(10,4) NOT NULL,
  `weight_female` decimal(10,4) NOT NULL,
  `height_female` decimal(10,4) NOT NULL,
  `exercise_detail_attr_index` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `body_profiles` (`Id`,`body_part_name`,`weight_male`,`height_male`,`weight_female`,`height_female`,`exercise_detail_attr_index`) VALUES (1,'Head and Neck',8.2300,11.0000,8.2300,10.7500,1);
INSERT INTO `body_profiles` (`Id`,`body_part_name`,`weight_male`,`height_male`,`weight_female`,`height_female`,`exercise_detail_attr_index`) VALUES (2,'Trunk',54.1500,30.0000,54.1500,30.0000,2);
INSERT INTO `body_profiles` (`Id`,`body_part_name`,`weight_male`,`height_male`,`weight_female`,`height_female`,`exercise_detail_attr_index`) VALUES (3,'Upper Arm',3.0750,17.2000,3.0750,17.2000,3);
INSERT INTO `body_profiles` (`Id`,`body_part_name`,`weight_male`,`height_male`,`weight_female`,`height_female`,`exercise_detail_attr_index`) VALUES (4,'Forearm and half hand',2.2950,18.5700,2.2950,18.5700,4);
INSERT INTO `body_profiles` (`Id`,`body_part_name`,`weight_male`,`height_male`,`weight_female`,`height_female`,`exercise_detail_attr_index`) VALUES (5,'Thigh',11.1250,23.2000,11.1250,23.2000,5);
INSERT INTO `body_profiles` (`Id`,`body_part_name`,`weight_male`,`height_male`,`weight_female`,`height_female`,`exercise_detail_attr_index`) VALUES (6,'Leg and foot',6.4300,29.0500,6.4300,29.0500,6);
INSERT INTO `body_profiles` (`Id`,`body_part_name`,`weight_male`,`height_male`,`weight_female`,`height_female`,`exercise_detail_attr_index`) VALUES (7,'Weight',100.0000,100.0000,100.0000,100.0000,7);

-- exercise details

CREATE TABLE `exercise_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attr1` decimal(10,6) NOT NULL,
  `attr2` decimal(10,6) NOT NULL,
  `attr3` decimal(10,6) NOT NULL,
  `attr4` decimal(10,6) NOT NULL,
  `attr5` decimal(10,6) NOT NULL,
  `attr6` decimal(10,6) NOT NULL,
  `attr7` decimal(10,6) NOT NULL,
  `body_profilesid` int(11) NOT NULL,
  `exerciseid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exercise_profile_detail_body_profiles` (`body_profilesId`),
  KEY `exercise_profile_detail_exercise_profile` (`exerciseid`),
  CONSTRAINT `exercise_profile_detail_body_profiles` FOREIGN KEY (`body_profilesId`) REFERENCES `body_profiles` (`Id`),
  CONSTRAINT `exercise_profile_detail_exercise_profile` FOREIGN KEY (`exerciseid`) REFERENCES `exercise` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8;

INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (1,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,1,1);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (2,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,1,2);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (3,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,3);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (4,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,4);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (5,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,5);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (6,1.000000,2.000000,0.000000,0.000000,2.000000,2.000000,2.000000,1,6);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (7,1.000000,2.000000,0.000000,0.000000,2.000000,2.000000,2.000000,1,7);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (8,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,8);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (9,0.000000,0.000000,0.000000,0.000000,0.500000,0.000000,0.000000,1,9);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (10,0.000000,0.000000,0.000000,0.000000,0.500000,0.000000,0.000000,1,10);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (11,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,0.000000,1,11);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (12,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,1,12);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (13,0.000000,0.000000,0.000000,0.000000,0.000000,2.250000,0.000000,1,13);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (14,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,14);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (15,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,15);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (16,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,16);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (17,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,1,17);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (18,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,18);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (19,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,0.000000,1,19);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (20,0.000000,0.000000,0.000000,2.000000,2.000000,0.000000,0.000000,1,20);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (21,0.000000,0.000000,0.000000,2.000000,2.000000,0.000000,0.000000,1,21);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (22,0.000000,0.000000,0.250000,2.000000,0.000000,0.000000,0.000000,1,22);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (23,0.000000,0.000000,0.000000,2.000000,2.000000,0.000000,0.000000,1,23);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (24,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,24);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (25,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,1,25);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (26,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,0.000000,1,26);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (27,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,27);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (28,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,28);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (29,2.000000,2.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,29);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (30,2.000000,2.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,30);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (31,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,1,31);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (32,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,1,32);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (33,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,1,33);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (34,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,1,34);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (35,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,1,35);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (36,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,1,36);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (37,0.000000,0.000000,0.000000,0.000000,0.500000,0.000000,0.000000,1,37);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (38,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,1,38);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (39,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,1,39);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (40,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,2,1);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (41,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,2,2);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (42,0.000000,0.500000,0.000000,0.000000,0.000000,0.000000,0.000000,2,3);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (43,0.000000,1.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,4);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (44,0.000000,0.000000,0.500000,0.000000,0.000000,0.000000,0.000000,2,5);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (45,0.000000,1.000000,0.000000,0.000000,2.000000,2.000000,2.000000,2,6);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (46,0.000000,1.000000,0.000000,0.000000,2.000000,2.000000,2.000000,2,7);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (47,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,8);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (48,0.000000,0.000000,0.000000,0.000000,0.500000,0.000000,0.000000,2,9);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (49,0.000000,0.000000,0.000000,0.000000,0.500000,0.000000,0.000000,2,10);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (50,0.000000,0.000000,1.000000,0.000000,0.000000,0.000000,0.000000,2,11);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (51,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,2,12);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (52,0.000000,0.000000,0.000000,0.000000,0.000000,2.250000,0.000000,2,13);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (53,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,14);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (54,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,15);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (55,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,16);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (56,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,2,17);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (57,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,18);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (58,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,2,19);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (59,0.000000,0.000000,0.000000,2.000000,2.000000,0.000000,0.000000,2,20);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (60,0.000000,0.000000,0.000000,2.000000,2.000000,0.000000,0.000000,2,21);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (61,0.000000,0.000000,0.250000,2.000000,0.000000,0.000000,0.000000,2,22);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (62,0.000000,0.000000,0.000000,2.000000,2.000000,0.000000,0.000000,2,23);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (63,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,24);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (64,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,2,25);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (65,0.000000,0.000000,1.000000,0.000000,0.000000,0.000000,0.000000,2,26);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (66,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,27);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (67,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,28);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (68,0.000000,2.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,29);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (69,0.000000,2.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,30);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (70,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,2,31);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (71,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,2,32);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (72,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,2,33);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (73,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,2,34);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (74,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,2,35);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (75,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,2,36);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (76,0.000000,0.000000,0.000000,0.000000,0.500000,0.000000,0.000000,2,37);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (77,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2,38);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (78,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,2,39);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (79,0.000000,0.000000,0.000000,2.000000,0.000000,2.000000,0.000000,3,1);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (80,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,0.000000,3,2);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (81,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,3,3);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (82,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,3,4);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (83,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,3,5);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (84,0.000000,1.500000,1.000000,0.000000,2.000000,2.000000,2.000000,3,6);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (85,0.000000,1.500000,1.000000,0.000000,2.000000,2.000000,2.000000,3,7);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (86,0.000000,0.000000,1.000000,0.000000,0.000000,0.000000,0.000000,3,8);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (87,0.000000,0.000000,1.000000,2.000000,0.500000,0.000000,0.000000,3,9);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (88,0.000000,0.000000,1.000000,2.000000,0.500000,0.000000,0.000000,3,10);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (89,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,0.000000,3,11);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (90,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,3,12);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (91,0.000000,0.000000,0.000000,1.000000,0.000000,0.250000,0.000000,3,13);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (92,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,3,14);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (93,0.000000,0.000000,1.000000,0.000000,0.000000,0.000000,0.000000,3,15);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (94,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,3,16);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (95,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,3,17);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (96,0.000000,0.000000,0.000000,2.000000,0.000000,2.000000,0.000000,3,18);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (97,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,0.000000,3,19);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (98,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,3,20);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (99,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,3,21);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (100,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,0.000000,3,22);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (101,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,0.000000,3,23);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (102,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,0.000000,3,24);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (103,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,3,25);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (104,0.000000,0.000000,2.000000,1.000000,0.000000,0.000000,0.000000,3,26);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (105,0.000000,0.000000,0.000000,2.000000,0.000000,2.000000,0.000000,3,27);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (106,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,3,28);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (107,0.000000,2.000000,0.000000,0.000000,0.000000,0.000000,0.000000,3,29);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (108,0.000000,2.000000,0.000000,0.000000,0.000000,0.000000,0.000000,3,30);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (109,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,3,31);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (110,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,3,32);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (111,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,3,33);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (112,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,3,34);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (113,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,3,35);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (114,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,3,36);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (115,0.000000,0.000000,1.000000,2.000000,0.500000,0.000000,0.000000,3,37);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (116,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,3,38);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (117,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,3,39);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (118,0.000000,0.000000,0.000000,2.000000,1.000000,2.000000,0.000000,4,1);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (119,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,4,2);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (120,0.000000,0.000000,1.000000,2.000000,2.000000,0.000000,0.000000,4,3);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (121,0.000000,0.000000,1.000000,2.000000,2.000000,0.800000,0.000000,4,4);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (122,0.000000,0.000000,1.000000,2.000000,2.000000,0.800000,0.000000,4,5);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (123,0.000000,0.750000,0.000000,0.000000,2.000000,2.000000,2.000000,4,6);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (124,0.000000,0.750000,0.000000,0.000000,2.000000,2.000000,2.000000,4,7);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (125,0.000000,0.000000,2.000000,1.000000,0.000000,0.000000,0.000000,4,8);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (126,0.000000,0.000000,1.000000,2.000000,0.500000,0.000000,0.000000,4,9);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (127,0.000000,0.000000,1.000000,2.000000,0.500000,0.000000,0.000000,4,10);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (128,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,0.000000,4,11);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (129,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,4,12);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (130,0.000000,0.000000,0.000000,2.000000,1.000000,0.250000,0.000000,4,13);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (131,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,4,14);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (132,0.000000,0.000000,2.000000,1.000000,0.000000,0.000000,0.000000,4,15);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (133,0.000000,0.000000,2.000000,2.000000,1.000000,0.000000,0.000000,4,16);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (134,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,4,17);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (135,0.000000,0.000000,0.000000,2.000000,1.000000,2.000000,1.000000,4,18);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (136,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,4,19);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (137,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,4,20);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (138,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,4,21);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (139,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,4,22);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (140,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,4,23);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (141,0.000000,0.000000,0.000000,2.000000,1.000000,0.000000,0.000000,4,24);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (142,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,4,25);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (143,0.000000,0.000000,2.000000,2.000000,1.000000,0.000000,0.000000,4,26);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (144,0.000000,0.000000,0.000000,2.000000,1.000000,2.000000,1.000000,4,27);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (145,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,4,28);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (146,0.000000,2.000000,0.000000,0.000000,0.000000,0.000000,0.000000,4,29);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (147,0.000000,2.000000,0.000000,0.000000,0.000000,0.000000,0.000000,4,30);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (148,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,4,31);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (149,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,4,32);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (150,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,4,33);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (151,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,4,34);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (152,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,4,35);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (153,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,4,36);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (154,0.000000,0.000000,1.000000,2.000000,0.500000,0.000000,0.000000,4,37);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (155,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,4,38);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (156,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,4,39);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (157,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,1);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (158,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,5,2);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (159,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,3);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (160,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,4);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (161,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,5);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (162,0.000000,0.000000,0.000000,0.000000,1.000000,2.000000,2.000000,5,6);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (163,0.000000,0.000000,0.000000,0.000000,1.000000,2.000000,2.000000,5,7);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (164,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,8);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (165,0.000000,0.000000,0.000000,0.000000,0.250000,0.000000,0.000000,5,9);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (166,0.000000,0.000000,0.000000,0.000000,0.250000,0.000000,0.000000,5,10);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (167,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,11);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (168,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,5,12);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (169,0.000000,0.000000,0.000000,0.000000,0.000000,1.125000,0.000000,5,13);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (170,0.000000,0.000000,2.000000,0.000000,0.000000,1.000000,0.000000,5,14);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (171,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,15);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (172,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,16);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (173,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,5,17);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (174,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,18);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (175,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,5,19);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (176,0.000000,0.000000,0.000000,0.400000,0.400000,0.000000,0.000000,5,20);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (177,0.000000,0.000000,0.000000,0.400000,0.400000,0.000000,0.000000,5,21);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (178,0.000000,0.000000,0.250000,2.000000,0.000000,0.000000,0.000000,5,22);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (179,0.000000,0.000000,0.000000,2.000000,2.000000,0.000000,0.000000,5,23);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (180,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,24);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (181,0.000000,0.000000,0.000000,0.000000,0.000000,1.000000,0.000000,5,25);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (182,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,26);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (183,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,27);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (184,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,28);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (185,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,29);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (186,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,5,30);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (187,0.000000,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,5,31);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (188,0.000000,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,5,32);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (189,0.000000,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,5,33);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (190,0.000000,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,5,34);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (191,0.000000,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,5,35);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (192,0.000000,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,5,36);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (193,0.000000,0.000000,0.000000,0.000000,0.250000,0.000000,0.000000,5,37);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (194,0.000000,0.203874,0.000000,0.000000,0.000000,0.000000,0.000000,5,38);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (195,0.000000,0.000000,0.000000,0.000000,1.000000,0.000000,0.000000,5,39);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (196,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,1);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (197,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,6,2);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (198,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,3);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (199,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,4);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (200,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,5);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (201,0.000000,0.000000,0.000000,0.000000,0.000000,1.000000,2.000000,6,6);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (202,0.000000,0.000000,0.000000,0.000000,0.000000,1.000000,2.000000,6,7);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (203,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,8);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (204,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,9);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (205,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,10);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (206,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,11);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (207,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,6,12);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (208,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,13);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (209,0.000000,0.000000,2.000000,1.000000,0.000000,2.000000,1.000000,6,14);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (210,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,15);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (211,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,16);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (212,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,6,17);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (213,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,18);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (214,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,6,19);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (215,0.000000,0.000000,0.000000,0.200000,0.200000,0.000000,0.000000,6,20);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (216,0.000000,0.000000,0.000000,0.200000,0.200000,0.000000,0.000000,6,21);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (217,0.000000,0.000000,0.250000,2.000000,0.000000,0.000000,0.000000,6,22);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (218,0.000000,0.000000,0.000000,2.000000,2.000000,0.000000,0.000000,6,23);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (219,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,24);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (220,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,25);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (221,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,26);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (222,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,27);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (223,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,28);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (224,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,29);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (225,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,30);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (226,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,31);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (227,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,32);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (228,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,33);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (229,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,34);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (230,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,35);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (231,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,36);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (232,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,37);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (233,0.000000,0.203874,0.000000,0.000000,0.000000,0.000000,0.000000,6,38);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (234,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,6,39);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (235,0.000000,0.000000,0.000000,2.000000,2.000000,2.000000,0.000000,7,1);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (236,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,7,2);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (237,0.000000,2.000000,2.000000,2.000000,2.000000,0.000000,0.000000,7,3);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (238,0.000000,2.000000,2.000000,2.000000,2.000000,1.600000,0.000000,7,4);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (239,0.000000,2.000000,0.000000,0.000000,2.000000,1.600000,0.000000,7,5);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (240,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,7,6);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (241,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,7,7);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (242,0.000000,0.000000,2.000000,2.000000,0.000000,0.000000,0.000000,7,8);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (243,0.000000,0.000000,2.000000,2.000000,0.500000,0.000000,0.000000,7,9);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (244,0.000000,0.000000,2.000000,2.000000,0.500000,0.000000,0.000000,7,10);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (245,0.000000,0.000000,2.000000,0.000000,0.000000,0.000000,0.000000,7,11);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (246,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,7,12);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (247,0.000000,0.000000,0.000000,2.000000,2.000000,1.250000,0.000000,7,13);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (248,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,7,14);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (249,0.000000,0.000000,2.000000,2.000000,0.000000,0.000000,0.000000,7,15);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (250,0.000000,0.000000,2.000000,2.000000,2.000000,0.000000,0.000000,7,16);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (251,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,2.000000,7,17);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (252,0.000000,0.000000,2.000000,1.500000,1.500000,2.000000,2.000000,7,18);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (253,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,7,19);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (254,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,7,20);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (255,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,7,21);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (256,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,7,22);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (257,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,7,23);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (258,0.000000,0.000000,2.000000,0.000000,0.000000,1.600000,0.000000,7,24);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (259,0.000000,0.000000,2.000000,0.000000,0.000000,2.000000,2.000000,7,25);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (260,0.000000,0.000000,2.000000,0.000000,0.000000,2.000000,2.000000,7,26);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (261,0.000000,0.000000,2.000000,1.500000,1.500000,0.000000,0.000000,7,27);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (262,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,7,28);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (263,0.000000,4.000000,4.000000,4.000000,0.000000,0.000000,0.000000,7,29);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (264,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,7,30);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (265,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,7,31);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (266,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,7,32);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (267,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,7,33);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (268,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,7,34);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (269,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,7,35);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (270,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,7,36);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (271,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,7,37);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (272,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,0.000000,7,38);
INSERT INTO `exercise_detail` (`id`,`attr1`,`attr2`,`attr3`,`attr4`,`attr5`,`attr6`,`attr7`,`body_profilesId`,`exerciseid`) VALUES (273,0.000000,0.000000,0.000000,0.000000,2.000000,0.000000,0.000000,7,39);
