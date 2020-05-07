<?php
date_default_timezone_set('Europe/Berlin');

$hostname = '{mail.gandi.net:993/imap/ssl}INBOX';
$username = 'valence@luuse.io';
$password = 'louismandrin';

$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

$emails = imap_search($inbox,'ALL');
if($emails) {

	$output = '';

	rsort($emails);

	foreach($emails as $email_number) {

		$overview = imap_fetch_overview($inbox,$email_number,0);
		$message = imap_fetchbody($inbox,$email_number,1);
		$output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
		$output.= '<h1 class="subject">'.$overview[0]->subject.'</h1> ';
		$output.= '<span class="from">'.$overview[0]->from.'</span>';
		$output.= '<span class="date">on '.$overview[0]->date.'</span>';
		$output.= '<div class="body">'.$message.'</div>';
		$output.= '</div>';
	}

}
imap_close($inbox);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
		.toggler {
			outline: solid 1px;
		}
	</style>
</head>
<body>
<?php
	echo $output;
?>
</body>
</html>
