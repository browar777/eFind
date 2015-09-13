<?PHP

session_start();

$id = $_GET['email_id'];

print_r($_SESSION['email_list']);

echo '</br> po unset </br>';

unset($_SESSION['email_list'][$id]);

print_r($_SESSION['email_list']);


header('Location: index.php#find-email');