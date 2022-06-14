<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="main.css" type="text/css" rel="stylesheet">
    <title>Task list</title>
</head>
<body>
<div class="container">
    <div class="title">
        Task list
    </div>
    <div class="new-task-wrapper">
        <form action="api/main.php" method="post">
            <div>
                <input placeholder="Enter text..." name="text" type="text">
                <button class="btn-add-task" type="submit" name="action" value="add_task">Add task</button>
            </div>
            <div class="new-task-buttons">
                <button class="btn-ready" type="submit" name="action" value="ready_all">Ready all</button>
                <button class="btn-delete" type="submit" name="action" value="remove_all">Remove all</button>
            </div>
        </form>
    </div>
    <div class="task-list-wrapper">
        <?php
        session_start();
        foreach($_SESSION['tasks'] as $key=>$task){
            echo "<form action='api/main.php' method='post'>
                    <div class='task-wrapper'>
                        <div class='task-container'>
                            <input type='hidden' name='id_task' value=".$key.">
                            <div>
                                <label class='task-text'>".$task['text']."</label>
                            </div>
                            <div class='task-btn-wrapper'>
                                <button class='btn-ready' name='action' value='ready_task'>Ready</button>
                                <button class='btn-unready' name='action' value='unready_task'>Unready</button>
                                <button class='btn-delete' name='action' value='delete_task'>Delete</button>
                            </div>
                        </div>
                        <div class='task-status'>".($task['status']==1?'Выполнено':'Не готово')."</div>
                    </div>
                    ";

            echo '</form>';
        }
        ?>
    </div>
</div>
</body>
</html>