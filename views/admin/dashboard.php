<?php 
session_start();

if($_SESSION['role'] !== 'admin') {
    header('Location: index.php?controller=pages&action=error');
    exit();
}
echo '<a href="index.php?controller=dashboard&action=add" class="underline font-bold">Add new topics</a>';