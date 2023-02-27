<?php

require_once('./functions.php');

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

echo "Hello ".$_SESSION['user']['email']." !";

$link = connectDB();

/*$rows = $link->exec("SELECT * FROM tasks");

var_dump($rows);*/

//dd($_GET);

if(isset($_GET['id'])) {
    $sql = 'SELECT * FROM tasks WHERE id = ' . $_GET['id'];
} else {
    $sql = 'SELECT * FROM tasks';
}

?>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Label</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($link->query($sql) as $row) { ?>
            <tr>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['label']; ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>