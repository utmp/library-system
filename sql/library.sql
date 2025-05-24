
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(111) NOT NULL,
  `username` varchar(111) NOT NULL,
  `fullname` varchar(111) NOT NULL,
  `adminemail` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `fullname`, `adminemail`, `password`, `pic`) VALUES
(1, 'admin', 'abdulaziz', 'abdulaziz368@gmail.com', 'admin', 'user2.png');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorid` int(111) NOT NULL,
  `authorname` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorid`, `authorname`) VALUES
(49, 'Frank Herbert'),
(11, 'Mark Lutz'),
(22,'J.K Rowling'),
(18, 'Jared Diamond'),
(19, 'Peter Frankopan'),
(20, 'James Clear'),
(21, 'J.R.R. Tolkien'),
(24, 'Samer Buna'),
(50,'Eric Mann'),
(29, 'Marc Loy');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(100) NOT NULL,
  `bookpic` varchar(500) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorid` int(100) NOT NULL,
  `categoryid` int(100) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `bookpic`, `bookname`, `authorid`, `categoryid`, `ISBN`, `price`, `quantity`, `status`) VALUES
(22, 'python.jpeg', 'Learning Python', 11, 2, '9781098171308', 60, 5, 'Available'),
(28, 'php.jpeg', 'Php Cookbook', 50, 2, '97818121327', 20, 8, 'Available'),
(27, 'nodejs.jpeg', 'Efficient Nodejs', 24, 2, '9781098121327', 20, 8, 'Available'),
(35, 'hobbit.png', 'The Hobbit', 21, 1, '21569', 60, 9, 'Available'),
(36, 'lotr.jpeg', 'Lord of The Rings', 21, 1, '21569', 45, 9, 'Available'),
(40, 'java.jpeg', 'Learning Java', 29, 2, '9781098145538', 29, 8, 'Available'),
(47, 'dune.jpeg', 'Dune', 49, 1, '21569', 150, 9, 'Available'),
(23, 'atomic-habits.jpg', 'Atomic Habits',20,3,'23459', 30,19,'Available'),
(24, 'silk-road.jpg', 'The Silk Road',19,4,'8934',18,23,'Available'),
(78, 'hp.jpeg','Harry Potter',22,1,'23456',11,33,'Available'),
(48, 'guns-germs-steel.jpg', 'Guns,Germs and Steel',18,4,'89784',19,32,'Available');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(111) NOT NULL,
  `categoryname` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`) VALUES
(1, 'Science FIction'),
(2, 'Computer Programming'),
(3, 'Personal development'),
(4, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `stdid` int(100) NOT NULL,
  `rating` int(100) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`stdid`, `rating`, `comment`, `date`) VALUES
(1, 5, 'I just love it', '2024-04-23'),
(3, 4, 'I just like it', '2024-04-23'),
(4, 3, 'It is awesome. Overall good', '2024-04-23'),
(1, 2, 'I dont like it', '2024-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `issueinfo`
--

CREATE TABLE `issueinfo` (
  `studentid` int(100) NOT NULL,
  `bookid` int(100) NOT NULL,
  `issuedate` date NOT NULL,
  `returndate` date NOT NULL,
  `approve` varchar(200) NOT NULL,
  `fine` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issueinfo`
--

INSERT INTO `issueinfo` (`studentid`, `bookid`, `issuedate`, `returndate`, `approve`, `fine`) VALUES
(3, 20, '0000-00-00', '0000-00-00', '', 0),
(1, 22, '2024-04-19', '2024-04-21', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', 20);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `username`, `message`, `status`, `sender`, `date`) VALUES
(2, 'Celal', 'hello', 'yes', 'student', '04/20/2025 Tuesday, 05:08 PM'),
(3, 'Celal', 'how are you??', 'yes', 'student', '04/20/2025 Tuesday, 05:08 PM'),
(4, 'Metin', 'I need a book. Can you help me??', 'yes', 'student', '04/23/2025 Friday, 12:27 PM'),
(5, 'Metin', 'Hello', 'no', 'admin', '04/23/2025 Friday, 12:58 PM'),
(6, 'Celal', 'hello', 'yes', 'student', '04/23/2025 Friday, 01:00 PM'),
(7, 'Metin', 'how are you', 'no', 'admin', '04/23/2025 Friday, 02:00 PM'),
(8, 'Celal', 'hello', 'yes', 'admin', '04/23/2025 Friday, 02:00 PM'),
(9, 'Celal', 'hello', 'yes', 'student', '04/23/2025 Friday, 02:01 PM'),
(10, 'Celal', 'how are you', 'yes', 'admin', '04/23/2025 Friday, 06:13 PM'),
(11, 'Celal', 'hello i need a book', 'yes', 'student', '04/23/2025 Friday, 07:02 PM'),
(12, 'Celal', 'hello', 'no', 'admin', '04/23/2025 Friday, 07:24 PM');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(111) NOT NULL,
  `student_username` varchar(111) NOT NULL,
  `FullName` varchar(111) NOT NULL,
  `Email` varchar(111) NOT NULL,
  `Password` varchar(111) NOT NULL,
  `PhoneNumber` varchar(111) NOT NULL,
  `studentpic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `student_username`, `FullName`, `Email`, `Password`, `PhoneNumber`, `studentpic`) VALUES
(1, 'Abdulaziz', 'Abdulaziz', 'tgxh@gmail.com', '12', '0152648790', 'Abdulaziz.jpg'),
(3, 'Celal', 'Celal', 'Celal237@gmail.com', '123456', '029833356373', 'celal.jpg'),
(4, 'Metin', 'Metin', 'metin@gmail.com', '123456', '4344654865769', 'Metin.png');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `stdid` int(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`stdid`, `bid`, `date`) VALUES
(1, 22, '2025-04-21 23:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `trendingbook`
--

CREATE TABLE `trendingbook` (
  `bookid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trendingbook`
--

INSERT INTO `trendingbook` (`bookid`) VALUES
(35),
(36),
(28),
(47),
(48);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorid`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorid` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;
