<h1>Список задач на текущий месяц</h1>
<?php foreach ($content as $task):?>
<div>
    <h3>Задача номер №<?= $task['id']?></h3>
    <h4 style="background-color: #d58512; border-radius: 5px; padding: 10px"><?= $task['taskName']?></h4>
    <table>
        <tr>
            <td style="padding: 10px; width: auto">Испольнитель: <?= $task['performer']?></td>
            <td style="padding: 10px; width: auto">Приоритет: <?= $task['priority']?></td>
            <td style="padding: 10px; width: auto">Дата начала работы: <?= $task['dateCreate']?></td>
            <td style="padding: 10px; width: auto">Дата окончания работы: <?= $task['dateDeadline']?></td>
        </tr>
    </table>
</div>
<? endforeach;?>