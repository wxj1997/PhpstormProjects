/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : demo

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-07 23:21:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cateinfo
-- ----------------------------
DROP TABLE IF EXISTS `cateinfo`;
CREATE TABLE `cateinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cateName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cateinfo
-- ----------------------------
INSERT INTO `cateinfo` VALUES ('1', '学院新闻');
INSERT INTO `cateinfo` VALUES ('2', '学院公告');
INSERT INTO `cateinfo` VALUES ('3', '教学工作');
INSERT INTO `cateinfo` VALUES ('4', '学生工作');

-- ----------------------------
-- Table structure for newsinfo
-- ----------------------------
DROP TABLE IF EXISTS `newsinfo`;
CREATE TABLE `newsinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newsTitle` varchar(255) DEFAULT NULL,
  `newsCate` int(11) DEFAULT NULL,
  `newsAuthor` varchar(50) DEFAULT NULL,
  `newsCnt` int(11) DEFAULT '0',
  `newsContent` text,
  `newsDateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newsinfo
-- ----------------------------
INSERT INTO `newsinfo` VALUES ('1', '“唱响青春筑梦未来”2018年迎新生庆国庆文艺汇演隆重举行 ', '1', 'admin', '10', '　　红色经典成青春之梦，水墨丹青铸时代辉煌。9月29日晚，我校在至善会堂隆重举办“唱响青春筑梦未来”2018年迎新生庆国庆文艺汇演。校领导王云彪、苏宇、杨箴红、周立华、吴征、陆相欣、仝方存、程秀波、许述敏出席活动，与6667名2018级新同学共同观看演出。\r\n\r\n\r\n\r\n\r\n\r\n\r\n　　伴随着节奏明快、曲调优美的荣获全国第五届大学生艺术展演活动一等奖的《快乐的风》文艺汇演拉开帷幕。武术《中国魂》拳脚招式武声烈烈，静若伏虎,动若飞龙,缓若游云,疾若闪电展现了博大精深的中国功夫。舞蹈与京胡相遇的《国韵》以独特优美的舞蹈，圆润动听的唱腔带给我们一场视听盛宴。朗诵《回延安》用特有的陕北音腔信天游开场，带领大家仿佛一下回到延安重温革命岁月。《红歌联唱》恋恋生情，在红旗漫卷的井冈山头，在宝塔矗立的延河河畔，伟大的共产党人为中国建设砥砺拼搏。拉丁舞《炫境》加小提琴创意独特，内涵丰富，曲调激昂、身姿柔美，舞出精彩、舞出梦想。歌曲《父子》以朴实直白的歌词传递出父子两代人的血脉亲情。当歌曲唱到一半时，演员情随意动流下眼泪，更是触动了观众心底最柔软之处。舞蹈《版纳印象》带我们走进繁茂雨林、走进幽静竹楼，欢乐的泼水，动人的孔雀，美丽的傣族少女双手合十送来祝福。豫剧《念奴娇·追思焦裕禄》再现了人民的好干部焦裕禄为官一任，造福一方的感人故事。观演的学子掌声雷动。T台秀《非遗服装走秀》让古老的图腾焕发出新时代的光彩，模特们身穿靓丽衣衫，尽展现非遗魅力，令人叹为观止。饱含赤子深情大合唱《我爱你中国》虽歌词质朴无华，却激荡起无数中华儿女共鸣的爱国之情。歌舞《我们的新时代》表达了人民对中国梦的殷殷盼望美好展望，嘹亮的歌声化作旗帜，时代的东风擂响奋进的战鼓，火热的青春必将浇铸出美好的时代。\r\n\r\n\r\n\r\n    演出结束后，领导老师走上舞台，亲切慰问演职人员并合影留念。文艺汇演创意无限，既向2018级新同学展现了我校昂扬向上的精神风貌，又利用红歌、舞蹈、豫剧等多种形式为祖国母亲69岁华诞献礼，为改革开放四十周年献礼，为十九大顺利开局献礼。\r\n\r\n', '2018-10-09 08:24:02');
INSERT INTO `newsinfo` VALUES ('2', '我校召开2018－2019学年学风建设专题研讨会 ', '1', 'admin', '15', '　　为深入贯彻落实新时代全国高等学校本科教育工作会议精神，全面推进我校优良学风建设，营造良好的育人氛围，提升人才培养质量，9月28日，学生处主持召开了学风建设专题研讨会。学生处工作人员、学院分管学生工作党委副书记、辅导员及学生代表参加研讨会。会议由学生处副处长李晓莲主持。\r\n\r\n\r\n\r\n　　学生处副处长张π宣读《关于进一步加强2018-2019学年学风建设工作的通知》，通知要求各学院要围绕“建设特色鲜明的高水平应用型本科院校”总体目标，突出重点、破解难点，强化管理、狠抓落实，加强课堂教学管理，做好学生日常管理，抓好“精神贫困、生活贫困、学业贫困”学生的转化教育，增强学生学习的内生动力，把学生从“要我学”的状态转变到“我要学”的状态。各学院在学风建设中要切实发挥主体作用，把学风建设工作摆上重要位置，着力构建齐抓共管、各负其责、全员参与的学风建设工作机制。对所在学院学风建设工作存在的问题，要逐条予以解决，明确任务、责任到人，从“严”上要求，向“实”处着力，切实将学风建设工作做细、做实、做好。\r\n\r\n　　调研会上，与会代表结合各自的专业特点和工作实际，介绍了所在学院学风建设的特色做法、存在的问题、意见建议及今后工作思路，对完善学风建设顶层设计、构建教风与学风联运机制、加强学业规划和学业预警、完善学风建设激励机制等问题进行研讨交流。与会人员还深入探讨了如何提升课堂教学质量、加强学工队伍建设、增强学生学习的内生动力，解决学生学习生活、成长发展等方面的问题，提高学生教育管理服务工作的针对性和实效性，进而促进学风建设根本性好转。\r\n\r\n　　学生资助管理中心主任张灵洲强调，学风是学校软实力的集中表现，抓好学风是提高办学质量的重要保障。持续、系统、深入地开展学风建设，一要充分听取师生的意见，通过在师生中广泛开展学风问题大讨论来统一思想、凝聚共识，探索解决问题的根本途径和有效措施，并将其作为一项常态化工作，常抓不懈、久久为功；二要结合把学校建设成“特色鲜明的高水平应用型本科院校”的总体要求，形成全校上下齐抓共管的合力，从学校和学院两个层面，将良好的学风融入到学生的思想、行为中，切实改变学生的学习状态，促进学校学风建设；三要把辛勤转化为成果，把经验上升为科学，对学风建设工作进行阶段性总结，挖掘富有学院特色的管理办法和个性化方案，最终形成可复制、可借鉴、可推广的长效工作机制。\r\n', '2018-10-09 08:24:24');
INSERT INTO `newsinfo` VALUES ('3', '副校长陆相欣到教育实习基地检查教育实习工作 ', '2', 'admin', '20', '\r\n\r\n　　陆相欣对同学们在实习基地所取得的成绩给予肯定，叮嘱大家要严格遵守实习学校的规章制度，服从安排和管理，珍惜宝贵的实习机会，把所学知识运用到实践中去，在工作中成长，磨砺自己，提升自己，圆满完成实习任务。\r\n', '2018-10-09 08:24:43');
INSERT INTO `newsinfo` VALUES ('4', 'ewsdasd', '4', null, '3', 'asasdasdasfsddsfsdfsf', '2018-10-09 09:28:38');
INSERT INTO `newsinfo` VALUES ('6', '535345', '3', null, '1', '3423423434', '2018-10-16 08:15:08');
INSERT INTO `newsinfo` VALUES ('8', '5667576576', '3', null, '46', 'asdasdasdasdas', '2018-10-16 08:24:18');
INSERT INTO `newsinfo` VALUES ('9', 'dsfsf10', '1', null, '65', 'sdfsdf10', '2018-10-16 08:25:08');
INSERT INTO `newsinfo` VALUES ('10', '10kdfhasgkjeh11', '2', null, '157', '10rpoesutgoiru11', '2018-10-25 19:24:41');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uname` varchar(255) DEFAULT NULL,
  `upasswd` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('rty', 'e924c9eeec17d0a368709af4f6ecae01', '504571');
INSERT INTO `user` VALUES ('888', 'ff5417910b7df3086ed3f561ecbda4cf', '837759');
INSERT INTO `user` VALUES ('1', '38faef074313fea2d052f8648f2d6612', '391357');
INSERT INTO `user` VALUES ('111', '5be00abd790b6e78debfbf65abab0cae', '679034');
INSERT INTO `user` VALUES ('qwe', 'd6fcca653af52c80c3921cc6e0efb1c6', '796505');
INSERT INTO `user` VALUES ('hj', '1f28e49f34e2406fdb6d6158eebd793b', '643054');
INSERT INTO `user` VALUES ('zx', 'b4b1ff97a0e5802eb2a6ade193cb5232', '686450');
