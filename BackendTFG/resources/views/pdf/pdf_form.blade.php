<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 13px; line-height: 1.5; margin: 40px; }
        h1 { text-align: center; font-size: 20px; margin-bottom: 30px; }
        h3 { font-size: 16px; margin-bottom: 10px; }
        .section { margin-top: 25px; }
        .bold { font-weight: bold; }
        .block { margin-bottom: 10px; }
        .authorization {
            border: 1px dotted #000;
            padding: 15px;
            margin-top: 20px;
        }
        .note {
            font-style: italic;
            font-size: 12px;
            margin-bottom: 10px;
        }
        .signature-line {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h1>FICHA DE INSCRIPCIÓN - CAMPAMENTO DE MONTAÑER@S ‘25</h1>

<div class="section">
    <p class="block"><span class="bold">1. Nombre y apellidos:</span> {{ $nombre_apellidos ?? '' }}</p>
    <p class="block"><span class="bold">2. Edad:</span> {{ $edad ?? '' }} &nbsp;&nbsp;&nbsp;
       <span class="bold">Fecha de nacimiento:</span> {{ $fecha_nacimiento ?? '' }}</p>
    <p class="block"><span class="bold">3. Nombre del grupo:</span> {{ $grupo ?? '' }}</p>
    <p class="block"><span class="bold">4. Nombre madre/padre/tutor/a:</span> {{ $nombre_tutor ?? '' }}</p>
    <p class="block"><span class="bold">5. Teléfono madre/padre/tutor/a:</span> {{ $telefono_tutor ?? '' }}</p>
    <p class="block"><span class="bold">6. ¿Qué esperas encontrar?:</span> {{ $expectativas ?? '' }}</p>
</div>

<div class="section">
    <h3>♥ OBSERVACIONES MÉDICAS</h3>
    <p class="block"><span class="bold">7. Observaciones médicas:</span><br>{{ $observaciones_medicas ?? '' }}</p>
    <p class="block"><span class="bold">8. Tratamiento / Medicación:</span><br>{{ $tratamiento ?? '' }}</p>
    <p class="block"><span class="bold">9. Seguro:</span> {{ $seguro ?? '' }} &nbsp;&nbsp;&nbsp; Nº: {{ $numero_seguro ?? '' }}</p>
</div>

<div class="section">
    <h3>AUTORIZACIONES</h3>

    <div class="authorization">
        <p class="note">* En caso de no completar la hoja siguiente de la ficha, NO será válida.<br>
        Por favor, leed detenidamente y cumplimentad ambas autorizaciones ya que son para motivos distintos.</p>

        <p>D./Dª. {{ $autorizacion_urgencias_nombre ?? '' }} (padre, madre o tutor/a del/a montañer@ de esta ficha)<br>
        con DNI {{ $autorizacion_urgencias_dni ?? '' }}</p>

        <p>En caso de urgencia y si no ha sido posible contactar conmigo, AUTORIZO al equipo de Monitor@s a llevar a mi hijo/a al centro de salud y, en su caso más grave, al hospital. Además de suministrar la medicación por prescripción médica.</p>

        <p class="signature-line">Fecha: {{ $autorizacion_urgencias_fecha ?? '' }}</p>
        <p class="signature-line">Firma:</p>
    </div>

    <div class="authorization">
        <p class="note">* En caso de no completar la hoja siguiente de la ficha, NO será válida.<br>
        Por favor, leed detenidamente y cumplimentad ambas autorizaciones ya que son para motivos distintos.</p>

        <p>D./Dª. {{ $autorizacion_imagen_nombre ?? '' }} (padre, madre o tutor/a del montañer@ de esta ficha)<br>
        con DNI {{ $autorizacion_imagen_dni ?? '' }}</p>

        <p>AUTORIZO a Montanyeres a publicar fotos y videos en donde puede aparecer mi hijo/a en las redes sociales de la asociación.</p>

        <p class="signature-line">Fecha: {{ $autorizacion_imagen_fecha ?? '' }}</p>
        <p class="signature-line">Firma:</p>
    </div>
</div>

</body>
</html>
