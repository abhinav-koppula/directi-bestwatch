-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 03:10 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bestwatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'action'),
(2, 'adventure'),
(3, 'animation'),
(4, 'comedy'),
(5, 'documentary'),
(6, 'drama'),
(7, 'fantasy'),
(8, 'horror'),
(9, 'mystery'),
(10, 'reality'),
(11, 'romance'),
(12, 'thriller');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'abhinav.koppula@gmail.com', '3907899c2061e09fbd680190690089b4'),
(2, 'nkmvicky@gmail.com', 'b585c4415b1fe50f2c31fa1698b271b7'),
(3, 'kvenkata@gmail.com', '1f20383838dc8688fbd142e7ec81f123'),
(5, 'ng2692@gmail.com', '350d89c1cd6592bbbd1ed2e8a4f3ddba'),
(8, 'abhikopu@gmail.com', NULL),
(9, 'padmaja@gmail.com', '3907899c2061e09fbd680190690089b4');

-- --------------------------------------------------------

--
-- Table structure for table `rating_show`
--

CREATE TABLE IF NOT EXISTS `rating_show` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `show_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rating_show`
--

INSERT INTO `rating_show` (`id`, `show_id`, `user_id`, `rating`) VALUES
(1, 3, 1, '4'),
(2, 4, 1, '4.5'),
(3, 23, 1, '4'),
(4, 4, 2, '5'),
(5, 3, 2, '2.5'),
(6, 23, 2, '1'),
(7, 1, 2, '5'),
(8, 1, 1, '2'),
(9, 13, 1, '5'),
(10, 10, 9, '2.5');

-- --------------------------------------------------------

--
-- Table structure for table `review_show`
--

CREATE TABLE IF NOT EXISTS `review_show` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `review` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `review_show`
--

INSERT INTO `review_show` (`id`, `author_id`, `show_id`, `review`) VALUES
(1, 1, 4, 'What''s amazing is how quickly it all falls into place--the show goes like a shot.'),
(2, 2, 4, 'There''s a real allure to costume-dramas that pair dense mythology with all of the crowd-pleasing elements of war, honor, pride, lust, power and, yes, even humor. Thrones has all of those in spades and supports them with exceptional storytelling, strong writing, superb acting and some stunning visual effects.'),
(3, 3, 4, 'Stick with it. Free your eyes to take in the spectacle, and your brain will magically start following the intricate storytelling. And there''s a magical realism to Game of Thrones.'),
(4, 5, 1, 'Vikings enthrallingly captures the world of Norsemen and oarsmen, circa 793 in the Eastern Baltic but soon heading West to England.'),
(5, 1, 1, 'While they are every bit as wild and woolly as the historical figures of Norse sagas, such is the power of Vikings that we come to know and even root for them, so enthralling are they and almost everything else here.'),
(6, 2, 1, 'History''s first scripted series is a headlong tumble into an irresistible and surprisingly neglected genre.'),
(7, 1, 2, 'Solid start to what could--and maybe should--be a future CW franchise.'),
(8, 2, 2, 'Your interest in Arrow depends on how much you miss the troubled-in-love, conflicted-by-family heroics of Smallville--it mirrors that series'' setup.'),
(9, 3, 2, 'The pilot of Arrow is a darkly gleaming gem. If the show can keep up its cinema-quality action sequences and maintain an air of mystery to Ollie''s agenda, this could be a really fun series.'),
(10, 1, 3, 'Slowly, a smartly constructed epic is taking shape.'),
(11, 2, 3, 'It is, flat out, one of the most intriguingly entertaining new series of the year, and it’s so much more than pure entertainment. For a sci-fi series, there’s some real heft to it.'),
(12, 3, 3, '[A] gritty, visceral, and emotionally engaging thriller.'),
(13, 5, 5, 'Lost is a sci-fi soap opera adventure -- with humor, mystery and interesting characters galore...It''s "Survivor" with the one thing "Survivor" lacks -- a terrific script.'),
(14, 3, 5, 'An intense, intriguing and exciting mix of action and horror. '),
(15, 2, 5, 'It''s safe to say you''ve not seen anything like it on network television. And not to put too fine a point on it, but the shock does wear off after a few minutes.'),
(16, 1, 6, 'We see promise in Tom Riley''s Leonardo da Vinci'),
(17, 2, 6, 'No one should base a term paper on it, but Da Vinci''s Demons is at least an entertaining lie.'),
(18, 3, 6, 'Da Vinci''s Deamons is exactly what i was expecting from David S. Goyer. It is one of the best seasons i have see. Cast is superb and they have shown the reality of that time''s Pope. I like it very much.'),
(19, 1, 8, 'A hilarious holiday package.'),
(20, 2, 8, 'The Simpsons" is both a challenge and a delight. It''s also that rarest of TV fauna, a cartoon show with levels of mirth for every brain and pair of eyes in the family.'),
(21, 3, 9, 'At its best, Friends operates like a first-rate Broadway farce, complete with slamming doors, twisty plots, and intricately strung together jokes. And even when it''s not at its best, the crack acting and piquant punchlines give Friends a momentum and charm that win you over even if you''re not laughing.'),
(22, 5, 9, 'The best new sitcom of the fall...It''s a very strong cast.'),
(23, 1, 9, 'Very Funny :D'),
(24, 1, 13, 'This show will keep you guessing and on the edge of your seat like no other. Especially every time it gets toward the end of a season, good lord. It really is the best show I''ve seen in years personally.'),
(25, 2, 13, 'Breaking Bad is a bit of a load, more weighted than wacky, and surprisingly predictable for a show whose main character is first discovered wearing a gas mask but no trousers.'),
(26, 3, 13, 'The acting is as good as you''ll see on TV (take a hard look at the genius of RJ Mitte, who really does have CP). And the script and plot are as out-there as creator/writer/producer Vince Gilligan''s other series, "The X-Files."'),
(27, 2, 14, 'The series'' grim tone and overall look of a grimy world in perpetual need of dusting or wiping is a long way from Buffy the Vampire Slayer and closer to Japanese movies like The Grudge.'),
(28, 3, 14, 'Padalecki and Ackles are hunky, funny and a joy to watch.'),
(29, 5, 14, 'It is a well-made little show of horrors that''s likely to scare and thrill its target audience.'),
(30, 1, 21, 'Tremendously clever fun, Masterpiece Mystery! presents the first of three modernizations of the Sherlock Holmes tales.'),
(31, 2, 21, 'The result is a sharp, funny, clever series that remains faithful to the spirit of Doyle''s stories while infusing them with a vibrant spirit of modernity.'),
(32, 3, 21, 'The appeal is elementary: good, unpretentious fun, something that''s in short supply around here.'),
(33, 5, 21, 'Sherlock is evidence that the BBC is the last remaining beacon of hope in a sea of mass-produced money driven TV shows which are nothing but the same old crap reskinned again and again. With each episode roughly the length of a film, Sherlock is an excellent take on some old stories, and with stellar acting to boot. Easily the best show currently on TV.'),
(34, 2, 19, 'Fantastic, fascinating, creepy, charming and gruesome.'),
(35, 1, 19, 'If you want edge, here''s Dexter. '),
(36, 3, 19, 'Sick, twisted and darkly funny, "Dexter" is easily the best drama in Showtime history.'),
(37, 2, 15, 'These killers are more fun than a cemetery full of psycho zombie killers on Halloween.'),
(38, 3, 15, 'There’s an engrossing moodiness to Mr. Williamson’s latest venture, but one he conveys without annulling the pact he long ago made with himself never to let his cheekiness go undetected.'),
(39, 1, 15, 'No, it''s not Twilight--but it''s not bad, either. The Vampire Diaries, The CW''s new fang-gang drama, successfully hitches the sanguinary sexuality of the vampire ethos to the in-group/out-group dynamic of the teen soap.'),
(40, 5, 2, 'Slow in the beginning but builds momentum with time.'),
(41, 1, 5, 'The plot is really wonderful.'),
(42, 5, 11, 'Cosmos unveiled the inner secrets of life and God'),
(43, 5, 11, 'Cosmos is one of the best documentaries ever created'),
(44, 8, 17, 'Really awesome performance by the lead actor'),
(45, 8, 16, 'Best Horror Series Ever'),
(46, 8, 16, 'Superb twists'),
(49, 1, 1, 'Test Review for Vikings.'),
(50, 9, 10, 'Hilarious to the core');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `name`, `poster`, `summary`) VALUES
(1, 'Vikings', 'vikings.jpg', 'The adventures of Ragnar Lothbrok: the greatest hero of his age. The series tells the saga of Ragnar''s band of Viking brothers and his family as he rises to become King of the Viking tribes. As well as being a fearless warrior, Ragnar embodies the Norse traditions of devotion to the gods: legend has it that he was a direct descendant of Odin, the god of war and warriors.'),
(2, 'Arrow', 'arrow.jpg', 'Spoiled billionaire playboy Oliver Queen is missing and presumed dead when his yacht is lost at sea. He returns five years later a changed man, determined to clean up the city as a hooded vigilante armed with a bow.'),
(3, 'Orphan Black', 'orphan_black.jpg', 'A streetwise hustler is pulled into a compelling conspiracy after witnessing the suicide of a girl who looks just like her.'),
(4, 'Game Of Thrones', 'game_of_thrones.jpg', 'Seven noble families fight for control of the mythical land of Westeros.'),
(5, 'LOST', 'lost.jpg', 'The survivors of a plane crash are forced to work together in order to survive on a seemingly deserted tropical island.'),
(6, 'Da Vinci''s Demons', 'da_vincis_demons.jpg', 'Da Vinci''s Demons is an American historical fantasy drama series that presents a fictional account of Leonardo da Vinci''s early life. The series was conceived by David S. Goyer and stars Tom Riley in the title role.'),
(7, 'Family Guy', 'family_guy.jpg', 'In a wacky Rhode Island town, a dysfunctional family strive to cope with everyday life as they are thrown from one crazy scenario to another.'),
(8, 'The Simpsons', 'the_simpsons.jpg', 'The satiric adventures of a working-class family in the misfit city of Springfield.'),
(9, 'Friends', 'friends.jpg', 'The lives, loves, and laughs of six young friends living in Manhattan.'),
(10, 'The Big Bang Theory', 'the_big_bang_theory.jpg', 'A woman who moves into an apartment across the hall from two brilliant but socially awkward physicists shows them how little they know about life outside of the laboratory.'),
(11, 'Cosmos', 'cosmos.jpg', 'A documentary series that explores how we discovered the laws of nature and found our coordinates in space and time.'),
(12, 'Mythbusters', 'mythbusters.jpg', 'A weekly documentary in which two Hollywood special effects experts attempt to debunk urban legends by directly testing them.'),
(13, 'Breaking Bad', 'breaking_bad.jpg', 'To provide for his family''s future after he is diagnosed with lung cancer, a chemistry genius turned high school teacher teams up with an ex-student to cook and sell the world''s purest crystal meth.'),
(14, 'Supernatural', 'supernatural.jpg', 'Two brothers follow their father''s footsteps as "hunters" fighting evil supernatural beings of many kinds including monsters, demons, and gods that roam the earth.'),
(15, 'The Vampire Diaries', 'the_vampire_diaries.jpg', 'A high school girl is torn between two vampire brothers.'),
(16, 'American Horror Story', 'american_horror_story.jpg', 'An anthology series that centers on different characters and locations, including a haunted house, an insane asylum, a witch coven and a freak show.'),
(17, 'Grimm', 'grimm.jpg', 'A homicide detective discovers he is a descendant of hunters who fight supernatural forces.'),
(18, 'True Detective', 'true_detective.jpg', 'The lives of two detectives, Rust Cohle and Martin Hart, become entangled during a 17-year hunt for a serial killer in Louisiana.'),
(19, 'Dexter', 'dexter.jpg', 'A Miami police forensics expert moonlights as a serial killer of criminals whom he believes have escaped justice.'),
(20, 'Castle', 'castle.jpg', 'After a serial killer imitates the plots of his novels, successful mystery novelist Richard "Rick" Castle gets permission from the Mayor of New York City to tag along with an NYPD homicide investigation team for research purposes.'),
(21, 'Sherlock', 'sherlock.jpg', 'A modern update finds the famous sleuth and his doctor partner solving crime in 21st century London.'),
(22, 'Survivor', 'survivor.jpg', 'A reality show where a group of contestants are stranded in a remote location with little more than the clothes on their back. The lone survivor of this contest takes home a million dollars.'),
(23, 'RuPaul''s Drag Race', 'rupauls_drag_race.jpg', 'RuPaul searches for America''s next drag superstar.');

-- --------------------------------------------------------

--
-- Table structure for table `shows_genres`
--

CREATE TABLE IF NOT EXISTS `shows_genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `show_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `shows_genres`
--

INSERT INTO `shows_genres` (`id`, `show_id`, `genre_id`) VALUES
(1, 1, 1),
(2, 1, 6),
(3, 2, 1),
(4, 2, 2),
(5, 2, 6),
(6, 2, 9),
(7, 3, 1),
(8, 3, 6),
(9, 4, 2),
(10, 4, 6),
(11, 4, 7),
(12, 5, 2),
(13, 5, 6),
(14, 5, 7),
(15, 5, 9),
(16, 5, 12),
(17, 6, 2),
(18, 6, 6),
(19, 6, 7),
(20, 6, 9),
(21, 7, 3),
(22, 7, 4),
(23, 8, 3),
(24, 8, 4),
(25, 9, 4),
(26, 9, 11),
(27, 10, 4),
(28, 11, 5),
(29, 12, 5),
(30, 13, 6),
(31, 13, 12),
(32, 14, 6),
(33, 14, 7),
(34, 14, 8),
(35, 14, 9),
(36, 14, 12),
(37, 15, 6),
(38, 15, 7),
(39, 15, 8),
(40, 15, 9),
(41, 15, 11),
(42, 15, 12),
(43, 16, 6),
(44, 16, 7),
(45, 16, 8),
(46, 16, 9),
(47, 16, 12),
(48, 17, 6),
(49, 17, 7),
(50, 17, 8),
(51, 17, 9),
(52, 18, 6),
(53, 18, 9),
(54, 19, 6),
(55, 19, 9),
(56, 19, 12),
(57, 20, 4),
(58, 20, 6),
(59, 20, 9),
(60, 21, 6),
(61, 21, 9),
(62, 22, 2),
(63, 22, 10),
(64, 23, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login_id`, `name`, `profile_pic`) VALUES
(1, 1, 'Abhinav Koppula', 'vlcsnap-729124.png'),
(2, 2, 'Nitin Kumar', 'Penguins.jpg'),
(3, 3, 'Venkat Kumar', 'avatar.jpg'),
(5, 5, 'Nikhil Gupta', 'avatar.jpg'),
(8, 8, 'Abh Kops', 'http://graph.facebook.com/475137309299469/picture?type=large'),
(9, 9, 'Padmaja', 'avatar.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;