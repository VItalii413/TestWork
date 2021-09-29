<?php
// Db connection
try {
	$pdo = new PDO('mysql:dbname=todo; host=localhost', 'root', 'root');
} catch (PDOException $e) {
	die($e->getMessage());
}
