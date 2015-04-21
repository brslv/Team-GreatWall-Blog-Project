-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2015 at 10:15 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `great_wall_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Category one'),
(2, 'Category two');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `status`) VALUES
(1, 'About', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1),
(2, 'Contacts', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1),
(3, 'Projects', 'Some of my projects.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `excerpt` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `publish_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `excerpt`, `author_id`, `category_id`, `publish_date`, `status`) VALUES
(1, 'Lorem impsum...', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English.<strong> Many desktop publishing packages</strong> and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English.<strong> Many desktop publishing packages</strong> and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in the...', 1, 1, '2015-04-21', 1),
(2, 'Running the (half) marathon in North Korea', '<p>Last weekend I was one of 630 foreigners to participate in the 2015 Pyongyang Marathon. It was the second year the regime in North Korea opened the marathon to foreign amateur runners. When I read about it I knew that this was something I needed to do.</p>\r\n<p>I wanted to run this marathon for two reasons. For one it seemed to be the perfect excuse to make a trip to this country. I am a keen adventure traveler, having been to many exotic places such as Nepal, Mongolia, the Golden Triangle and the Tibetan Plateaux. I live in Beijing and have visited pretty much every country in Asia but, despite its proximity to China, I&rsquo;ve never made it to this outpost of society.</p>\r\n<p>The other reason I was drawn to visit North Korea is the constant exposure the country receives in the media. Kim Jung Un is in the news so much, I come across one or two articles about him or his country every week. I see photos of him constantly, either as part of a report or as part of a spoof. I felt it was about time to make my own picture of the country, of its people, and of the reality they live under.</p>', '<p>Last weekend I was one of 630 foreigners to participate in the 2015 Pyongyang Marathon. It was the second year the regime in North Korea opened the marathon to foreign amateur runners. When I read about it I knew that this was something I needed to do.</p>\r\n<p>I wanted to run this marathon for two reasons. For one it seemed to be the perfect excuse to make a trip to this country. I am a keen adventure traveler, having been to many exotic places such as Nepal, Mongolia, the Golden Triangle and...', 1, 1, '2015-04-21', 1),
(3, 'The state of storytelling in the internet age', '<p id="add2" class="graf--p graf--first"><a class="markup--anchor markup--p-anchor" href="http://www.usatoday.com/story/life/2015/04/13/serial-podcast-undisclosed/25501075/" rel="nofollow" data-href="http://www.usatoday.com/story/life/2015/04/13/serial-podcast-undisclosed/25501075/">Podcasts are blowing up</a>, great stories are reaching more people than ever, people are paying for content, and the modern web is giving the world a better platform to tell stories than the world has ever seen.</p>\r\n<p id="1f44" class="graf--p">But news divisions are still shrinking, great publications are still failing, local blogs are still shutting down, and <a class="markup--anchor markup--p-anchor" href="http://fusion.net/story/45832/to-all-the-young-journalists-asking-for-advice/" rel="nofollow" data-href="http://fusion.net/story/45832/to-all-the-young-journalists-asking-for-advice/">journalists are telling our youth to avoid the profession</a>.</p>\r\n<h3 id="eba3" class="graf--h4">The age of wisdom</h3>\r\n<p id="3982" class="graf--p graf--empty">&nbsp;</p>\r\n<p id="28ef" class="graf--p">We have the entire world&rsquo;s knowledge bank at our fingertips 24&ndash;7. If you ask me who the first American daredevil was, I can pull up <a class="markup--anchor markup--p-anchor" href="http://en.wikipedia.org/wiki/Sam_Patch" rel="nofollow" data-href="http://en.wikipedia.org/wiki/Sam_Patch">Sam Patch</a>&rsquo;s name in 5 seconds.</p>\r\n<p id="2ce1" class="graf--p">Fifty years ago the number of journalists whose work an individual could access on a daily basis was in the hundreds or thousands at best. Today it&rsquo;s in the tens of millions. A reporter for a local paper in Guam could write a story that gets read by ten thousand people in Auckland.</p>\r\n<h3 id="1e76" class="graf--p">Our access to knowledge and stories has never been greater, and it&rsquo;s growing every day.</h3>\r\n<h3 id="f380" class="graf--h4">The age of foolishness</h3>\r\n<p id="ebca" class="graf--p graf--empty">&nbsp;</p>\r\n<p id="2b12" class="graf--p graf--startsWithDoubleQuote">&ldquo;21 things only a 90s kid can appreciate&rdquo; will probably get 50 times more traffic than a post about climate change or political corruption.</p>\r\n<p id="a0f9" class="graf--p">Inflammatory or malicious stories on all sides of the political spectrum can take off just as easily as a viral listicle.</p>\r\n<p id="2434" class="graf--p">It&rsquo;s easier than ever to say something silly or foolish to your friends in an off-handed manner, and it&rsquo;s easier than ever <a class="markup--anchor markup--p-anchor" href="http://www.nytimes.com/2015/02/15/magazine/how-one-stupid-tweet-ruined-justine-saccos-life.html?_r=0" rel="nofollow" data-href="http://www.nytimes.com/2015/02/15/magazine/how-one-stupid-tweet-ruined-justine-saccos-life.html?_r=0">for that foolish thing to ruin your life</a>.</p>', '<p id="add2" class="graf--p graf--first"><a class="markup--anchor markup--p-anchor" href="http://www.usatoday.com/story/life/2015/04/13/serial-podcast-undisclosed/25501075/" rel="nofollow" data-href="http://www.usatoday.com/story/life/2015/04/13/serial-podcast-undisclosed/25501075/">Podcasts are blowing up</a>, great stories are reaching more people than ever, people are paying for content, and the modern web is giving the world a better platform to tell stories than the world has ever seen.</p>...', 1, 1, '2015-04-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`) VALUES
(2, 'ipsum'),
(1, 'lorem'),
(4, 'marathon'),
(3, 'medium'),
(5, 'storytelling');

-- --------------------------------------------------------

--
-- Table structure for table `taxonomy`
--

CREATE TABLE IF NOT EXISTS `taxonomy` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxonomy`
--

INSERT INTO `taxonomy` (`post_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 1),
(2, 4),
(3, 5),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `role` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `role`, `email`) VALUES
(1, 'admin', '$2y$10$NOJEXFa32r4MT6HhDiJnc.ij.tLCBB8puSjESpEYZK78LKUoB8B.C', 'Петко', 'Сертов', 'admin', 'petko@greece.com'),
(2, 'kilatamaika', '$2y$10$FjkwIeqXLqh3jhjyCWlcpuXGmBoCW8uzSvk9sLvOmXJ1EsRbt/Omy', 'Килата', 'Майка', 'user', 'kilata@maika.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
