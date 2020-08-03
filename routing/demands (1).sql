-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 11:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc`
--

-- --------------------------------------------------------

--
-- Table structure for table `demands`
--

CREATE TABLE `demands` (
  `Hub_id` int(11) NOT NULL,
  `demand` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demands`
--

INSERT INTO `demands` (`Hub_id`, `demand`) VALUES
(1, 3.1608),
(2, 0.72),
(3, 1.81),
(4, 1.07),
(5, -2.45),
(6, 0.92),
(7, -2.04),
(8, -2.99),
(9, -1.77),
(10, -1.38),
(11, 1.95),
(12, -1.82),
(13, 0.62),
(14, -2.51),
(15, -2.49),
(16, -2.91),
(17, -0.27),
(18, -1.89),
(19, 2.49),
(20, 1.47),
(21, -0.16),
(22, 0.29),
(23, -0.43),
(24, -1.26),
(25, 1.71),
(26, 0),
(27, -0.96),
(28, -0.86),
(29, -0.07),
(30, -2.24),
(31, -1.26),
(32, 2.73),
(33, -2.69),
(34, 1.16),
(35, 2.73),
(36, 0.27),
(37, -2.64),
(38, -0.5),
(39, -1.26),
(40, -1.04),
(41, 2.23),
(42, -1.11),
(43, 1.01),
(44, 0.62),
(45, -1.38),
(46, -0.29),
(47, -1.73),
(48, 2.69),
(49, 0.48),
(50, -0.06),
(51, 1.89),
(52, 2),
(53, -0.97),
(54, 1.91),
(55, 0.23),
(56, -0.46),
(57, -1.12),
(58, 1.51),
(59, -0.22),
(60, -1.2),
(61, 2.65),
(62, -0.94),
(63, -1.96),
(64, 1.82),
(65, 2.51),
(66, -2.8),
(67, 0.06),
(68, -0.76),
(69, -2.3),
(70, -0.32),
(71, 0.81),
(72, 1.3),
(73, -2.86),
(74, 1.92),
(75, 1.12),
(76, 2.55),
(77, 0.03),
(78, 0.48),
(79, -0.58),
(80, 2.87),
(81, -1.51),
(82, 0.08),
(83, -0.71),
(84, -2.58),
(85, -1.21),
(86, -0.09),
(87, -0.95),
(88, 1.08),
(89, -0.15),
(90, -1.91),
(91, 0.42),
(92, -0.22),
(93, 0.61),
(94, -1.35),
(95, -2.43),
(96, -2.09),
(97, 1.25),
(98, -1.1),
(99, 0.82),
(100, 0.42),
(101, 0.71),
(102, 1.31),
(103, 0.01),
(104, -1.66),
(105, 2.01),
(106, 2.22),
(107, 2.31),
(108, -0.75),
(109, 0.17),
(110, -0.56),
(111, 0.23),
(112, 2.84),
(113, -0.63),
(114, -1.47),
(115, 2.67),
(116, 2.61),
(117, 2.54),
(118, -2),
(119, -0.34),
(120, 0.18),
(121, -1.11),
(122, -2.05),
(123, -0.93),
(124, 1.97),
(125, 2.11),
(126, -0.02),
(127, -2.89),
(128, -2.67),
(129, -0.47),
(130, 0.45),
(131, 0.69),
(132, 1.61),
(133, -2.25),
(134, 2.05),
(135, 2.27),
(136, -1.43),
(137, 0.63),
(138, -1.5),
(139, -1.98),
(140, 1),
(141, 0.03),
(142, 2.76),
(143, -0.2),
(144, -2.61),
(145, 2.33),
(146, -0.09),
(147, 1.89),
(148, -2.33),
(149, -0.33),
(150, 2.17),
(151, -0.35),
(152, -0.64),
(153, -0.52),
(154, 2.5),
(155, -2.84),
(156, 0.14),
(157, -2.81),
(158, 0.62),
(159, -0.83),
(160, 0.53),
(161, -1.39),
(162, -1.61),
(163, -1.4),
(164, 2.86),
(165, 0.54),
(166, 0.11),
(167, 1.26),
(168, 2.25),
(169, 2.12),
(170, 0.41),
(171, -2.06),
(172, 0.92),
(173, 0.92),
(174, 2.27),
(175, 0.93),
(176, -2.82),
(177, -2.92),
(178, -0.41),
(179, 0.78),
(180, -0.02),
(181, -0.25),
(182, 1.4),
(183, -1.92),
(184, -1.87),
(185, 1.84),
(186, -1.6),
(187, 0.14),
(188, 1.18),
(189, -0.67),
(190, 2.2),
(191, 2.21),
(192, -1.15),
(193, -1.72),
(194, -0.19),
(195, 1.62),
(196, 2.59),
(197, -0.14),
(198, -1.11),
(199, 1.23),
(200, -2.61),
(201, -2.09),
(202, 2.26),
(203, -2.35),
(204, -0.95),
(205, 0.98),
(206, -1.28),
(207, 2.71),
(208, 0.96),
(209, -2.48),
(210, 1.65),
(211, -2.38),
(212, 1.42),
(213, -2.97),
(214, -1.26),
(215, 2.22),
(216, 2.56),
(217, 0.58),
(218, -1.22),
(219, 2.17),
(220, -1.85),
(221, 1.25),
(222, 0.69),
(223, 1.7),
(224, -1.03),
(225, 2.35),
(226, 0.81),
(227, -0.9),
(228, -1.41),
(229, 0.3),
(230, -0.43),
(231, 0.07),
(232, 1.75),
(233, -0.96),
(234, -2.95),
(235, 1.01),
(236, -0.05),
(237, -2.37),
(238, 1.4),
(239, 1.57),
(240, 0.33),
(241, -2.55),
(242, -0.74),
(243, 2.78),
(244, -2.53),
(245, 0.13),
(246, -2.99),
(247, 0.47),
(248, 2),
(249, -1.46),
(250, 2.73),
(251, 1.63),
(252, 1.2),
(253, 2.08),
(254, -2.61),
(255, -1.65),
(256, -1.54),
(257, -0.19),
(258, 0.48),
(259, 0.75),
(260, 1.8),
(261, -2.28),
(262, -1.22),
(263, -0.24),
(264, 2.27),
(265, -2.24),
(266, -1.16),
(267, -2.79),
(268, 1.17),
(269, 1.01),
(270, 1.28),
(271, 0.95),
(272, 0.25),
(273, 2.92),
(274, -1.42),
(275, 0.19),
(276, 0.15),
(277, -1.97),
(278, 0.33),
(279, 0.3),
(280, -1.41),
(281, 0.04),
(282, 0.3),
(283, -0.9),
(284, 0.16),
(285, 1.52),
(286, -2.26),
(287, 0.95),
(288, 1.58),
(289, 1.86),
(290, -0.39),
(291, -0.19),
(292, 2.43),
(293, 0.4),
(294, 0.47),
(295, 1.61),
(296, 2.77),
(297, 2.29),
(298, -1.87),
(299, 0.54),
(300, 1.21),
(301, 2.43),
(302, 1.83),
(303, -1.42),
(304, -1.22),
(305, -0.84),
(306, 2.33),
(307, 0.54),
(308, 1.17),
(309, 1.47),
(310, 0.59),
(311, 0.62),
(312, 1.26),
(313, -2.75),
(314, -0.7),
(315, 0.71),
(316, 1.08),
(317, 0.91),
(318, -0.41),
(319, -2.41),
(320, -1.29),
(321, 2.56),
(322, -0.39),
(323, -1.81),
(324, -2.66),
(325, 0.3),
(326, 1.17),
(327, -1.81),
(328, 2.89),
(329, 2.8),
(330, -1.88),
(331, 1.04),
(332, -1.22),
(333, -0.67),
(334, -2.68),
(335, -1.03),
(336, -2.3),
(337, 1.61),
(338, 1.61),
(339, -0.47),
(340, -2.74),
(341, -1.29),
(342, 1.82),
(343, 0.18),
(344, 1.25),
(345, -0.78),
(346, -2.33),
(347, -0.03),
(348, 2.98),
(349, 1.12),
(350, -0.96),
(351, -1.75),
(352, -1.83),
(353, -0.8),
(354, -2.9),
(355, 2.54),
(356, 1.13),
(357, -1.86),
(358, -2.25),
(359, -2.63),
(360, 1.21),
(361, 1.95),
(362, 1.01),
(363, 2.96),
(364, -0.86),
(365, -0.32),
(366, -0.65),
(367, 1.2),
(368, 0.12),
(369, -2.09),
(370, -1.93),
(371, -1.31),
(372, 2.59),
(373, 2.83),
(374, 2.78),
(375, 0.1),
(376, -2.83),
(377, 0.25),
(378, 0.33),
(379, -2.72),
(380, 3),
(381, 0.55),
(382, -0.9),
(383, 2.53),
(384, 1.52),
(385, 2.21),
(386, 1.16),
(387, 1.41),
(388, -0.25),
(389, -1.94),
(390, 0.58),
(391, -2.84),
(392, 0.95),
(393, -0.26),
(394, -1.68),
(395, -1),
(396, 0.23),
(397, -0.86),
(398, 0.59),
(399, 0.98),
(400, -2.61),
(401, 2.13),
(402, -1.6),
(403, 1.36),
(404, 0.75),
(405, 1.77),
(406, 0.51),
(407, 2.73),
(408, -0.56),
(409, -0.74),
(410, 1.83),
(411, 1.86),
(412, -0.4),
(413, -0.7),
(414, -2.14),
(415, 2.06),
(416, 0.31),
(417, 1.51),
(418, -1.64),
(419, 0.88),
(420, 0.93),
(421, 1.74),
(422, 2.78),
(423, -0.2),
(424, -1.3),
(425, 1.88),
(426, -2.37),
(427, 0.64),
(428, 2.39),
(429, 0.03),
(430, 3),
(431, 1.1),
(432, 0.17),
(433, 2.44),
(434, 1.92),
(435, 2.6),
(436, -2.58),
(437, 0.07),
(438, -1.88),
(439, 2.33),
(440, -2.2),
(441, 0.68),
(442, -0.95),
(443, 1.4),
(444, -2.62),
(445, 1.52),
(446, 0.17),
(447, 1.6),
(448, -0.1),
(449, 0.01),
(450, -2.9),
(451, -1.49),
(452, -1.32),
(453, -0.16),
(454, 0.04),
(455, 0.14),
(456, 2.07),
(457, -1.58),
(458, -2.59),
(459, 2.73),
(460, 1.74),
(461, 1.44),
(462, -0.79),
(463, 2.13),
(464, 1.47),
(465, 0.62),
(466, -0.17),
(467, -1.63),
(468, -0.93),
(469, -1.14),
(470, 0.5),
(471, 0.05),
(472, -0.23),
(473, -1.14),
(474, -0.5),
(475, 0.46),
(476, -2.93),
(477, 2.9),
(478, -2.3),
(479, 0.31),
(480, 0.67),
(481, 0.26),
(482, 0.36),
(483, 1.71),
(484, 2.11),
(485, -1.92),
(486, -1.9),
(487, -1.84),
(488, -1.59),
(489, 0.17),
(490, -0.32),
(491, 2.55),
(492, 0.49),
(493, -2.25),
(494, -2.3),
(495, -1.16),
(496, -1.39),
(497, 1.29),
(498, -1.11),
(499, 2.44),
(500, 1.91),
(501, 2.75),
(502, -2.42),
(503, -2.13),
(504, 2.27),
(505, -2.63),
(506, 1.69),
(507, 1.84),
(508, -0.79),
(509, -1.71),
(510, -2.84),
(511, 1.74),
(512, -0.02),
(513, -1.37),
(514, 1.61),
(515, 0.45),
(516, -2.06),
(517, -0.56),
(518, -1.81),
(519, 1.33),
(520, 2.83),
(521, 0.6),
(522, -1.3),
(523, 0.11),
(524, -0.08),
(525, -1.97),
(526, 1.56),
(527, -0.87),
(528, 1.56),
(529, 2.16),
(530, -2.78),
(531, 0.13),
(532, 0.68),
(533, 0.12),
(534, -1.82),
(535, -0.7),
(536, -1.55),
(537, -2.43),
(538, 1.5),
(539, -1.23),
(540, 2.42),
(541, -1.1),
(542, 0.92),
(543, 2.06),
(544, -1.1),
(545, 0.55),
(546, -0.42),
(547, 0.41),
(548, 2.34),
(549, -2.43),
(550, -1.5),
(551, -1.46),
(552, -2.98),
(553, -0.68),
(554, 2.3),
(555, -0.1),
(556, -0.27),
(557, -2.37),
(558, -0.66),
(559, 1.47),
(560, 1.84),
(561, -1.99),
(562, 0.92),
(563, 0),
(564, 2.84),
(565, -1.06),
(566, -0.63),
(567, -0.06),
(568, -0.95),
(569, -0.41),
(570, 0.67),
(571, -0.25),
(572, -2.76),
(573, -1.44),
(574, -2.79),
(575, 0.7),
(576, 2.21),
(577, -1.47),
(578, 2.81),
(579, 0.83),
(580, -0.05),
(581, -1.08),
(582, 1.04),
(583, 0.47),
(584, -2.6),
(585, -2.27),
(586, -0.97),
(587, -2.82),
(588, -0.33),
(589, 1.46),
(590, 0.6),
(591, 0.45),
(592, 0.94),
(593, 1.45),
(594, -1.68),
(595, 0.82),
(596, 1.83),
(597, -2.65),
(598, 2.95),
(599, -2.77),
(600, 2.98),
(601, -0.61),
(602, 1.78),
(603, 2.72),
(604, -2.84),
(605, -0.58),
(606, -2.29),
(607, 1.37),
(608, 1.49),
(609, 0.85),
(610, -1.03),
(611, 1.87),
(612, -0.8),
(613, -0.77),
(614, -0.74),
(615, 2.24),
(616, 0.5),
(617, -1.59),
(618, -0.71),
(619, 0.75),
(620, -1.97),
(621, -0.43),
(622, -2.27),
(623, 0.94),
(624, -0.74),
(625, 2.11),
(626, -1.22),
(627, 2.19),
(628, -0.31),
(629, -1.98),
(630, 0.08),
(631, -0.31),
(632, -2.89),
(633, 2.73),
(634, -2.72),
(635, 2.52),
(636, 0.07),
(637, 0.52),
(638, -2.2),
(639, -2.6),
(640, -2.04),
(641, 2.34),
(642, -2.89),
(643, -2.42),
(644, 0.54),
(645, 2.9),
(646, -0.43),
(647, 0.57),
(648, -2.77),
(649, -1.63),
(650, 1.23),
(651, 0.54),
(652, -0.83),
(653, 2.14),
(654, -0.61),
(655, 2.86),
(656, 1.42),
(657, 2.51),
(658, 2.16),
(659, -2.26),
(660, -0.52),
(661, 0.8),
(662, 2.57),
(663, 0.73),
(664, 1.27),
(665, 0.68),
(666, -0.94),
(667, -1.9),
(668, 2.52),
(669, -0.83),
(670, 1.57),
(671, -1.34),
(672, 0.05),
(673, -2.53),
(674, 1.67),
(675, -0.43),
(676, 0.22),
(677, -0.15),
(678, -0.82),
(679, -1.14),
(680, -0.72),
(681, -0.04),
(682, -0.45),
(683, -1.41),
(684, 1.04),
(685, 1.06),
(686, -0.08),
(687, -2.25),
(688, 0.44),
(689, 1.7),
(690, 1.37),
(691, -0.12),
(692, 1.45),
(693, -1.14),
(694, 0.74),
(695, -0.3),
(696, -0.95),
(697, 2.41),
(698, -1.22),
(699, 0.71),
(700, -1.55),
(701, -1.25),
(702, -2.43),
(703, -3),
(704, 0.35),
(705, 2.17),
(706, -0.38),
(707, 0.63),
(708, -0.44),
(709, -0.19),
(710, 1.42),
(711, 2.03),
(712, -1.59),
(713, -0.51),
(714, -2.39),
(715, 2.25),
(716, 2.68),
(717, 2.46),
(718, 1.4),
(719, 0.82),
(720, -1.73),
(721, -1.57),
(722, 1.87),
(723, -2.2),
(724, 0.72),
(725, -1.6),
(726, -2.37),
(727, 2.58),
(728, -1.53),
(729, 2.64),
(730, 0.97),
(731, -0.34),
(732, 1.37),
(733, 1.59),
(734, -2.2),
(735, 1.02),
(736, -2.73),
(737, -2.87),
(738, -1.35),
(739, 0.43),
(740, 0.4),
(741, -0.53),
(742, -2.06),
(743, 0.15),
(744, 2.55),
(745, 1.49),
(746, 3),
(747, -0.31),
(748, -1.64),
(749, -0.28),
(750, -0.92),
(751, -0.49),
(752, -2.84),
(753, 2.16),
(754, -1.4),
(755, 1.89),
(756, -0.51),
(757, 2.92),
(758, -0.46),
(759, 2.42),
(760, 2.49),
(761, -1.93),
(762, 2.8),
(763, 0.68),
(764, 0.38),
(765, 0.51),
(766, 0.44),
(767, -2.9),
(768, -1.97),
(769, -1.66),
(770, -2.04),
(771, -0.97),
(772, -0.15),
(773, 0.14),
(774, 1.67),
(775, -1.44),
(776, -1.7),
(777, -2.4),
(778, 2.06),
(779, 2.19),
(780, 0.75),
(781, -0.59),
(782, 0.36),
(783, -1.19),
(784, 1.03),
(785, -1.61),
(786, 1.96),
(787, 1.41),
(788, 2.69),
(789, 1.41),
(790, -1.05),
(791, -2.66),
(792, -2.94),
(793, 0.52),
(794, 2.86),
(795, -2.19),
(796, 0.22),
(797, -1.81),
(798, 2.06),
(799, 1.36),
(800, -2.25),
(801, 1.84),
(802, -1.03),
(803, -2.27),
(804, 1.16),
(805, 0.57),
(806, -0.26),
(807, 0.28),
(808, 1.67),
(809, -2.75),
(810, -1.98),
(811, -1.33),
(812, 1.49),
(813, -1.9),
(814, 1.99),
(815, -1.82),
(816, 1.17),
(817, 0.03),
(818, 2.05),
(819, -2.42),
(820, 1.67),
(821, -1.44),
(822, -1.01),
(823, 1.85),
(824, 0.49),
(825, 0.19),
(826, 2.93),
(827, 1.7),
(828, -0.23),
(829, 1.51),
(830, -2.28),
(831, 1.64),
(832, -1.91),
(833, -0.63),
(834, 1.52),
(835, 1.07),
(836, -0.25),
(837, -2.82),
(838, 2.57),
(839, -2.83),
(840, -0.23),
(841, -1),
(842, -2.64),
(843, -0.24),
(844, -0.28),
(845, 1.36),
(846, 2.66),
(847, -0.6),
(848, 0.6),
(849, -0.3),
(850, -0.85),
(851, 1.06),
(852, -1.49),
(853, -1.3),
(854, -0.62),
(855, -2.21),
(856, -0.97),
(857, 1.45),
(858, 1.83),
(859, -2.38),
(860, 2.14),
(861, -0.19),
(862, -1.2),
(863, -0.05),
(864, -0.14),
(865, -2.14),
(866, -0.79),
(867, 1.93),
(868, -2.09),
(869, -1.39),
(870, -0.75),
(871, 1.87),
(872, -2.63),
(873, 1.35),
(874, 0),
(875, -2.79),
(876, 1.01),
(877, -0.79),
(878, 1.17),
(879, -1.13),
(880, 0.73),
(881, 2.99),
(882, 2.67),
(883, -1.6),
(884, 0.06),
(885, -0.54),
(886, -1.34),
(887, -2.93),
(888, 1.52),
(889, -1.15),
(890, -2.2),
(891, 0.17),
(892, -2.38),
(893, -2.97),
(894, -0.35),
(895, 1.31),
(896, -1.9),
(897, 2.43),
(898, -2.42),
(899, 2.19),
(900, -2.83),
(901, 1.5),
(902, 1.03),
(903, -0.32),
(904, -1.54),
(905, 0.3),
(906, 0.22),
(907, 2.78),
(908, -0.48),
(909, 1.74),
(910, -2.02),
(911, -2.73),
(912, -1.23),
(913, 1.79),
(914, -0.11),
(915, 0.07),
(916, -1.66),
(917, -0.03),
(918, -2.42),
(919, -2),
(920, 1.44),
(921, 1.1),
(922, -1.26),
(923, -0.11),
(924, 1.64),
(925, -0.82),
(926, 2.74),
(927, 1.37),
(928, -1.03),
(929, 0.53),
(930, -1.01),
(931, 1.47),
(932, -1.56),
(933, -0.63),
(934, 0.96),
(935, -0.12),
(936, -1.12),
(937, 0.18),
(938, 0.9),
(939, -1.17),
(940, -2.28),
(941, 2.64),
(942, -1.18),
(943, -2.11),
(944, -1.17),
(945, -0.79),
(946, -1.05),
(947, -0.57),
(948, 2.09),
(949, 2.85),
(950, 1.63),
(951, -0.34),
(952, 2.12),
(953, 2.48),
(954, 1.78),
(955, 2.29),
(956, 1.22),
(957, 2.17),
(958, -2.3),
(959, -1.36),
(960, -1.85),
(961, 0.29),
(962, -1.76),
(963, -1.72),
(964, -2),
(965, -0.11),
(966, 0.67),
(967, 1.17),
(968, 0.41),
(969, 2.68),
(970, 2.57),
(971, 2.57),
(972, 2.34),
(973, 2.18),
(974, 0.07),
(975, 0.22),
(976, -1.52),
(977, -2.71),
(978, 1.45),
(979, 2.77),
(980, 0.94),
(981, -0.55),
(982, 2.8),
(983, 2.35),
(984, -2.87),
(985, 1.33),
(986, 2.17),
(987, -0.92),
(988, -0.75),
(989, -2.84),
(990, -2.33),
(991, -0.66),
(992, -2.37),
(993, -0.93),
(994, 2.85),
(995, -0.96),
(996, 2.73),
(997, 0.54),
(998, 1.35),
(999, 0.18),
(1000, -0.45),
(1001, 0.97),
(1002, 2.88),
(1003, 1.88),
(1004, 2.21),
(1005, 0.26),
(1006, -0.02),
(1007, 0.48),
(1008, -2.22),
(1009, 2.67),
(1010, 1.31),
(1011, -1.94),
(1012, -0.85),
(1013, -1.19),
(1014, -2.2),
(1015, 2.71),
(1016, -0.07),
(1017, -2.06),
(1018, -0.55),
(1019, -0.98),
(1020, -2.28),
(1021, -2.71),
(1022, -0.87),
(1023, -0.37),
(1024, -1.25),
(1025, 2.47),
(1026, -1.62),
(1027, -1.67),
(1028, -1.67),
(1029, -0.93),
(1030, -1.07),
(1031, 2.25),
(1032, 1.28),
(1033, -0.35),
(1034, -2.45),
(1035, 2.11),
(1036, 1.39),
(1037, -2.42),
(1038, -0.69),
(1039, -2.7),
(1040, 0.12),
(1041, 0.57),
(1042, -1.19),
(1043, 2.57),
(1044, 1.97),
(1045, -0.67),
(1046, -1.15),
(1047, -1.09),
(1048, -1.85),
(1049, 1.88),
(1050, -2.51),
(1051, -1.5),
(1052, 1.44),
(1053, -2.56),
(1054, 2.52),
(1055, -1.63),
(1056, -0.56),
(1057, 1.2),
(1058, 0.6),
(1059, -0.91),
(1060, -0.37),
(1061, 1.27),
(1062, 0.16),
(1063, 2.61),
(1064, -1.2),
(1065, 1.38),
(1066, 0.89),
(1067, 1.95),
(1068, 0.21),
(1069, 0.83),
(1070, -0.99),
(1071, -0.54),
(1072, 1.59),
(1073, 0.06),
(1074, -2.42),
(1075, 2.78),
(1076, -1.44),
(1077, 1.39),
(1078, -0.5),
(1079, 2.18),
(1080, 2.98),
(1081, 2.28),
(1082, -0.33),
(1083, -1.84),
(1084, -2.42),
(1085, 2.42),
(1086, -1.85),
(1087, 2.32),
(1088, -0.2),
(1089, -2.28),
(1090, 0.18),
(1091, -2.78),
(1092, -0.24),
(1093, 2.33),
(1094, 0.82),
(1095, -2.22),
(1096, 1.82),
(1097, 2.94),
(1098, -2.72),
(1099, -0.52),
(1100, -0.07),
(1101, 1.79),
(1102, -0.9),
(1103, -1.07),
(1104, 0.68),
(1105, -0.6),
(1106, -1.99),
(1107, 1.47),
(1108, 1.6),
(1109, -1.96),
(1110, -2.96),
(1111, 1.11),
(1112, -0.93),
(1113, 2.59),
(1114, -2.88),
(1115, -2.27),
(1116, -1.02),
(1117, 2.22),
(1118, -2.66),
(1119, 0.26),
(1120, -1.15),
(1121, 1.18),
(1122, -2.71),
(1123, -0.69),
(1124, 1.42),
(1125, -0.23),
(1126, 0.21),
(1127, -1.58),
(1128, -2.13),
(1129, 1.25),
(1130, -2.9),
(1131, -2.63),
(1132, -2.19),
(1133, 1.62),
(1134, -1.77),
(1135, 2.74),
(1136, -1.56),
(1137, -1.67),
(1138, -0.76),
(1139, 1.41),
(1140, 2.83),
(1141, 1.51),
(1142, 2.33),
(1143, -1.44),
(1144, 2.41),
(1145, -1.01),
(1146, 2.56),
(1147, 2.75),
(1148, -0.59),
(1149, -0.08),
(1150, 0.55),
(1151, -1.07),
(1152, 2.19),
(1153, -2.38),
(1154, 0.7),
(1155, -1.83),
(1156, -0.47),
(1157, 2.32),
(1158, 2.5),
(1159, 0.1),
(1160, 0.07),
(1161, 1.08),
(1162, -1.48),
(1163, 2.85),
(1164, 0.61),
(1165, 0.01),
(1166, -0.04),
(1167, 0.31),
(1168, -0.52),
(1169, 2.82),
(1170, 2.23),
(1171, -0.26),
(1172, 0.63),
(1173, 1.88),
(1174, -1.81),
(1175, 1.55),
(1176, -1.04),
(1177, -2.9),
(1178, 0.79),
(1179, -2.66),
(1180, 1.5),
(1181, -2.89),
(1182, -0.81),
(1183, -0.99),
(1184, 2.4),
(1185, -0.47),
(1186, 2.72),
(1187, -2.97),
(1188, 1.25),
(1189, -2.35),
(1190, -2.56),
(1191, -2.47),
(1192, 2.12),
(1193, 0.34),
(1194, -1.79),
(1195, -0.25),
(1196, -0.27),
(1197, -0.95),
(1198, 0.97),
(1199, 0.2),
(1200, -2.84),
(1201, 2.96),
(1202, -0.76),
(1203, -1.26),
(1204, 1.8),
(1205, 1.88),
(1206, 2.75),
(1207, -2.02),
(1208, 0.94),
(1209, 1.09),
(1210, -1.8),
(1211, -2.23),
(1212, -0.73),
(1213, 1.85),
(1214, 0.95),
(1215, -1.71),
(1216, -2.65),
(1217, 2.43),
(1218, 1.62),
(1219, -1.26),
(1220, -0.01),
(1221, -1.63),
(1222, -2.08),
(1223, 2.93),
(1224, 1.14),
(1225, 0.15),
(1226, -0.34),
(1227, 0.19),
(1228, 1.71),
(1229, -1.44),
(1230, 0.25),
(1231, 0.85),
(1232, -1.38),
(1233, 2.57),
(1234, 2.86),
(1235, 2.42),
(1236, -0.24),
(1237, -1.53),
(1238, -2.17),
(1239, -2.01),
(1240, -0.54),
(1241, 0.2),
(1242, 0.44),
(1243, -1),
(1244, 0.99),
(1245, -1.68),
(1246, -0.85),
(1247, -0.98),
(1248, 2.48),
(1249, -1.27),
(1250, -2.21),
(1251, -1.99),
(1252, 0.8),
(1253, -1.22),
(1254, -1.88),
(1255, 1.31),
(1256, 2.71),
(1257, 2.41),
(1258, 3),
(1259, 0.55),
(1260, 0.45),
(1261, 1.02),
(1262, -0.81),
(1263, 2.76),
(1264, -1.57),
(1265, -0.07),
(1266, 0.84),
(1267, 0.04),
(1268, 0.29),
(1269, -0.22),
(1270, 2.16),
(1271, -2.23),
(1272, 2.26),
(1273, 1.88),
(1274, -1.96),
(1275, 1.03),
(1276, -1.03),
(1277, -2.74),
(1278, 2.33),
(1279, 1.35),
(1280, 0.18),
(1281, 2.35),
(1282, -1.97),
(1283, 2.94),
(1284, -2.44),
(1285, 0.3),
(1286, -2.9),
(1287, 1.51),
(1288, 3),
(1289, -2.79),
(1290, -0.92),
(1291, -2.21),
(1292, 2.49);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
