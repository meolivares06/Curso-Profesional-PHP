<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New animal</title>
</head>
<body>
    <main>

        <form action="index.php?controller=animal&action=save" method="post">
            
            <input type="hidden" name="id" id="id" value="<?php echo $animal->id; ?>">
            
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $animal->name; ?>">
            
            <label for="species">Especie</label>
            <input type="text" name="species" id="species" value="<?php echo $animal->species; ?>">
            
            <label for="breed">Raza</label>
            <input type="text" name="breed" id="breed" value="<?php echo $animal->breed; ?>">

            <label for="gender">Genero</label>
            <select name="gender">
                <option <?php echo $animal->gender == 'macho'?'selected':''; ?> value="macho"  >Macho</option>
                <option value="hembra" <?php echo $animal->gender == 'macho'?'selected':''; ?>>Hembra</option>
            </select>

            <label for="colour">Color</label>
            <input type="text" name="colour" id="colour" value="<?php echo $animal->colour; ?>">
            
            <label for="age">Edad</label>
            <input type="text" name="age" id="age" value="<?php echo $animal->age; ?>">
            <button type="submit">Send</button>
        </form>
    </main>
</body>
</html>