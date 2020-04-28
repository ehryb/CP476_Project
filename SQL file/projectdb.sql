-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 09:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `art_info`
--

CREATE TABLE `art_info` (
  `art_id` int(5) NOT NULL,
  `art_name` varchar(200) NOT NULL,
  `art_year` date NOT NULL,
  `art_artist` varchar(200) NOT NULL,
  `art_overview` varchar(1000) NOT NULL,
  `art_medium` varchar(200) NOT NULL,
  `art_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `art_info`
--

INSERT INTO `art_info` (`art_id`, `art_name`, `art_year`, `art_artist`, `art_overview`, `art_medium`, `art_image`) VALUES
(1, 'The Persistence of Memory', '1931-01-01', 'Salvador Dalí', 'Hard objects become inexplicably limp in this bleak and infinite dreamscape, while metal attracts ants like rotting flesh. Mastering what he called “the usual paralyzing tricks of eye-fooling,” Dalí painted with “the most imperialist fury of precision,” he said, but only “to systematize confusion and thus to help discredit completely the world of reality.” It is the classic Surrealist ambition, yet some literal reality is included, too: the distant golden cliffs are the coast of Catalonia, Dalí’s home.', 'Oil on canvas', 'https://cdn.britannica.com/10/182610-050-77811599/The-Persistence-of-Memory-canvas-collection-Salvador-1931.jpg'),
(2, 'The Starry Night', '1889-01-01', 'Vincent van Gogh', 'The Starry Night, a moderately abstract landscape painting of an expressive night sky over a small hillside village, one of Dutch artist Vincent van Gogh’s most celebrated works.', 'Oil on canvas', 'https://cdn.britannica.com/78/43678-050-F4DC8D93/Starry-Night-canvas-Vincent-van-Gogh-New-1889.jpg'),
(3, 'Nefertiti Bust', '0000-00-00', 'Thutmose', 'The Bust of Nefertiti, the Great Royal Wife of Egyptian Pharaoh Akhenaten. The work is believed to have been crafted in 1345 B.C. by Thutmose because it was found in his workshop in Amarna, Egypt. It is one of the most copied works of ancient Egypt. Nefertiti has become one of the most famous women of the ancient world and an icon of feminine beauty.', 'Painted stucco-coated limestone', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Nofretete_Neues_Museum.jpg/1200px-Nofretete_Neues_Museum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `art_reviews`
--

CREATE TABLE `art_reviews` (
  `review_id` int(10) NOT NULL,
  `art_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `review_score` int(10) NOT NULL,
  `review_content` varchar(1000) NOT NULL,
  `critic` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `art_reviews`
--

INSERT INTO `art_reviews` (`review_id`, `art_id`, `username`, `review_score`, `review_content`, `critic`) VALUES
(26175, 3, 'ancientart', 10, 'a coveted piece of our ancient ancestors', 1),
(26176, 1, 'artlover', 10, 'one of the most influenential works of modern history', 1),
(45782, 2, 'nytimes', 9, 'has and will continue to be one of the most copied works - its reach is wide', 1),
(240241, 1, 'emilyhryb', 8, 'one of my favourite modern art pieces', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie_reviews`
--

CREATE TABLE `movie_reviews` (
  `review_id` int(100) NOT NULL,
  `movie_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `review_score` int(10) NOT NULL,
  `review_content` varchar(1000) NOT NULL,
  `critic` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_reviews`
--

INSERT INTO `movie_reviews` (`review_id`, `movie_id`, `username`, `review_score`, `review_content`, `critic`) VALUES
(7820, 338762, 'johnsmith', 5, 'By the time our man/machine finds himself in the time-honored pickle of dangling by one hand from a ledge 50 stories above the ground, Bloodshot has already given us an action movie hangover.', 1),
(22291, 419704, 'janedoe', 7, 'Gray has a gift for shrinking massive set pieces and enlarging private dramas.', 1),
(40801, 419704, 'emilyhryb', 5, 'it was ok', 0),
(111251, 545609, 'mikebrown', 8, 'Extraction made me laugh and cry. Right here, right now, it\'s manna from the gods.', 1),
(456981, 668203, 'toddmayer', 1, 'What did we expect', 1);

-- --------------------------------------------------------

--
-- Table structure for table `music_reviews`
--

CREATE TABLE `music_reviews` (
  `music_id` varchar(250) DEFAULT NULL,
  `Reviewer` varchar(250) DEFAULT NULL,
  `Score` int(11) NOT NULL,
  `Review` longtext DEFAULT NULL,
  `Critic` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music_reviews`
--

INSERT INTO `music_reviews` (`music_id`, `Reviewer`, `Score`, `Review`, `Critic`) VALUES
('hotline+bling', 'Mojo', 8, 'Drake\'s genuinely fleet-footed flows and sly humour prevent his pained introspection descending into a cheesy whine fest. [Aug 2016, p.95]', 1),
('hotline+bling', 'The New York Times', 7, 'Overall, Views contains Drake’s most straightforward lyrics, and his emotional excavations aren’t as striking as they were a few years ago, when they had the sting of the new to them.', 1),
('hotline+bling', 'PopMatters', 6, 'It’s a disappointment for an artist who’s managed to get better and better with every subsequent release up until this point.', 1),
('hotline+bling', 'The New York Times', 7, 'Overall, Views contains Drake’s most straightforward lyrics, and his emotional excavations aren’t as striking as they were a few years ago, when they had the sting of the new to them.', 1),
('hotline+bling', 'jkoroth1', 6, 'Not his best work', 0),
('hotline+bling', 'jkoroth1', 6, '', 0),
('can%27t+feel+my+face', 'jkoroth1', 8, '', 0),
('mr.+brightside', 'jkoroth1', 7, '', 0),
('smells+like+teen+spirit', 'jkoroth1', 3, 'Not the best', 0),
('creep', 'jkoroth1', 3, 'Too depressin', 0),
('can%27t+feel+my+face', 'Pretty Much Amazing', 7, 'As good as these songs are, their lyrical monotony can be punishing', 1),
('can%27t+feel+my+face', 'The Independent (UK)', 6, 'Leaves one feeling just as estranged from Abel Tesfaye’s depraved character as previous releases boasting less adhesive tunes.', 1),
('can%27t+feel+my+face', 'The Line of Best Fit', 5, 'This is the same old monotonous Weeknd melancholy, only distilled through a huge pop filter. Which certainly makes it listenable, and a little bit nicer, but far from the innovative mainstream breakthrough album we were promised.', 1),
('can%27t+feel+my+face', 'dgranger14', 7, '', 0),
('hello', 'dgranger14', 7, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_info`
--

CREATE TABLE `restaurant_info` (
  `restaurant_id` int(5) NOT NULL,
  `restaurant_name` varchar(100) NOT NULL,
  `restaurant_location` varchar(200) NOT NULL,
  `cusine_type` varchar(100) NOT NULL,
  `restaurant_overview` varchar(1000) NOT NULL,
  `restaurant_image` varchar(1000) NOT NULL,
  `price_range` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_info`
--

INSERT INTO `restaurant_info` (`restaurant_id`, `restaurant_name`, `restaurant_location`, `cusine_type`, `restaurant_overview`, `restaurant_image`, `price_range`) VALUES
(1, 'Ki Modern Japanese + Bar', '181 Bay Street - Brookfield Place, Toronto, Ontario M5J 2T3, Canada', 'Sushi', 'ki modern Japanese & bar offers an interesting contemporary menu of Sushi, Japanese small plates, & fabulous shared entrees. A brilliant, cutting edge design incorporates a high profile bar & lounge area, 2 raised dining rooms & Toronto\'s most dynamic Sushi Bar. ki also offers 3 dramatic private dining areas for groups of 8 to 30 guests & an outdoor bar & patio space on 1 of Toronto\'s most influential streets.', 'https://images.otstatic.com/prod/24012707/1/medium.jpg', '$$$ (high)'),
(2, 'Bar Raval', '505 College St, Toronto, ON M6G 1A5', 'Spanish, Small Plates', 'A Barcelona-inspired pinxto bar with small plates to share and a variety of cocktails, beer, wine and fortifieds.', 'https://media.cntraveler.com/photos/5b22cabaf0cc9956e5adca3c/master/pass/Bar-Raval_36361674480_70a3ef47c9_o.jpg', '$$$ (high)'),
(3, 'Osteria Francescana', 'Via Stella, 22, 41121 Modena MO, Italy', 'Italian', 'Osteria Francescana is a restaurant owned and run by chef Massimo Bottura in Modena, Italy. As of 2018, Osteria Francescana has been named as the best restaurant in the world in The World\'s 50 Best Restaurants.', 'https://mewithmysuitcase.com/wp-content/uploads/2019/03/OsteriaFrancescana28529.jpg', '$$$ (high)');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_reviews`
--

CREATE TABLE `restaurant_reviews` (
  `review_id` int(10) NOT NULL,
  `restaurant_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `review_score` int(10) NOT NULL,
  `review_content` varchar(1000) NOT NULL,
  `critic` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_reviews`
--

INSERT INTO `restaurant_reviews` (`review_id`, `restaurant_id`, `username`, `review_score`, `review_content`, `critic`) VALUES
(22254, 2, 'foodie123', 6, 'fabulous decor, but the food was a little lacking', 1),
(36782, 1, 'chefzuko', 8, 'amazing vibe..and sushi!', 1),
(65519, 1, 'emilyhryb', 7, 'good food, but pretty expensive', 0),
(88563, 3, 'foodie123', 9, 'the most famous restaurant in the world is a well deserved title', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tech_info`
--

CREATE TABLE `tech_info` (
  `tech_id` int(5) NOT NULL,
  `tech_name` varchar(100) NOT NULL,
  `tech_company` varchar(200) NOT NULL,
  `tech_year` date NOT NULL,
  `tech_overview` varchar(1000) NOT NULL,
  `product_type` varchar(200) NOT NULL,
  `tech_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tech_info`
--

INSERT INTO `tech_info` (`tech_id`, `tech_name`, `tech_company`, `tech_year`, `tech_overview`, `product_type`, `tech_image`) VALUES
(1, 'Mavic 2 pro', 'DJI', '2018-01-01', 'See the bigger picture with the  Mavic 2 pro, it’s outstanding for aerial photography and capturing gorgeous shots in high resolution colour. The  Mavic 2 pro features obstacle sensors on all sides of the aircraft, to ensure safety of the aircraft.\r\nWhen youbuy Mavic 2 pro, you’re entering another world. Anything is possible with theMavic 2; conquering the sky. If you are looking for enterprise level droning check out theMavic 2 enterprise.', 'Drone', 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6262/6262621_sd.jpg'),
(2, 'Canon EOS Rebel T7 DSLR Camera', 'Canon', '2018-03-01', 'Enjoy new perspectives with the Canon offers the EOS Rebel T7 DSLR camera. From everyday pictures of your kids and pets to stunningly beautiful nature photographs, this camera and lens kit can easily handle all photographs. The full range of features makes this a perfect camera choice.', 'Camera', 'https://cdn.mos.cms.futurecdn.net/negQEjNRxEmpp6PAZg9EZn.jpg'),
(3, 'Nintendo Switch', 'Nintendo', '2017-03-03', 'The Nintendo Switch is a “hybrid” console that can be used at home on a TV, and also as a portable console similar to Nintendo’s Game Boy and DS lines. Players can change between the console’s home and portable configurations on the fly, too, hence the name “Switch.” Transitioning between these mode is remarkably simple, and the most you have to do for the Switch to register a screen change is press the L and R buttons simultaneously. Simply placing the Switch into its dock will turn the system on, and the default settings even allow the Switch to automatically turn on your TV.', 'Gaming System', 'https://gamespot1.cbsistatic.com/uploads/scale_landscape/1585/15853545/3646817-0118804226-95ADo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tech_reviews`
--

CREATE TABLE `tech_reviews` (
  `review_id` int(10) NOT NULL,
  `tech_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `review_score` int(10) NOT NULL,
  `review_content` varchar(1000) NOT NULL,
  `critic` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tech_reviews`
--

INSERT INTO `tech_reviews` (`review_id`, `tech_id`, `username`, `review_score`, `review_content`, `critic`) VALUES
(25617, 1, 'techmaster', 8, 'I love this product, its sleek and durable', 1),
(55124, 3, 'gamer123', 8, 'lets me use it anywhere, great for trips or large screens', 1),
(87821, 2, 'photogenius', 7, 'the portrait mode is beautiful but it struggles with action shots', 1),
(695039, 1, 'emilyhryb', 4, 'maybe i got a dud, but it broke within 2 days ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `UserName` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Pword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserName`, `FirstName`, `LastName`, `Email`, `Pword`) VALUES
('jkoroth1', 'Jay', 'Koroth', 'jayanth.koroth@somewhere.com', 'james12'),
('dgranger14', 'Danny', 'Granger', 'dgranger14@hotmail.com', 'okay123'),
('dgold15', 'Danny', 'Gold', 'dgold15@hotmail.com', 'okaybro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art_info`
--
ALTER TABLE `art_info`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `art_reviews`
--
ALTER TABLE `art_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `movie_reviews`
--
ALTER TABLE `movie_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `restaurant_reviews`
--
ALTER TABLE `restaurant_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tech_info`
--
ALTER TABLE `tech_info`
  ADD PRIMARY KEY (`tech_id`);

--
-- Indexes for table `tech_reviews`
--
ALTER TABLE `tech_reviews`
  ADD PRIMARY KEY (`review_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
