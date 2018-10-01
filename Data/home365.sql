-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2018-10-01 16:24:20
-- 服务器版本： 5.5.53
-- PHP 版本： 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `home365`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `addtime` datetime NOT NULL,
  `logintime` datetime DEFAULT NULL,
  `loginip` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

--
-- 转存表中的数据 `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `addtime`, `logintime`, `loginip`) VALUES
(1, 'mr', '123456', '0000-00-00 00:00:00', '2018-10-01 19:03:31', '0.0.0.0');

-- --------------------------------------------------------

--
-- 表的结构 `tb_datalist`
--

CREATE TABLE `tb_datalist` (
  `id` int(11) NOT NULL,
  `title` char(255) DEFAULT NULL,
  `high_id` int(11) DEFAULT '0',
  `middle_id` int(11) DEFAULT '0',
  `elementary_id` int(11) DEFAULT '0',
  `href` varchar(255) DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  `is_recommend` tinyint(2) DEFAULT '0',
  `picture` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

--
-- 转存表中的数据 `tb_datalist`
--

INSERT INTO `tb_datalist` (`id`, `title`, `high_id`, `middle_id`, `elementary_id`, `href`, `is_hot`, `sort`, `is_recommend`, `picture`) VALUES
(4, '新浪微博', 10, 24, 2, 'https://www.sina.com.cn/', 1, 0, 1, NULL),
(5, '百度贴吧', 10, 24, 2, 'https://tieba.baidu.com/index.html', 0, 0, 0, NULL),
(6, '西虹市首富', 10, 16, 3, 'http://so.iqiyi.com/so/q_%E8%A5%BF%E8%99%B9%E5%B8%82%E9%A6%96%E5%AF%8C%E7%94%B5%E5%BD%B1?source=suggest&amp;sr=1111769416420s_sr=2&amp;s_token=main#xih', 0, 0, 0, NULL),
(7, '英雄联盟', 10, 18, 4, 'http://lol.qq.com/', 1, 1, 0, NULL),
(8, '绝地求生', 10, 18, 4, 'https://pubg.qq.com/', 1, 1, 1, NULL),
(9, '地下城与勇士', 10, 18, 4, 'http://dnf.qq.com/', 0, 1, 1, NULL),
(10, 'QQ飞车', 10, 18, 4, 'http://speed.qq.com/cp/a20180821syjzy/index.htm?ADTAG=yindaoye', 0, 1, 1, NULL),
(11, '天涯', 10, 24, 2, 'http://www.tianya.cn/', 0, 2, 1, NULL),
(12, '知乎', 10, 24, 2, 'https://www.zhihu.com/signup?next=%2F', 0, 2, 1, NULL),
(13, '人渣', 10, 18, 4, 'javascript:;', 0, 2, 1, NULL),
(14, '碟中谍5：神秘国度', 10, 16, 3, 'http://so.iqiyi.com/so/q_%E7%A2%9F%E4%B8%AD%E8%B0%8D5%EF%BC%9A%E7%A5%9E%E7%A7%98%E5%9B%BD%E5%BA%A6?source=suggest&amp;sr=680941828552s_sr=3&amp;s_token=main#?????????', 0, 1, 1, NULL),
(15, '动物世界', 10, 16, 3, 'https://www.iqiyi.com/v_19rr8u7dl4.html', 1, 0, 1, NULL),
(16, '命运石之门', 10, 20, 5, 'javascript:;', 0, 3, 1, NULL),
(17, '工作细胞', 10, 20, 5, 'javascript:;', 1, 3, 1, NULL),
(18, '杀戮天使', 10, 20, 5, 'javascript:;', 0, 3, 1, NULL),
(19, '头条新闻', 10, 33, 6, 'javascript:;', 1, 1, 1, NULL),
(20, '搜狐新闻', 10, 33, 6, 'javascript:;', 0, 3, 1, NULL),
(21, '新浪新闻', 10, 33, 6, 'javascript:;', 0, 3, 1, NULL),
(22, '坏球网', 10, 33, 6, 'javascript:;', 0, 3, 1, NULL),
(23, 'PPTV', 14, 34, 7, 'javascript:;', 0, 0, 1, NULL),
(24, '迅雷', 14, 34, 7, 'javascript:;', 0, 0, 1, NULL),
(25, '金山毒霸', 14, 34, 7, 'javascript:;', 0, 1, 1, NULL),
(26, '360安全卫士', 14, 34, 7, 'javascript:;', 1, 3, 1, NULL),
(27, '腾讯电脑管家', 14, 34, 7, 'javascript:;', 0, 3, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tb_elementary_level`
--

CREATE TABLE `tb_elementary_level` (
  `id` int(11) NOT NULL,
  `elementary_name` char(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `middle_id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

--
-- 转存表中的数据 `tb_elementary_level`
--

INSERT INTO `tb_elementary_level` (`id`, `elementary_name`, `sort`, `middle_id`) VALUES
(2, '交友网站', 0, 24),
(3, '热门电影', 0, 16),
(4, '热门游戏', 1, 18),
(5, '热门动漫', 1, 20),
(6, '知名新闻网站', 1, 33),
(7, '实用软件', 0, 34);

-- --------------------------------------------------------

--
-- 表的结构 `tb_high_level`
--

CREATE TABLE `tb_high_level` (
  `id` int(11) NOT NULL,
  `high_name` char(255) DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `layout` char(100) DEFAULT 'left',
  `sort` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

--
-- 转存表中的数据 `tb_high_level`
--

INSERT INTO `tb_high_level` (`id`, `high_name`, `is_display`, `layout`, `sort`) VALUES
(12, '其它', 1, 'left', 4),
(11, '地区网站', 1, 'left', 3),
(10, '休闲娱乐', 1, 'left', 2),
(13, '体育', 1, 'left', 5),
(9, '生活服务', 1, 'left', 1),
(14, '软件工具', 1, 'bottom', 2);

-- --------------------------------------------------------

--
-- 表的结构 `tb_hot`
--

CREATE TABLE `tb_hot` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `href` text NOT NULL,
  `type` tinyint(1) DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `is_recommend` tinyint(1) DEFAULT '0',
  `picture` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

--
-- 转存表中的数据 `tb_hot`
--

INSERT INTO `tb_hot` (`id`, `title`, `href`, `type`, `sort`, `is_recommend`, `picture`) VALUES
(2, '淘宝网', 'http://www.taobao.com/', 1, 1, 1, ''),
(3, '京东', 'https://www.jd.com', 1, 0, 0, ''),
(4, '新华网', 'http://www.xinhuanet.com/', 0, 1, 1, ''),
(5, '头条新闻', 'https://tuijian.hao123.com/', 0, 0, 0, ''),
(6, '搜狐', 'http://www.sohu.com/', 0, 0, 0, ''),
(7, '腾讯', 'http://www.qq.com/', 0, 0, 0, ''),
(8, '网易', 'https://www.163.com/', 0, 0, 0, ''),
(9, '58同城', 'https://nn.58.com/', 0, 1, 0, ''),
(10, '凤凰网', 'http://www.ifeng.com/', 0, 1, 0, ''),
(11, '苏宁易购', 'https://www.suning.com/', 0, 1, 1, ''),
(12, '爱奇艺', 'https://www.suning.com/', 0, 1, 1, ''),
(13, '优酷', 'http://www.youku.com/', 0, 2, 0, ''),
(16, '携程旅行', 'javascript:;', 1, 1, 1, ''),
(15, '亚马孙', 'javascript:;', 1, 0, 1, ''),
(17, '化妆品广告图片', 'javascript:;', 2, 0, 1, '2018-10-01/5bb23e4240b82.jpg'),
(18, '房地产广告图片', 'javascript:;', 2, 0, 0, '2018-10-01/5bb23e6b4e151.jpg'),
(19, '美食广告图片', 'javascript:;', 2, 1, 0, '2018-10-01/5bb23f087afa5.jpg'),
(24, '汽车广告图片', 'javascript:;', 2, 3, 0, '2018-10-02/5bb24735c0291.jpg'),
(21, '汽车广告图片', 'javascript:;', 2, 1, 0, '2018-10-01/5bb23eaabae30.jpg'),
(22, '招聘广告图片', 'javascript:;', 2, 1, 0, '2018-10-01/5bb23ecdbcd23.jpg'),
(23, '化妆品广告图片', 'javascript:;', 2, 2, 0, '2018-10-02/5bb2471cc71ee.jpg'),
(25, '化妆品广告图片', 'javascript:;', 2, 3, 0, '2018-10-02/5bb2474d366fa.jpg'),
(26, '房地产广告图片', 'javascript:;', 2, 3, 0, '2018-10-02/5bb24762b65d1.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `tb_middle_level`
--

CREATE TABLE `tb_middle_level` (
  `id` int(11) NOT NULL,
  `middle_name` char(255) DEFAULT NULL,
  `is_recommend` tinyint(1) DEFAULT '0',
  `sort` int(11) DEFAULT '0',
  `high_id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

--
-- 转存表中的数据 `tb_middle_level`
--

INSERT INTO `tb_middle_level` (`id`, `middle_name`, `is_recommend`, `sort`, `high_id`) VALUES
(2, '美食', 0, 1, 9),
(3, '彩票', 0, 1, 9),
(4, '查询', 0, 1, 9),
(8, '股票', 0, 1, 9),
(7, '天气', 0, 1, 9),
(10, '北京', 0, 3, 11),
(11, '上海', 0, 3, 11),
(12, '广东', 0, 3, 11),
(13, '湖北', 0, 3, 11),
(14, '安徽', 0, 3, 11),
(15, '武汉', 0, 3, 11),
(16, '电影', 1, 2, 10),
(17, '音乐', 0, 2, 10),
(18, '游戏', 1, 2, 10),
(19, '小说', 0, 2, 10),
(20, '动漫', 1, 2, 10),
(21, 'NBA', 0, 2, 10),
(22, '星座', 0, 2, 10),
(23, '图片', 0, 2, 10),
(24, '社交', 1, 2, 10),
(25, 'IT资讯', 0, 4, 12),
(26, '英语', 0, 4, 12),
(27, '法律', 0, 4, 12),
(28, '设计', 0, 4, 12),
(29, '房地产', 0, 4, 12),
(30, '足球', 0, 5, 13),
(31, '篮球', 0, 5, 13),
(32, '乒乓球', 0, 5, 13),
(33, '新闻', 1, 2, 10),
(34, '实用软件', 0, 0, 14);

--
-- 转储表的索引
--

--
-- 表的索引 `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_datalist`
--
ALTER TABLE `tb_datalist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_d_h` (`high_id`),
  ADD KEY `fk_d_m` (`middle_id`),
  ADD KEY `fk_d_e` (`elementary_id`);

--
-- 表的索引 `tb_elementary_level`
--
ALTER TABLE `tb_elementary_level`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_high_level`
--
ALTER TABLE `tb_high_level`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_hot`
--
ALTER TABLE `tb_hot`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_middle_level`
--
ALTER TABLE `tb_middle_level`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `tb_datalist`
--
ALTER TABLE `tb_datalist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用表AUTO_INCREMENT `tb_elementary_level`
--
ALTER TABLE `tb_elementary_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `tb_high_level`
--
ALTER TABLE `tb_high_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用表AUTO_INCREMENT `tb_hot`
--
ALTER TABLE `tb_hot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用表AUTO_INCREMENT `tb_middle_level`
--
ALTER TABLE `tb_middle_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
