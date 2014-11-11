	<div class="inicio">
        <?php echo form_open('mapas'); ?>
        <label for="fechaInicio">Fecha Inicio</label>
        <input type="date" id="fechaInicio" name="fechaInicio" required></input>
        <label for="fechaFin">Fecha Fin</label>
        <input type="date" id="fechaFin" name="fechaFin" required></input>
        <label for="placa">Placa</label>
        <input type="text" id="placa" name="placa" required></input>
        <?php
        echo form_submit('botonSubmit', 'Buscar');
        echo form_close();
        ?>
        <?php echo $map['html']; ?>
        <?php if ($historialVehiculo != null && $historialVehiculo != '61006' && $historialVehiculo != '61002') { ?>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Fecha</th>
                </tr>
                <?php foreach ($historialVehiculo as $registro): ?>
                    <tr>
                        <td> <?php echo $registro['name']; ?></td>
                        <td> <?php echo $registro['address']; ?> </td>
                        <td> <?php echo $registro['fecha']; ?> </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php } else { ?>
            <?php echo $historialVehiculo; ?>
        <?php } ?>
    </div>
<?php echo $map['js']; ?>
