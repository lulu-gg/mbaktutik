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

 Date: 05/06/2024 06:59:42
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
-- Sequence structure for tenant_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tenant_id_seq";
CREATE SEQUENCE "public"."tenant_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
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
  "longitude" varchar(255) COLLATE "pg_catalog"."default",
  "deleted_at" timestamp(6),
  "slug" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of events
-- ----------------------------

-- ----------------------------
-- Table structure for events_category
-- ----------------------------
DROP TABLE IF EXISTS "public"."events_category";
CREATE TABLE "public"."events_category" (
  "id" int8 NOT NULL DEFAULT nextval('events_category_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "description" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "deleted_at" timestamp(6)
)
;

-- ----------------------------
-- Records of events_category
-- ----------------------------
INSERT INTO "public"."events_category" VALUES (2, 'Music', 'Event music', '2024-05-04 22:16:45', '2024-06-04 02:48:48', NULL);

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
  "status" int8,
  "is_internal" int2
)
;

-- ----------------------------
-- Records of organizers
-- ----------------------------
INSERT INTO "public"."organizers" VALUES (4, NULL, 'Rive Internals', 'admin@mail.com', '081249118805', NULL, '2024-05-30 04:36:58', '2024-06-05 06:57:41', '-', '179f44f7-697f-4a32-ad90-585274a675ae.png', 'riveeo', 'DKI Jakarta', 'Jakarta', '20234', '-', 'c9f2c960-9143-4b20-844f-b7ece3adfee9.pdf', 1, 1);

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
INSERT INTO "public"."sponsors" VALUES (6, 'Sponsor', '4709bafa-7fc7-473a-b055-0525542d63f1.png', 2, 1, '2024-06-01 05:37:09', '2024-06-01 05:37:09');
INSERT INTO "public"."sponsors" VALUES (8, 'Sponsor', 'dd16dba6-6129-487c-8b42-ea7e1cdd5371.png', 1, 1, '2024-06-01 05:38:28', '2024-06-01 05:38:28');
INSERT INTO "public"."sponsors" VALUES (9, 'Sponsor', 'a7b434f7-225c-458a-9685-76d234418a31.png', 4, 1, '2024-06-01 05:38:43', '2024-06-01 05:38:43');
INSERT INTO "public"."sponsors" VALUES (10, 'Sponsor', 'dae29875-0b96-49a1-81e4-167e6cb13bb5.png', 3, 1, '2024-06-01 05:39:15', '2024-06-01 05:39:15');
INSERT INTO "public"."sponsors" VALUES (11, 'Sponsor', '3ff687e2-6fc8-4c4f-8ac2-b6c25fa1daa8.png', 5, 1, '2024-06-01 05:39:31', '2024-06-01 05:39:31');

-- ----------------------------
-- Table structure for tenant
-- ----------------------------
DROP TABLE IF EXISTS "public"."tenant";
CREATE TABLE "public"."tenant" (
  "id" int8 NOT NULL DEFAULT nextval('tenant_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "username" varchar(255) COLLATE "pg_catalog"."default",
  "type" varchar(255) COLLATE "pg_catalog"."default",
  "city" varchar(255) COLLATE "pg_catalog"."default",
  "phone" varchar(255) COLLATE "pg_catalog"."default",
  "sheet_number" int4,
  "photo" varchar(255) COLLATE "pg_catalog"."default",
  "price" int8,
  "quota" int8,
  "description" text COLLATE "pg_catalog"."default",
  "status" int8,
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;

-- ----------------------------
-- Records of tenant
-- ----------------------------

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
  "status" int2,
  "deleted_at" timestamp(6)
)
;
COMMENT ON COLUMN "public"."ticket_variations"."status" IS '0: deactive, 1: active';

-- ----------------------------
-- Records of ticket_variations
-- ----------------------------

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
  "scanned_by" int8,
  "deleted_at" timestamp(6)
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
  "organizer_id" int8,
  "deleted_at" timestamp(6),
  "photo" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (2, 'Rive Admin', 'riveadmin@gmail.com', NULL, '$2y$10$ljJOE.GcEPSeThD1DhrNtuJliEJw0ZkVhSBRQ1nqR3Q7Sq10iEJzW', '7Of1OACjRU2CtGhLF6lK5d8e0IjwrOKbYoT2AiPy2pmCJWfO5YNSI17GgYxk', '2024-05-04 22:16:12', '2024-06-04 03:09:54', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
SELECT setval('"public"."event_variations_id_seq"', 11, true);

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
SELECT setval('"public"."events_id_seq"', 8, true);

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
SELECT setval('"public"."failed_jobs_id_seq"', 40, true);

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
SELECT setval('"public"."invoices_id_seq"', 26, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."jobs_id_seq"
OWNED BY "public"."jobs"."id";
SELECT setval('"public"."jobs_id_seq"', 68, true);

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
SELECT setval('"public"."orders2_id_seq"', 37, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."orders_id_seq"
OWNED BY "public"."orders"."id";
SELECT setval('"public"."orders_id_seq"', 34, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."organizers_id_seq"
OWNED BY "public"."organizers"."id";
SELECT setval('"public"."organizers_id_seq"', 6, true);

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
SELECT setval('"public"."sponsors_id_seq"', 11, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tenant_id_seq"
OWNED BY "public"."tenant"."id";
SELECT setval('"public"."tenant_id_seq"', 1, true);

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
SELECT setval('"public"."tickets_id_seq"', 41, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 20, true);

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
-- Primary Key structure for table tenant
-- ----------------------------
ALTER TABLE "public"."tenant" ADD CONSTRAINT "tenant_pkey" PRIMARY KEY ("id");

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
