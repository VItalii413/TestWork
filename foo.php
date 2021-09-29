<?php
//PHP file in which all database queries will be executed.
include 'config.php';

$responsible = $_POST['responsible'];
$task = $_POST['task'];
$date = $_POST['date'];
$status = $_POST['status'];

// Create

if (isset($_POST['submit'])) {
	$sql = ("INSERT INTO `task`(`responsible`, `task`, `date`, `status`) VALUES(?,?,?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$responsible, $task, $date, $status]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
}

// Read

$sql = $pdo->prepare("SELECT * FROM `task`");
$sql->execute();
$result = $sql->fetchAll();

// Update
$edit_responsible = $_POST['edit_responsible'];
$edit_task = $_POST['edit_task'];
$edit_date = $_POST['edit_date'];
$edit_status = $_POST['edit_status'];
$get_id = $_GET['id'];
if (isset($_POST['edit-submit'])) {
	$sql = "UPDATE task SET responsible=?, task=?, date=?, status=? WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$edit_responsible, $edit_task, $edit_date, $edit_status, $get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

// DELETE
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM task WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}