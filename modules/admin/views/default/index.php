<?php
use yii\bootstrap\Html;?>

<div class="admin-default-index">
    <h1>Admin Module</h1>
    <?php echo Html::a('Tasks',['/admin/task']);?>
    <br>
    <?php echo Html::a('Performers',['/admin/performer'])?>
</div>
