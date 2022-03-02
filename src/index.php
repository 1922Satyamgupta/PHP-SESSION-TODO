<?php
session_start();
$operation = $_GET['operation'];
$input = "";
$operationVal = 'add';
$editId = 0;
switch ($operation) {
    case 'edit':
        $input = $_SESSION['list'][$_GET['id']];
        $operationVal = 'Update';
        $editId = $_GET['id'];
        break;
    case 'edittodo':
        $input = $_SESSION['task'][$_GET['id']];
        $operationVal = 'update';
        $editId = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
    <style>
        <?php include('style.css'); ?>
    </style>
</head>

<body>
    <div class="container">
        <h2>TODO LIST</h2>
        <h3>add Item</h3>
        <p>
        <form action="operationeration.php<? echo "/id=" . $editId ?>" method="post">
            <input id="new-todo" name='todo' type="text" value="<? echo $input; ?>">
            <input type='submit' name='btn' value='<? echo $operationVal; ?>'>
        </form>
        </p>
        <h3>Todo</h3>
        <ul id="incomplete-todos">
            <? if (gettype($_SESSION['list']) == 'array') {
                foreach ($_SESSION['list'] as $k => $v) { ?>
                    <li>
                        <input type="checkbox" onclick="location.href ='/todo.php?operation=c&id=<? echo $k; ?>'" />
                        <label><? echo $v ?></label>
                        <a style="margin: 5px;" href="/?operation=edit&id=<? echo $k ?>" class="edit">Edit</a>
                        <a style="margin: 5px;" href="/todo.php?operation=del&id=<? echo $k ?>">Delete</a>
                    </li>
            <? }
            } ?>
        </ul>
        <h3>Completed</h3>
        <ul id="completed-todos">
            <? if (gettype($_SESSION['todo']) == 'array') {
                foreach ($_SESSION['todo'] as $k => $v) {
            ?>
                    <li>
                        <input type="checkbox" checked>
                        <label><? echo $v ?></label>
                        <a style="margin: 5px;" href="/?operation=editd&id=<? echo $k ?>" class="edit">Edit</a>
                        <a style="margin: 5px;" href="/todo.php?operation=deld&id=<? echo $k ?>">Delete</a>
                    </li>
            <? }
            } ?>
        </ul>
    </div>
    <script src="script.js"></script>
</body>

</html>