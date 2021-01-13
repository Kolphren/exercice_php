<form action="log" method='get'>
    <select name="logs" id="logs">
        <?php
        foreach ($tab as $value) {
            echo '<option value="' . $value . '" ' . '>' .  $value . '</option>';
        }
        ?>
    </select>
    <button type="submit">Selectionner</button>
</form> 
<form action="log" method='post'>
    <textarea name="text" id="" cols="150" rows="30">
        <?php 
        if (isset ($_GET['logs'])){
            echo $logFile = file_get_contents('C:/MAMP/htdocs/exo/logs/'.$_GET['logs']); 
        }else{
            echo file_get_contents('./logs/log_'.date('d_m_y').'.txt', 'a+');
        }
         ?>
    </textarea>
    <button type="submit">Modifier</button>
</form>
<form action="" method="post">
    <div>
        <button type="submit" name='delete'>Supprimer le dossier courant</button>
    </div>
</form>

