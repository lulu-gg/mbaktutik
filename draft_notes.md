User:

id
name
email
password
role_id
status (0: Pending, 1: Approve)


Role:

id 
key
name

1: Admin -> admin
2: Event Organizer -> event_organizer
3: Petugas Scan -> scan_officer
4: Pembeli -> customer

Customer:

id
fullname
email
phone
nik


EventOrganizer:

id
user_id
username
email
name
phone
province
city
zipcode
address


EventOrganizerDocs: (untuk kelengkapan dokumen pengajuan)

id
event_organizer_id
path 


EventCategory

id
name

Event:

id
event_category_id
name
description
status (0: deactive, 1: active)
banner
thumbnail
start_date
end_date
location
province
city
zipcode
latitude
longitude
seo
seo_description

EventVaritaion: 

id
name 
price
quota
max_quota

Transaction:

id
booking_id
event_id
event_variation_id
customer_id
price
payment_method
ticket_number
date
status (0: nonactive, 1: active, 2: scanned)
payment_status (0: pending, 1: paid, 2: failed)

Invoice:

id
transaction_id
invoice_number
due_date
total

InvoiceDetail:

id
invoice_id
name
price





