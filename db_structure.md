###master_inbox
	master_id | to_user | from_user | subject | message | to_status | from_status | timestamp | metadata

###user_data
	id | user | subscription_start | subscription_end | message_count | 

###user_inbox
	inbox_id | master_id | to | from | subject | message | to_status | from_status | timestamp | metadata

- __Inbox Folder__

		inbox_id | master_id | to_user | from_user | subject | message | to_status | timestamp | metadata
- __Sent Folder__

		inbox_id | master_id | to_user | from_user | subject | message | from_status | timestamp | metadata
- __Delete Folder__

		inbox_id | master_id | to_user | from_user | subject | message | to_status | timestamp | metadata
