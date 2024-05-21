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

 Date: 21/05/2024 15:33:33
*/


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
An electrifying rock music concert featuring famous bands from both local and international scenes. Expect high-energy performances, stunning light shows, and an unforgettable experience for all rock enthusiasts.', 'Gelora Bung Karno Stadium', 'c3557db1-8934-418b-b8c5-1841b72830e2.png', '7ba40918-d600-4469-a02e-bb4c12b6a53a.png', 1, 1, '2024-05-11 04:35:30', '2024-05-13 03:39:00', '2024-05-11 12:00:00', '2024-05-13 12:00:00', 'No refunds. Ticket resale is prohibited. Attendees must comply with all event guidelines.
rock-music-concert', 'Join us for an unforgettable night of rock music with top bands from around the world. Secure your tickets now!', 'Join us for an unforgettable night of rock music with top bands from around the world. Secure your tickets now!', 'Jakarta', 'Jakarta', '1124', '0', '0');
INSERT INTO "public"."events" VALUES (3, 'Tech Innovation Summit', 2, 'A summit bringing together industry leaders to discuss the latest trends in technology and innovation. Includes keynote speeches, panel discussions, and networking opportunities.
Bali International Convention Centre', 'Bali International Convention Centre', 'c3557db1-8934-418b-b8c5-1841b72830e2.png', '7ba40918-d600-4469-a02e-bb4c12b6a53a.png', 1, 1, '2024-05-11 04:35:30', '2024-05-13 03:39:00', '2024-05-11 12:00:00', '2024-05-13 12:00:00', 'All sales are final. No on-site registration allowed. Attendees must present ID at check-in.
tech-innovation-summit
', 'askdfjsal', 'laksfjdlas', 'Jawa Timur', 'Surabaya', '1124', '0', '0');
INSERT INTO "public"."events" VALUES (5, 'Fitness and Wellness Expo', 2, 'An expo dedicated to health and fitness enthusiasts. Features fitness classes, wellness workshops, and products from leading brands in the health industry.', 'Bandung Convention Center', 'c3557db1-8934-418b-b8c5-1841b72830e2.png', '7ba40918-d600-4469-a02e-bb4c12b6a53a.png', 1, 1, '2024-05-11 04:35:30', '2024-05-13 03:39:00', '2024-05-11 12:00:00', '2024-05-13 12:00:00', 'No refunds. Proper workout attire required for fitness classes. Follow all safety guidelines.
fitness-and-wellness-expo', 'Enhance your fitness journey at our Wellness Expo. Participate in classes, workshops, and explore health products.', 'Enhance your fitness journey at our Wellness Expo. Participate in classes, workshops, and explore health products.', 'Jawa Timur', 'Surabaya', '1124', '0', '0');
INSERT INTO "public"."events" VALUES (4, 'Art and Craft Fair', 2, 'A vibrant fair showcasing handmade arts and crafts from local artisans. Enjoy workshops, live demonstrations, and purchase unique items directly from the makers.', 'Surabaya Town Square', 'c3557db1-8934-418b-b8c5-1841b72830e2.png', '7ba40918-d600-4469-a02e-bb4c12b6a53a.png', 1, 1, '2024-05-11 04:35:30', '2024-05-13 03:39:00', '2024-05-11 12:00:00', '2024-05-13 12:00:00', 'No refunds. Children under 12 must be accompanied by an adult. No outside food and drinks allowed.
art-and-craft-fair', 'Discover beautiful handmade arts and crafts at our fair. Join workshops and meet talented local artisans.', 'Discover beautiful handmade arts and crafts at our fair. Join workshops and meet talented local artisans.', 'Jawa Timur', 'Surabaya', '1124', '0', '0');
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
INSERT INTO "public"."events_scanner_job" VALUES (2, 9, 1, '2024-05-13 03:38:36', '2024-05-13 03:38:36');

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

-- ----------------------------
-- Table structure for general_parameter
-- ----------------------------
DROP TABLE IF EXISTS "public"."general_parameter";
CREATE TABLE "public"."general_parameter" (
  "id" int4 NOT NULL DEFAULT nextval('genreal_parameter_id_seq'::regclass),
  "seo_keyword" varchar(255) COLLATE "pg_catalog"."default",
  "seo_description" text COLLATE "pg_catalog"."default",
  "transaction_tax" int2,
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;

-- ----------------------------
-- Records of general_parameter
-- ----------------------------
INSERT INTO "public"."general_parameter" VALUES (1, 'rive', 'rive', 3, NULL, '2024-05-13 03:06:54');

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS "public"."invoices";
CREATE TABLE "public"."invoices" (
  "id" int8 NOT NULL DEFAULT nextval('invoices_id_seq'::regclass),
  "order_id" int8,
  "invoice_number" varchar(255) COLLATE "pg_catalog"."default",
  "date" date,
  "due_date" date,
  "amount" numeric(10,2),
  "status" int8,
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;

-- ----------------------------
-- Records of invoices
-- ----------------------------

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
  "updated_at" timestamp(6)
)
;
COMMENT ON COLUMN "public"."orders"."payment_method" IS 'Payment method used (e.g., credit card, bank transfer)';
COMMENT ON COLUMN "public"."orders"."payment_status" IS 'ENUM(''pending'', ''approved'', ''failed'')';
COMMENT ON COLUMN "public"."orders"."status" IS 'Status of the ticket (0: inactive, 1: active, 2: scanned)';

-- ----------------------------
-- Records of orders
-- ----------------------------

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
  "updated_at" timestamp(6)
)
;

-- ----------------------------
-- Records of organizers
-- ----------------------------
INSERT INTO "public"."organizers" VALUES (1, 5, 'Rive Corp', 'rive@gmail.com', '0812123123128491', 'https://asfjklasjl.com', '2024-05-11 04:32:15', '2024-05-11 04:32:15');

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
  "order_id" int8,
  "ticket_code" varchar(255) COLLATE "pg_catalog"."default",
  "qr_code" varchar(255) COLLATE "pg_catalog"."default",
  "status" int8,
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;

-- ----------------------------
-- Records of tickets
-- ----------------------------

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
INSERT INTO "public"."users" VALUES (2, 'Punggawa Admin', 'admin@mail.com', NULL, '$2y$10$qxxu6GvvKJyeyk4gibMIJevZF5zeFSXLabakn5LUwOb/Qvkks8VJK', NULL, '2024-05-04 22:16:12', '2024-05-04 22:16:12', 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."users" VALUES (9, 'paijo3', 'paijo@gmail.com', NULL, '$2y$10$TDuWofhCAm48A7zeaXJME.bYijtHoqV29e/NHGSdQ2SRgU.OGgq7O', NULL, '2024-05-13 02:14:25', '2024-05-13 02:24:57', 3, 1, 'LpQoWberRIOmsxbB9qp8lXNw5UWysh', NULL, NULL, NULL, 1);
INSERT INTO "public"."users" VALUES (5, 'Rive', 'rive@gmail.com', NULL, '$2y$10$qxxu6GvvKJyeyk4gibMIJevZF5zeFSXLabakn5LUwOb/Qvkks8VJK', NULL, '2024-05-11 04:32:15', '2024-05-11 04:32:15', 2, 1, '9msZdJP9Ba5EO2KH6aKvULiW0Uq24C', NULL, NULL, NULL, NULL);

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
SELECT setval('"public"."events_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."events_scanner_job_id_seq"
OWNED BY "public"."events_scanner_job"."id";
SELECT setval('"public"."events_scanner_job_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."failed_jobs_id_seq"
OWNED BY "public"."failed_jobs"."id";
SELECT setval('"public"."failed_jobs_id_seq"', 1, false);

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
SELECT setval('"public"."invoices_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."jobs_id_seq"
OWNED BY "public"."jobs"."id";
SELECT setval('"public"."jobs_id_seq"', 1, false);

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
ALTER SEQUENCE "public"."orders_id_seq"
OWNED BY "public"."orders"."id";
SELECT setval('"public"."orders_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."organizers_id_seq"
OWNED BY "public"."organizers"."id";
SELECT setval('"public"."organizers_id_seq"', 1, true);

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
SELECT setval('"public"."tickets_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 9, true);

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
ALTER TABLE "public"."tickets" ADD CONSTRAINT "tickets_order_id_fkey" FOREIGN KEY ("order_id") REFERENCES "public"."orders" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_organizer_id_fkey" FOREIGN KEY ("organizer_id") REFERENCES "public"."organizers" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."users" ADD CONSTRAINT "users_role_id_fkey" FOREIGN KEY ("role_id") REFERENCES "public"."role" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
