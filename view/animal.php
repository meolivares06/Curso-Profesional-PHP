<?php
    require_once "core/constant.php";
    require_once "model/animal.php"; 
    $animalList = $this->model->getAll();
?>
<a href="index.php?controller=animal&action=showById">Nuevo</a>
<table>
    <thead>
        <throw>

          

            <?php foreach(ANIMAL_DATA as $key => $value): ?>
                <td><?php echo $value; ?></td> 
            <?php endforeach; ?>
            <td>&nbsp;</td>   
        </throw>
    </thead>
    <tbody>
        <?php foreach($animalList as $animal): ?>
        <tr>            
            <td><?php echo htmlspecialchars($animal->name); ?></td>
            <td><?php echo htmlspecialchars($animal->species); ?></td>
            <td><?php echo htmlspecialchars($animal->breed); ?></td>
            <td><?php echo htmlspecialchars($animal->gender); ?></td>
            <td><?php echo htmlspecialchars($animal->colour); ?></td>
            <td><?php echo htmlspecialchars($animal->age); ?></td>
            
            <td>
                <a href="index.php?controller=animal&action=showById&id=<?php echo $animal->id; ?>" >Actualizar</a>
            </td>
            <td>
                <a href="index.php?controller=animal&action=delete&id=<?php echo $animal->id; ?>" onclick="javascript:return confirm('Seguro que va a eliminar?')">Eliminar</a>
            </td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>