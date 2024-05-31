/*
 Navicat Premium Data Transfer

 Source Server         : localhost_5432
 Source Server Type    : PostgreSQL
 Source Server Version : 160002 (160002)
 Source Host           : localhost:5432
 Source Catalog        : rive
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 160002 (160002)
 File Encoding         : 65001

 Date: 31/05/2024 07:07:55
*/


-- ----------------------------
-- Sequence structure for contact_us_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."contact_us_id_seq";
CREATE SEQUENCE "public"."contact_us_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for event_variations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."event_variations_id_seq";
CREATE SEQUENCE "public"."event_variations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for events_category_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."events_category_id_seq";
CREATE SEQUENCE "public"."events_category_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for events_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."events_id_seq";
CREATE SEQUENCE "public"."events_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for events_scanner_job_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."events_scanner_job_id_seq";
CREATE SEQUENCE "public"."events_scanner_job_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for failed_jobs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."failed_jobs_id_seq";
CREATE SEQUENCE "public"."failed_jobs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for genreal_parameter_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."genreal_parameter_id_seq";
CREATE SEQUENCE "public"."genreal_parameter_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for invoices_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."invoices_id_seq";
CREATE SEQUENCE "public"."invoices_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for jobs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."jobs_id_seq";
CREATE SEQUENCE "public"."jobs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for local_notification_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."local_notification_id_seq";
CREATE SEQUENCE "public"."local_notification_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
CREATE SEQUENCE "public"."migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for orders2_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."orders2_id_seq";
CREATE SEQUENCE "public"."orders2_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for orders_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."orders_id_seq";
CREATE SEQUENCE "public"."orders_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for organizers_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."organizers_id_seq";
CREATE SEQUENCE "public"."organizers_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for personal_access_tokens_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."personal_access_tokens_id_seq";
CREATE SEQUENCE "public"."personal_access_tokens_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for role_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."role_id_seq";
CREATE SEQUENCE "public"."role_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for sponsors_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."sponsors_id_seq";
CREATE SEQUENCE "public"."sponsors_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for thumbnails_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."thumbnails_id_seq";
CREATE SEQUENCE "public"."thumbnails_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tickets_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tickets_id_seq";
CREATE SEQUENCE "public"."tickets_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for withdrawl_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."withdrawl_id_seq";
CREATE SEQUENCE "public"."withdrawl_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for contact_us
-- ----------------------------
DROP TABLE IF EXISTS "public"."contact_us";
CREATE TABLE "public"."contact_us" (
  "id" int8 NOT NULL DEFAULT nextval('contact_us_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "email" varchar(255) COLLATE "pg_catalog"."default",
  "subject" varchar(255) COLLATE "pg_catalog"."default",
  "message" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;

-- ----------------------------
-- Records of contact_us
-- ----------------------------
INSERT INTO "public"."contact_us" VALUES (1, 'test', 'test@mail.com', 'test subject', 'lorem ipsum', '2024-05-31 02:46:03', '2024-05-31 02:46:03');

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS "public"."events";
CREATE TABLE "public"."events" (
  "id" int8 NOT NULL DEFAULT nextval('events_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "event_category_id" int8,
  "description" text COLLATE "pg_catalog"."default",
  "location" varchar(255) COLLATE "pg_catalog"."default",
  "banner" varchar(255) COLLATE "pg_catalog"."default",
  "thumbnail" varchar(255) COLLATE "pg_catalog"."default",
  "event_organizer_id" int8,
  "status" int8,
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "start_date" timestamp(6),
  "end_date" timestamp(6),
  "tnc" text COLLATE "pg_catalog"."default",
  "seo" text COLLATE "pg_catalog"."default",
  "seo_description" text COLLATE "pg_catalog"."default",
  "province" varchar(255) COLLATE "pg_catalog"."default",
  "city" varchar(255) COLLATE "pg_catalog"."default",
  "zip" varchar(255) COLLATE "pg_catalog"."default",
  "latitude" varchar(255) COLLATE "pg_catalog"."default",
  "longitude" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO "public"."events" VALUES (1, 'Rock Music Concert', 2, '
Rock Music Concert
1
An electrifying rock music concert featuring famous bands from both local and international scenes. Expect high-energy performances, stunning light shows, and an unforgettable experience for all rock enthusiasts.', 'Gelora Bung Karno Stadium', 'c3557db1-8934-418b-b8c5-1841b72830e2.png', '7ba40918-d600-4469-a02e-bb4c12b6a53a.png', 1, 1, '2024-05-11 04:35:30', '2024-05-13 03:39:00', '2024-06-01 12:00:00', '2024-06-17 12:00:00', 'No refunds. Ticket resale is prohibited. Attendees must comply with all event guidelines.
rock-music-concert', 'Join us for an unforgettable night of rock music with top bands from around the world. Secure your tickets now!', 'Join us for an unforgettable night of rock music with top bands from around the world. Secure your tickets now!', 'Jakarta', 'Jakarta', '1124', '0', '0');
INSERT INTO "public"."events" VALUES (4, 'Art and Craft Fair', 2, 'A vibrant fair showcasing handmade arts and crafts from local artisans. Enjoy workshops, live demonstrations, and purchase unique items directly from the makers.', 'Surabaya Town Square', 'c3557db1-8934-418b-b8c5-1841b72830e2.png', '7ba40918-d600-4469-a02e-bb4c12b6a53a.png', 1, 1, '2024-05-11 04:35:30', '2024-05-13 03:39:00', '2024-06-06 12:00:00', '2024-06-18 12:00:00', 'No refunds. Children under 12 must be accompanied by an adult. No outside food and drinks allowed.
art-and-craft-fair', 'Discover beautiful handmade arts and crafts at our fair. Join workshops and meet talented local artisans.', 'Discover beautiful handmade arts and crafts at our fair. Join workshops and meet talented local artisans.', 'Jawa Timur', 'Surabaya', '1124', '0', '0');
INSERT INTO "public"."events" VALUES (3, 'Tech Innovation Summit', 2, 'A summit bringing together industry leaders to discuss the latest trends in technology and innovation. Includes keynote speeches, panel discussions, and networking opportunities.
Bali International Convention Centre', 'Bali International Convention Centre', 'c3557db1-8934-418b-b8c5-1841b72830e2.png', '7ba40918-d600-4469-a02e-bb4c12b6a53a.png', 1, 1, '2024-05-11 04:35:30', '2024-05-13 03:39:00', '2024-06-02 12:00:00', '2024-06-17 12:00:00', 'All sales are final. No on-site registration allowed. Attendees must present ID at check-in.
tech-innovation-summit
', 'askdfjsal', 'laksfjdlas', 'Jawa Timur', 'Surabaya', '1124', '0', '0');
INSERT INTO "public"."events" VALUES (6, 'Food Festival Extravaganza', 2, 'A culinary delight featuring dishes from various regions, cooked by renowned chefs. Indulge in a gastronomic journey with food tastings, cooking demos, and live entertainment.', 'Jakarta Convention Center', 'c3557db1-8934-418b-b8c5-1841b72830e2.png', '7ba40918-d600-4469-a02e-bb4c12b6a53a.png', 1, 1, '2024-05-11 04:35:30', '2024-05-13 03:39:00', '2024-05-11 12:00:00', '2024-05-13 12:00:00', 'Tickets are non-refundable. Pets are not allowed. Please follow hygiene protocols.
food-festival-extravaganza', 'Experience a world of flavors at our Food Festival Extravaganza. Get your taste buds ready for a culinary adventure!', 'Experience a world of flavors at our Food Festival Extravaganza. Get your taste buds ready for a culinary adventure!', 'Jakarta', 'Jakarta', '1124', '0', '0');
INSERT INTO "public"."events" VALUES (5, 'Fitness and Wellness Expo', 2, 'An expo dedicated to health and fitness enthusiasts. Features fitness classes, wellness workshops, and products from leading brands in the health industry.', 'Bandung Convention Center', 'c3557db1-8934-418b-b8c5-1841b72830e2.png', '7ba40918-d600-4469-a02e-bb4c12b6a53a.png', 1, 1, '2024-05-11 04:35:30', '2024-05-13 03:39:00', '2024-06-03 12:00:00', '2024-06-17 12:00:00', 'No refunds. Proper workout attire required for fitness classes. Follow all safety guidelines.
fitness-and-wellness-expo', 'Enhance your fitness journey at our Wellness Expo. Participate in classes, workshops, and explore health products.', 'Enhance your fitness journey at our Wellness Expo. Participate in classes, workshops, and explore health products.', 'Jawa Timur', 'Surabaya', '1124', '0', '0');
INSERT INTO "public"."events" VALUES (2, 'Food Festival Extravaganza', 2, 'A culinary delight featuring dishes from various regions, cooked by renowned chefs. Indulge in a gastronomic journey with food tastings, cooking demos, and live entertainment.', 'Jakarta Convention Center', 'c3557db1-8934-418b-b8c5-1841b72830e2.png', '7ba40918-d600-4469-a02e-bb4c12b6a53a.png', 1, 1, '2024-05-11 04:35:30', '2024-05-13 03:39:00', '2024-05-11 12:00:00', '2024-05-13 12:00:00', 'Tickets are non-refundable. Pets are not allowed. Please follow hygiene protocols.
food-festival-extravaganza', 'Experience a world of flavors at our Food Festival Extravaganza. Get your taste buds ready for a culinary adventure!', 'Experience a world of flavors at our Food Festival Extravaganza. Get your taste buds ready for a culinary adventure!', 'Jakarta', 'Jakarta', '1124', '0', '0');

-- ----------------------------
-- Table structure for events_category
-- ----------------------------
DROP TABLE IF EXISTS "public"."events_category";
CREATE TABLE "public"."events_category" (
  "id" int8 NOT NULL DEFAULT nextval('events_category_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "description" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;

-- ----------------------------
-- Records of events_category
-- ----------------------------
INSERT INTO "public"."events_category" VALUES (2, 'Music', 'Event music', '2024-05-04 22:16:45', '2024-05-12 02:18:19');

-- ----------------------------
-- Table structure for events_scanner_job
-- ----------------------------
DROP TABLE IF EXISTS "public"."events_scanner_job";
CREATE TABLE "public"."events_scanner_job" (
  "id" int8 NOT NULL DEFAULT nextval('events_scanner_job_id_seq'::regclass),
  "user_id" int8,
  "event_id" int8,
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;

-- ----------------------------
-- Records of events_scanner_job
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS "public"."failed_jobs";
CREATE TABLE "public"."failed_jobs" (
  "id" int8 NOT NULL DEFAULT nextval('failed_jobs_id_seq'::regclass),
  "uuid" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "connection" text COLLATE "pg_catalog"."default" NOT NULL,
  "queue" text COLLATE "pg_catalog"."default" NOT NULL,
  "payload" text COLLATE "pg_catalog"."default" NOT NULL,
  "exception" text COLLATE "pg_catalog"."default" NOT NULL,
  "failed_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
INSERT INTO "public"."failed_jobs" VALUES (4, '9448894b-197b-4a87-928d-fe30f513bdb4', 'database', 'default', '{"uuid":"9448894b-197b-4a87-928d-fe30f513bdb4","displayName":"App\\Jobs\\SendBroadcastMailJob","job":"Illuminate\\Queue\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\Jobs\\SendBroadcastMailJob","command":"O:29:\"App\\Jobs\\SendBroadcastMailJob\":4:{s:40:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000receivers\";a:1:{i:0;s:26:\"willysantoso1997@gmail.com\";}s:38:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000subject\";s:27:\"Invoice #005\/INV\/RIVE\/05\/24\";s:38:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000message\";s:1380:\"<h1 style=\"margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;\">\r\n    Invoice #005\/INV\/RIVE\/05\/24\r\n<\/h1>\r\n<p style=\"margin:0;\">\r\n    Halo Fairuz,\r\n<\/p>\r\n<p>\r\n    Segera selesaikan pembayaran ticket anda sejumlah <strong>Rp. 180.250<\/strong> untuk mendapatkan ticket\r\n    yang anda inginkan!\r\n<\/p>\r\n<p>Invoice Details:<\/p>\r\n<ul>\r\n    <li><strong>Event :<\/strong> Rock Music Concert<\/li>\r\n    <li><strong>Subtotal :<\/strong> Rp. 175.000 <\/li>\r\n    <li><strong>Fee :<\/strong> Rp. 5.250<\/li>\r\n    <li><strong>Total :<\/strong> Rp. 180.250<\/li>\r\n<\/ul>\r\n<p>\r\n    Klik tautan dibawah untuk melanjutkan pembayaran\r\n    <br>\r\n    <br>\r\n    <a href=\"http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124\"\r\n        style=\"background: #244379; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#244379\">\r\n        <span style=\"mso-text-raise:10pt;font-weight:bold;\">Bayar Sekarang<\/span>\r\n    <\/a>\r\n<\/p>\r\n<br>\r\n<p>\r\n    Jika tombol tidak dapat diklik, gunakan link berikut untuk melanjutkan pembayaran\r\n    <br>\r\n    <a href=\"http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124\"\r\n        style=\"color:#213D6C;text-decoration:underline;\">http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124<\/a>\r\n<\/p>\r\n\r\n\";s:40:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000invoiceId\";i:24;}"}}', 'InvalidArgumentException: View [common.mail.broadcast.broadcasts] not found. in D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\View\FileViewFinder.php:137
Stack trace:
#0 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\View\FileViewFinder.php(79): Illuminate\View\FileViewFinder->findInPaths(''common.mail.bro...'', Array)
#1 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\View\Factory.php(138): Illuminate\View\FileViewFinder->find(''common.mail.bro...'')
#2 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(383): Illuminate\View\Factory->make(''common.mail.bro...'', Array)
#3 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(360): Illuminate\Mail\Mailer->renderView(''common.mail.bro...'', Array)
#4 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(272): Illuminate\Mail\Mailer->addContent(Object(Illuminate\Mail\Message), ''common.mail.bro...'', NULL, NULL, Array)
#5 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailable.php(212): Illuminate\Mail\Mailer->send(''common.mail.bro...'', Array, Object(Closure))
#6 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Support\Traits\Localizable.php(19): Illuminate\Mail\Mailable->Illuminate\Mail\{closure}()
#7 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailable.php(213): Illuminate\Mail\Mailable->withLocale(NULL, Object(Closure))
#8 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(309): Illuminate\Mail\Mailable->send(Object(Illuminate\Mail\Mailer))
#9 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(253): Illuminate\Mail\Mailer->sendMailable(Object(App\Mail\BroadcastMail))
#10 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\PendingMail.php(124): Illuminate\Mail\Mailer->send(Object(App\Mail\BroadcastMail))
#11 D:\Project\web\rive\app\Jobs\SendBroadcastMailJob.php(44): Illuminate\Mail\PendingMail->send(Object(App\Mail\BroadcastMail))
#12 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(36): App\Jobs\SendBroadcastMailJob->handle()
#13 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Util.php(41): Illuminate\Container\BoundMethod::Illuminate\Container\{closure}()
#14 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(93): Illuminate\Container\Util::unwrapIfClosure(Object(Closure))
#15 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(37): Illuminate\Container\BoundMethod::callBoundMethod(Object(Illuminate\Foundation\Application), Array, Object(Closure))
#16 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Container.php(661): Illuminate\Container\BoundMethod::call(Object(Illuminate\Foundation\Application), Array, Array, NULL)
#17 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Bus\Dispatcher.php(128): Illuminate\Container\Container->call(Array)
#18 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(141): Illuminate\Bus\Dispatcher->Illuminate\Bus\{closure}(Object(App\Jobs\SendBroadcastMailJob))
#19 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(116): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(App\Jobs\SendBroadcastMailJob))
#20 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Bus\Dispatcher.php(132): Illuminate\Pipeline\Pipeline->then(Object(Closure))
#21 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(124): Illuminate\Bus\Dispatcher->dispatchNow(Object(App\Jobs\SendBroadcastMailJob), false)
#22 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(141): Illuminate\Queue\CallQueuedHandler->Illuminate\Queue\{closure}(Object(App\Jobs\SendBroadcastMailJob))
#23 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(116): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(App\Jobs\SendBroadcastMailJob))
#24 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(126): Illuminate\Pipeline\Pipeline->then(Object(Closure))
#25 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(70): Illuminate\Queue\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\Queue\Jobs\DatabaseJob), Object(App\Jobs\SendBroadcastMailJob))
#26 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Jobs\Job.php(98): Illuminate\Queue\CallQueuedHandler->call(Object(Illuminate\Queue\Jobs\DatabaseJob), Array)
#27 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(425): Illuminate\Queue\Jobs\Job->fire()
#28 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(375): Illuminate\Queue\Worker->process(''database'', Object(Illuminate\Queue\Jobs\DatabaseJob), Object(Illuminate\Queue\WorkerOptions))
#29 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(173): Illuminate\Queue\Worker->runJob(Object(Illuminate\Queue\Jobs\DatabaseJob), ''database'', Object(Illuminate\Queue\WorkerOptions))
#30 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(148): Illuminate\Queue\Worker->daemon(''database'', ''default'', Object(Illuminate\Queue\WorkerOptions))
#31 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(131): Illuminate\Queue\Console\WorkCommand->runWorker(''database'', ''default'')
#32 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(36): Illuminate\Queue\Console\WorkCommand->handle()
#33 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Util.php(41): Illuminate\Container\BoundMethod::Illuminate\Container\{closure}()
#34 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(93): Illuminate\Container\Util::unwrapIfClosure(Object(Closure))
#35 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(37): Illuminate\Container\BoundMethod::callBoundMethod(Object(Illuminate\Foundation\Application), Array, Object(Closure))
#36 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Container.php(661): Illuminate\Container\BoundMethod::call(Object(Illuminate\Foundation\Application), Array, Array, NULL)
#37 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Command.php(183): Illuminate\Container\Container->call(Array)
#38 D:\Project\web\rive\vendor\symfony\console\Command\Command.php(326): Illuminate\Console\Command->execute(Object(Symfony\Component\Console\Input\ArgvInput), Object(Illuminate\Console\OutputStyle))
#39 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Command.php(153): Symfony\Component\Console\Command\Command->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Illuminate\Console\OutputStyle))
#40 D:\Project\web\rive\vendor\symfony\console\Application.php(1078): Illuminate\Console\Command->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#41 D:\Project\web\rive\vendor\symfony\console\Application.php(324): Symfony\Component\Console\Application->doRunCommand(Object(Illuminate\Queue\Console\WorkCommand), Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#42 D:\Project\web\rive\vendor\symfony\console\Application.php(175): Symfony\Component\Console\Application->doRun(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#43 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Application.php(102): Symfony\Component\Console\Application->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#44 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Foundation\Console\Kernel.php(155): Illuminate\Console\Application->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#45 D:\Project\web\rive\artisan(37): Illuminate\Foundation\Console\Kernel->handle(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#46 {main}', '2024-05-31 05:00:16');
INSERT INTO "public"."failed_jobs" VALUES (5, '67484473-f86a-4c43-a46a-825797de2406', 'database', 'default', '{"uuid":"67484473-f86a-4c43-a46a-825797de2406","displayName":"App\\Jobs\\SendBroadcastMailJob","job":"Illuminate\\Queue\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\Jobs\\SendBroadcastMailJob","command":"O:29:\"App\\Jobs\\SendBroadcastMailJob\":4:{s:40:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000receivers\";a:1:{i:0;s:26:\"willysantoso1997@gmail.com\";}s:38:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000subject\";s:27:\"Invoice #005\/INV\/RIVE\/05\/24\";s:38:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000message\";s:1380:\"<h1 style=\"margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;\">\r\n    Invoice #005\/INV\/RIVE\/05\/24\r\n<\/h1>\r\n<p style=\"margin:0;\">\r\n    Halo Fairuz,\r\n<\/p>\r\n<p>\r\n    Segera selesaikan pembayaran ticket anda sejumlah <strong>Rp. 180.250<\/strong> untuk mendapatkan ticket\r\n    yang anda inginkan!\r\n<\/p>\r\n<p>Invoice Details:<\/p>\r\n<ul>\r\n    <li><strong>Event :<\/strong> Rock Music Concert<\/li>\r\n    <li><strong>Subtotal :<\/strong> Rp. 175.000 <\/li>\r\n    <li><strong>Fee :<\/strong> Rp. 5.250<\/li>\r\n    <li><strong>Total :<\/strong> Rp. 180.250<\/li>\r\n<\/ul>\r\n<p>\r\n    Klik tautan dibawah untuk melanjutkan pembayaran\r\n    <br>\r\n    <br>\r\n    <a href=\"http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124\"\r\n        style=\"background: #244379; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#244379\">\r\n        <span style=\"mso-text-raise:10pt;font-weight:bold;\">Bayar Sekarang<\/span>\r\n    <\/a>\r\n<\/p>\r\n<br>\r\n<p>\r\n    Jika tombol tidak dapat diklik, gunakan link berikut untuk melanjutkan pembayaran\r\n    <br>\r\n    <a href=\"http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124\"\r\n        style=\"color:#213D6C;text-decoration:underline;\">http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124<\/a>\r\n<\/p>\r\n\r\n\";s:40:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000invoiceId\";i:24;}"}}', 'InvalidArgumentException: View [common.mail.broadcast.broadcasts] not found. in D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\View\FileViewFinder.php:137
Stack trace:
#0 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\View\FileViewFinder.php(79): Illuminate\View\FileViewFinder->findInPaths(''common.mail.bro...'', Array)
#1 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\View\Factory.php(138): Illuminate\View\FileViewFinder->find(''common.mail.bro...'')
#2 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(383): Illuminate\View\Factory->make(''common.mail.bro...'', Array)
#3 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(360): Illuminate\Mail\Mailer->renderView(''common.mail.bro...'', Array)
#4 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(272): Illuminate\Mail\Mailer->addContent(Object(Illuminate\Mail\Message), ''common.mail.bro...'', NULL, NULL, Array)
#5 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailable.php(212): Illuminate\Mail\Mailer->send(''common.mail.bro...'', Array, Object(Closure))
#6 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Support\Traits\Localizable.php(19): Illuminate\Mail\Mailable->Illuminate\Mail\{closure}()
#7 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailable.php(213): Illuminate\Mail\Mailable->withLocale(NULL, Object(Closure))
#8 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(309): Illuminate\Mail\Mailable->send(Object(Illuminate\Mail\Mailer))
#9 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(253): Illuminate\Mail\Mailer->sendMailable(Object(App\Mail\BroadcastMail))
#10 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Mail\PendingMail.php(124): Illuminate\Mail\Mailer->send(Object(App\Mail\BroadcastMail))
#11 D:\Project\web\rive\app\Jobs\SendBroadcastMailJob.php(44): Illuminate\Mail\PendingMail->send(Object(App\Mail\BroadcastMail))
#12 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(36): App\Jobs\SendBroadcastMailJob->handle()
#13 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Util.php(41): Illuminate\Container\BoundMethod::Illuminate\Container\{closure}()
#14 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(93): Illuminate\Container\Util::unwrapIfClosure(Object(Closure))
#15 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(37): Illuminate\Container\BoundMethod::callBoundMethod(Object(Illuminate\Foundation\Application), Array, Object(Closure))
#16 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Container.php(661): Illuminate\Container\BoundMethod::call(Object(Illuminate\Foundation\Application), Array, Array, NULL)
#17 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Bus\Dispatcher.php(128): Illuminate\Container\Container->call(Array)
#18 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(141): Illuminate\Bus\Dispatcher->Illuminate\Bus\{closure}(Object(App\Jobs\SendBroadcastMailJob))
#19 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(116): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(App\Jobs\SendBroadcastMailJob))
#20 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Bus\Dispatcher.php(132): Illuminate\Pipeline\Pipeline->then(Object(Closure))
#21 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(124): Illuminate\Bus\Dispatcher->dispatchNow(Object(App\Jobs\SendBroadcastMailJob), false)
#22 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(141): Illuminate\Queue\CallQueuedHandler->Illuminate\Queue\{closure}(Object(App\Jobs\SendBroadcastMailJob))
#23 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(116): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(App\Jobs\SendBroadcastMailJob))
#24 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(126): Illuminate\Pipeline\Pipeline->then(Object(Closure))
#25 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(70): Illuminate\Queue\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\Queue\Jobs\DatabaseJob), Object(App\Jobs\SendBroadcastMailJob))
#26 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Jobs\Job.php(98): Illuminate\Queue\CallQueuedHandler->call(Object(Illuminate\Queue\Jobs\DatabaseJob), Array)
#27 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(425): Illuminate\Queue\Jobs\Job->fire()
#28 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(375): Illuminate\Queue\Worker->process(''database'', Object(Illuminate\Queue\Jobs\DatabaseJob), Object(Illuminate\Queue\WorkerOptions))
#29 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(173): Illuminate\Queue\Worker->runJob(Object(Illuminate\Queue\Jobs\DatabaseJob), ''database'', Object(Illuminate\Queue\WorkerOptions))
#30 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(148): Illuminate\Queue\Worker->daemon(''database'', ''default'', Object(Illuminate\Queue\WorkerOptions))
#31 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(131): Illuminate\Queue\Console\WorkCommand->runWorker(''database'', ''default'')
#32 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(36): Illuminate\Queue\Console\WorkCommand->handle()
#33 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Util.php(41): Illuminate\Container\BoundMethod::Illuminate\Container\{closure}()
#34 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(93): Illuminate\Container\Util::unwrapIfClosure(Object(Closure))
#35 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(37): Illuminate\Container\BoundMethod::callBoundMethod(Object(Illuminate\Foundation\Application), Array, Object(Closure))
#36 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Container.php(661): Illuminate\Container\BoundMethod::call(Object(Illuminate\Foundation\Application), Array, Array, NULL)
#37 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Command.php(183): Illuminate\Container\Container->call(Array)
#38 D:\Project\web\rive\vendor\symfony\console\Command\Command.php(326): Illuminate\Console\Command->execute(Object(Symfony\Component\Console\Input\ArgvInput), Object(Illuminate\Console\OutputStyle))
#39 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Command.php(153): Symfony\Component\Console\Command\Command->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Illuminate\Console\OutputStyle))
#40 D:\Project\web\rive\vendor\symfony\console\Application.php(1078): Illuminate\Console\Command->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#41 D:\Project\web\rive\vendor\symfony\console\Application.php(324): Symfony\Component\Console\Application->doRunCommand(Object(Illuminate\Queue\Console\WorkCommand), Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#42 D:\Project\web\rive\vendor\symfony\console\Application.php(175): Symfony\Component\Console\Application->doRun(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#43 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Application.php(102): Symfony\Component\Console\Application->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#44 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Foundation\Console\Kernel.php(155): Illuminate\Console\Application->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#45 D:\Project\web\rive\artisan(37): Illuminate\Foundation\Console\Kernel->handle(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#46 {main}', '2024-05-31 05:00:36');
INSERT INTO "public"."failed_jobs" VALUES (6, '40b64e7c-8fe0-4ac2-87ed-323287d8681d', 'database', 'default', '{"uuid":"40b64e7c-8fe0-4ac2-87ed-323287d8681d","displayName":"App\\Jobs\\SendBroadcastMailJob","job":"Illuminate\\Queue\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\Jobs\\SendBroadcastMailJob","command":"O:29:\"App\\Jobs\\SendBroadcastMailJob\":4:{s:40:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000receivers\";a:1:{i:0;s:26:\"willysantoso1997@gmail.com\";}s:38:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000subject\";s:27:\"Invoice #005\/INV\/RIVE\/05\/24\";s:38:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000message\";s:1380:\"<h1 style=\"margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;\">\r\n    Invoice #005\/INV\/RIVE\/05\/24\r\n<\/h1>\r\n<p style=\"margin:0;\">\r\n    Halo Fairuz,\r\n<\/p>\r\n<p>\r\n    Segera selesaikan pembayaran ticket anda sejumlah <strong>Rp. 180.250<\/strong> untuk mendapatkan ticket\r\n    yang anda inginkan!\r\n<\/p>\r\n<p>Invoice Details:<\/p>\r\n<ul>\r\n    <li><strong>Event :<\/strong> Rock Music Concert<\/li>\r\n    <li><strong>Subtotal :<\/strong> Rp. 175.000 <\/li>\r\n    <li><strong>Fee :<\/strong> Rp. 5.250<\/li>\r\n    <li><strong>Total :<\/strong> Rp. 180.250<\/li>\r\n<\/ul>\r\n<p>\r\n    Klik tautan dibawah untuk melanjutkan pembayaran\r\n    <br>\r\n    <br>\r\n    <a href=\"http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124\"\r\n        style=\"background: #244379; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#244379\">\r\n        <span style=\"mso-text-raise:10pt;font-weight:bold;\">Bayar Sekarang<\/span>\r\n    <\/a>\r\n<\/p>\r\n<br>\r\n<p>\r\n    Jika tombol tidak dapat diklik, gunakan link berikut untuk melanjutkan pembayaran\r\n    <br>\r\n    <a href=\"http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124\"\r\n        style=\"color:#213D6C;text-decoration:underline;\">http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124<\/a>\r\n<\/p>\r\n\r\n\";s:40:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000invoiceId\";i:24;}"}}', 'Illuminate\Queue\MaxAttemptsExceededException: App\Jobs\SendBroadcastMailJob has been attempted too many times or run too long. The job may have previously timed out. in D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php:746
Stack trace:
#0 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(505): Illuminate\Queue\Worker->maxAttemptsExceededException(Object(Illuminate\Queue\Jobs\DatabaseJob))
#1 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(415): Illuminate\Queue\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(''database'', Object(Illuminate\Queue\Jobs\DatabaseJob), 1)
#2 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(375): Illuminate\Queue\Worker->process(''database'', Object(Illuminate\Queue\Jobs\DatabaseJob), Object(Illuminate\Queue\WorkerOptions))
#3 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(173): Illuminate\Queue\Worker->runJob(Object(Illuminate\Queue\Jobs\DatabaseJob), ''database'', Object(Illuminate\Queue\WorkerOptions))
#4 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(148): Illuminate\Queue\Worker->daemon(''database'', ''default'', Object(Illuminate\Queue\WorkerOptions))
#5 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(131): Illuminate\Queue\Console\WorkCommand->runWorker(''database'', ''default'')
#6 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(36): Illuminate\Queue\Console\WorkCommand->handle()
#7 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Util.php(41): Illuminate\Container\BoundMethod::Illuminate\Container\{closure}()
#8 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(93): Illuminate\Container\Util::unwrapIfClosure(Object(Closure))
#9 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(37): Illuminate\Container\BoundMethod::callBoundMethod(Object(Illuminate\Foundation\Application), Array, Object(Closure))
#10 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Container.php(661): Illuminate\Container\BoundMethod::call(Object(Illuminate\Foundation\Application), Array, Array, NULL)
#11 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Command.php(183): Illuminate\Container\Container->call(Array)
#12 D:\Project\web\rive\vendor\symfony\console\Command\Command.php(326): Illuminate\Console\Command->execute(Object(Symfony\Component\Console\Input\ArgvInput), Object(Illuminate\Console\OutputStyle))
#13 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Command.php(153): Symfony\Component\Console\Command\Command->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Illuminate\Console\OutputStyle))
#14 D:\Project\web\rive\vendor\symfony\console\Application.php(1078): Illuminate\Console\Command->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#15 D:\Project\web\rive\vendor\symfony\console\Application.php(324): Symfony\Component\Console\Application->doRunCommand(Object(Illuminate\Queue\Console\WorkCommand), Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#16 D:\Project\web\rive\vendor\symfony\console\Application.php(175): Symfony\Component\Console\Application->doRun(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#17 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Application.php(102): Symfony\Component\Console\Application->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#18 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Foundation\Console\Kernel.php(155): Illuminate\Console\Application->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#19 D:\Project\web\rive\artisan(37): Illuminate\Foundation\Console\Kernel->handle(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#20 {main}', '2024-05-31 05:00:55');
INSERT INTO "public"."failed_jobs" VALUES (7, '5e30dea1-ab35-4897-8790-08598b1d6a4e', 'database', 'default', '{"uuid":"5e30dea1-ab35-4897-8790-08598b1d6a4e","displayName":"App\\Jobs\\SendBroadcastMailJob","job":"Illuminate\\Queue\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\Jobs\\SendBroadcastMailJob","command":"O:29:\"App\\Jobs\\SendBroadcastMailJob\":4:{s:40:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000receivers\";a:1:{i:0;s:26:\"willysantoso1997@gmail.com\";}s:38:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000subject\";s:27:\"Invoice #005\/INV\/RIVE\/05\/24\";s:38:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000message\";s:1380:\"<h1 style=\"margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;\">\r\n    Invoice #005\/INV\/RIVE\/05\/24\r\n<\/h1>\r\n<p style=\"margin:0;\">\r\n    Halo Fairuz,\r\n<\/p>\r\n<p>\r\n    Segera selesaikan pembayaran ticket anda sejumlah <strong>Rp. 180.250<\/strong> untuk mendapatkan ticket\r\n    yang anda inginkan!\r\n<\/p>\r\n<p>Invoice Details:<\/p>\r\n<ul>\r\n    <li><strong>Event :<\/strong> Rock Music Concert<\/li>\r\n    <li><strong>Subtotal :<\/strong> Rp. 175.000 <\/li>\r\n    <li><strong>Fee :<\/strong> Rp. 5.250<\/li>\r\n    <li><strong>Total :<\/strong> Rp. 180.250<\/li>\r\n<\/ul>\r\n<p>\r\n    Klik tautan dibawah untuk melanjutkan pembayaran\r\n    <br>\r\n    <br>\r\n    <a href=\"http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124\"\r\n        style=\"background: #244379; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#244379\">\r\n        <span style=\"mso-text-raise:10pt;font-weight:bold;\">Bayar Sekarang<\/span>\r\n    <\/a>\r\n<\/p>\r\n<br>\r\n<p>\r\n    Jika tombol tidak dapat diklik, gunakan link berikut untuk melanjutkan pembayaran\r\n    <br>\r\n    <a href=\"http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124\"\r\n        style=\"color:#213D6C;text-decoration:underline;\">http:\/\/rive.test\/events\/payment\/512398ed-f7d2-455d-8e12-9d05bcc54124<\/a>\r\n<\/p>\r\n\r\n\";s:40:\"\u0000App\\Jobs\\SendBroadcastMailJob\u0000invoiceId\";i:24;}"}}', 'Illuminate\Queue\MaxAttemptsExceededException: App\Jobs\SendBroadcastMailJob has been attempted too many times or run too long. The job may have previously timed out. in D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php:746
Stack trace:
#0 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(505): Illuminate\Queue\Worker->maxAttemptsExceededException(Object(Illuminate\Queue\Jobs\DatabaseJob))
#1 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(415): Illuminate\Queue\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(''database'', Object(Illuminate\Queue\Jobs\DatabaseJob), 1)
#2 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(375): Illuminate\Queue\Worker->process(''database'', Object(Illuminate\Queue\Jobs\DatabaseJob), Object(Illuminate\Queue\WorkerOptions))
#3 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(173): Illuminate\Queue\Worker->runJob(Object(Illuminate\Queue\Jobs\DatabaseJob), ''database'', Object(Illuminate\Queue\WorkerOptions))
#4 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(148): Illuminate\Queue\Worker->daemon(''database'', ''default'', Object(Illuminate\Queue\WorkerOptions))
#5 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(131): Illuminate\Queue\Console\WorkCommand->runWorker(''database'', ''default'')
#6 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(36): Illuminate\Queue\Console\WorkCommand->handle()
#7 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Util.php(41): Illuminate\Container\BoundMethod::Illuminate\Container\{closure}()
#8 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(93): Illuminate\Container\Util::unwrapIfClosure(Object(Closure))
#9 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(37): Illuminate\Container\BoundMethod::callBoundMethod(Object(Illuminate\Foundation\Application), Array, Object(Closure))
#10 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Container\Container.php(661): Illuminate\Container\BoundMethod::call(Object(Illuminate\Foundation\Application), Array, Array, NULL)
#11 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Command.php(183): Illuminate\Container\Container->call(Array)
#12 D:\Project\web\rive\vendor\symfony\console\Command\Command.php(326): Illuminate\Console\Command->execute(Object(Symfony\Component\Console\Input\ArgvInput), Object(Illuminate\Console\OutputStyle))
#13 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Command.php(153): Symfony\Component\Console\Command\Command->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Illuminate\Console\OutputStyle))
#14 D:\Project\web\rive\vendor\symfony\console\Application.php(1078): Illuminate\Console\Command->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#15 D:\Project\web\rive\vendor\symfony\console\Application.php(324): Symfony\Component\Console\Application->doRunCommand(Object(Illuminate\Queue\Console\WorkCommand), Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#16 D:\Project\web\rive\vendor\symfony\console\Application.php(175): Symfony\Component\Console\Application->doRun(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#17 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Console\Application.php(102): Symfony\Component\Console\Application->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#18 D:\Project\web\rive\vendor\laravel\framework\src\Illuminate\Foundation\Console\Kernel.php(155): Illuminate\Console\Application->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#19 D:\Project\web\rive\artisan(37): Illuminate\Foundation\Console\Kernel->handle(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#20 {main}', '2024-05-31 05:01:22');

-- ----------------------------
-- Table structure for general_parameter
-- ----------------------------
DROP TABLE IF EXISTS "public"."general_parameter";
CREATE TABLE "public"."general_parameter" (
  "id" int4 NOT NULL DEFAULT nextval('genreal_parameter_id_seq'::regclass),
  "seo_keyword" varchar(255) COLLATE "pg_catalog"."default",
  "seo_description" text COLLATE "pg_catalog"."default",
  "transaction_tax" numeric(7,2),
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "email" varchar(255) COLLATE "pg_catalog"."default",
  "phone" varchar(255) COLLATE "pg_catalog"."default",
  "address" varchar(255) COLLATE "pg_catalog"."default",
  "whatsapp_url" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of general_parameter
-- ----------------------------
INSERT INTO "public"."general_parameter" VALUES (1, 'rive', 'rive', 3.00, NULL, '2024-05-31 03:21:59', 'mbaktutik@rive.co.id', '+62 8953 9602 5436', 'Jl. Yos Sudarso No.158, RT 18, RW 05, Kel. Madiun Lor, Kec. Manguharjo, Kota Madiun, Jawa Timur 63122', 'https://api.whatsapp.com/send/?phone=62895396025436');

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS "public"."invoices";
CREATE TABLE "public"."invoices" (
  "id" int8 NOT NULL DEFAULT nextval('invoices_id_seq'::regclass),
  "order_id" int8,
  "invoice_number" varchar(255) COLLATE "pg_catalog"."default",
  "date" timestamp(0),
  "due_date" timestamp(0),
  "status" int8,
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "midtrans_snap_redirect" varchar(255) COLLATE "pg_catalog"."default",
  "midtrans_snap_token" varchar(255) COLLATE "pg_catalog"."default",
  "midtrans_order_id" varchar(255) COLLATE "pg_catalog"."default",
  "subtotal" numeric,
  "fee" numeric(255,0),
  "total" numeric(255,0)
)
;

-- ----------------------------
-- Records of invoices
-- ----------------------------
INSERT INTO "public"."invoices" VALUES (24, 32, '005/INV/RIVE/05/24', '2024-05-31 04:15:35', '2024-06-01 04:15:35', 0, '2024-05-31 04:15:37', '2024-05-31 04:15:39', 'https://app.sandbox.midtrans.com/snap/v4/redirection/00005706-d157-426d-952a-d0c328f64825', '00005706-d157-426d-952a-d0c328f64825', '512398ed-f7d2-455d-8e12-9d05bcc54124', 175000, 5250, 180250);
INSERT INTO "public"."invoices" VALUES (20, 28, '001/INV/RIVE/05/24', '2024-05-23 03:40:07', '2024-05-24 03:40:07', 1, '2024-05-23 03:40:07', '2024-05-23 03:40:41', 'https://app.sandbox.midtrans.com/snap/v4/redirection/ddec1ec7-c314-447e-b2f9-ad7f132d3d47', 'ddec1ec7-c314-447e-b2f9-ad7f132d3d47', '3feaba5a-eab1-49d7-95fa-4a8cdf630238', 575000, 17250, 592250);
INSERT INTO "public"."invoices" VALUES (21, 29, '002/INV/RIVE/05/24', '2024-05-27 20:13:55', '2024-05-28 20:13:55', 1, '2024-05-27 20:13:57', '2024-05-27 20:15:51', 'https://app.sandbox.midtrans.com/snap/v4/redirection/83f04ee9-b13f-487b-879b-deb06f7cce0a', '83f04ee9-b13f-487b-879b-deb06f7cce0a', 'af5793f1-413a-475d-ab5f-db656c880f17', 600000, 18000, 618000);
INSERT INTO "public"."invoices" VALUES (22, 30, '003/INV/RIVE/05/24', '2024-05-27 20:24:16', '2024-05-28 20:24:16', 0, '2024-05-27 20:24:16', '2024-05-27 20:24:16', 'https://app.sandbox.midtrans.com/snap/v4/redirection/84d87aa2-e228-4305-a841-fb257cad43ce', '84d87aa2-e228-4305-a841-fb257cad43ce', '6abdd96b-8578-4a8b-8203-54ba35c1e5c9', 175000, 5250, 180250);
INSERT INTO "public"."invoices" VALUES (23, 31, '004/INV/RIVE/05/24', '2024-05-30 04:22:20', '2024-05-31 04:22:20', 1, '2024-05-30 04:22:21', '2024-05-30 04:34:00', 'https://app.sandbox.midtrans.com/snap/v4/redirection/8c0b6a4b-95fb-4208-947b-57ecffd35aab', '8c0b6a4b-95fb-4208-947b-57ecffd35aab', 'b157a2e8-0c72-42d8-a71e-6f42c32e6cc1', 550000, 16500, 566500);

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS "public"."jobs";
CREATE TABLE "public"."jobs" (
  "id" int8 NOT NULL DEFAULT nextval('jobs_id_seq'::regclass),
  "queue" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "payload" text COLLATE "pg_catalog"."default" NOT NULL,
  "attempts" int2 NOT NULL,
  "reserved_at" int4,
  "available_at" int4 NOT NULL,
  "created_at" int4 NOT NULL
)
;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for local_notification
-- ----------------------------
DROP TABLE IF EXISTS "public"."local_notification";
CREATE TABLE "public"."local_notification" (
  "id" int8 NOT NULL DEFAULT nextval('local_notification_id_seq'::regclass),
  "user_id" int8,
  "title" varchar(255) COLLATE "pg_catalog"."default",
  "description" varchar(255) COLLATE "pg_catalog"."default",
  "status" int4,
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;
COMMENT ON COLUMN "public"."local_notification"."user_id" IS 'user to notify';
COMMENT ON COLUMN "public"."local_notification"."status" IS '1: readed';

-- ----------------------------
-- Records of local_notification
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS "public"."migrations";
CREATE TABLE "public"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO "public"."migrations" VALUES (93, '2024_05_13_033957_create_thumbnails', 2);
INSERT INTO "public"."migrations" VALUES (70, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO "public"."migrations" VALUES (71, '2024_05_04_214616_create_event_variations_table', 1);
INSERT INTO "public"."migrations" VALUES (72, '2024_05_04_214616_create_events_category_table', 1);
INSERT INTO "public"."migrations" VALUES (73, '2024_05_04_214616_create_events_table', 1);
INSERT INTO "public"."migrations" VALUES (74, '2024_05_04_214616_create_failed_jobs_table', 1);
INSERT INTO "public"."migrations" VALUES (75, '2024_05_04_214616_create_invoices_table', 1);
INSERT INTO "public"."migrations" VALUES (76, '2024_05_04_214616_create_jobs_table', 1);
INSERT INTO "public"."migrations" VALUES (77, '2024_05_04_214616_create_local_notification_table', 1);
INSERT INTO "public"."migrations" VALUES (78, '2024_05_04_214616_create_orders_table', 1);
INSERT INTO "public"."migrations" VALUES (79, '2024_05_04_214616_create_organizers_table', 1);
INSERT INTO "public"."migrations" VALUES (80, '2024_05_04_214616_create_password_resets_table', 1);
INSERT INTO "public"."migrations" VALUES (81, '2024_05_04_214616_create_role_table', 1);
INSERT INTO "public"."migrations" VALUES (82, '2024_05_04_214616_create_sponsors_table', 1);
INSERT INTO "public"."migrations" VALUES (83, '2024_05_04_214616_create_tickets_table', 1);
INSERT INTO "public"."migrations" VALUES (84, '2024_05_04_214616_create_users_table', 1);
INSERT INTO "public"."migrations" VALUES (85, '2024_05_04_214619_add_foreign_keys_to_event_variations_table', 1);
INSERT INTO "public"."migrations" VALUES (86, '2024_05_04_214619_add_foreign_keys_to_events_table', 1);
INSERT INTO "public"."migrations" VALUES (87, '2024_05_04_214619_add_foreign_keys_to_invoices_table', 1);
INSERT INTO "public"."migrations" VALUES (88, '2024_05_04_214619_add_foreign_keys_to_local_notification_table', 1);
INSERT INTO "public"."migrations" VALUES (89, '2024_05_04_214619_add_foreign_keys_to_orders_table', 1);
INSERT INTO "public"."migrations" VALUES (90, '2024_05_04_214619_add_foreign_keys_to_organizers_table', 1);
INSERT INTO "public"."migrations" VALUES (91, '2024_05_04_214619_add_foreign_keys_to_tickets_table', 1);
INSERT INTO "public"."migrations" VALUES (92, '2024_05_04_214619_add_foreign_keys_to_users_table', 1);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS "public"."orders";
CREATE TABLE "public"."orders" (
  "id" int8 NOT NULL DEFAULT nextval('orders_id_seq'::regclass),
  "event_id" int8,
  "user_id" int8,
  "date" date,
  "time" time(6),
  "quantity" int8,
  "total_amount" numeric(10,2),
  "payment_method" varchar(255) COLLATE "pg_catalog"."default",
  "payment_status" int8,
  "status" int8,
  "invoice_id" int8,
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "paid_at" timestamp(6)
)
;
COMMENT ON COLUMN "public"."orders"."payment_method" IS 'Payment method used (e.g., credit card, bank transfer)';
COMMENT ON COLUMN "public"."orders"."payment_status" IS 'ENUM(''pending'', ''approved'', ''failed'')';
COMMENT ON COLUMN "public"."orders"."status" IS 'Status of the ticket (0: inactive, 1: active, 2: scanned)';

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO "public"."orders" VALUES (28, 1, NULL, NULL, NULL, NULL, 592250.00, NULL, 1, NULL, NULL, '2024-05-23 03:40:07', '2024-05-23 03:40:41', NULL);
INSERT INTO "public"."orders" VALUES (29, 1, NULL, NULL, NULL, NULL, 618000.00, NULL, 1, NULL, NULL, '2024-05-27 20:13:55', '2024-05-27 20:21:08', '2024-05-27 20:21:08');
INSERT INTO "public"."orders" VALUES (30, 1, NULL, NULL, NULL, NULL, 180250.00, NULL, 0, NULL, NULL, '2024-05-27 20:24:16', '2024-05-27 20:24:16', NULL);
INSERT INTO "public"."orders" VALUES (31, 1, NULL, NULL, NULL, NULL, 566500.00, NULL, 1, NULL, NULL, '2024-05-30 04:22:20', '2024-05-30 04:34:00', '2024-05-30 04:34:00');
INSERT INTO "public"."orders" VALUES (32, 1, NULL, NULL, NULL, NULL, 180250.00, NULL, 0, NULL, NULL, '2024-05-31 04:15:35', '2024-05-31 04:15:35', NULL);

-- ----------------------------
-- Table structure for orders_detail
-- ----------------------------
DROP TABLE IF EXISTS "public"."orders_detail";
CREATE TABLE "public"."orders_detail" (
  "id" int8 NOT NULL DEFAULT nextval('orders2_id_seq'::regclass),
  "ticket_variation_id" int8,
  "order_id" int8,
  "ticket_name" varchar(255) COLLATE "pg_catalog"."default",
  "ticket_price" numeric(10,2),
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "buyer_name" varchar(255) COLLATE "pg_catalog"."default",
  "buyer_nik" varchar(255) COLLATE "pg_catalog"."default",
  "buyer_email" varchar(255) COLLATE "pg_catalog"."default",
  "buyer_phone" varchar(255) COLLATE "pg_catalog"."default",
  "quantity" int8,
  "price" numeric(10,2),
  "total" numeric(10,2),
  "buyer_city" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of orders_detail
-- ----------------------------
INSERT INTO "public"."orders_detail" VALUES (28, 4, 28, 'Presale 2', 175000.00, '2024-05-23 03:40:07', '2024-05-23 03:40:07', 'Paijo', '7827491312313', 'paijo@mail.com', '0812312389123', 1, 175000.00, 175000.00, 'Jakarta');
INSERT INTO "public"."orders_detail" VALUES (29, 5, 28, 'Presale 3', 200000.00, '2024-05-23 03:40:07', '2024-05-23 03:40:07', 'paimen', '2381298194819831231', 'paimen@mail.com', '0812323812931', 2, 200000.00, 400000.00, 'Jakarta');
INSERT INTO "public"."orders_detail" VALUES (30, 4, 29, 'Presale 2', 175000.00, '2024-05-27 20:13:55', '2024-05-27 20:13:55', 'Paijo', '1238983918391312', 'paijo@gmail.com', '0812391823989123', 2, 175000.00, 350000.00, 'Jakarta');
INSERT INTO "public"."orders_detail" VALUES (31, 6, 29, 'Presale 4', 250000.00, '2024-05-27 20:13:55', '2024-05-27 20:13:55', 'Paijo 2', '12839128391231923', 'paijo2@gmail.com', '08123982193891', 1, 250000.00, 250000.00, 'Jakarta');
INSERT INTO "public"."orders_detail" VALUES (32, 4, 30, 'Presale 2', 175000.00, '2024-05-27 20:24:16', '2024-05-27 20:24:16', 'paijo', '21839128391238129', 'paijo@mail.com', '081232138129', 1, 175000.00, 175000.00, 'Jakarta');
INSERT INTO "public"."orders_detail" VALUES (33, 4, 31, 'Presale 2', 175000.00, '2024-05-30 04:22:20', '2024-05-30 04:22:20', 'Fairuz', '00000000000000000000000', 'willysantoso1997@gmail.com', '081249118805', 2, 175000.00, 350000.00, 'Jakarta');
INSERT INTO "public"."orders_detail" VALUES (34, 5, 31, 'Presale 3', 200000.00, '2024-05-30 04:22:20', '2024-05-30 04:22:20', 'Willy', '00000000000000000000000', 'willysantoso1997@gmail.com', '081249118805', 1, 200000.00, 200000.00, 'Jakarta');
INSERT INTO "public"."orders_detail" VALUES (35, 4, 32, 'Presale 2', 175000.00, '2024-05-31 04:15:35', '2024-05-31 04:15:35', 'Fairuz', '12318273813918239123918', 'willysantoso1997@gmail.com', '081249118805', 1, 175000.00, 175000.00, 'Jakarta');

-- ----------------------------
-- Table structure for organizers
-- ----------------------------
DROP TABLE IF EXISTS "public"."organizers";
CREATE TABLE "public"."organizers" (
  "id" int8 NOT NULL DEFAULT nextval('organizers_id_seq'::regclass),
  "user_id" int8,
  "company_name" varchar(255) COLLATE "pg_catalog"."default",
  "contact_person" varchar(255) COLLATE "pg_catalog"."default",
  "phone" varchar(255) COLLATE "pg_catalog"."default",
  "website" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "about_us" text COLLATE "pg_catalog"."default",
  "logo" varchar(255) COLLATE "pg_catalog"."default",
  "username" varchar(255) COLLATE "pg_catalog"."default",
  "province" varchar(255) COLLATE "pg_catalog"."default",
  "city" varchar(255) COLLATE "pg_catalog"."default",
  "zip" varchar(255) COLLATE "pg_catalog"."default",
  "address" varchar(255) COLLATE "pg_catalog"."default",
  "proposal" varchar(255) COLLATE "pg_catalog"."default",
  "status" int8
)
;

-- ----------------------------
-- Records of organizers
-- ----------------------------
INSERT INTO "public"."organizers" VALUES (3, 11, 'Test Organizer', 'test123@gmail.com', '0812381293821', NULL, '2024-05-27 20:45:51', '2024-05-27 20:47:53', 'Lorem Ipsum', '0282ddff-59bf-418d-8f30-013111b90444.png', 'test123', 'JKT', 'JKT', '12312', 'Lorem Ipsum', 'cc12bb92-3fe2-443a-95a5-039fe3eabbd0.pdf', 1);
INSERT INTO "public"."organizers" VALUES (4, 12, 'Willy Org', 'willysantoso1997@gmail.com', '081249118805', NULL, '2024-05-30 04:36:58', '2024-05-30 04:37:47', '-', 'd042591a-847a-4b85-8b62-0343fbc25667.png', 'willysantoso', 'DKI Jakarta', 'Jakarta', '20234', '-', 'c9f2c960-9143-4b20-844f-b7ece3adfee9.pdf', 1);
INSERT INTO "public"."organizers" VALUES (1, 5, 'Rive Corp', 'rive@gmail.com', '0812123123128491', 'https://asfjklasjl.com', '2024-05-11 04:32:15', '2024-05-11 04:32:15', 'Lorem Ipsum', '60054755-a45a-4a4b-889a-23d3e5593b9d.png', 'rive2', 'DKI Jakarta', 'Jakarta Pusat', '99812', 'Lorem Ipsum todor', 'cb6b2391-c0f1-483e-9f54-84579b51ad17.pdf', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS "public"."password_resets";
CREATE TABLE "public"."password_resets" (
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS "public"."personal_access_tokens";
CREATE TABLE "public"."personal_access_tokens" (
  "id" int8 NOT NULL DEFAULT nextval('personal_access_tokens_id_seq'::regclass),
  "tokenable_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tokenable_id" int8 NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(64) COLLATE "pg_catalog"."default" NOT NULL,
  "abilities" text COLLATE "pg_catalog"."default",
  "last_used_at" timestamp(0),
  "expires_at" timestamp(0),
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS "public"."role";
CREATE TABLE "public"."role" (
  "id" int8 NOT NULL DEFAULT nextval('role_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO "public"."role" VALUES (1, 'Admin', '2024-05-04 22:16:12', '2024-05-04 22:16:12');
INSERT INTO "public"."role" VALUES (2, 'Event Organizer', '2024-05-04 22:16:12', '2024-05-04 22:16:12');
INSERT INTO "public"."role" VALUES (3, 'Scan Officer', '2024-05-04 22:16:12', '2024-05-04 22:16:12');
INSERT INTO "public"."role" VALUES (4, 'Customer', '2024-05-04 22:16:12', '2024-05-04 22:16:12');

-- ----------------------------
-- Table structure for sponsors
-- ----------------------------
DROP TABLE IF EXISTS "public"."sponsors";
CREATE TABLE "public"."sponsors" (
  "id" int8 NOT NULL DEFAULT nextval('sponsors_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "logo" varchar(255) COLLATE "pg_catalog"."default",
  "display_order" int8,
  "status" int8,
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;
COMMENT ON COLUMN "public"."sponsors"."status" IS 'ENUM(''active'', ''inactive'')';

-- ----------------------------
-- Records of sponsors
-- ----------------------------
INSERT INTO "public"."sponsors" VALUES (3, 'test', '5a79382a-24e9-4696-b3bb-d597e76c2f26.png', 1, 1, '2024-05-05 04:36:03', '2024-05-05 04:36:03');
INSERT INTO "public"."sponsors" VALUES (5, 'test', '7b2e1e3d-f4c0-401c-9e36-0dee42383feb.png', 2, 1, '2024-05-05 12:52:57', '2024-05-21 02:14:42');

-- ----------------------------
-- Table structure for thumbnails
-- ----------------------------
DROP TABLE IF EXISTS "public"."thumbnails";
CREATE TABLE "public"."thumbnails" (
  "id" int8 NOT NULL DEFAULT nextval('thumbnails_id_seq'::regclass),
  "display_order" int8,
  "image" varchar(255) COLLATE "pg_catalog"."default",
  "description" text COLLATE "pg_catalog"."default",
  "status" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of thumbnails
-- ----------------------------

-- ----------------------------
-- Table structure for ticket_variations
-- ----------------------------
DROP TABLE IF EXISTS "public"."ticket_variations";
CREATE TABLE "public"."ticket_variations" (
  "id" int8 NOT NULL DEFAULT nextval('event_variations_id_seq'::regclass),
  "event_id" int8,
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "price" numeric(10,0),
  "quota" int8,
  "max_user_purchase" int8,
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "description" text COLLATE "pg_catalog"."default",
  "status" int2
)
;
COMMENT ON COLUMN "public"."ticket_variations"."status" IS '0: deactive, 1: active';

-- ----------------------------
-- Records of ticket_variations
-- ----------------------------
INSERT INTO "public"."ticket_variations" VALUES (4, 1, 'Presale 2', 175000, 8, 3, '2024-05-13 01:23:04', '2024-05-13 01:23:04', 'Test', 1);
INSERT INTO "public"."ticket_variations" VALUES (5, 1, 'Presale 3', 200000, 8, 3, '2024-05-13 01:23:04', '2024-05-13 01:23:04', 'Test', 1);
INSERT INTO "public"."ticket_variations" VALUES (6, 1, 'Presale 4', 250000, 8, 3, '2024-05-13 01:23:04', '2024-05-13 01:23:04', 'Test', 1);
INSERT INTO "public"."ticket_variations" VALUES (7, 2, 'Presale 1', 150000, 8, 3, '2024-05-13 01:23:04', '2024-05-13 01:23:04', 'Test', 1);
INSERT INTO "public"."ticket_variations" VALUES (8, 2, 'Presale 2', 175000, 8, 3, '2024-05-13 01:23:04', '2024-05-13 01:23:04', 'Test', 1);
INSERT INTO "public"."ticket_variations" VALUES (9, 2, 'Presale 3', 200000, 8, 3, '2024-05-13 01:23:04', '2024-05-13 01:23:04', 'Test', 1);
INSERT INTO "public"."ticket_variations" VALUES (10, 2, 'Presale 4', 250000, 8, 3, '2024-05-13 01:23:04', '2024-05-13 01:23:04', 'Test', 1);
INSERT INTO "public"."ticket_variations" VALUES (2, 1, 'Presale 1', 150000, 8, 3, '2024-05-13 01:23:04', '2024-05-13 01:23:04', 'Test', 0);

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS "public"."tickets";
CREATE TABLE "public"."tickets" (
  "id" int8 NOT NULL DEFAULT nextval('tickets_id_seq'::regclass),
  "order_detail_id" int8,
  "ticket_code" varchar(255) COLLATE "pg_catalog"."default",
  "qr_code" varchar(255) COLLATE "pg_catalog"."default",
  "status" int8,
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "scanned_at" timestamp(6),
  "scanned_by" int8
)
;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO "public"."tickets" VALUES (31, 29, 'TICKET-1716410407-3221', 'GjYyU83bmRzJh1k89j1A', 1, '2024-05-23 03:40:07', '2024-05-23 03:40:41', NULL, NULL);
INSERT INTO "public"."tickets" VALUES (33, 30, 'TICKET-1716815635-5167', 'pBhkNnc2RgDK6Yl1Qs93Gx7K6y97YE6jKS6hpSH4', 1, '2024-05-27 20:13:55', '2024-05-27 20:15:51', NULL, NULL);
INSERT INTO "public"."tickets" VALUES (34, 31, 'TICKET-1716815635-9938', '0qfm4afp6BrkEZN68ITubMY9okiOwVKVr38udVrV', 1, '2024-05-27 20:13:55', '2024-05-27 20:15:51', NULL, NULL);
INSERT INTO "public"."tickets" VALUES (35, 32, 'TICKET-1716816256-1567', 'om62dfwJHAMmMZoDKxnU7AFQrzSJp3uFu52U0U7j', 0, '2024-05-27 20:24:16', '2024-05-27 20:24:16', NULL, NULL);
INSERT INTO "public"."tickets" VALUES (29, 28, 'TICKET-1716410407-7873', 'aS9jtNinbjTqdNIcaO7c', 2, '2024-05-23 03:40:07', '2024-05-24 04:50:16', '2024-05-24 04:50:16', 9);
INSERT INTO "public"."tickets" VALUES (32, 30, 'TICKET-1716815635-6648', '7GoK7ilwwaDTQy1axQrQybtU8r2JpDsg2xPB6urj', 2, '2024-05-27 20:13:55', '2024-05-27 20:21:17', '2024-05-27 20:21:17', 9);
INSERT INTO "public"."tickets" VALUES (30, 29, 'TICKET-1716410407-4372', '4TXYMu8QOAUKQRglRmcs', 2, '2024-05-23 03:40:07', '2024-05-24 04:52:14', '2024-05-24 04:52:14', 9);
INSERT INTO "public"."tickets" VALUES (36, 33, 'TICKET-1717017740-9007', '6FUWGVUSYscy8seVqwA7QEO7CIoUy8P04Da8HmjR', 1, '2024-05-30 04:22:20', '2024-05-30 04:34:00', NULL, NULL);
INSERT INTO "public"."tickets" VALUES (37, 33, 'TICKET-1717017740-9150', 'R5ArF4GNAGZui5J3xRIJKRnE0kgVP8rcjNcNqHaI', 1, '2024-05-30 04:22:20', '2024-05-30 04:34:00', NULL, NULL);
INSERT INTO "public"."tickets" VALUES (38, 34, 'TICKET-1717017740-3751', 'iWGGQivUUnF45zM3rfl72oNWmjpdY9kOoDNZo80I', 1, '2024-05-30 04:22:20', '2024-05-30 04:34:00', NULL, NULL);
INSERT INTO "public"."tickets" VALUES (39, 35, 'TICKET-1717103735-2116', 'IxCDGdcKrezr7biojGs0wHDlVSVnlilV45k3Tghy', 0, '2024-05-31 04:15:35', '2024-05-31 04:15:35', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email_verified_at" timestamp(0),
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "role_id" int8,
  "account_status" int4,
  "verify_token" varchar(255) COLLATE "pg_catalog"."default",
  "username" varchar(255) COLLATE "pg_catalog"."default",
  "phone" varchar(255) COLLATE "pg_catalog"."default",
  "nik" varchar(255) COLLATE "pg_catalog"."default",
  "organizer_id" int8
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (5, 'Rive', 'rive@gmail.com', NULL, '$2y$10$qxxu6GvvKJyeyk4gibMIJevZF5zeFSXLabakn5LUwOb/Qvkks8VJK', 'YzmBtC36wnKRRVmjEyXiObuEBZFQUMcmluGgjCXN1r8Urw2zTNjgVdlvxqLl', '2024-05-11 04:32:15', '2024-05-11 04:32:15', 2, 1, '9msZdJP9Ba5EO2KH6aKvULiW0Uq24C', NULL, NULL, NULL, NULL);
INSERT INTO "public"."users" VALUES (9, 'Budi', 'budiscanner@gmail.com', NULL, '$2y$10$qxxu6GvvKJyeyk4gibMIJevZF5zeFSXLabakn5LUwOb/Qvkks8VJK', NULL, '2024-05-13 02:14:25', '2024-05-13 02:24:57', 3, 1, 'LpQoWberRIOmsxbB9qp8lXNw5UWysh', NULL, NULL, NULL, 1);
INSERT INTO "public"."users" VALUES (12, 'Willy Org', 'willysantoso1997@gmail.com', NULL, '$2y$10$gbACGkjhYMX2fRWzn8y5c.V8nSr1r4Dnv7dUpIgu0Curxf3ULSY7a', NULL, '2024-05-30 04:36:58', '2024-05-30 04:37:47', 2, 1, 'yANKGCIBmOHeFqidblw5PBT1LGSx1P', NULL, NULL, NULL, NULL);
INSERT INTO "public"."users" VALUES (10, 'Rive 2', 'rive2@gmail.com', NULL, '$2y$10$qxxu6GvvKJyeyk4gibMIJevZF5zeFSXLabakn5LUwOb/Qvkks8VJK', NULL, '2024-05-24 18:11:17', '2024-05-24 19:24:46', 2, 1, 'z4uTycyAkMDIzIchRNlvpuMkHrhInK', NULL, NULL, NULL, NULL);
INSERT INTO "public"."users" VALUES (2, 'Punggawa Admin', 'admin@mail.com', NULL, '$2y$10$qxxu6GvvKJyeyk4gibMIJevZF5zeFSXLabakn5LUwOb/Qvkks8VJK', 'smEtTPh41VT8r0MCmi8QXzE42RDlmSYcC7QZvhiegNNXRupuCeNiEbevizOm', '2024-05-04 22:16:12', '2024-05-04 22:16:12', 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."users" VALUES (11, 'Test Organizer', 'test123@gmail.com', NULL, '$2y$10$A5h8d3js4j50voZwSEelouAhFsjM05b/Q2cMHm/w.f4MTuQVcEBqG', NULL, '2024-05-27 20:45:51', '2024-05-27 20:47:53', 2, 1, 'wznhXiRk42Iw5YAfTcv81efq0FHovt', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for withdrawl
-- ----------------------------
DROP TABLE IF EXISTS "public"."withdrawl";
CREATE TABLE "public"."withdrawl" (
  "id" int8 NOT NULL DEFAULT nextval('withdrawl_id_seq'::regclass),
  "beneficiary_name" varchar(255) COLLATE "pg_catalog"."default",
  "beneficiary_account" varchar(255) COLLATE "pg_catalog"."default",
  "beneficiary_bank" varchar(255) COLLATE "pg_catalog"."default",
  "amount" numeric(255,0),
  "status" int4,
  "event_organizer_id" int8,
  "notes" text COLLATE "pg_catalog"."default",
  "paid_at" timestamp(6),
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;

-- ----------------------------
-- Records of withdrawl
-- ----------------------------
INSERT INTO "public"."withdrawl" VALUES (1, 'Paijo', '123123', 'BCA', 200000, 1, 1, '-', '2024-05-26 21:37:59', '2024-05-26 20:56:06', '2024-05-26 21:37:59');
INSERT INTO "public"."withdrawl" VALUES (2, 'Paijo', '193829', 'BCA', 100000, 1, 1, '-', '2024-05-27 20:39:00', '2024-05-27 20:37:59', '2024-05-27 20:39:00');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."contact_us_id_seq"
OWNED BY "public"."contact_us"."id";
SELECT setval('"public"."contact_us_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."event_variations_id_seq"
OWNED BY "public"."ticket_variations"."id";
SELECT setval('"public"."event_variations_id_seq"', 10, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."events_category_id_seq"
OWNED BY "public"."events_category"."id";
SELECT setval('"public"."events_category_id_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."events_id_seq"
OWNED BY "public"."events"."id";
SELECT setval('"public"."events_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."events_scanner_job_id_seq"
OWNED BY "public"."events_scanner_job"."id";
SELECT setval('"public"."events_scanner_job_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."failed_jobs_id_seq"
OWNED BY "public"."failed_jobs"."id";
SELECT setval('"public"."failed_jobs_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."genreal_parameter_id_seq"
OWNED BY "public"."general_parameter"."id";
SELECT setval('"public"."genreal_parameter_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."invoices_id_seq"
OWNED BY "public"."invoices"."id";
SELECT setval('"public"."invoices_id_seq"', 24, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."jobs_id_seq"
OWNED BY "public"."jobs"."id";
SELECT setval('"public"."jobs_id_seq"', 32, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."local_notification_id_seq"
OWNED BY "public"."local_notification"."id";
SELECT setval('"public"."local_notification_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 93, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."orders2_id_seq"
OWNED BY "public"."orders_detail"."id";
SELECT setval('"public"."orders2_id_seq"', 35, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."orders_id_seq"
OWNED BY "public"."orders"."id";
SELECT setval('"public"."orders_id_seq"', 32, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."organizers_id_seq"
OWNED BY "public"."organizers"."id";
SELECT setval('"public"."organizers_id_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."personal_access_tokens_id_seq"
OWNED BY "public"."personal_access_tokens"."id";
SELECT setval('"public"."personal_access_tokens_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."role_id_seq"
OWNED BY "public"."role"."id";
SELECT setval('"public"."role_id_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."sponsors_id_seq"
OWNED BY "public"."sponsors"."id";
SELECT setval('"public"."sponsors_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."thumbnails_id_seq"
OWNED BY "public"."thumbnails"."id";
SELECT setval('"public"."thumbnails_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tickets_id_seq"
OWNED BY "public"."tickets"."id";
SELECT setval('"public"."tickets_id_seq"', 39, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 12, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."withdrawl_id_seq"
OWNED BY "public"."withdrawl"."id";
SELECT setval('"public"."withdrawl_id_seq"', 2, true);

-- ----------------------------
-- Primary Key structure for table contact_us
-- ----------------------------
ALTER TABLE "public"."contact_us" ADD CONSTRAINT "contact_us_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table events
-- ----------------------------
ALTER TABLE "public"."events" ADD CONSTRAINT "events_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table events_category
-- ----------------------------
ALTER TABLE "public"."events_category" ADD CONSTRAINT "events_category_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table events_scanner_job
-- ----------------------------
ALTER TABLE "public"."events_scanner_job" ADD CONSTRAINT "events_scanner_job_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_uuid_unique" UNIQUE ("uuid");

-- ----------------------------
-- Primary Key structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table general_parameter
-- ----------------------------
ALTER TABLE "public"."general_parameter" ADD CONSTRAINT "genreal_parameter_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table invoices
-- ----------------------------
ALTER TABLE "public"."invoices" ADD CONSTRAINT "invoices_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table jobs
-- ----------------------------
CREATE INDEX "jobs_queue_index" ON "public"."jobs" USING btree (
  "queue" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table jobs
-- ----------------------------
ALTER TABLE "public"."jobs" ADD CONSTRAINT "jobs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table local_notification
-- ----------------------------
CREATE INDEX "user_id" ON "public"."local_notification" USING btree (
  "user_id" "pg_catalog"."int8_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table local_notification
-- ----------------------------
ALTER TABLE "public"."local_notification" ADD CONSTRAINT "local_notification_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table orders
-- ----------------------------
ALTER TABLE "public"."orders" ADD CONSTRAINT "orders_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table orders_detail
-- ----------------------------
ALTER TABLE "public"."orders_detail" ADD CONSTRAINT "orders2_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table organizers
-- ----------------------------
ALTER TABLE "public"."organizers" ADD CONSTRAINT "organizers_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table password_resets
-- ----------------------------
ALTER TABLE "public"."password_resets" ADD CONSTRAINT "password_resets_pkey" PRIMARY KEY ("email");

-- ----------------------------
-- Indexes structure for table personal_access_tokens
-- ----------------------------
CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" ON "public"."personal_access_tokens" USING btree (
  "tokenable_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "tokenable_id" "pg_catalog"."int8_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table personal_access_tokens
-- ----------------------------
ALTER TABLE "public"."personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_token_unique" UNIQUE ("token");

-- ----------------------------
-- Primary Key structure for table personal_access_tokens
-- ----------------------------
ALTER TABLE "public"."personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table role
-- ----------------------------
ALTER TABLE "public"."role" ADD CONSTRAINT "role_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table sponsors
-- ----------------------------
ALTER TABLE "public"."sponsors" ADD CONSTRAINT "sponsors_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table thumbnails
-- ----------------------------
ALTER TABLE "public"."thumbnails" ADD CONSTRAINT "thumbnails_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table ticket_variations
-- ----------------------------
ALTER TABLE "public"."ticket_variations" ADD CONSTRAINT "event_variations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table tickets
-- ----------------------------
ALTER TABLE "public"."tickets" ADD CONSTRAINT "tickets_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table withdrawl
-- ----------------------------
ALTER TABLE "public"."withdrawl" ADD CONSTRAINT "withdrawl_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table events
-- ----------------------------
ALTER TABLE "public"."events" ADD CONSTRAINT "events_event_category_id_fkey" FOREIGN KEY ("event_category_id") REFERENCES "public"."events_category" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."events" ADD CONSTRAINT "events_event_organizer_id_fkey" FOREIGN KEY ("event_organizer_id") REFERENCES "public"."organizers" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table events_scanner_job
-- ----------------------------
ALTER TABLE "public"."events_scanner_job" ADD CONSTRAINT "events_scanner_job_event_id_fkey" FOREIGN KEY ("event_id") REFERENCES "public"."events" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."events_scanner_job" ADD CONSTRAINT "events_scanner_job_user_id_fkey" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table invoices
-- ----------------------------
ALTER TABLE "public"."invoices" ADD CONSTRAINT "invoices_order_id_fkey" FOREIGN KEY ("order_id") REFERENCES "public"."orders" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table local_notification
-- ----------------------------
ALTER TABLE "public"."local_notification" ADD CONSTRAINT "local_notification_user_id_fkey" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table orders
-- ----------------------------
ALTER TABLE "public"."orders" ADD CONSTRAINT "orders_event_id_fkey" FOREIGN KEY ("event_id") REFERENCES "public"."events" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."orders" ADD CONSTRAINT "orders_user_id_fkey" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table orders_detail
-- ----------------------------
ALTER TABLE "public"."orders_detail" ADD CONSTRAINT "orders_detail_order_id_fkey" FOREIGN KEY ("order_id") REFERENCES "public"."orders" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."orders_detail" ADD CONSTRAINT "orders_detail_ticket_id_fkey" FOREIGN KEY ("ticket_variation_id") REFERENCES "public"."ticket_variations" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table organizers
-- ----------------------------
ALTER TABLE "public"."organizers" ADD CONSTRAINT "organizers_user_id_fkey" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table ticket_variations
-- ----------------------------
ALTER TABLE "public"."ticket_variations" ADD CONSTRAINT "event_variations_event_id_fkey" FOREIGN KEY ("event_id") REFERENCES "public"."events" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table tickets
-- ----------------------------
ALTER TABLE "public"."tickets" ADD CONSTRAINT "tickets_order_detail_id_fkey" FOREIGN KEY ("order_detail_id") REFERENCES "public"."orders_detail" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."tickets" ADD CONSTRAINT "tickets_scanned_by_fkey" FOREIGN KEY ("scanned_by") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_organizer_id_fkey" FOREIGN KEY ("organizer_id") REFERENCES "public"."organizers" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."users" ADD CONSTRAINT "users_role_id_fkey" FOREIGN KEY ("role_id") REFERENCES "public"."role" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table withdrawl
-- ----------------------------
ALTER TABLE "public"."withdrawl" ADD CONSTRAINT "withdrawl_event_organizer_id_fkey" FOREIGN KEY ("event_organizer_id") REFERENCES "public"."organizers" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
