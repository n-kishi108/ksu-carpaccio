-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 5 月 08 日 14:41
-- サーバのバージョン： 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpaccio`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `account`
--

CREATE TABLE `account` (
  `id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `background` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'ホーム画像',
  `icon` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'プロフィール画像',
  `color` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'テーマカラー',
  `follower` int(255) NOT NULL DEFAULT '0' COMMENT 'フォロワー',
  `message` varchar(1000) CHARACTER SET utf8 NOT NULL COMMENT '一言メッセージ',
  `postnum` int(255) NOT NULL DEFAULT '0' COMMENT '投稿数',
  `good` int(255) NOT NULL DEFAULT '0' COMMENT '高評価数',
  `bad` int(255) NOT NULL DEFAULT '0' COMMENT '程評価数'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `account`
--

INSERT INTO `account` (`id`, `password`, `username`, `background`, `icon`, `color`, `follower`, `message`, `postnum`, `good`, `bad`) VALUES
('root', 'root', 'root_account', '', '', '', 0, '', 0, 0, 0),
('admin', 'password', 'master_acount', '', '', '', 0, '', 0, 0, 0),
('ren', 'ren', 'ren', '', '', '', 0, '', 0, 0, 0),
('a', 'a', 'a', '', '', '', 0, '', 0, 0, 0),
('alexa', 'p', 'ã‚¢ãƒ¬ã‚¯ã‚µ', '', '', '', 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `classroom_information`
--

CREATE TABLE `classroom_information` (
  `classroom_key` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '科目キー',
  `classname` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '科目名',
  `time` int(6) NOT NULL COMMENT '何限目',
  `day` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '何曜日'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `comment`
--

CREATE TABLE `comment` (
  `user-id` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'ユーザid',
  `article-id` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '記事id',
  `comment` varchar(1000) CHARACTER SET utf8 NOT NULL COMMENT 'コメント本文',
  `comment_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '投稿日時',
  `good` int(255) NOT NULL DEFAULT '0' COMMENT 'コメントの高評価',
  `bad` int(255) NOT NULL DEFAULT '0' COMMENT 'コメントの低評価'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `comment`
--

INSERT INTO `comment` (`user-id`, `article-id`, `comment`, `comment_id`, `date`, `good`, `bad`) VALUES
('alexa', '201903280146305c9c19661cd6f', 'aaa', '', '2019-03-29 08:38:54', 21, 11),
('alexa', '201903280146305c9c19661cd6f', 'aaa', '', '2019-03-29 08:38:54', 21, 11),
('alexa', '201903280146305c9c19661cd6f', 'hugahuga', '', '2019-03-29 08:38:54', 21, 11),
('alexa', '201903280146305c9c19661cd6f', 'xxxxx', '', '2019-03-29 08:38:54', 21, 11),
('alexa', '201903280146305c9c19661cd6f', 'ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã£\r\nã»ã’ãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆãˆ', '', '2019-03-29 08:38:54', 21, 11),
('alexa', '201903280146305c9c19661cd6f', 'hoge', '', '2019-03-29 08:38:54', 21, 11),
('alexa', '201903280146305c9c19661cd6f', 'hogehoge\r\n', '', '2019-03-29 08:38:54', 21, 11),
('alexa', '201903280146305c9c19661cd6f', 'ã‚µãƒ³ãƒ—ãƒ«1', '201903301305205c9f5b800531f5c9f5b800532d', '2019-03-30 14:41:23', 19, 10),
('alexa', '201903280146305c9c19661cd6f', 'fufifkvhjvkj', '201903301522365c9f7bacae9c45c9f7bacae9ce', '2019-03-30 14:38:50', 23, 6),
('alexa', '201903280146305c9c19661cd6f', 'ggggggg', '201903310902395ca0660fdba935ca0660fdba9c', '2019-03-31 09:02:39', 8, 6),
('alexa', '201903280146305c9c19661cd6f', '', '201903310935545ca06ddade8705ca06ddade87a', '2019-03-31 09:35:54', 10, 3),
('admin', '201903280146305c9c19661cd6f', 'hoge', '201903310937405ca06e442d4585ca06e442d461', '2019-03-31 09:37:40', 23, 5),
('alexa', '201903280146305c9c19661cd6f', 'sample', '201904010231325ca15be42b6745ca15be42b67e', '2019-04-01 02:31:32', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'ãƒ˜ãƒãƒžï¼', '201904010234165ca15c888323c5ca15c8883247', '2019-04-01 02:34:16', 1, 0),
('alexa', '201903280146305c9c19661cd6f', 'è‡ªå‹•æ›´æ–°', '201904010542395ca188afc38b65ca188afc38c0', '2019-04-01 05:42:39', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'ãƒ¡ãƒ³ãƒˆã‚¹ã‚³ãƒ¼ãƒ©', '201904010556105ca18bdadc7b95ca18bdadc7c3', '2019-04-01 05:56:10', 0, 3),
('alexa', '201903280146305c9c19661cd6f', 'ä»¤å’Œ', '201904010734435ca1a2f31cdd85ca1a2f31cde2', '2019-04-01 07:34:43', 1, 4),
('alexa', '201903280146305c9c19661cd6f', 'foo bar', '201904011218535ca1e58d35d415ca1e58d35d4c', '2019-04-01 12:18:53', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'ã«ã‚ƒãƒ¼ã‚“', '201904011220455ca1e5fd8e5105ca1e5fd8e51a', '2019-04-01 12:20:45', 0, 1),
('alexa', '201903280146305c9c19661cd6f', 'new docs', '201904011221155ca1e61b9d03d5ca1e61b9d047', '2019-04-01 12:21:15', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'ãƒ¬ãƒ¬ã‚Œ', '201904011223045ca1e688495a75ca1e688495b1', '2019-04-01 12:23:04', 0, 0),
('admin', '201903280146305c9c19661cd6f', 'foo bar', '201904020659575ca2ec4d0f8725ca2ec4d0f87c', '2019-04-02 06:59:57', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'ã¬ãº', '201904020704555ca2ed77dbf285ca2ed77dbf33', '2019-04-02 07:04:55', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'ã½ã½ã½', '201904020706445ca2ede4b2a475ca2ede4b2a51', '2019-04-02 07:06:44', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'huga huga', '201904020708395ca2ee5784d295ca2ee5784d32', '2019-04-02 07:08:39', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'ãƒ‹ãƒƒãƒã‚§ã€‚', '201904020710105ca2eeb20a92e5ca2eeb20a939', '2019-04-02 07:10:10', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'ã‘ã‘ã‘', '201904020711415ca2ef0d33e7a5ca2ef0d33e84', '2019-04-02 07:11:41', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'ããŸã‚ã†', '201904020715175ca2efe528d0f5ca2efe528d19', '2019-04-02 07:15:17', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'aaa', '201904020717025ca2f04e134c75ca2f04e134d5', '2019-04-02 07:17:02', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'v', '201904020717155ca2f05b421195ca2f05b42124', '2019-04-02 07:17:15', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'ss', '201904020718155ca2f097408595ca2f09740864', '2019-04-02 07:18:15', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'a', '201904020718485ca2f0b8492715ca2f0b84927b', '2019-04-02 07:18:48', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'afgaf', '201904020718565ca2f0c053a045ca2f0c053a0b', '2019-04-02 07:18:56', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'aaa', '201904020719335ca2f0e5f03825ca2f0e5f038b', '2019-04-02 07:19:33', 1, 0),
('alexa', '201903280146305c9c19661cd6f', 'ã«ã‚ƒãƒ¼ã‚“', '201904020726525ca2f29c426de5ca2f29c426e8', '2019-04-02 07:26:52', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'fff', '201904020727475ca2f2d3d58995ca2f2d3d58a3', '2019-04-02 07:27:47', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'new dom', '201904020730475ca2f3879c9fa5ca2f3879ca05', '2019-04-02 07:30:47', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'commit!!', '201904020731225ca2f3aa7f24f5ca2f3aa7f256', '2019-04-02 07:31:22', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'we can do it', '201904020734225ca2f45eb150c5ca2f45eb1516', '2019-04-02 07:34:22', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'é˜ªæ€¥', '201904020735135ca2f4917f1a85ca2f4917f1b3', '2019-04-02 07:35:13', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'aaa', '201904020738145ca2f54682e335ca2f54682e3d', '2019-04-02 07:38:14', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'xxx', '201904020801575ca2fad5657665ca2fad565771', '2019-04-02 08:01:57', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'xxx', '201904020803275ca2fb2f683185ca2fb2f68322', '2019-04-02 08:03:27', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'hello carpaccio!', '201904020810055ca2fcbd8635c5ca2fcbd86366', '2019-04-02 08:10:05', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'hello tom!', '201904020810155ca2fcc7ab20b5ca2fcc7ab215', '2019-04-02 08:10:15', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'foo bar', '201904020811565ca2fd2c7b2515ca2fd2c7b25b', '2019-04-02 08:11:56', 0, 0),
('alexa', '201903280146305c9c19661cd6f', 'ä½ å¥½', '201904020812165ca2fd4055dd05ca2fd4055dda', '2019-04-02 08:12:16', 0, 0),
('admin', '', '', '201904021220045ca337547be005ca337547be0a', '2019-04-02 12:20:04', 0, 0),
('admin', '', '', '201904021220085ca337585c46f5ca337585c47a', '2019-04-02 12:20:08', 0, 0),
('admin', '', '', '201904021220095ca337593f81d5ca337593f827', '2019-04-02 12:20:09', 0, 0),
('admin', '', '', '201904021220095ca337599167d5ca3375991687', '2019-04-02 12:20:09', 0, 0),
('admin', '', '', '201904021220095ca33759e73565ca33759e7360', '2019-04-02 12:20:09', 0, 0),
('admin', '', '', '201904021220535ca337852fc235ca337852fc2d', '2019-04-02 12:20:53', 0, 0),
('admin', '', '', '201904021221095ca33795b7b4b5ca33795b7b56', '2019-04-02 12:21:09', 0, 0),
('admin', '', '', '201904021221125ca337986e2125ca337986e21c', '2019-04-02 12:21:12', 0, 0),
('admin', '', '', '201904021221135ca3379911a295ca3379911a34', '2019-04-02 12:21:13', 0, 0),
('admin', '', '', '201904021221135ca3379949ec75ca3379949ed1', '2019-04-02 12:21:13', 0, 0),
('admin', '', '', '201904021221395ca337b4002625ca337b40026c', '2019-04-02 12:21:39', 0, 0),
('admin', '', '', '201904021223575ca3383d963a35ca3383d963ad', '2019-04-02 12:23:57', 0, 0),
('admin', '', '', '201904021224405ca33868cba735ca33868cba7d', '2019-04-02 12:24:40', 0, 0),
('admin', '201903280146305c9c19661cd6f', '', '201904021225355ca3389f0c0675ca3389f0c071', '2019-04-02 12:25:35', 0, 0),
('admin', '201903280146305c9c19661cd6f', 'c', '201904021225515ca338af711565ca338af71160', '2019-04-02 12:25:51', 0, 0),
('admin', '201903280146305c9c19661cd6f', 'cxx', '201904021225595ca338b71c8785ca338b71c881', '2019-04-02 12:25:59', 0, 0),
('admin', '201903280146305c9c19661cd6f', 'a', '201904021227035ca338f75f5605ca338f75f56a', '2019-04-02 12:27:03', 0, 0),
('admin', '201903280146305c9c19661cd6f', 'a', '201904021227285ca3391033c645ca3391033c6e', '2019-04-02 12:27:28', 0, 0),
('admin', '201903280146305c9c19661cd6f', '', '201904021227305ca33912d0fb65ca33912d0fc0', '2019-04-02 12:27:30', 0, 0),
('admin', '201903280146305c9c19661cd6f', '', '201904021227315ca33913ad96b5ca33913ad974', '2019-04-02 12:27:31', 0, 0),
('admin', '201903280146305c9c19661cd6f', '', '201904021227325ca339140ce425ca339140ce4c', '2019-04-02 12:27:32', 0, 0),
('admin', '201903280146305c9c19661cd6f', '', '201904021227325ca33914439a55ca33914439af', '2019-04-02 12:27:32', 0, 0),
('admin', '201903280146305c9c19661cd6f', '', '201904021227325ca3391500cd75ca3391500ce1', '2019-04-02 12:27:32', 0, 0),
('admin', '201903280146305c9c19661cd6f', 'g', '201904021232585ca33a5ae4b4c5ca33a5ae4b56', '2019-04-02 12:32:58', 0, 0),
('admin', '201903280146305c9c19661cd6f', 'a', '201904021233515ca33a8f4882f5ca33a8f48839', '2019-04-02 12:33:51', 1, 1),
('admin', '201904030219005ca3fbf4616a3', 'hoge', '201904031405485ca4a19c3ea5b5ca4a19c3ea64', '2019-04-03 14:05:48', 1, 1),
('admin', '201903280146305c9c19661cd6f', 'n', '201904031408485ca4a2502fd7c5ca4a2502fd87', '2019-04-03 14:08:48', 0, 0),
('admin', '201903280146305c9c19661cd6f', 'ï£¿ä¿¡è€…', '201904081045285cab0a2842f925cab0a2842f9b', '2019-04-08 10:45:28', 2, 5),
('admin', '201904030219005ca3fbf4616a3', 'xxxx', '201904090727555cac2d5b0c22a5cac2d5b0c234', '2019-04-09 07:27:55', 9, 78),
('admin', '201903310950025ca0712a8bb74', 'hoge', '201904090946085cac4dc04fae55cac4dc04faef', '2019-04-09 09:46:08', 1, 1),
('admin', '201903310950025ca0712a8bb74', 'aaa', '201904091001475cac516bd2fef5cac516bd2ff9', '2019-04-09 10:01:47', 0, 3),
('admin', '201903280146305c9c19661cd6f', 'ddd', '201904110942185caeefdaeefdd5caeefdaeefe8', '2019-04-11 09:42:18', 0, 0),
('admin', '201903280146305c9c19661cd6f', '=============', '201904110942415caeeff132e055caeeff132e0f', '2019-04-11 09:42:41', 0, 0),
('admin', '201903280146305c9c19661cd6f', 'hjhjkh', '201904110944245caef058eb2655caef058eb26f', '2019-04-11 09:44:24', 7, 4),
('admin', '201904030219005ca3fbf4616a3', 'mm', '201904111118525caf067cbb89b5caf067cbb8a5', '2019-04-11 11:18:52', 5, 0),
('admin', '201904030219005ca3fbf4616a3', 'aaa', '201904120533415cb00715949885cb0071594992', '2019-04-12 05:33:41', 0, 0),
('admin', '201904030219005ca3fbf4616a3', '1', '201904120534065cb0072e3f3d55cb0072e3f3df', '2019-04-12 05:34:06', 0, 0),
('', '201904120825005cb02f3cca585', 'ã‚³ãƒ¡ãƒ³ãƒˆã§ã™ã€‚', '201905081309035cd2b8cf531715cd2b8cf5317b', '2019-05-08 13:09:03', 1, 5),
('', '201904120825005cb02f3cca585', 'ã«ã‚ƒã«ã‚ƒã«ã‚ƒ', '201905081309145cd2b8da3b93a5cd2b8da3b944', '2019-05-08 13:09:14', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `follow_relationship`
--

CREATE TABLE `follow_relationship` (
  `myself` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '自分のid',
  `opponent` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '相手のid',
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6) COMMENT '関係を築いた日時'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `history`
--

CREATE TABLE `history` (
  `user-id` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '誰が',
  `article-id` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'どの記事をみた',
  `last` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6) COMMENT '最後はいつ',
  `count` int(255) NOT NULL COMMENT '何回見た'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `history`
--

INSERT INTO `history` (`user-id`, `article-id`, `last`, `count`) VALUES
('admin', '201903280146305c9c19661cd6f', '2019-04-28 15:31:51.000000', 29),
('admin', '201903310950025ca0712a8bb74', '2019-04-09 12:26:37.000000', 16),
('admin', '201904030219005ca3fbf4616a3', '2019-04-12 14:58:21.000000', 52),
('admin', '', '2019-04-03 02:34:59.000000', 3),
('admin', '201904101057295cadaff9e3950', '2019-04-12 14:58:17.000000', 3),
('admin', '201904120825005cb02f3cca585', '2019-05-08 13:11:37.000000', 21),
('admin', '201904120825295cb02f5960a07', '2019-05-06 08:19:38.000000', 47),
('alexa', '201904120825295cb02f5960a07', '2019-04-12 15:02:27.000000', 1),
('', '201904120825295cb02f5960a07', '2019-04-13 12:29:37.000000', 4),
('', '201903280146305c9c19661cd6f', '2019-04-28 14:32:03.000000', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `post`
--

CREATE TABLE `post` (
  `id` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'id',
  `title` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'タイトル',
  `head` varchar(300) CHARACTER SET utf8 NOT NULL COMMENT '見出し',
  `article` varchar(1000) CHARACTER SET utf8 NOT NULL COMMENT '記事本文',
  `date` timestamp NULL DEFAULT NULL COMMENT '投稿時間を格納',
  `good` int(255) NOT NULL DEFAULT '0' COMMENT '高評価数',
  `bad` int(255) NOT NULL DEFAULT '0' COMMENT '低評価数',
  `article-id` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '記事id',
  `access` int(255) NOT NULL DEFAULT '0' COMMENT 'アクセスカウンタ'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `post`
--

INSERT INTO `post` (`id`, `title`, `head`, `article`, `date`, `good`, `bad`, `article-id`, `access`) VALUES
('admin', 'p', 'p', 'p', NULL, 0, 0, NULL, 0),
('admin', 'p', 'p', 'p', NULL, 0, 0, NULL, 0),
('admin', 'm', 'm', 'm', NULL, 0, 0, NULL, 0),
('admin', 'ã“ã‚ŒãŒã‚¿ã‚¤ãƒˆãƒ«', 'ã“ã‚ŒãŒè¦‹å‡ºã—', 'ã“ã‚ŒãŒæœ¬æ–‡', NULL, 0, 0, NULL, 0),
('admin', 'ã‚¿ã‚¤ãƒˆãƒ¬ã‚¦', 'ã‚ãŒ', 'ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚ã‚', NULL, 0, 0, NULL, 0),
('alexa', 'åˆæŠ•ç¨¿', 'åˆã‚ã¦ã®æŠ•ç¨¿ã§ã™', 'åˆæŠ•ç¨¿ã§ä½•ã‚’æ›¸ã„ã¦ã„ã„ã®ã‹ã‚ã‹ã‚Šã¾ã›ã‚“ã€‚', NULL, 0, 0, NULL, 0),
('alexa', 'åƒ•ã¯ã‚¢ãƒ¬ã‚¯ã‚µ', 'è‡ªå·±ç´¹ä»‹ã§ã™ã€‚', 'ã‚¢ãƒ¬ã‚¯ã‚µï¼ã¨å‘¼ã°ã‚ŒãŸã‚‰åå¿œã—ã¾ã™ã€', NULL, 0, 0, NULL, 0),
('admin', 'hgoe', 'ppp', 'pppp', NULL, 0, 0, NULL, 0),
('admin', 'ã‚ã‚ã‚', 'ã£ã£p', 'Hã”ãˆ', NULL, 0, 0, NULL, 0),
('admin', 'æœ€æ–°1', 'æ–°ã—ã„ã‚ˆ', 'æ–°ã—ã„ã‚“ã ã‚ˆ', '2019-03-25 00:00:00', 0, 0, NULL, 0),
('admin', 'aaa', 'aa', 'aaa', '2019-03-26 00:00:00', 0, 0, NULL, 0),
('alexa', 'foo', 'bar', 'hugahuga', '2019-03-28 00:00:00', 0, 0, '201903280146305c9c19661cd6f', 0),
('alexa', 'sample', 'sample', 'sample post article.', '2019-03-31 09:50:02', 0, 0, '201903310950025ca0712a8bb74', 0),
('admin', '[sample article data] git init to git merge.', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚é©å½“ãªæœ¬æ–‡ã€‚', '2019-04-03 02:19:00', 0, 0, '201904030219005ca3fbf4616a3', 0),
('admin', 'aaa', '', '', '2019-04-10 10:57:29', 0, 0, '201904101057295cadaff9e3950', 0),
('admin', 'xxx', '', 'aaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaa\r\n<code>public static void main()</code>\r\naaaaaaaa', '2019-04-12 08:25:00', 0, 0, '201904120825005cb02f3cca585', 0),
('admin', 'xxx', '', 'aaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaa\r\n<code><b>public static void main</b>()</code>\r\naaaaaaaa', '2019-04-12 08:25:29', 0, 0, '201904120825295cb02f5960a07', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `tags`
--

CREATE TABLE `tags` (
  `tag-id` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'タグid',
  `tagname` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'タグ名'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `tags_relationship`
--

CREATE TABLE `tags_relationship` (
  `article-id` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '記事id',
  `tags-id` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'タグid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `timestamp`
--

CREATE TABLE `timestamp` (
  `id` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'ユーザid',
  `day` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '曜日',
  `time` int(6) NOT NULL COMMENT '何限目',
  `classroom_key` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '科目キー'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `viewmode`
--

CREATE TABLE `viewmode` (
  `id` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'ユーザid',
  `mode` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '表示モード'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `viewmode`
--

INSERT INTO `viewmode` (`id`, `mode`) VALUES
('admin', 'nomal'),
('', 'short');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
