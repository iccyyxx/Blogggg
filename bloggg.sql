-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-12-03 14:01:46
-- 服务器版本： 10.4.21-MariaDB
-- PHP 版本： 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `bloggg`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `blog`
--

CREATE TABLE `blog` (
  `u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `b_title` varchar(100) NOT NULL,
  `b_content` text DEFAULT NULL,
  `b_likenum` int(11) DEFAULT NULL,
  `b_create_time` datetime DEFAULT NULL,
  `b_upate_time` datetime DEFAULT NULL,
  `b_sort` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `likeblog`
--

CREATE TABLE `likeblog` (
  `b_id` int(11) NOT NULL COMMENT '被点赞的博客',
  `u_id` int(11) NOT NULL COMMENT '点赞的人',
  `l_time` datetime DEFAULT NULL COMMENT '点赞的时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL COMMENT '昵称',
  `u_password` varchar(40) NOT NULL COMMENT '密码',
  `u_introduction` varchar(1000) DEFAULT NULL COMMENT '个人介绍',
  `u_blog_nums` int(11) DEFAULT 0 COMMENT '博客数量',
  `u_emali` varchar(100) NOT NULL COMMENT '邮箱',
  `u_tele` varchar(20) NOT NULL COMMENT '手机号码',
  `u_reg_time` datetime DEFAULT NULL COMMENT '注册时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_password`, `u_introduction`, `u_blog_nums`, `u_emali`, `u_tele`, `u_reg_time`) VALUES
(1, 'iccyyxx', '123456', '无敌可爱', NULL, '', '', '2021-12-03 13:57:58');

--
-- 转储表的索引
--

--
-- 表的索引 `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `blog_ibfk_1` (`u_id`);

--
-- 表的索引 `likeblog`
--
ALTER TABLE `likeblog`
  ADD KEY `b_id` (`b_id`),
  ADD KEY `u_id` (`u_id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `blog`
--
ALTER TABLE `blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 限制导出的表
--

--
-- 限制表 `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- 限制表 `likeblog`
--
ALTER TABLE `likeblog`
  ADD CONSTRAINT `likeblog_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `blog` (`b_id`),
  ADD CONSTRAINT `likeblog_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
