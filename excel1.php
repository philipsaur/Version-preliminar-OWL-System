<?php
require_once("registrar.php");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ReporteNovedades.xls");
$sql = "SELECT * FROM registrar_usuarios";
    echo '<table>
            <tr>
                <th>Numero de documento</th>
                <th>Contraseña</th>
                <th>Nombre de usuario</th>
                <th>Primer nombre</th>
                <th>Segundo nombre</th>
                <th>Codigo ciudad</th>
                <th>Edad</th>
                <th class="acciones">Acciones</th>
            </tr>';
    if ($rta = $conn->query($sql)) {
        while ($r = $rta->fetch_assoc()) {
            $Num_doc = $r["N_documento"];
            $Contraseña = $r["Contraseña"];
            $Nombre_usuario = $r["Nombre_de_usuario"];
            $Primer_nombre = $r["Primer_nombre"];
            $Segundo_nombre = $r["Segundo_nombre"];
            $Codigo_ciudad = $r["Codigo_ciudad"];
            $Edad = $r["Edad"];

            echo "<tr>
                    <td>$Num_doc</td>
                    <td>$Contraseña</td>
                    <td>$Nombre_usuario</td>
                    <td>$Primer_nombre</td>
                    <td>$Segundo_nombre</td>
                    <td>$Codigo_ciudad</td>
                    <td>$Edad</td>
                    <td class='acciones'>
                        <a href='editarusu.php?id=$Num_doc'>Editar</a>
                        <a href='eliminarusu.php?id=$Num_doc'>Eliminar</a>
                    </td>
                  </tr>";
        }
        $rta->free();
    }
    echo '</table>';
    ?>