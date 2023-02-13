<?php

echo "Hello World !";

$dsn = 'mysql:dbname=b3cyber;host=mysql';
$user = 'root';
$password = '';

$link = new PDO($dsn, $user, $password);

/*$rows = $link->exec("SELECT * FROM tasks");

var_dump($rows);*/

$sql = 'SELECT * FROM tasks WHERE id = ' . $_GET['id'];

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