# Host: localhost  (Version: 5.5.53)
# Date: 2018-08-27 10:20:20
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "n_admin_pwdcount"
#

DROP TABLE IF EXISTS `n_admin_pwdcount`;
CREATE TABLE `n_admin_pwdcount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_ip` varchar(64) DEFAULT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `count_time` smallint(2) DEFAULT NULL COMMENT '此时',
  `updated_t` int(11) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员登录错误的密码次数';

#
# Data for table "n_admin_pwdcount"
#

/*!40000 ALTER TABLE `n_admin_pwdcount` DISABLE KEYS */;
/*!40000 ALTER TABLE `n_admin_pwdcount` ENABLE KEYS */;

#
# Structure for table "n_admin_user"
#

DROP TABLE IF EXISTS `n_admin_user`;
CREATE TABLE `n_admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) DEFAULT NULL COMMENT '登录账户',
  `real_name` varchar(50) DEFAULT NULL COMMENT '真实名字',
  `sex` smallint(1) DEFAULT '2' COMMENT '1.男 2.女',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(50) DEFAULT NULL COMMENT '手机',
  `admin_password` varchar(255) DEFAULT NULL COMMENT '密码',
  `status` int(1) DEFAULT '1' COMMENT '是否锁定 1.正常 0.锁定',
  `created_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `login_time` int(11) DEFAULT NULL COMMENT '上次登录时间',
  `group_id` smallint(3) NOT NULL COMMENT '部门id',
  `group_role` tinyint(3) DEFAULT NULL COMMENT '1.超级管理员 2.主管 3.普通员工',
  `more` text COMMENT '个人备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='后台管理用户表';

#
# Data for table "n_admin_user"
#

/*!40000 ALTER TABLE `n_admin_user` DISABLE KEYS */;
INSERT INTO `n_admin_user` VALUES (1,'admin','duxfueng',2,'85211@qq.com','13015510991','8e7d753950cbe95f772a675fbbd033811f2ce0d4',1,1533196350,1535100226,1,1,'加油信息'),(2,'xiaoli','小李子',1,'','','8e7d753950cbe95f772a675fbbd033811f2ce0d4',1,1534679080,1535016279,2,3,NULL);
/*!40000 ALTER TABLE `n_admin_user` ENABLE KEYS */;

#
# Structure for table "n_auth_group"
#

DROP TABLE IF EXISTS `n_auth_group`;
CREATE TABLE `n_auth_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text COMMENT '规则id',
  `ctime` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户组表';

#
# Data for table "n_auth_group"
#

/*!40000 ALTER TABLE `n_auth_group` DISABLE KEYS */;
INSERT INTO `n_auth_group` VALUES (1,'管理部',1,'2,11,12,3,13,14,16,4,8,9,1,10,5,6,7',1511681779,'这是管理员'),(2,'技术部',1,'2,11,12,3,13,14,4,8,9',NULL,'');
/*!40000 ALTER TABLE `n_auth_group` ENABLE KEYS */;

#
# Structure for table "n_auth_rule"
#

DROP TABLE IF EXISTS `n_auth_rule`;
CREATE TABLE `n_auth_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `left_nav` smallint(1) NOT NULL DEFAULT '0' COMMENT '左侧导航菜单 1.是',
  `ord` int(5) DEFAULT '0' COMMENT '排序',
  `created_t` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL COMMENT '图标',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='规则表';

#
# Data for table "n_auth_rule"
#

/*!40000 ALTER TABLE `n_auth_rule` DISABLE KEYS */;
INSERT INTO `n_auth_rule` VALUES (1,0,'backend/ConfigManage','公司管理',1,1,80,NULL,'layui-icon-rate'),(2,0,'backend/News','新闻资讯',1,1,10,NULL,'layui-icon-release'),(3,0,'backend/Customer','客户管理',1,1,20,NULL,'layui-icon-friends'),(4,0,'backend/SystemManage','日志管理',1,1,30,NULL,'layui-icon-log'),(5,1,'backend/Rule/rule_list','权限管理',1,1,4,'1511694650',NULL),(6,1,'backend/Rule/grouplist','部门管理',1,1,7,'1511694769',NULL),(7,1,'backend/AdminUsers/adminlist','账号管理',1,1,10,NULL,''),(8,4,'backend/SystemManage/actionlog','操作日志',1,1,50,NULL,NULL),(9,4,'backend/SystemManage/loginlog','登录日志',1,1,60,'1513317229',NULL),(10,1,'backend/ConfigManage/index','常用设置',1,1,1,'1514966056','layui-icon-rate'),(11,2,'backend/News/index','新闻列表',1,1,0,NULL,NULL),(12,2,'backend/News/cateindex','新闻分类',1,1,0,NULL,NULL),(13,3,'backend/Customer/index','客户列表',1,1,0,NULL,NULL),(14,3,'backend/Customer/cateindex','客户分类',1,1,0,NULL,NULL),(16,3,'backend/Customer/fromindex','客户来源',1,1,0,'1534766204','');
/*!40000 ALTER TABLE `n_auth_rule` ENABLE KEYS */;

#
# Structure for table "n_config"
#

DROP TABLE IF EXISTS `n_config`;
CREATE TABLE `n_config` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `name` varchar(50) DEFAULT NULL COMMENT '配置的key键名',
  `value` varchar(512) DEFAULT NULL COMMENT '配置的val值',
  `desc` varchar(50) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='网站配置';

#
# Data for table "n_config"
#

/*!40000 ALTER TABLE `n_config` DISABLE KEYS */;
INSERT INTO `n_config` VALUES (1,'site_name','三言两语',NULL),(2,'record_no','v1.0.1',NULL),(3,'site_keyword','三言，两语',NULL),(4,'contact','',NULL),(5,'mobile','','手机号'),(6,'phone','','固定电话'),(7,'address','',NULL),(8,'qq','',NULL),(9,'qq2','',NULL),(10,'qq3','',NULL),(11,'message_type','阿里大于11',NULL),(12,'message_name','8455184154',NULL),(13,'message_pwd','du1999666645455445',NULL),(14,'smtp_url','smtp.qq.com',NULL),(15,'smtp_port','587',NULL),(16,'smtp_email','3201125908@qq.com',NULL),(17,'smtp_pwd','tzszposliwnudhbi',NULL),(18,'logo','20180722\\68e432d5ab123bee7360b544cb989f36.png','前台logo'),(19,'logo_backend','20180722\\2292408eac700b1d4e71579973ae9501.png','后台管理中心logo 80*40'),(20,'logo_login','20180722\\4ad553be084be7610d33d09338655cf4.png','后台登录logo 300*60'),(21,'icon','20180819\\2b792e1d68330069dd6abae56001c735.png','小图标'),(22,'ebusinessid','1336475','快递鸟平台账号'),(23,'eappkey','50ec3fd9-9162-44a5-b22b-2f666b4e788f','快递鸟平台秘钥');
/*!40000 ALTER TABLE `n_config` ENABLE KEYS */;

#
# Structure for table "n_customer"
#

DROP TABLE IF EXISTS `n_customer`;
CREATE TABLE `n_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL COMMENT '客户等级分类',
  `from` int(11) DEFAULT NULL COMMENT '客户来源',
  `name` varchar(255) DEFAULT NULL COMMENT '客户称呼',
  `mobile` varchar(50) DEFAULT NULL COMMENT '客户手机号',
  `qq` varchar(255) DEFAULT NULL COMMENT 'qq',
  `wx` varchar(255) DEFAULT NULL COMMENT '客户微信',
  `contents` text COMMENT '客户留言内容',
  `province` varchar(100) DEFAULT NULL COMMENT '省份',
  `city` varchar(100) DEFAULT NULL COMMENT '市',
  `area` varchar(100) DEFAULT NULL COMMENT '区域',
  `address` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `uptime` int(11) DEFAULT NULL COMMENT '更新时间',
  `warn_time` int(11) DEFAULT NULL COMMENT '提醒联系客户的时间',
  `ord` int(11) DEFAULT NULL COMMENT '排序',
  `group_id` int(11) DEFAULT NULL COMMENT '部门',
  `auid` int(11) DEFAULT NULL COMMENT '员工',
  `status` tinyint(3) DEFAULT '1' COMMENT '保留状态（暂未用 1.正常 -1不显示）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='客户表';

#
# Data for table "n_customer"
#

/*!40000 ALTER TABLE `n_customer` DISABLE KEYS */;
INSERT INTO `n_customer` VALUES (2,4,5,'杜先生1','17521015201','985049741','wx199107','请联系我','湖北省','黄石市','黄石港区','文化路1号',1533964251,1535103500,1535103498,1,1,1,1),(3,1,9,'杜先生','17521015202','','','','河南省','洛阳市','老城区','',1534136275,1534669256,0,0,1,1,1),(5,3,16,'张晓晓','17521015207','','','','湖南省','湘潭市','雨湖区','',1533964251,NULL,1535558400,0,1,1,1),(7,1,12,'大黑子','','','','','湖北省','十堰市','郧西县','',1534217776,NULL,0,0,1,1,1),(9,3,13,'晓晓','13015510995','','','','湖北省','十堰市','郧阳区','天紫界1号',1534304298,NULL,1534953600,0,1,1,1),(10,1,14,'小黑子','13025356896','','','','河南省','驻马店市','西平县','',1534677004,NULL,0,0,1,1,1),(11,4,9,'小张','13015510992','','','','河南省','周口市','扶沟县','',1534767631,1534767663,0,0,1,1,1),(12,4,5,'3','13015510995','6','5','7','8','9','10','11',1534770661,NULL,NULL,NULL,1,1,1),(13,3,16,'李先生','17521015555','94613946152','9562wx','','湖北省','潜江市','潜江市','市区小路上',1535016365,NULL,0,-1,2,2,1),(14,1,5,'测试','1301510888','8451','45120','','湖南省','湘潭市','岳塘区','',1535103804,1535103927,0,0,1,1,1),(15,1,12,'嘟嘟','17521015896','9562130.','wx1994','','山东省','淄博市','博山区','韩',1535103976,NULL,NULL,0,1,1,1);
/*!40000 ALTER TABLE `n_customer` ENABLE KEYS */;

#
# Structure for table "n_customer_cate"
#

DROP TABLE IF EXISTS `n_customer_cate`;
CREATE TABLE `n_customer_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '类别名称',
  `contents` text COMMENT '类别描述',
  `color` varchar(255) DEFAULT NULL COMMENT '类别颜色',
  `ord` int(11) DEFAULT NULL COMMENT '排序',
  `status` tinyint(3) DEFAULT '1' COMMENT '是否启用 1. 启用 -1未启用',
  `group_id` int(11) DEFAULT NULL COMMENT '部门id',
  `auid` int(11) DEFAULT NULL COMMENT '员工',
  `ctime` int(11) DEFAULT NULL,
  `uptime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='客户等级分类';

#
# Data for table "n_customer_cate"
#

/*!40000 ALTER TABLE `n_customer_cate` DISABLE KEYS */;
INSERT INTO `n_customer_cate` VALUES (1,'待联系','这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔这是客户的猫叔','39DB6F',10,1,1,1,1533721201,1534080352),(2,'跟踪中','','D6DB37',9,1,1,1,1533790978,1534080361),(3,'已邀约','','DBC1D8',8,1,1,1,1534080286,1534080370),(4,'已成交','','DB5E5E',7,1,1,1,1534080316,1534080381),(5,'无效客户','','DBA299',1,1,1,1,1534080340,1534080792),(6,'无意向','','3016DB',0,1,1,1,1534677031,NULL);
/*!40000 ALTER TABLE `n_customer_cate` ENABLE KEYS */;

#
# Structure for table "n_customer_from"
#

DROP TABLE IF EXISTS `n_customer_from`;
CREATE TABLE `n_customer_from` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '来源名称',
  `contents` text COMMENT '来源描述',
  `link` varchar(255) DEFAULT NULL COMMENT '来源链接',
  `ord` int(11) DEFAULT NULL COMMENT '排序',
  `status` tinyint(3) DEFAULT '1' COMMENT '1.启用 -1禁用',
  `group_id` int(11) DEFAULT NULL COMMENT '添加部门',
  `auid` int(11) DEFAULT NULL COMMENT '添加人',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `uptime` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='客户来源表';

#
# Data for table "n_customer_from"
#

/*!40000 ALTER TABLE `n_customer_from` DISABLE KEYS */;
INSERT INTO `n_customer_from` VALUES (5,'手机端推广页','','http://www.baidu.com',100,1,1,1,1534496972,1534771088),(9,'PV推广页','','',30,1,1,1,1534497022,1534766761),(10,'QQ','','',4,1,1,1,1534497033,1534575370),(11,'论坛','','',3,1,1,1,1534497044,1534575387),(12,'淘宝店铺','','',7,1,1,1,1534497060,1534575319),(13,'微博','','',6,1,1,1,1534497071,1534575347),(14,'官网','','',4,1,1,1,1534497082,1534575358),(15,'其他渠道','','',0,1,1,1,1534497096,NULL),(16,'前景加盟网','','',20,1,1,1,1534575217,NULL),(17,'中天客户群','','',0,1,1,1,1534766665,NULL);
/*!40000 ALTER TABLE `n_customer_from` ENABLE KEYS */;

#
# Structure for table "n_customer_record"
#

DROP TABLE IF EXISTS `n_customer_record`;
CREATE TABLE `n_customer_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(255) DEFAULT NULL COMMENT '客户id',
  `title` varchar(255) DEFAULT NULL COMMENT '保留字段（未用）',
  `cate_id` tinyint(3) DEFAULT NULL COMMENT '跟进状态',
  `contents` text COMMENT '跟进内容',
  `status` tinyint(3) DEFAULT '1' COMMENT '保留状态（未用 1.正常 -1不显示）',
  `ord` int(11) DEFAULT '1' COMMENT '保留排序（未用）',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `auid` int(11) DEFAULT NULL COMMENT '添加人',
  `group_id` int(11) DEFAULT NULL COMMENT '部门',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='客户跟进记录表';

#
# Data for table "n_customer_record"
#

/*!40000 ALTER TABLE `n_customer_record` DISABLE KEYS */;
INSERT INTO `n_customer_record` VALUES (1,'1','22',2,'这是我们的待联系的来呢荣',1,1,2,1,1),(2,'1',NULL,2,'阿凡达',1,1,1533792364,1,1),(3,'2',NULL,1,'电话不通',1,1,1534080417,1,1),(4,'2',NULL,2,'跟进中',1,1,1534080605,1,1),(5,'2',NULL,2,'跟进中',1,1,1534080611,1,1),(6,'2',NULL,2,'跟进中',1,1,1534080752,1,1),(7,'2',NULL,4,'已经成交',1,1,1534080768,1,1),(8,'10',NULL,1,'加油',1,1,1534677229,1,1);
/*!40000 ALTER TABLE `n_customer_record` ENABLE KEYS */;

#
# Structure for table "n_log"
#

DROP TABLE IF EXISTS `n_log`;
CREATE TABLE `n_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auid` int(11) DEFAULT NULL COMMENT '操作人id',
  `content` text,
  `created_t` int(11) DEFAULT NULL COMMENT '时间',
  `ip` varchar(50) NOT NULL COMMENT '操作ip',
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COMMENT='日志';

#
# Data for table "n_log"
#

/*!40000 ALTER TABLE `n_log` DISABLE KEYS */;
INSERT INTO `n_log` VALUES (1,1,'修改了权限名称：backend/SystemManage',1534079744,'127.0.0.1',NULL),(2,1,'修改了权限名称：backend/News',1534079755,'127.0.0.1',NULL),(3,1,'修改了权限名称：backend/SystemManage',1534079768,'127.0.0.1',NULL),(4,1,'修改了权限名称：backend/Customer',1534079775,'127.0.0.1',NULL),(5,1,'修改了权限名称：backend/News',1534079823,'127.0.0.1',NULL),(6,1,'添加 / 修改了新闻内容，标题：全国多地上演“天狗咬日”日食奇观',1534079944,'127.0.0.1',NULL),(7,1,'添加 / 修改了新闻分类：国内新闻',1534079973,'127.0.0.1',NULL),(8,1,'添加 / 修改了新闻分类：国际新闻',1534079982,'127.0.0.1',NULL),(9,1,'添加 / 修改了新闻内容，标题：时隔2年半 美国人又密集讨论“特朗普焦虑症”了',1534080113,'127.0.0.1',NULL),(10,1,'添加 / 修改了新闻内容，标题：全国多地上演“天狗咬日”日食奇观',1534080129,'127.0.0.1',NULL),(11,1,'添加 / 修改了客户等级数据，名称：待联系',1534080234,'127.0.0.1',NULL),(12,1,'添加 / 修改了客户等级数据，名称：待跟踪',1534080247,'127.0.0.1',NULL),(13,1,'添加 / 修改了客户等级数据，名称：跟踪中',1534080276,'127.0.0.1',NULL),(14,1,'添加 / 修改了客户等级数据，名称：已邀约',1534080286,'127.0.0.1',NULL),(15,1,'添加 / 修改了客户等级数据，名称：跟踪中',1534080300,'127.0.0.1',NULL),(16,1,'添加 / 修改了客户等级数据，名称：已成交',1534080316,'127.0.0.1',NULL),(17,1,'添加 / 修改了客户等级数据，名称：无效客户',1534080340,'127.0.0.1',NULL),(18,1,'添加 / 修改了客户等级数据，名称：待联系',1534080352,'127.0.0.1',NULL),(19,1,'添加 / 修改了客户等级数据，名称：跟踪中',1534080361,'127.0.0.1',NULL),(20,1,'添加 / 修改了客户等级数据，名称：已邀约',1534080370,'127.0.0.1',NULL),(21,1,'添加 / 修改了客户等级数据，名称：已成交',1534080381,'127.0.0.1',NULL),(22,1,'添加回访数据！',1534080752,'127.0.0.1',NULL),(23,1,'添加回访数据！',1534080768,'127.0.0.1',NULL),(24,1,'添加 / 修改了客户等级数据，名称：无效客户',1534080792,'127.0.0.1',NULL),(25,1,'添加 / 修改了客户数据，名称：杜先生',1534136275,'127.0.0.1',NULL),(26,1,'修改了权限名称：backend/News',1534136556,'127.0.0.1',NULL),(27,1,'修改了权限名称：backend/Customer',1534136574,'127.0.0.1',NULL),(28,1,'修改了权限名称：backend/Customer',1534136588,'127.0.0.1',NULL),(29,1,'修改了权限名称：backend/SystemManage',1534136627,'127.0.0.1',NULL),(30,1,'添加 / 修改了客户数据，名称：刘女士',1534136964,'127.0.0.1',NULL),(31,1,'添加 / 修改了客户数据，名称：张晓晓',1534137113,'127.0.0.1',NULL),(32,1,'添加 / 修改了新闻内容，标题：全国多地上演“天狗咬日”日食奇观',1534137912,'127.0.0.1',NULL),(33,1,'添加 / 修改了客户数据，名称：小黑子',1534217762,'127.0.0.1',NULL),(34,1,'添加 / 修改了客户数据，名称：大黑子',1534217776,'127.0.0.1',NULL),(35,1,'添加 / 修改了客户数据，名称：三胖子',1534217789,'127.0.0.1',NULL),(36,1,'添加 / 修改了客户数据，名称：晓晓',1534304298,'127.0.0.1',NULL),(37,1,'修改了常用配置信息！',1534318290,'127.0.0.1',NULL),(38,1,'修改了常用配置信息！',1534318836,'127.0.0.1',NULL),(39,1,'添加 / 修改了新闻内容，标题：时隔2年半 美国人又密集讨论“特朗普焦虑症”了',1534322015,'127.0.0.1',NULL),(40,1,'添加 / 修改了新闻内容，标题：好好新闻',1534323389,'127.0.0.1',NULL),(41,1,'修改了常用配置信息！',1534388849,'127.0.0.1',NULL),(42,1,'修改了常用配置信息！',1534389186,'127.0.0.1',NULL),(43,1,'添加了权限，权限名称：backend/Customer/fromindex',1534391592,'127.0.0.1',NULL),(44,1,'修改了部门数据！部门为管理部',1534391611,'127.0.0.1',NULL),(45,1,'修改了常用配置信息！',1534668761,'127.0.0.1',NULL),(46,1,'删除了权限数据！权限id=15',1534668928,'127.0.0.1',NULL),(47,1,'修改了部门数据！部门为管理部',1534668937,'127.0.0.1',NULL),(48,1,'添加 / 修改了客户数据，名称：小白',1534669245,'127.0.0.1',NULL),(49,1,'添加 / 修改了客户数据，名称：杜先生',1534669256,'127.0.0.1',NULL),(50,1,'删除了新闻分类：国内新闻',1534669617,'127.0.0.1',NULL),(51,1,'添加 / 修改了新闻分类：国内新闻',1534670217,'127.0.0.1',NULL),(52,1,'添加 / 修改了新闻分类：社会热点',1534670227,'127.0.0.1',NULL),(53,1,'添加 / 修改了新闻分类：体育娱乐',1534670237,'127.0.0.1',NULL),(54,1,'添加 / 修改了新闻分类：健康饮食',1534676817,'127.0.0.1',NULL),(55,1,'添加 / 修改了新闻内容，标题：健康饮食习惯',1534676944,'127.0.0.1',NULL),(56,1,'添加 / 修改了客户数据，名称：小黑子',1534677004,'127.0.0.1',NULL),(57,1,'添加 / 修改了客户等级数据，名称：无意向',1534677031,'127.0.0.1',NULL),(58,1,'修改了常用配置信息！',1534677062,'127.0.0.1',NULL),(59,1,'修改了权限名称：backend/AdminUsers/adminlist',1534677099,'127.0.0.1',NULL),(60,1,'修改了权限名称：backend/AdminUsers/adminlist',1534677105,'127.0.0.1',NULL),(61,1,'添加回访数据！',1534677229,'127.0.0.1',NULL),(62,1,'删除了新闻分类：',1534677284,'127.0.0.1',NULL),(63,1,'删除了新闻分类：',1534677289,'127.0.0.1',NULL),(64,1,'添加了部门数据！部门为技术部',1534679059,'127.0.0.1',NULL),(65,1,'编辑修改了数据，账号为：xiaoli,真实姓名为：小李子',1534679080,'127.0.0.1',NULL),(66,1,'添加了权限，权限名称：backend/Customer/fromindex',1534766204,'127.0.0.1',NULL),(67,1,'修改了权限名称：backend/SystemManage',1534766242,'127.0.0.1',NULL),(68,1,'修改了部门数据！部门为管理部',1534766253,'127.0.0.1',NULL),(69,1,'添加 / 修改了客户等级数据，名称：中天客户群',1534766665,'127.0.0.1',NULL),(70,1,'添加 / 修改了客户分类/来源数据，名称：手机端推广页',1534766736,'127.0.0.1',NULL),(71,1,'添加 / 修改了客户分类/来源数据，名称：PV推广页',1534766761,'127.0.0.1',NULL),(72,1,'添加 / 修改了客户分类/来源数据，名称：搜狗推广-推广页',1534767005,'127.0.0.1',NULL),(73,1,'添加 / 修改了客户分类/来源数据，名称：搜狗推广-推广页3',1534767037,'127.0.0.1',NULL),(74,1,'删除了客户数据，名称：三胖子',1534767194,'127.0.0.1',NULL),(75,1,'删除了客户数据，名称：小黑子',1534767205,'127.0.0.1',NULL),(76,1,'删除了客户数据，名称：刘女士',1534767211,'127.0.0.1',NULL),(77,1,'删除了客户数据，名称：小白',1534767230,'127.0.0.1',NULL),(78,1,'删除了客户分类/来源数据：78CN-小仙女1',1534767279,'127.0.0.1',NULL),(79,1,'删除了客户分类/来源数据：78CN-神店节-小仙女4',1534767284,'127.0.0.1',NULL),(80,1,'删除了客户分类/来源数据：全球加盟网-小仙女1',1534767289,'127.0.0.1',NULL),(81,1,'删除了客户分类/来源数据：快马加盟网-小仙女1',1534767294,'127.0.0.1',NULL),(82,1,'删除了客户分类/来源数据：中视-信息流-小仙女3',1534767298,'127.0.0.1',NULL),(83,1,'删除了客户分类/来源数据：搜狗推广-推广页',1534767306,'127.0.0.1',NULL),(84,1,'删除了客户分类/来源数据：搜狗推广-推广页3',1534767317,'127.0.0.1',NULL),(85,1,'添加 / 修改了客户数据，名称：小张',1534767631,'127.0.0.1',NULL),(86,1,'添加 / 修改了客户数据，名称：小张',1534767663,'127.0.0.1',NULL),(87,1,'添加 / 修改了客户分类/来源数据，名称：手机端推广页',1534771088,'127.0.0.1',NULL),(88,1,'修改了常用配置信息！',1535012385,'127.0.0.1',NULL),(89,2,'添加 / 修改了客户数据，名称：李先生',1535016365,'127.0.0.1',NULL),(90,2,'添加 / 修改了新闻内容，标题：人民日报热点辨析：让脱贫攻坚经得起检验',1535016570,'127.0.0.1',NULL),(91,1,'添加 / 修改了客户数据，名称：杜先生1',1535103371,'127.0.0.1',1),(92,1,'添加 / 修改了客户数据，名称：杜先生1',1535103480,'127.0.0.1',1),(93,1,'添加 / 修改了客户数据，名称：杜先生1',1535103500,'127.0.0.1',1),(94,1,'添加 / 修改了客户数据，名称：测试',1535103804,'127.0.0.1',1),(95,1,'添加 / 修改了客户数据，名称：测试',1535103927,'127.0.0.1',1),(96,1,'添加 / 修改了客户数据，名称：嘟嘟',1535103976,'127.0.0.1',1);
/*!40000 ALTER TABLE `n_log` ENABLE KEYS */;

#
# Structure for table "n_login_log"
#

DROP TABLE IF EXISTS `n_login_log`;
CREATE TABLE `n_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auid` int(11) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL COMMENT '部门id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='登录日志';

#
# Data for table "n_login_log"
#

/*!40000 ALTER TABLE `n_login_log` DISABLE KEYS */;
INSERT INTO `n_login_log` VALUES (1,1,'127.0.0.1',1534079562,NULL),(2,1,'127.0.0.1',1534079638,NULL),(3,1,'127.0.0.1',1534079794,NULL),(4,1,'127.0.0.1',1534136198,NULL),(5,1,'127.0.0.1',1534136868,NULL),(6,1,'127.0.0.1',1534137767,NULL),(7,1,'127.0.0.1',1534137815,NULL),(8,1,'127.0.0.1',1534139117,NULL),(9,1,'127.0.0.1',1534139907,NULL),(10,1,'127.0.0.1',1534143684,NULL),(11,1,'127.0.0.1',1534230853,NULL),(12,1,'127.0.0.1',1534303114,NULL),(13,1,'127.0.0.1',1534386913,NULL),(14,1,'127.0.0.1',1534388774,NULL),(15,1,'127.0.0.1',1534390704,NULL),(16,1,'127.0.0.1',1534390769,NULL),(17,1,'127.0.0.1',1534390953,NULL),(18,1,'127.0.0.1',1534390971,NULL),(19,1,'127.0.0.1',1534391638,NULL),(20,1,'127.0.0.1',1534668708,NULL),(21,1,'127.0.0.1',1534668776,NULL),(22,1,'127.0.0.1',1534668830,NULL),(23,1,'127.0.0.1',1534669068,NULL),(24,1,'127.0.0.1',1534669224,NULL),(25,1,'127.0.0.1',1534678209,NULL),(26,1,'127.0.0.1',1534766270,NULL),(27,1,'127.0.0.1',1534770142,NULL),(28,1,'127.0.0.1',1535012307,NULL),(29,2,'127.0.0.1',1535016279,NULL),(30,1,'127.0.0.1',1535090801,NULL),(31,1,'127.0.0.1',1535090898,NULL),(32,1,'127.0.0.1',1535092298,NULL),(33,1,'127.0.0.1',1535100226,NULL);
/*!40000 ALTER TABLE `n_login_log` ENABLE KEYS */;

#
# Structure for table "n_news"
#

DROP TABLE IF EXISTS `n_news`;
CREATE TABLE `n_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL COMMENT '新闻的分类id',
  `title` varchar(255) DEFAULT NULL COMMENT '新闻标题',
  `key_words` varchar(255) DEFAULT NULL COMMENT '关键字',
  `main` text COMMENT '摘要',
  `main_img` varchar(255) DEFAULT NULL COMMENT '图片',
  `img_one` varchar(255) DEFAULT NULL COMMENT '图片备用字段',
  `contents` text COMMENT '主要内容',
  `author` varchar(50) DEFAULT '' COMMENT '作者',
  `from` varchar(255) DEFAULT NULL COMMENT '文章来源',
  `link` varchar(255) DEFAULT NULL COMMENT '文章外链接',
  `num` int(11) DEFAULT NULL COMMENT '浏览量',
  `status` tinyint(3) DEFAULT '1' COMMENT '1.上线 -1.下线',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `uptime` int(11) DEFAULT NULL COMMENT '更新时间',
  `is_new` tinyint(1) DEFAULT '0' COMMENT '1.最新 0.不是',
  `is_hot` tinyint(1) DEFAULT '0' COMMENT '1.最热',
  `is_best` tinyint(1) DEFAULT '0' COMMENT '最好',
  `ord` int(11) DEFAULT '0' COMMENT '排序',
  `auid` int(11) DEFAULT NULL COMMENT '发布auid',
  `group_id` int(11) DEFAULT NULL COMMENT '部门id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='新闻管理';

#
# Data for table "n_news"
#

/*!40000 ALTER TABLE `n_news` DISABLE KEYS */;
INSERT INTO `n_news` VALUES (1,2,'全国多地上演“天狗咬日”日食奇观','日食奇观','江苏省连云港市天空出现美丽的日偏食天象（拼版照片）。11日傍晚，“天狗咬日”天文奇观在天宇上演。这是中国今年第三次日食，也是唯一一次能够观测到的日食。这次日食可见范围比较广，观测条件较佳，中国北方大部分地区都可以看到。','/uploads/news/20180812/480a0f9705622068e3d2e372bcef47b5.jpg',NULL,'&lt;p&gt;&lt;span style=&quot;color: rgb(102, 102, 102); font-family: &amp;quot;Microsoft Yahei&amp;quot;, 微软雅黑, SimSun, 宋体, &amp;quot;Arial Narrow&amp;quot;, serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;2108年8月11日傍晚时分，江苏省连云港市天空出现美丽的日偏食天象（拼版照片）。11日傍晚，“天狗咬日”天文奇观在天宇上演。这是中国今年第三次日食，也是唯一一次能够观测到的日食。这次日食可见范围比较广，观测条件较佳，中国北方大部分地区都可以看到。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: rgb(102, 102, 102); font-family: &amp;quot;Microsoft Yahei&amp;quot;, 微软雅黑, SimSun, 宋体, &amp;quot;Arial Narrow&amp;quot;, serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(102, 102, 102); font-family: &amp;quot;Microsoft Yahei&amp;quot;, 微软雅黑, SimSun, 宋体, &amp;quot;Arial Narrow&amp;quot;, serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;color: rgb(102, 102, 102); font-family: &amp;quot;Microsoft Yahei&amp;quot;, 微软雅黑, SimSun, 宋体, &amp;quot;Arial Narrow&amp;quot;, serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;018年8月11日，江苏南通，长江边观测到的“长河落日‘缺’”天象。当天，今年我国能观测到的唯一一次日食日期而至。日偏食是日食的一个种类，日食有日全食、日偏食、日环食、全环食4类。中国天文学会会员、天津市天文学会理事史志成在此前接受媒体采访时说，由于月球围绕地球转动，地球又带着月球一起围绕太阳转动，正是这两种运动产生了日食(或月食)现象。当月球运行到太阳和地球之间，如果日、地、月三者恰好或几乎成一直线，那么月球的影子投射到地球表面上来，太阳光被月球遮住，这时，在月影区域内就看不见或看不全太阳，这就是日食。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: rgb(102, 102, 102); font-family: &amp;quot;Microsoft Yahei&amp;quot;, 微软雅黑, SimSun, 宋体, &amp;quot;Arial Narrow&amp;quot;, serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;color: rgb(102, 102, 102); font-family: &amp;quot;Microsoft Yahei&amp;quot;, 微软雅黑, SimSun, 宋体, &amp;quot;Arial Narrow&amp;quot;, serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;/uploads/ueditor/image/20180813/1534137883.jpg&quot; title=&quot;1534137883.jpg&quot; alt=&quot;1柠檬养乐多.jpg&quot; width=&quot;446&quot; height=&quot;381&quot;/&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;','管理员','','',0,1,1534079944,1534137912,0,0,1,0,1,1),(2,2,'时隔2年半 美国人又密集讨论“特朗普焦虑症”了','特朗普焦虑症','特朗普焦虑症','/uploads/news/20180812/17b3435e41866cff3cda2bcdb4d7ac74.jpg',NULL,'&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;今天的主角可不是特朗普，而是一种病——特朗普焦虑症。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;　　冬瓜侠2016年3月就在美国媒体上看到过这种“病”。当时的大意是说，许多美国人看到特朗普在竞选中强势崛起，一想到“特朗普总统”这个词，就感到忧虑。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;　　没想到时隔两年半，美国人又开始密集讨论“特朗普焦虑症”了。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;　　这波节奏，是被隔壁的加拿大媒体带起来的。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;7月底，加拿大广播公司刊登了这样一篇文章。标题很显眼：在已经撕裂的美国，治疗焦虑症的医生总是反复听到同一个名字：&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;　　唐纳德·特朗普&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;　　“他想让我们都原地爆炸吗！？”&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;　　在伊丽莎白·拉蒙特位于华盛顿的心理诊所，病人正这样嘶吼着，他焦躁的原因是看到特朗普又在发推特威胁伊朗，用的还都是大写“CONSEQUENCES”。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;　　一段时间以来，人们在特朗普的推特上看到过移民政策导致骨肉分离，堕胎有可能变得不合法，他还对普京表现得尤为顺从。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;　　我的病人们陷入了一种“集体焦虑”，他们不知道总统又会做什么可怕的决定，他们为此务必焦虑，“这是一种世界就要完蛋了的恐惧，表现为十分地六神无主、心绪不明”。拉蒙特说。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;　　心理学家认为，“特朗普综合征”在2016年竞选期间就有了，主要是一种情绪紊乱。而且，患者不分立场，特朗普的支持者和反对者都有可能患病。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;　　具体来说，恨特朗普的人，他们的焦虑表现在，总感觉自己像是被有精神病的家长养大的孩子，“别管你有没有意识到这一点，我们有时候就是会把美国总统看作自己的精神家长”，拉蒙特说。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 18px; padding: 0px; color: rgb(77, 79, 83); font-family: &amp;quot;Microsoft Yahei&amp;quot;, &amp;quot;\\\\5FAE软雅黑&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;\\\\534E文细黑&amp;quot;, SimSun, &amp;quot;\\\\5B8B体&amp;quot;, Arial, sans-serif; font-size: 18px; letter-spacing: 1px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;　　特朗普的支持者就更惨了。他们的症状是总能感受到“社交孤立”和“家庭孤立”&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','管理员','','',15,1,1534080113,1534322015,0,1,0,0,1,1),(3,2,'好好新闻','这是新闻你啊','暗室逢灯','/uploads/news/20180815/73012009a2ed1c3f7d19f28ecefa0245.png',NULL,'&lt;p&gt;暗室逢灯&lt;/p&gt;','管理员','','',0,1,1534323389,NULL,0,0,0,0,1,1),(4,6,'健康饮食习惯','健康饮食习惯','健康饮食习惯','/uploads/news/20180819/ea7dd3f05d892060abf830ff037d3d4d.png',NULL,'&lt;p&gt;这是健康意识的西瓜&lt;br/&gt;&lt;/p&gt;','管理员','','',0,1,1534676944,NULL,1,0,1,0,1,1),(5,4,'人民日报热点辨析：让脱贫攻坚经得起检验','必须以更大的决心、更明确的思路','习近平同志在党的十九大报告中强调，“坚决打赢脱贫攻坚战”“使全面建成小康社会得到人民认可、经得起历史检验”。当前，我国脱贫攻坚正处于啃硬骨头、攻坚拔寨的关键阶段，所面对的都是贫中之贫、困中之困、难中之难，必须以更大的决心、更明确的思路、更精准的举措和超常规的力度激发贫困人口内生动力，夯实贫困人口稳定脱贫基础，切实做到脱真贫、真脱贫、不返贫。','/uploads/news/20180823/14cf8b568ca91d5407360bdfe26046f8.jpg',NULL,'&lt;p&gt;　习近平同志在党的十九大报告中强调，“坚决打赢脱贫攻坚战”“使全面建成小康社会得到人民认可、经得起历史检验”。当前，我国脱贫攻坚正处于啃硬骨头、攻坚拔寨的关键阶段，所面对的都是贫中之贫、困中之困、难中之难，必须以更大的决心、更明确的思路、更精准的举措和超常规的力度激发贫困人口内生动力，夯实贫困人口稳定脱贫基础，切实做到脱真贫、真脱贫、不返贫。&lt;/p&gt;&lt;p&gt;\r\n\t　　党的十八大以来，我国脱贫攻坚取得决定性进展。2012—2017年，我国贫困人口减少6800多万，贫困发生率从10.2%下降到3.1%。同时应看到，扶贫工作中仍存在一些短板：有的忽视发挥贫困群众主体作用，出现“干部干、群众看”的情况；有的搞低标准脱贫、突击式脱贫，甚至搞数字脱贫；还有的由争相“戴帽”变成盲目“摘帽”，有搞形式主义之嫌。这些问题必须引起高度重视，认真加以解决。&lt;/p&gt;&lt;p&gt;\r\n\t　　力戒形式主义。坚决打赢脱贫攻坚战，要增强忧患意识，强化问题导向，认真学习贯彻党的十九大精神，明确新时代打赢脱贫攻坚战的战略定位，坚持真抓实干，力戒形式主义，增强脱贫攻坚的责任与担当。在具体扶贫实践中，要牢固树立宗旨意识，从脱贫难点入手，从群众需要出发，沉下心来帮扶，切实提高扶贫成效。坚持在精准上持续用力，瞄准脱贫目标改进政策安排、工作部署和业绩考核等工作，坚决防止低标准脱贫、突击式脱贫，更不能搞数字脱贫、虚假脱贫等形式主义。完善干部扶贫政绩考核机制，改进扶贫督查工作，减少不必要的检查考评，强化监督问责，及时曝光反面典型，让搞形式主义的人付出代价。&lt;/p&gt;&lt;p&gt;\r\n\t　　激活内生动力。贫困群众是脱贫帮扶对象，也是脱贫致富主体，要唤醒他们的主体意识，充分调动其积极性主动性创造性，使其心热起来、手动起来，由“要我脱贫”向“我要脱贫”转变。只有把贫困群众主动脱贫的志气鼓起来，脱贫办法才会多起来。要通过劳动素质培养、职业技能培训、经营意识再造等方式，提升贫困群众的生产技能和竞争能力。引导社会力量投入脱贫攻坚战，优化扶贫政策措施，引导贫困群众树牢主体意识，发扬自力更生精神，增强改变贫困面貌的决心和信心。高效整合全社会资源，多方式、多渠道解决贫困群众脱贫致富问题。尤其要重视改善基层治理，完善驻村帮扶制度，激活贫困地区沉睡的资源，动员各方力量合力攻坚，构建外部多元扶贫与内部自我脱贫的互动机制，确保脱贫攻坚目标如期实现。&lt;/p&gt;&lt;p&gt;\r\n\t　　增强造血功能。过去，一些地方扶贫偏重于“输血”，简单采取救济等扶贫方式，一些贫困群众虽然暂时脱了贫，但返贫率较高。消除深度贫困，要勇于突破常规思维，创新扶贫思路，大力实施精准扶贫、精准脱贫，变“输血”为“造血”。精准扶贫既要精准施策，更要精准到户，找准对象拔“穷根”，明确靶向、量身定制、对症下药，真正帮到点上、扶到根上。精准扶贫不能仅仅“授之以鱼”，更要“授之以渔”。找准扶贫路子，完善体制机制，在精准施策上出实招、在精准推进上做实功、在精准落地上见实效；聚焦深度贫困地区和特殊贫困群体，突出问题导向，优化政策供给，下足绣花功夫；补齐产业扶贫短板，用足用活产业扶贫资金，积极探索资源变资产、资金变股金、农民变股东的发展模式，确保贫困群众脱真贫、真脱贫、不返贫。&lt;/p&gt;&lt;p&gt;\r\n\t　　（作者为安徽省中国特色社会主义理论体系研究中心特约研究员）&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','三言','','',5,1,1535016570,NULL,1,0,1,0,2,2);
/*!40000 ALTER TABLE `n_news` ENABLE KEYS */;

#
# Structure for table "n_news_cate"
#

DROP TABLE IF EXISTS `n_news_cate`;
CREATE TABLE `n_news_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '类别名称',
  `contents` text COMMENT '类别描述',
  `img` varchar(255) DEFAULT NULL COMMENT '类别图标',
  `ord` int(11) DEFAULT NULL COMMENT '排序',
  `status` tinyint(3) DEFAULT '1' COMMENT '1.启用 -1禁用',
  `group_id` int(11) DEFAULT NULL COMMENT '添加部门',
  `auid` int(11) DEFAULT NULL COMMENT '添加人',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `uptime` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='新闻类别表';

#
# Data for table "n_news_cate"
#

/*!40000 ALTER TABLE `n_news_cate` DISABLE KEYS */;
INSERT INTO `n_news_cate` VALUES (2,'国际新闻','','',0,1,1,1,1533300212,1534079982),(3,'国内新闻','','',0,1,1,1,1534670217,NULL),(4,'社会热点','','',0,1,1,1,1534670227,NULL),(5,'体育娱乐','','',0,1,1,1,1534670237,NULL),(6,'健康饮食','','',0,1,1,1,1534676817,NULL);
/*!40000 ALTER TABLE `n_news_cate` ENABLE KEYS */;

#
# Structure for table "n_news_img"
#

DROP TABLE IF EXISTS `n_news_img`;
CREATE TABLE `n_news_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL COMMENT '新闻id',
  `name` varchar(255) DEFAULT NULL COMMENT '图片名称',
  `contents` text COMMENT '图片描述',
  `main_img` varchar(255) DEFAULT NULL COMMENT '原图片图片',
  `img_one` varchar(255) DEFAULT NULL COMMENT '备用图片1',
  `ctime` int(11) DEFAULT NULL,
  `uptime` int(11) DEFAULT NULL,
  `ord` int(11) DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) DEFAULT '1' COMMENT '（保留字段）1. 启用 -1禁用',
  `group_id` int(11) DEFAULT NULL COMMENT '部门id',
  `auid` int(11) DEFAULT NULL COMMENT '添加人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='新闻图片集';

#
# Data for table "n_news_img"
#

/*!40000 ALTER TABLE `n_news_img` DISABLE KEYS */;
INSERT INTO `n_news_img` VALUES (1,1,NULL,NULL,'/uploads/webupload/20180812/b7aab53fdd74e621014dd3dbd7cef4e0.jpg',NULL,1534080143,NULL,0,1,1,1),(2,1,NULL,NULL,'/uploads/webupload/20180812/bf1fef8c407523998f72d02fce01401e.jpg',NULL,1534080144,NULL,0,1,1,1),(3,2,NULL,NULL,'/uploads/webupload/20180812/a68f0a5bc07b4ba2ca372b424e3b0866.jpg',NULL,1534080166,NULL,0,1,1,1),(4,2,NULL,NULL,'/uploads/webupload/20180812/b52e10a891ee4a05cf3e73910c8b8bb0.jpg',NULL,1534080167,NULL,0,1,1,1);
/*!40000 ALTER TABLE `n_news_img` ENABLE KEYS */;
