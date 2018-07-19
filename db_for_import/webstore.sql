-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 19 2018 г., 02:09
-- Версия сервера: 5.7.20-log
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webstore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `parent_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `parent_id`, `keywords`, `description`) VALUES
(1, 'Фигурки', 'figurki', 0, 'фигурки', 'Виниловые фигурки'),
(2, 'Брелки', 'brelki', 0, 'брелки', 'Виниловые брелки'),
(3, 'Кружки', 'krujki', 0, 'кружки', 'Тематические кружки'),
(4, 'Игры', 'games-figurki', 1, 'игры', 'Фигурки с персонажами из игр'),
(5, 'Мультфильмы', 'cartoons-figurki', 1, 'мультфильмы', 'Фигурки с персонажами из мультфильмов'),
(6, 'Сериалы', 'serials-figurki', 1, 'сериалы', 'Фигурки с персонажами из сериалов'),
(7, 'Фильмы', 'films-figurki', 1, 'фильмы', 'Фигурки с персонажами из фильмов'),
(8, 'DC', 'dc-brelki', 26, 'dc', 'Funko Pop Universe DC'),
(9, 'Harry Potter', 'harry-potter-brelki', 26, 'гарри поттер', 'Funko Pop Universe Harry Potter'),
(10, 'Marvel', 'marvel-brelki', 26, 'marvel', 'Funko Pop Universe Marvel'),
(13, 'DC', 'dc-krujki', 27, 'dc', 'Funko Pop Universe DC'),
(14, 'Star Wars', 'star-wars-krujki', 27, 'star wars', 'Funko Pop Universe Star Wars'),
(15, 'Overwatch', 'overwatch-figurki', 4, 'overwatch', 'Funko Pop Universe Overwatch'),
(16, 'Fallout', 'fallout-figurki', 4, 'fallout', 'Funko Pop Universe Fallout'),
(17, 'Disney', 'disney-figurki', 5, 'disney', 'Funko Pop Universe Disney'),
(18, 'Shrek', 'cartoon-shrek-figurki', 5, 'shrek', 'Funko Pop cartoon Shrek'),
(19, 'The secret life of pets', 'The-secret-life-of-pets-figurki', 5, 'the secret life of pets', 'Funko Pop cartoon The secret life of pets'),
(20, 'Doctor Who', 'doctor-who-figurki', 6, 'doctor who', 'Funko Pop Universe Doctor Who'),
(21, 'Stranger things', 'stranger-things-figurki', 6, 'stranger things', 'Funko Pop serial Stranger things'),
(22, 'The X-files', 'the-x-files-figurki', 6, 'the x-files', 'Funko Pop serial The X-files'),
(23, 'Harry Potter', 'harry-potter-figurki', 7, 'гарри поттер', 'Funko Pop Universe Harry Potter'),
(24, 'DC', 'dc-figurki', 7, 'dc', 'Funko Pop Universe DC'),
(25, 'Marvel', 'marvel-figurki', 7, 'marvel', 'Funko Pop Universe Marvel'),
(26, 'Фильмы', 'films-brelki', 2, 'брелок, герой фильма, Funky Pop', 'Брелки с героями фильмов Funky Pop'),
(27, 'Фильмы', 'films-krujki', 3, 'кружка, герой фильма, Funky Pop', 'Кружки с героями фильмов Funky Pop');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `product_id`, `img`) VALUES
(1, 1, 'LoganPop.jpg'),
(2, 1, 'LoganReal.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `modification`
--

CREATE TABLE `modification` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price_factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modification`
--

INSERT INTO `modification` (`id`, `product_id`, `title`, `price_factor`) VALUES
(1, 37, '(U.S.A. Original)', 1),
(2, 37, '(China)', 0.7),
(3, 38, '(U.S.A. Original)', 1),
(4, 38, '(China)', 0.7),
(5, 39, '(U.S.A. Original)', 1),
(6, 39, '(China)', 0.7),
(7, 40, '(U.S.A. Original)', 1),
(8, 40, '(China)', 0.7),
(9, 41, '(U.S.A. Original)', 1),
(10, 41, '(China)', 0.7),
(11, 42, '(U.S.A. Original)', 1),
(12, 42, '(China)', 0.7),
(13, 43, '(U.S.A. Original)', 1),
(14, 43, '(China)', 0.7),
(15, 44, '(U.S.A. Original)', 1),
(16, 44, '(China)', 0.7),
(17, 45, '(U.S.A. Original)', 1),
(18, 45, '(China)', 0.7),
(19, 46, '(U.S.A. Original)', 1),
(20, 46, '(China)', 0.7),
(21, 47, '(U.S.A. Original)', 1),
(22, 47, '(China)', 0.7),
(23, 48, '(U.S.A. Original)', 1),
(24, 48, '(China)', 0.7),
(25, 49, '(U.S.A. Original)', 1),
(26, 49, '(China)', 0.7),
(27, 50, '(U.S.A. Original)', 1),
(28, 50, '(China)', 0.7);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `date`, `update_at`, `note`) VALUES
(1, 8, 0, '2018-07-14 12:49:29', NULL, 'text'),
(2, 12, 0, '2018-07-18 19:43:35', NULL, ''),
(4, 12, 1, '2018-07-18 19:45:09', '2018-07-18 23:00:06', ''),
(5, 12, 0, '2018-07-18 19:45:33', NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `qty`, `title`, `price`) VALUES
(1, 1, 16, 1, 'Фигурка Десятый доктор - Doctor Who', 465),
(2, 2, 31, 1, 'Фигурка Уинстон - Overwatch', 465),
(3, 2, 45, 1, 'Брелок Халк - Hulk China', 108.5),
(4, 2, 23, 1, 'Фигурка Кот в сапогах - Shrek', 465),
(7, 4, 38, 1, 'Кружка Чубакка - Star Wars', 320),
(8, 4, 39, 1, 'Кружка Штормтрупер - Star Wars', 320),
(9, 5, 28, 1, 'Фигурка Алиса в стране чудес - Disney', 465),
(10, 5, 27, 5, 'Фигурка Русалочка - The Little Mermaid', 465);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `content` text,
  `price` float NOT NULL DEFAULT '0',
  `old_price` float NOT NULL DEFAULT '0',
  `publish` enum('0','1') NOT NULL DEFAULT '1',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
  `hit` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `alias`, `brand`, `content`, `price`, `old_price`, `publish`, `keywords`, `description`, `img`, `hit`) VALUES
(1, 25, 'Фигурка Логан-Росомаха - X-Man', 'logan-figurki', 'Marvel', 'Логан -  мутант, имеющий сверхчеловеческие способности. Он обладает регенерацией, которая позволяет ему выживать после тяжёлых ранений, смертельных для обычного человека. Большинство ядов и болезней также не могут убить и нанести тяжёлый вред здоровью Росомахи. Его способность также повышает выносливость и ловкость, обостряет его органы чувств, замедляет старение организма. Скелет Росомахи отличается от человеческого наличием шести лезвий, похожих на кинжалы и острых, как бритва. \r\n', 465, 0, '1', 'логан', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/3e09d6620fa699f9450f510ed5f6e541-full.jpg', '1'),
(2, 25, 'Фигурка Дэдпул', 'dedpul-figurki', 'Marvel', 'Дэдпул - бывший солдат спецназа, подрабатывающий наёмником в Нью-Йорке, подвергся мучительным экспериментам, в результате которых получил фантастическую способность к регенерации.', 465, 0, '1', 'дедпул', '', 'https://cdn1.savepice.ru/uploads/2018/6/14/33879b98ee446a638db8d4cc948c87a2-full.jpg', '0'),
(3, 25, 'Фигурка Человек-паук', 'spiderman-figurki', 'Marvel', 'Человек-паук - Питер Паркер был укушен радиоактивным пауком, в результате чего получил сверхспособности за счёт мутагенных ферментов в яде паука, приобретённых им после облучения.', 465, 0, '0', 'человек-паук, спайдермен', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/6d778c135f3ace6898afc379d409dbdb-full.jpg', '0'),
(4, 23, 'Фигурка Альбус Дамблдор - Harry Potter', 'albus-figurki', 'Harry Potter', 'Альбус Дамблдор - один из главных персонажей Поттерианы, профессор трансфигурации, директор Школы Чародейства и Волшебства «Хогвартс», кавалер ордена Мерлина первой степени, Великий волшебник, Верховный чародей Визенгамота, Президент Международной конфедерации магов. Известен как сильнейший волшебник своего времени. ', 465, 0, '1', 'albus, dumbldor', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/70cf05dd12cc2f0556342276c89f2317-full.jpg', '1'),
(5, 23, 'Фигурка Гарри Поттер (Limited edition) ', 'potter-figurki', 'Harry Potter', 'Гарри Поттер -  главный герой Поттерианы, одноклассник и лучший друг Рона Уизли и Гермионы Грейнджер, член Золотого Трио. Самый знаменитый студент Хогвартса за последние сто лет. Первый волшебник, которому удалось противостоять смертельному проклятью «Авада Кедавра», благодаря чему он стал знаменитым и получил прозвище «Мальчик, Который Выжил».', 500, 0, '1', 'Гарри, Поттер, Гарри Поттер ', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/b22484a350807cfd98b0649c1f9edbc2-full.jpg', '0'),
(6, 23, 'Фигурка Рон Уизли - Harry Potter', 'ron-figurki', 'Harry Potter', 'Рон Уизли - один из главных персонажей Поттерианы, друг и одноклассник Гарри Поттера и Гермионы Грейнджер, член Золотого Трио. Обладатель специальной награды Хогвартса «За заслуги перед школой», полученной в 1993 году за спасение школы от чудовища Тайной комнаты — василиска.', 465, 0, '1', 'Рон Уизли, Рон, Уизли', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/8e50580b6dd710b24121ecb99bb4df5a-full.jpg', '0'),
(7, 24, 'Фигурка Супермен - DC', 'superman-figurki', 'DC', 'Оригинальная история рассказывает, что Супермен появился на свет на планете Криптон и при рождении получил имя Кал-Эл. Ещё младенцем он был отправлен на Землю своим отцом-учёным Джор-Элом за несколько минут до уничтожения Криптона. Его нашла и приютила семья канзасского фермера. Земные родители дали ребёнку имя Кларк Кент. Ещё в раннем возрасте у мальчика проявились сверхчеловеческие способности, которые он решил применять на благо человечеству.\r\n', 465, 0, '1', 'Супермен, Кларк Кент', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/88396019e925e28ceeac0d7a24808586-full.jpg', '0'),
(8, 24, 'Фигурка Аквамен - DC', 'aquaman-figurki', 'DC', 'Аквамен может дышать под водой, телепатически общаться и управлять всеми формами морской жизни, а также плавать на больших скоростях. Также обладает сверхчеловеческими силой, скоростью, выносливостью и долголетием — всё это результат адаптации его тела для нахождения защищённым под огромным давлением океанских глубин.', 410, 465, '1', 'аквамен', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/2fd48f23a1baf4fccc16d30a832f8c84-full.jpg', '0'),
(9, 24, 'Фигурка Чудо-женщина - DC', 'wonderwoman-figurki', 'DC', 'Чудо-женщина - принцесса амазонок (основана на греческой мифологии), у себя на родине известна как Диана. Диана — опытная воительница, обладает сверхчеловеческой силой, скоростью, выносливостью, умеет общаться с животными, а также использует лассо Истины, с помощью которого может заставить говорить правду, и неразрушимые браслеты, которые служат в качестве защиты.', 465, 0, '1', 'чудо-женщина, амазонка', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/d881a9c11b9138854c4600fa6cef823b-full.jpg', '0'),
(10, 22, 'Фигурка Дана Скалли - The X-files', 'skalli-figurki', 'The X-files', 'Дана Скалли - специальный агент ФБР и доктор медицины с опытом работы в научной области. Долгое время работала в отделе секретных материалов.\r\n', 465, 0, '1', 'секретные материалы, дана, скалли, дана скалли', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/a4995caaa86d404aae8a944852250a2a-full.jpg', '0'),
(11, 22, 'Фигурка Фокс Малдер - The X-files', 'malder-figurki', 'The X-files', 'Фокс Малдер - специальный агент ФБР, работавший в отделе секретных материалов. Его нетрадиционные теории и методы расследования часто критиковались другими агентами.', 465, 0, '1', 'секретные материалы, фокс малдер, малдер, фокс', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/a9d9d7f0fc069f74eb2164265b554711-full.jpg', '0'),
(12, 21, 'Фигурка Одиннадцать - Stranger things', 'eleven-figurki', 'Stranger things', 'Одиннадцать - главная героиня сериала, обладает чрезвычайно сильными экстрасенсорными способностями.\r\n', 465, 0, '1', 'одиннадцать, странные дела', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/d3970bc5fa1d306672d87041c8fab862-full.jpg', '0'),
(13, 21, 'Фигурка Дастин - Stranger things ', 'dastin-figurki', 'Stranger things', 'Дастин - один из главных персонажей в сериале «Очень странные дела». Является лучшим другом Майка Уилера, Лукаса Синклера и Уилла Байерса.\r\n', 465, 0, '1', 'дастин, странные дела', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/454b17d831c374eb20f66a638950dcb9-full.jpg', '0'),
(14, 21, 'Фигурка Макс с доской - Stranger things', 'max-figurki', 'Stranger things', 'Макс - главная героиня сериала «Очень странные дела», которая появляется во втором сезоне.\r\n', 465, 0, '1', 'макс, странные дела', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/19c45891cad6e1f81be3508bc631fae0-full.jpg', '0'),
(15, 21, 'Фигурка Уилл - Stranger things', 'will-figurki', 'Stranger things', 'Уилл - один из главных героев сериала \"Очень странные дела\". Является лучшим другом Майка Уилера, Лукаса Синклера и Дастина Хендерсона.', 465, 0, '1', 'Уилл, странные дела', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/d07a09f898fbaa16f6e059a774e2b909-full.jpg', '0'),
(16, 20, 'Фигурка Десятый доктор - Doctor Who', 'doctor10-figurki', 'Doctor Who', 'Доктор — представитель внеземной расы Повелителей Времени с планеты Галлифрей, который при помощи пространственно-временного устройства ТАРДИС путешествует через время и пространство, часто со спутниками.', 465, 0, '1', 'доктор кто, девид теннант ', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/b549244784dc4d760f10d90c07c06b8e-full.jpg', '1'),
(17, 20, 'Фигурка Клара Освальд - Doctor Who', 'klara-figurki', 'Doctor Who', 'Клара Освальд - спутница Одиннадцатого и Двенадцатого Доктора. По словам Доктора, она была просто «невозможна».', 465, 0, '1', 'клара, клара освальд', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/d1ebab713ce47bb3246312ab9389dbf5-full.jpg', '0'),
(18, 20, 'Фигурка Четвертый доктор - Doctor Who', 'doctor4-figurki', 'Doctor Who', 'Доктор — представитель внеземной расы Повелителей Времени с планеты Галлифрей, который при помощи пространственно-временного устройства ТАРДИС путешествует через время и пространство, часто со спутниками.', 410, 465, '1', 'доктор кто, доктор', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/a99f77ab905c9ec683fcc170074426dc-full.jpg', '0'),
(19, 19, 'Фигурка Хлоя - The secret life of pets', 'khloe-figurki', 'The secret life of pets', 'Хлоя - игривая кошечка, которая очень любит поедать все подряд. Особенно ее тайной страстью являются торты с кремом и различные пирожные. ', 465, 0, '1', 'хлоя, тайная жизнь домашних питомцев', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/f85dae1c8448bf2988e2c15caa3f5b13-full.jpg', '0'),
(20, 19, 'Фигурка Снежок - The secret life of pets', 'Snowball-figurki', 'The secret life of pets', 'Снежок - белосежный кролик, но его внешний вид обманет любого. Он злой кролик с гадким характером.', 465, 0, '1', 'снежок, тайная жизнь домашних животных', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/1c6b9b94527b999efd4705cee62b80f9-full.jpg', '0'),
(21, 19, 'Фигурка Макс - The secret life of pets', 'maxpet-figurki', 'The secret life of pets', 'Макс - очень симпотичный, общительный и добрый песик, который очень любит свою хозяйку. У него бело-кофейная шерстка, а его задача развлекаться и радоваться каждый день.', 465, 0, '1', 'макс, тайная жизнь домашних питомцев', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/7e982a65bb1dfde18917d94f38f30f45-full.jpg', '0'),
(22, 18, 'Фигурка Шрек - Shrek', 'shrek-figurki', 'Shrek', 'Шрек - Центральный персонаж всего цикла мультфильмов. Это здоровенный зеленый огр, которого суеверные местные жители считают людоедом. Тем не менее, Шрек достаточно миролюбив. Правда, ему доставляет несказанное удовольствие процесс пугания окружающих. Великан следит за собой — принимает грязевые ванны, пьет «глазные» коктейли и чистит зубы гусеницами.', 465, 0, '1', 'шрек', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/121fc408d2c296927495a1e0f79f78a9-full.jpg', '0'),
(23, 18, 'Фигурка Кот в сапогах - Shrek', 'catinboots-figurki', 'Shrek', 'Кот в сапогах - Мечи пересекутся и сердца будут разбиты в приключениях с одним из самых любимых персонажей из Шрэка — котом в сапогах.', 465, 0, '1', 'кот в сапогах, шрек', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/1e612d932adc7c0aff8a5e7cea33d19d-full.jpg', '0'),
(24, 18, 'Фигурка Осел - Shrek', 'osel-figurki', 'Shrek', 'Осел - первый и самый лучший друг Шрека, муж Драконихи и отец Драконоосликов.', 465, 0, '1', 'осел, ослик, шрек', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/2d5bb97cc63ce9b94ab1d3e82144fc9c-full.jpg', '0'),
(25, 17, 'Фигурка Злая королева - Disney', 'evilqueen-figurki', 'Disney', 'Злая королева -  главная антагонистка первого полнометражного анимационного фильма студии Disney «Белоснежка и семь гномов», снятого в 1937 году по мотивам одноимённой сказки Братьев Гримм. Королева является официальной диснеевской злодейкой. Она также занимает двенадцатое место в списке «100 лучших героев и злодеев по версии AFI».', 465, 0, '1', 'злая королева, белоснежка, ведьма', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/703e54b8f6c1ea539f7bb68f8ac0eb3c-full.jpg', '1'),
(26, 17, 'Фигурка Джек - TNBC', 'Jack-figurki', 'Disney', 'Джек - Джек наделён мощными лидерскими и актёрскими способностями, а также безграничной фантазией. Он выглядит как высокий тощий скелет в чёрном похоронном фраке с растрёпанными фалдами.\r\n', 465, 0, '1', 'кошмар перед рождеством, джек, хэллоуин ', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/6f51e382d7aa161d1c474f3f595ada2d-full.jpg', '0'),
(27, 17, 'Фигурка Русалочка - The Little Mermaid', 'mermaid-figurki', 'Disney', 'Русалочка - главная героиня полнометражного мультфильма «Русалочка», снятого компанией Уолта Диснея в 1989 году, по мотивам сказки Ханса Кристиана Андерсена. Ариэль также является четвёртой принцессой Диснея и единственной не человеческого происхождения.\r\n', 465, 0, '1', 'ариэль, русалочка', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/5d253b5da5ba4481782e08317dedbed2-full.jpg', '0'),
(28, 17, 'Фигурка Алиса в стране чудес - Disney', 'alice-figurki', 'Disney', 'Алиса в стране чудес - главная героиня сказки, которой около семи лет. Считается, что прототипом образа протагонистки являлась подруга автора, Алиса Плезенс Лидделл, хотя сам Доджсон несколько раз упоминал, что образ его «маленькой героини» не был основан на реальном ребёнке и является полностью вымышленным.', 465, 0, '1', 'алиса, алиса в стране чудес', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/ff1d2e0edb62e512b4e11bdad6ad12ab-full.jpg', '0'),
(29, 17, 'Фигурка Черный плащ - Darkwing Duck', 'duck-figurki', 'Disney', 'Черный плащ - лавный персонаж диснеевского мультсериала «Чёрный Плащ». Чёрный Плащ — супергерой, который живёт в вымышленном городе Сен-Канар. Но в обычной жизни он вовсе не герой, а простой гражданин — Кряк Лапчатый.', 465, 0, '1', 'черный плащ, утиные истории', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/02c0b4f9d27cb4e231b13af660d4ff74-full.jpg', '1'),
(30, 15, 'Фигурка Мэй - Overwatch', 'mei-figurki', 'Overwatch', 'Мэй — настоящий ученый, и она решила взять в свои руки дело по спасению окружающей среды.\r\n', 465, 0, '1', 'мэй, овервотч', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/3e37ad526f30926fea5b1a4e35df7359-full.jpg', '0'),
(31, 15, 'Фигурка Уинстон - Overwatch', 'monkey-figurki', 'Overwatch', 'Уинстон - сверхразумная генетически модифицированная горилла, — блестящий ученый и великий гуманист.\r\n', 465, 0, '1', 'уинстон, овервотч', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/8552b464e50b0f9bd526c8f80d1aa86a-full.jpg', '1'),
(32, 15, 'Фигурка Роковая вдова - Overwatch', 'widow-figurki', 'Overwatch', 'Роковая вдова - идеальная убийца: терпеливая, безжалостная и эффективная, она не выказывает ни эмоций, ни сожалений.\r\n', 465, 0, '1', 'роковая вдова, вдова, овервотч', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/d349a9f821ce6e02c84d1645adbe3a74-full.jpg', '0'),
(33, 15, 'Фигурка Трейсер - Overwatch', 'treiser-figurki', 'Overwatch', 'Трейсер - Бывший агент Overwatch по прозвищу Трейсер беспрестанно скачет во времени и ищет, где бы еще сотворить добро.\r\n', 465, 0, '1', 'трейсер, овервотч', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/2a1cc3219c1ec4c9fcc672a3964f3c36-full.jpg', '0'),
(34, 16, 'Фигурка Волт Бой - Fallout', 'voltboy-figurki', 'Fallout', 'Fallout -  компьютерная ролевая игра, действие которой происходит в мире, пережившем ядерную войну. Игра, выпущенная в 1997 году компанией Interplay Entertainment.\r\n', 410, 465, '1', 'фэлоуаут, вольт бой', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/001323c7730a6d73447bb42a3dedf624-full.jpg', '0'),
(35, 16, 'Фигурка одинокий странник - Fallout', 'wanderer-figurki', 'Fallout', 'Fallout -  компьютерная ролевая игра, действие которой происходит в мире, пережившем ядерную войну. Игра, выпущенная в 1997 году компанией Interplay Entertainment.', 465, 0, '1', 'странник, фэлоутаут', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/65e1980baac7b709ecf34c889e94a694-full.jpg', '0'),
(36, 16, 'Фигурка Пайпер - Fallout', 'piper-figurki', 'Fallout', 'Fallout -  компьютерная ролевая игра, действие которой происходит в мире, пережившем ядерную войну. Игра, выпущенная в 1997 году компанией Interplay Entertainment.\r\n', 410, 465, '1', 'пайпер, фэлоуаут', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/93c67deb62e11996d1bf235438e9b23e-full.jpg', '0'),
(37, 14, 'Кружка Дарт Вейдер - Star Wars', 'dart-krujki', 'Star Wars', 'Дарт Вейдер - Энакин Скайуокер, после перехода на тёмную сторону Силы Дарт Вейдер.', 320, 0, '1', 'дарт вейдер, звездные войны', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/29d647a033f2868cbf75bc2a6dc78642-full.jpg', '1'),
(38, 14, 'Кружка Чубакка - Star Wars', 'chubakka-krujki', 'Star Wars', 'Чубакка -  мужчина, вуки родом с Кашиика. Он был вторым пилотом на корабле Хана Соло «Тысячелетнем соколе». Чубакка принимал участие в битвах на Кашиике, Эндоре и базе «Старкиллер».\r\n', 320, 0, '1', 'чубакка, звездные войны ', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/37c4103c84c9803784cebf11352ac22d-full.jpg', '0'),
(39, 14, 'Кружка Штормтрупер - Star Wars', 'stormtrooper-krujki', 'Star Wars', 'Штормтрупер - персонажи «Звёздных войн», элитные воины Галактической Империи. ', 320, 0, '1', 'звездные войны, войн, шторитруппер', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/041fdc98ff88e9c7f3c33bfd4afef8ef-full.jpg', '0'),
(40, 13, 'Кружка Супермен - Superman', 'superman-krujki', 'DC', 'Супермен - Оригинальная история рассказывает, что Супермен появился на свет на планете Криптон и при рождении получил имя Кал-Эл. Ещё младенцем он был отправлен на Землю своим отцом-учёным Джор-Элом за несколько минут до уничтожения Криптона. Его нашла и приютила семья канзасского фермера. Земные родители дали ребёнку имя Кларк Кент. Ещё в раннем возрасте у мальчика проявились сверхчеловеческие способности, которые он решил применять на благо человечеству.\r\n', 320, 0, '1', 'супермен, герой', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/f2c01fb41da3719eaafd907248969688-full.jpg', '0'),
(41, 13, 'Кружка Робин - Batman', 'robin-krujki', 'DC', 'Робин - псевдонимы нескольких персонажей комиксов о Бэтмене. Эти персонажи, как правило, являются напарниками Бэтмена.', 270, 320, '1', 'робин, бэтмен', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/215481709d1af21654bf3901e8d5fbed-full.jpg', '0'),
(42, 10, 'Брелок малыш Грут - Guardians of the Galaxy', 'groot-brelki', 'Marvel', 'Грут - член команды Стражи Галактики.Грут происходит из расы древоподобных существ с Планеты X. \r\n', 155, 0, '1', 'грут, стражи галактики', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/b92e18962e6b9ac8917cdbe745b6338a-full.jpg', '1'),
(43, 10, 'Брелок Локи - Thor', 'loki-brelki', 'Marvel', 'Локи - сын повелителя Йотунов Лафея. Вскоре после своего рождения Локи был брошен родным отцом на погибель. Найденный Асгардианским царем Одином, он был доставлен в Асгард и воспитывался им и его женой Фриггой как принц Асгарда, вместе с их родным сыном Тором. Когда он вырос, он стал известен как «Бог озорства».\r\n', 155, 0, '1', 'локи, марвел, тор', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/185914bc2907dee36c2c658e0ce54aa5-full.jpg', '0'),
(44, 10, 'Брелок Тор - Thor:Ragnarok', 'thor-brelki', 'Marvel', 'Тор - сын и наследник Одина, царя Асгарда. Он рос вместе со своим младшим братом Локи, не зная, что тот является приемным сыном. Тор и Локи воспитывались на историях Одина о прошлом, особенно на истории великой войны между асгардийцами и ётунами. В детстве Тор изо всех сил пытался показать отцу, что способен стать великим воином.', 170, 0, '1', 'тор, марвел', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/97988ee9758d288ed09896a1d46c02b5-full.jpg', '0'),
(45, 10, 'Брелок Халк - Hulk', 'hulk-brelki', 'Marvel', 'Халк - известный ученый в области биохимии, ядерной физики и гамма-излучения. После неудачного эксперимента по воссозданию сыворотки Супер-солдата с высоким уровнем гамма-излучения, Брюс мутировал в огромного разрушительного и почти безмозглого монстра с зелёной кожей, известного как Халк.', 155, 0, '1', 'халк, марвел, брюс ', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/cea0b2b128bc536c5cccb261244a5601-full.jpg', '0'),
(46, 9, 'Брелок Волан-де-Морт - Harry Potter', 'volandemort-brelki', 'Harry Potter', 'Волан-де-Морт - главный отрицательный персонаж в серии романов о Гарри Поттере; тёмный волшебник, обладающий огромной магической силой и практически достигший бессмертия при помощи чёрной магии, а точнее — с помощью Крестражей. В волшебном мире больше известен как Лорд Волан-де-Морт.', 155, 0, '1', 'воландеморт, волан де морт, волан-де-морт', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/5e9297925b4ce49b6235388897416c63-full.jpg', '0'),
(47, 9, 'Брелок Дементор - Harry Potter', 'dementor-brelki', 'Harry Potter', 'Дементор -слепые существа, которые питаются человеческими, преимущественно светлыми, эмоциями. В особых случаях, если предоставляется такая возможность, дементор высасывает душу человека, примыкая ко рту жертвы.', 120, 155, '1', 'дементор, гарри поттер', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/91ad16e1c9c95b576c45a4ea2942e6d7-full.jpg', '0'),
(48, 8, 'Брелок Бэтмен - Batman', 'batman-brelki', 'DC', 'Бетмен - тайное альтер-эго миллиардера Брюса Уэйна, успешного промышленника, филантропа и любимца женщин. В детстве, став свидетелем убийства своих родителей, Брюс поклялся посвятить свою жизнь искоренению преступности и борьбе за справедливость.\r\n', 155, 0, '1', 'бэтмен', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/cbd4db9e0fc438fc3e3ae3d4f46b9956-full.jpg', '0'),
(49, 8, 'Брелок Супермен - Superman', 'superman-brelki', 'DC', 'Супермен - Оригинальная история рассказывает, что Супермен появился на свет на планете Криптон и при рождении получил имя Кал-Эл. Ещё младенцем он был отправлен на Землю своим отцом-учёным Джор-Элом за несколько минут до уничтожения Криптона. Его нашла и приютила семья канзасского фермера. Земные родители дали ребёнку имя Кларк Кент. Ещё в раннем возрасте у мальчика проявились сверхчеловеческие способности, которые он решил применять на благо человечеству.', 155, 0, '1', 'супермен, кларк кент', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/ccdc7a499102de001bdfed3d1409782a-full.jpg', '0'),
(50, 8, 'Брелок Харли Квин - Batman', 'harleyqueen-brelki', 'DC', 'Харли Квин - суперзлодейка вселенной DC Comics, первоначально появившаяся в мультсериале «Бэтмен» 1992 года, позже была адаптирована в комиксы. Она является главной сподвижницей Джокера, по этой же причине ненавидит Бэтмена и его помощников.', 155, 0, '1', 'харли квин, джокер, бэтмен', NULL, 'https://cdn1.savepice.ru/uploads/2018/6/14/b25e3f00d1b01150a9d189481c8433f9-full.jpg', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `related_product`
--

CREATE TABLE `related_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `related_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `related_product`
--

INSERT INTO `related_product` (`product_id`, `related_id`) VALUES
(1, 2),
(1, 3),
(4, 5),
(4, 6),
(4, 46),
(4, 47),
(10, 11),
(11, 10),
(16, 17),
(16, 18),
(17, 16),
(17, 18),
(18, 16),
(18, 17),
(30, 31),
(30, 32),
(30, 33),
(31, 30),
(31, 32),
(31, 33),
(32, 30),
(32, 31),
(32, 33),
(33, 30),
(33, 31),
(33, 32),
(37, 38),
(37, 39),
(38, 37),
(38, 39),
(39, 37),
(39, 38),
(44, 3),
(44, 43),
(44, 45);

-- --------------------------------------------------------

--
-- Структура таблицы `universe`
--

CREATE TABLE `universe` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'brand_no_image.jpg',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `universe`
--

INSERT INTO `universe` (`id`, `title`, `alias`, `img`, `description`) VALUES
(1, 'Disney', 'disney', 'https://cdn1.savepice.ru/uploads/2018/6/14/74231ef9a9f4549a57dfa78fc41eac50-full.jpg', 'Мультяшные герои пробуждают теплые воспоминания'),
(2, 'Overwatch', 'overwatch', 'https://cdn1.savepice.ru/uploads/2018/6/14/eb96523e42bbc0eee3fc9dd50805ebc5-full.jpg', 'Современные герои вдохновляют на победы'),
(3, 'Harry Potter', 'harry-potter', 'https://cdn1.savepice.ru/uploads/2018/6/14/b6f7e5a2fe365ea65093d8b283956e66-full.jpg', 'Волшебные герои вселяют веру в чудеса');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `name`, `address`, `role`) VALUES
(1, 'goodkasper', '$2y$10$hSZKtpA3CBVzpVB.1RuGiOSqUEkOU7iSd8e/FXw./jqUaUt36Ydoy', 'admin@site.com', 'Vitaliy', 'some where', 'user'),
(2, 'man', '$2y$10$PJsS.oWgi.OaW5nAo1t9Mu8fcdSp7ueZdczl3t1hQETfrbMYLWqXW', 'mail1@gmail.com', 'name1', 'some where', 'user'),
(3, 'man2', '$2y$10$Qa7/nAMgY0IcptRJnMt.f.BdD9/cdQgiZud7Nt1eJ/bZ6SJILqghW', 'mail2@gmail.com', 'Олег', 'вулиця Василя Жуковського, 24', 'user'),
(4, 'man3', '$2y$10$c87U2moc1FZy7eyvhfZiw.QCZ0l2piIgfQYOyClETE6gujM7v0sdy', 'vit@gmail.com', 'Vitaliy', 'some where', 'user'),
(8, 'testwebstore2', '$2y$10$PEn/PmzEdRy3i7qfa4mJduCOaKUfirBN7DWwfFMLwKbGa7t.upcQ.', 'goodkasper13@gmail.com', 'Vitaliy', 'some where', 'user'),
(9, 'admin', '$2y$10$loXJcMYcLhe8Dp938F9neuuJzfUFcrIzvTB/OkBqz1zi6SaStGuhG', 'itdemidov@ukr.net', 'Виталий', 'Dnipro, Gusenko str. 4/6,', 'admin'),
(12, 'testuser13', '$2y$10$V07sYYgNX9Xz.61K.kBzZe9R9EW04Ws30Oy6.ZBnfLN9acvPAwlna', 'testuser13@i.ua', 'Karl', 'Lama\'s World', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `hit` (`hit`);

--
-- Индексы таблицы `related_product`
--
ALTER TABLE `related_product`
  ADD PRIMARY KEY (`product_id`,`related_id`);

--
-- Индексы таблицы `universe`
--
ALTER TABLE `universe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `modification`
--
ALTER TABLE `modification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `universe`
--
ALTER TABLE `universe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
