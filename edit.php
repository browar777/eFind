<?PHP

session_start();

if(isset($_GET['email_id']))
{
	$id = $_GET['email_id'];
	unset($_SESSION['email_list'][$id]);
	header('Location: index.php#find-email');
}

if(isset($_POST['action']))
{

		unset($_POST['action']);
		$_SESSION['email_list'] = $_POST;
		header('Location: index.php#find-email');
}








