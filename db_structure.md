###master_inbox
Master inbox is a database table where all of the messages go to get a master id and to live live for the length of the plugin.

	master_id | to_user | from_user | subject | message | to_status | from_status | timestamp | status_history | metadata
	
- master_id -> unique global number for all messages in the plugin.
- to_user -> The recipient of a message. Will be based on user_id or user_email from Wordpress->users table.
- from_user -> The sender of a message. Will be based on user_id or user_email from Wordpress->users table.
- subject -> Subject of the message thread. "Re:" gets truncated after the first "Re:" and files are displayed based on master_id.
- message -> Body of the message to be sent to a user.
- to_status -> The status in perspective of the to_user: Unread, Read, Delete. 
- from_status -> The status in perspective of the from_user: Draft, Sent, Delete.
- timestamp -> Server date and time of last status change.
- status_history -> JSON object containing chronological status updates with a timestamp.
- metadata -> Misc. data to be attached to the message. May store last copy of message here.

###user_data
User data is a table of users to keep track of subscriptions and message counts for the access based on payments.

	id | user | subscription_start | subscription_end | message_count 
	
- id -> based on a unique user id.
- user -> Same as user_mailbox name as below and comes from the wordpress users table.
- subscription_start -> The beginning date of an active subscription.
- subscription_end -> The date the subscription ends.
- message_count -> message counter of messages left to use.

###user_mailbox
user mailbox table is a template for a database created for each user and will be named based on user data from the wordpress users table. 

	mailbox_id | master_id | to_user | from_user | subject | message | to_status | from_status | timestamp | status_history | metadata

- mailbox_id -> Message ID unique to each user's mailbox
- master_id -> unique global number for all messages in the plugin.
- to_user -> The recipient of a message. Will be based on user_id or user_email from Wordpress->users table.
- from_user -> The sender of a message. Will be based on user_id or user_email from Wordpress->users table.
- subject -> Subject of the message thread. "Re:" gets truncated after the first "Re:" and files are displayed based on master_id.
- message -> Body of the message to be sent to a user.
- to_status -> The status in perspective of the to_user: Unread, Read, Delete. 
- from_status -> The status in perspective of the from_user: Draft, Sent, Delete.
- timestamp -> Server date and time of last status change.
- status_history -> JSON object containing chronological status updates with a timestamp.
- metadata -> Misc. data to be attached to the message. May store last copy of message here.

__Inbox Folder__

Columns from the user_mailbox that will be used to display information in the inbox folder. This is query and view only.

		inbox_id | master_id | to_user | from_user | subject | message | to_status | timestamp | metadata
__Sent Folder__

Columns from the user_mailbox that will be used to display information in the sent folder. This is query and view only.

		inbox_id | master_id | to_user | from_user | subject | message | from_status | timestamp | metadata
__Delete Folder__

Columns from the user_mailbox that will be used to display information in the delete folder. This is query and view only.

		inbox_id | master_id | to_user | from_user | subject | message | to_status | timestamp | metadata
