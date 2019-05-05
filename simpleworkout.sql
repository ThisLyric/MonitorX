DROP DATABASE IF EXISTS simpleworkout;
CREATE DATABASE simpleworkout;
USE simpleworkout;

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Nutrition'),
(2, 'Accessories'),
(3, 'Men Clothing'),
(4, 'Women Clothing'),
(5, 'Dietary Needs');

 CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signUpDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

 CREATE TABLE `admin` (
   `adminid` int(11) NOT NULL,
   `name`     varchar(50) NOT NULL,
   `username` varchar(50) NOT NULL,
   `email` varchar(50) NOT NULL,
   `password` varchar(50) NOT NULL,
   `trn_date` datetime NOT NULL
 );

 CREATE TABLE `orders` (
   `order_amount` float NOT NULL,
   `order_date` datetime NOT NULL,
   `user_id` int(11) NOT NULL,
   `product_id` int(11) NOT NULL,
   `product_quantity` int(11) NOT NULL,
   FOREIGN KEY (product_id) REFERENCES products(product_id)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

 CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`) VALUES
(1,'Brown Rice Protein',1,30,10,'High-quality protein sourced from brown rice, it’s ideal when on a plant-based diet — with 80% protein content, it’s perfect for all sports and training goals.','High-quality protein sourced from brown rice, it’s ideal when on a plant-based diet — with 80% protein content, it’s perfect for all sports and training goals.','Brown Rice Protein.png'),
(2,'Calcium Caseinate Protein',1,30,10,'Our Calcium Caseinate is 100% pure spray-dried milk protein derived from fresh skimmed milk – and at 80% protein, it’s great for getting the protein you need each and every day.

This slow-digesting protein is also low in fat and sodium, while providing your body with key nutrients such as calcium and glutamine.','Our Calcium Caseinate is 100% pure spray-dried milk protein derived from fresh skimmed milk – and at 80% protein, it’s great for getting the protein you need each and every day.

This slow-digesting protein is also low in fat and sodium, while providing your body with key nutrients such as calcium and glutamine.','Calcium Caseinate Protein.png'),
(3,'Hydrolysed Why Protein',1,30,10,'Hydrolyzed whey is a form of protein created in a unique way that can speed up its absorption into your body — while keeping the essential amino acids intact and delivering a high-quality protein. Whatever your workout goals, Hydrolyzed Whey Protein is the ideal support.','Hydrolyzed whey is a form of protein created in a unique way that can speed up its absorption into your body — while keeping the essential amino acids intact and delivering a high-quality protein. Whatever your workout goals, Hydrolyzed Whey Protein is the ideal support.','Hydrolysed Why Protein.png'),
(4,'Impact Native Whey 95',1,30,10,'Premium whey isolate packed with 27g of protein per serving, giving you the protein you need from a quality source — the same cows that produce your milk and cheese. It’s made directly from milk to produce great-tasting, all-natural nutritionals.','Premium whey isolate packed with 27g of protein per serving, giving you the protein you need from a quality source — the same cows that produce your milk and cheese. It’s made directly from milk to produce great-tasting, all-natural nutritionals.','Impact Native Whey 95.png'),
(5,'Impact Protein Blend',1,30,10,'Get the best of both worlds with the latest addition to our leading range of protein powders, consisting of a unique blend of our bestsellers – Impact Whey and Impact Whey Isolate.','Get the best of both worlds with the latest addition to our leading range of protein powders, consisting of a unique blend of our bestsellers – Impact Whey and Impact Whey Isolate.','Impact Protein Blend.png'),
(6,'Vegan Blend',1,30,10,'It’s a great source of BCAAs, too. Your body can’t create these essential amino acids, so must be supplemented. They naturally occur in protein which helps to build and repair new muscle,1 so are a must-have for your training schedule. We’ve also added DigeZyme®: a natural enzyme complex that works as a digestion aid, with more protease that any other on the market.','Completely free from dairy, this all-natural blend is packed with essential amino acids and over 21g protein per serving for people training on a plant-based diet. With pea protein isolate and brown rice protein, our Vegan blend is a high-protein shake created to help achieve your fitness goals.','Vegan Blend.png'),
(7,'2 Pack Crew Socks',3,8,10,'Lightweight, comfortable and built to last– the perfect choice whether hitting the gym or doing your own thing.
Fabric: 63% cotton / 33% polyester / 2% nylon / 2% elastane','Lightweight, comfortable and built to last– the perfect choice whether hitting the gym or doing your own thing.','2 Pack Crew Socks.png'),
(8,'Form Jogger',3,35,10,'Tailor your training in our Form Joggers, with a slim-fit and lightweight stretch materials that support your session, whatever the season.','Tailor your training in our Form Joggers, with a slim-fit and lightweight stretch materials that support your session, whatever the season.','Form Jogger.png'),
(9,'Form Sweat Shorts',3,25,10,'Tailor your training in our Form Shorts, with a relaxed fit and lightweight stretch materials that support your session, whatever the season.','Tailor your training in our Form Shorts, with a relaxed fit and lightweight stretch materials that support your session, whatever the season.','Form Sweat Shorts.png'),
(10,'Logo Joggers',3,12,10,'The Original Joggers are designed using loop-back fleece fabric with a stylish tapered fit for lasting, lightweight comfort.

Featuring a classic slim-fit with an elasticated waistband and cuffs, and completed with bold branding – we’re turning up the heat on this season’s look.

The Originals are our new and improved sweats range, based on our best-selling slim-fit clothing. Crafted with loop-back, lightweight fleece material, it’s a collection of strong staples to complete any gym kit.','The Original Joggers are designed using loop-back fleece fabric with a stylish tapered fit for lasting, lightweight comfort.','Logo Joggers.png'),
(11,'Sprint Shorts',3,26,10,'Let your body breathe through every lunge, jump, and lift in our Sprint Shorts, with woven-stretch fabric and laser-cut side panels to always keep you moving.','Let your body breathe through every lunge, jump, and lift in our Sprint Shorts, with woven-stretch fabric and laser-cut side panels to always keep you moving.','Sprint Shorts.png'),
(12,'The Original Sweat Shorts',3,15,10,'Feel-good fit and lightweight comfort, our Original Shorts are a must have for your gym-kit as well as your rest days.','Feel-good fit and lightweight comfort, our Original Shorts are a must have for your gym-kit as well as your rest days.','The Original Sweat Shorts.png'),
(13,'Classic Heartbeat Full',4,14,10,'Our Heartbeat Leggings are back, in a classic look and feel.

These full-length leggings are crafted using super-soft yarns, with a supportive high-rise waist for maximum comfort. The best-selling design features sculpted seams to contour your booty, while staying totally squat-proof.','Our Heartbeat Leggings are back, in a classic look and feel.','Classic Heartbeat Full.png'),
(14,'Inspire Seamless Leggings',4,26,10,'With soft-touch, stretchy fabric to set your workout free, Inspire is fitted to your form with figure-enhancing style lines.','With soft-touch, stretchy fabric to set your workout free, Inspire is fitted to your form with figure-enhancing style lines.','Inspire Seamless Leggings.png'),
(15,'Luxe Lounge Boyfriend Joggers',4,32,10,'With super-soft cotton and a relaxed fit, redefine your rest days with the Luxe Lounge Boyfriend Joggers.','With super-soft cotton and a relaxed fit, redefine your rest days with the Luxe Lounge Boyfriend Joggers.','Luxe Lounge Boyfriend Joggers.png'),
(16,'Luxe Lounge Jogger',4,32,10,'With super-soft, brushed-fleece fabric and a relaxed fit, redefine your rest days with the Luxe Lounge Joggers.','With super-soft, brushed-fleece fabric and a relaxed fit, redefine your rest days with the Luxe Lounge Joggers.','Luxe Lounge Jogger.png'),
(17,'Power Mesh Leggings',4,44,10,'Stay sculpted with contouring seams, the squat-proof Power Mesh Leggings feature cooling sheer mesh panels for high-performance, along with pockets for your tech.','Stay sculpted with contouring seams, the squat-proof Power Mesh Leggings feature cooling sheer mesh panels for high-performance, along with pockets for your tech.','Power Mesh Leggings.png'),
(18,'Shape Seamless Leggings',4,39,10,'Defining knit technology gets you curved to combat any workout, with Shape Seamless keeping sweat in style, in and out of the gym.','Defining knit technology gets you curved to combat any workout, with Shape Seamless keeping sweat in style, in and out of the gym.','Shape Seamless Leggings.png'),
(19,'Backpack',2,25,10,'Our classic Backpack is perfect for the classroom, gym, or your daily commute, helping you stay organised and prepared whatever your day brings.','Our classic Backpack is perfect for the classroom, gym, or your daily commute, helping you stay organised and prepared whatever your day brings.','Backpack.png'),
(20,'Barrel Bag',2,20,10,'Grab your workout gear and head to the gym in style with our spacious Barrel Bag — with a big interior, it’s a must-have for all your training essentials.','Grab your workout gear and head to the gym in style with our spacious Barrel Bag — with a big interior, it’s a must-have for all your training essentials.','Barrel Bag.png'),
(21,'Drawstring Bag',2,6,10,'Lightweight and convenient for the gym or everyday activities, our Drawstring Bag is perfect for storing all your essentials and accessories.','Lightweight and convenient for the gym or everyday activities, our Drawstring Bag is perfect for storing all your essentials and accessories.','Drawstring Bag.png'),
(22,'Hand Towel',2,9,10,'Sweat in style with our Hand Towel. Whether you’re pounding the treadmill or sitting top of your spin class, it’s a gym kit must-have.','Sweat in style with our Hand Towel. Whether you’re pounding the treadmill or sitting top of your spin class, it’s a gym kit must-have.','Hand Towel.png'),
(23,'Quilted Tote Bag',2,32,10,'Finished with a subtle metallic shine, head out in style with our Quilted Tote Bag — featuring a secure back pocket and zip openings on the front which can store a yoga mat, you’ll be sorted wherever your day takes you.','Finished with a subtle metallic shine, head out in style with our Quilted Tote Bag — featuring a secure back pocket and zip openings on the front which can store a yoga mat, you’ll be sorted wherever your day takes you.','Quilted Tote Bag.png'),
(24,'Snapback',2,20,10,'Whether you’re ready for the gym or out and about, it’s time to step-up the style with our Snapback.

The snapback features a five-panel design for classic style and comfort, with embroidered eyelets for breathability and adjustable snapback closure for a fully customisable fit.','Whether you’re ready for the gym or out and about, it’s time to step-up the style with our Snapback.','Snapback.png'),
(25,'All-Natural Peanut Butter',5,8,10,'Created with a blend of roasted brown peanuts, our Peanut Butter is all-natural and a great source of protein.  Free from added salt, sugar, palm oil, and preservatives, this super-nutritious snack is the sweet and simple way to keep your training on track.','Created with a blend of roasted brown peanuts, our Peanut Butter is all-natural and a great source of protein.  Free from added salt, sugar, palm oil, and preservatives, this super-nutritious snack is the sweet and simple way to keep your training on track.','All-Natural Peanut Butter.png'),
(26,'THE Amino Energy',5,25,10,'Ahead of the curve in both innovation and taste, THE Amino Energy features micronized free-form amino acids, highly researched active ingredients, and caffeine for the ultimate pick-me-up any time of day. With a unique ingredient profile, it’s the ideal blend to support you whether you’re trying to increase your one-rep max in the gym or simply need anytime energy to fuel your day.','Ahead of the curve in both innovation and taste, THE Amino Energy features micronized free-form amino acids, highly researched active ingredients, and caffeine for the ultimate pick-me-up any time of day.','THE Amino Energy.png'),
(27,'Alpha Men Multivitamin',5,20,10,'Our ultra formula of essential vitamins and minerals including calcium, vitamin D, selenium, vitamin B5, biotin, as well as energizing natural extracts3 — boosting your everyday wellbeing while training hard, and dealing with the stresses and strains of a busy lifestyle.','Our ultra formula of essential vitamins and minerals including calcium, vitamin D, selenium, vitamin B5, biotin, as well as energizing natural extracts3 — boosting your everyday wellbeing while training hard, and dealing with the stresses and strains of a busy lifestyle.','Alpha Men Multivitamin.png'),
(28,'Protein Popcorn',5,13,10,'Our Protein Popcorn is a super-satisfying snack that’s great on-the-go — before the gym, after exercise, or as a guilt-free lunchbox companion.','Our Protein Popcorn is a super-satisfying snack that’s great on-the-go — before the gym, after exercise, or as a guilt-free lunchbox companion.','Protein Popcorn.png'),
(29,'THE Neuro Restore',5,30,10,'Our ultra-formula of essential ingredients including melatonin, valerian root, hops extract, l-theanine, ashwagandha, and melissa officinalis — promoting relaxation and calmness, so you can get the quality sleep you need.','Our ultra-formula of essential ingredients including melatonin, valerian root, hops extract, l-theanine, ashwagandha, and melissa officinalis — promoting relaxation and calmness, so you can get the quality sleep you need.','THE Neuro Restore.png'),
(30,'Vitamin E',5,10,10,'Vitamin E is an essential vitamin that has several important functions within your body. It can be found in a variety of foods, such as plant oils, nuts, and seeds — but our softgels are a quick and convenient way to hit your recommended daily allowance.','Vitamin E is an essential vitamin that has several important functions within your body. It can be found in a variety of foods, such as plant oils, nuts, and seeds — but our softgels are a quick and convenient way to hit your recommended daily allowance.','Vitamin E.png');

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `reports` (`report_id`, `product_id`, `product_price`, `product_quantity`, `product_title`) VALUES
(1, 1, 30, 2, 'Brown Rice Protein \r\n'),
(2, 2, 30, 1, 'Calcium Caseinate Protein '),
(3, 3, 30, 2, 'Hydrolysed Why Protein \r\n'),
(4, 4, 30, 3, 'Impact Native Whey 95 \r\n'),
(5, 5, 30, 1, 'Impact Protein Blend');

ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

/*
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);
*/

ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

/*
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
*/

ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

/*
  INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`) VALUES
  (6,'Vegan Blend',1,30,10,'It’s a great source of BCAAs, too. Your body can’t create these essential amino acids, so must be supplemented. They naturally occur in protein which helps to build and repair new muscle,1 so are a must-have for your training schedule. We’ve also added DigeZyme®: a natural enzyme complex that works as a digestion aid, with more protease that any other on the market.','Completely free from dairy, this all-natural blend is packed with essential amino acids and over 21g protein per serving for people training on a plant-based diet. With pea protein isolate and brown rice protein, our Vegan blend is a high-protein shake created to help achieve your fitness goals.','Vegan Blend.png'),
  (7,'2 Pack Crew Socks',3,8,10,'Lightweight, comfortable and built to last– the perfect choice whether hitting the gym or doing your own thing.
Fabric: 63% cotton / 33% polyester / 2% nylon / 2% elastane','Lightweight, comfortable and built to last– the perfect choice whether hitting the gym or doing your own thing.','2 Pack Crew Socks.png'),
  (8,'Form Jogger',3,35,10,'Tailor your training in our Form Joggers, with a slim-fit and lightweight stretch materials that support your session, whatever the season.','Tailor your training in our Form Joggers, with a slim-fit and lightweight stretch materials that support your session, whatever the season.','Form Jogger.png'),
  (9,'Form Sweat Shorts',3,25,10,'Tailor your training in our Form Shorts, with a relaxed fit and lightweight stretch materials that support your session, whatever the season.','Tailor your training in our Form Shorts, with a relaxed fit and lightweight stretch materials that support your session, whatever the season.','Form Sweat Shorts.png'),
  (10,'Logo Joggers',3,12,10,'The Original Joggers are designed using loop-back fleece fabric with a stylish tapered fit for lasting, lightweight comfort.

Featuring a classic slim-fit with an elasticated waistband and cuffs, and completed with bold branding – we’re turning up the heat on this season’s look.

The Originals are our new and improved sweats range, based on our best-selling slim-fit clothing. Crafted with loop-back, lightweight fleece material, it’s a collection of strong staples to complete any gym kit.','The Original Joggers are designed using loop-back fleece fabric with a stylish tapered fit for lasting, lightweight comfort.','Logo Joggers.png'),
  (11,'Sprint Shorts',3,26,10,'Let your body breathe through every lunge, jump, and lift in our Sprint Shorts, with woven-stretch fabric and laser-cut side panels to always keep you moving.','Let your body breathe through every lunge, jump, and lift in our Sprint Shorts, with woven-stretch fabric and laser-cut side panels to always keep you moving.','Sprint Shorts.png'),
  (12,'The Original Sweat Shorts',3,15,10,'Feel-good fit and lightweight comfort, our Original Shorts are a must have for your gym-kit as well as your rest days.','Feel-good fit and lightweight comfort, our Original Shorts are a must have for your gym-kit as well as your rest days.','The Original Sweat Shorts.png');
  */
/*
  INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`) VALUES
  (13,'Classic Heartbeat Full',4,14,10,'Our Heartbeat Leggings are back, in a classic look and feel.

These full-length leggings are crafted using super-soft yarns, with a supportive high-rise waist for maximum comfort. The best-selling design features sculpted seams to contour your booty, while staying totally squat-proof.','Our Heartbeat Leggings are back, in a classic look and feel.','Classic Heartbeat Full.png'),
  (14,'Inspire Seamless Leggings',4,26,10,'With soft-touch, stretchy fabric to set your workout free, Inspire is fitted to your form with figure-enhancing style lines.','With soft-touch, stretchy fabric to set your workout free, Inspire is fitted to your form with figure-enhancing style lines.','Inspire Seamless Leggings.png'),
  (15,'Luxe Lounge Boyfriend Joggers',4,32,10,'With super-soft cotton and a relaxed fit, redefine your rest days with the Luxe Lounge Boyfriend Joggers.','With super-soft cotton and a relaxed fit, redefine your rest days with the Luxe Lounge Boyfriend Joggers.','Luxe Lounge Boyfriend Joggers.png'),
  (16,'Luxe Lounge Jogger',4,32,10,'With super-soft, brushed-fleece fabric and a relaxed fit, redefine your rest days with the Luxe Lounge Joggers.','With super-soft, brushed-fleece fabric and a relaxed fit, redefine your rest days with the Luxe Lounge Joggers.','Luxe Lounge Jogger.png'),
  (17,'Power Mesh Leggings',4,44,10,'Stay sculpted with contouring seams, the squat-proof Power Mesh Leggings feature cooling sheer mesh panels for high-performance, along with pockets for your tech.','Stay sculpted with contouring seams, the squat-proof Power Mesh Leggings feature cooling sheer mesh panels for high-performance, along with pockets for your tech.','Power Mesh Leggings.png'),
  (18,'Shape Seamless Leggings',4,39,10,'Defining knit technology gets you curved to combat any workout, with Shape Seamless keeping sweat in style, in and out of the gym.','Defining knit technology gets you curved to combat any workout, with Shape Seamless keeping sweat in style, in and out of the gym.','Shape Seamless Leggings.png'),
  (19,'Backpack',2,25,10,'Our classic Backpack is perfect for the classroom, gym, or your daily commute, helping you stay organised and prepared whatever your day brings.','Our classic Backpack is perfect for the classroom, gym, or your daily commute, helping you stay organised and prepared whatever your day brings.','Backpack.png'),
  (20,'Barrel Bag',2,20,10,'Grab your workout gear and head to the gym in style with our spacious Barrel Bag — with a big interior, it’s a must-have for all your training essentials.','Grab your workout gear and head to the gym in style with our spacious Barrel Bag — with a big interior, it’s a must-have for all your training essentials.','Barrel Bag.png'),
  (21,'Drawstring Bag',2,6,10,'Lightweight and convenient for the gym or everyday activities, our Drawstring Bag is perfect for storing all your essentials and accessories.','Lightweight and convenient for the gym or everyday activities, our Drawstring Bag is perfect for storing all your essentials and accessories.','Drawstring Bag.png'),
  (22,'Hand Towel',2,9,10,'Sweat in style with our Hand Towel. Whether you’re pounding the treadmill or sitting top of your spin class, it’s a gym kit must-have.','Sweat in style with our Hand Towel. Whether you’re pounding the treadmill or sitting top of your spin class, it’s a gym kit must-have.','Hand Towel.png'),
  (23,'Quilted Tote Bag',2,32,10,'Finished with a subtle metallic shine, head out in style with our Quilted Tote Bag — featuring a secure back pocket and zip openings on the front which can store a yoga mat, you’ll be sorted wherever your day takes you.','Finished with a subtle metallic shine, head out in style with our Quilted Tote Bag — featuring a secure back pocket and zip openings on the front which can store a yoga mat, you’ll be sorted wherever your day takes you.','Quilted Tote Bag.png'),
  (24,'Snapback',2,20,10,'Whether you’re ready for the gym or out and about, it’s time to step-up the style with our Snapback.

The snapback features a five-panel design for classic style and comfort, with embroidered eyelets for breathability and adjustable snapback closure for a fully customisable fit.','Whether you’re ready for the gym or out and about, it’s time to step-up the style with our Snapback.','Snapback.png'),
  (25,'All-Natural Peanut Butter',5,8,10,'Created with a blend of roasted brown peanuts, our Peanut Butter is all-natural and a great source of protein.  Free from added salt, sugar, palm oil, and preservatives, this super-nutritious snack is the sweet and simple way to keep your training on track.','Created with a blend of roasted brown peanuts, our Peanut Butter is all-natural and a great source of protein.  Free from added salt, sugar, palm oil, and preservatives, this super-nutritious snack is the sweet and simple way to keep your training on track.','All-Natural Peanut Butter.png'),
  (26,'THE Amino Energy',5,25,10,'Ahead of the curve in both innovation and taste, THE Amino Energy features micronized free-form amino acids, highly researched active ingredients, and caffeine for the ultimate pick-me-up any time of day. With a unique ingredient profile, it’s the ideal blend to support you whether you’re trying to increase your one-rep max in the gym or simply need anytime energy to fuel your day.','Ahead of the curve in both innovation and taste, THE Amino Energy features micronized free-form amino acids, highly researched active ingredients, and caffeine for the ultimate pick-me-up any time of day.','THE Amino Energy.png'),
  (27,'Alpha Men Multivitamin',5,20,10,'Our ultra formula of essential vitamins and minerals including calcium, vitamin D, selenium, vitamin B5, biotin, as well as energizing natural extracts3 — boosting your everyday wellbeing while training hard, and dealing with the stresses and strains of a busy lifestyle.','Our ultra formula of essential vitamins and minerals including calcium, vitamin D, selenium, vitamin B5, biotin, as well as energizing natural extracts3 — boosting your everyday wellbeing while training hard, and dealing with the stresses and strains of a busy lifestyle.','Alpha Men Multivitamin.png'),
  (28,'Protein Popcorn',5,13,10,'Our Protein Popcorn is a super-satisfying snack that’s great on-the-go — before the gym, after exercise, or as a guilt-free lunchbox companion.','Our Protein Popcorn is a super-satisfying snack that’s great on-the-go — before the gym, after exercise, or as a guilt-free lunchbox companion.','Protein Popcorn.png'),
  (29,'THE Neuro Restore',5,30,10,'Our ultra-formula of essential ingredients including melatonin, valerian root, hops extract, l-theanine, ashwagandha, and melissa officinalis — promoting relaxation and calmness, so you can get the quality sleep you need.','Our ultra-formula of essential ingredients including melatonin, valerian root, hops extract, l-theanine, ashwagandha, and melissa officinalis — promoting relaxation and calmness, so you can get the quality sleep you need.','THE Neuro Restore.png'),
  (30,'Vitamin E',5,10,10,'Vitamin E is an essential vitamin that has several important functions within your body. It can be found in a variety of foods, such as plant oils, nuts, and seeds — but our softgels are a quick and convenient way to hit your recommended daily allowance.','Vitamin E is an essential vitamin that has several important functions within your body. It can be found in a variety of foods, such as plant oils, nuts, and seeds — but our softgels are a quick and convenient way to hit your recommended daily allowance.','Vitamin E.png');
  */
