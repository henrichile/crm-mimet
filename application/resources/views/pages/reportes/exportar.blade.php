<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
  <tr>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>Origen</th>
    <th>Formulario</th>
    <th>Observación Cliente</th>
    <th>Valor del lead</th>

    <th>Rut</th>
    <th>Tipo empresa</th>
    <th>Cantidad a cotizar</th>
    <th>Empresa</th>
    <th>Producto</th>
    <th>Tipo de servicio</th>
    <th>Numero de serie</th>
    <th>pais</th>

    <th>Estado Leads</th>
    <th>Fecha Creación</th>
    <th>Hora Creación</th>
    <th>Inscrito por</th>
    <th>Fecha Ultima actualización</th>
    <th>Hora Ultima actualización</th>
  </tr>
  @foreach($leads as $item)
  @php
   $fcrea=explode(" ", $item->lead_created);
   $fc=explode("-",$fcrea[0]);
   $fecreacion=$fc[2]."-".$fc[1]."-".$fc[0];
   
   $correo = preg_replace('/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', '', $item->lead_email);
   
   
   $factua=explode(" ", $item->lead_updated);
   $fact=explode("-",$factua[0]);
   $feactualiza=$fact[2]."-".$fact[1]."-".$fact[0];
   
   /*if($item->leadsassigned_userid==NULL){
     $nombreasignado="";
   }else{
   $userasig=DB::table('users')->where('id', '=',$item->leadsassigned_userid)->get();
     $nombreasignado= $userasig[0]->first_name." ".$userasig[0]->last_name;
   }
   <td>{{ $nombreasignado }}</td>
    <td>{{ $item->lead_custom_field_5 }}</td>
   */
   
  @endphp
  <tr>
    <td>{{ $item->lead_firstname }}</td>
    <td>{{ $item->lead_lastname }}</td>
    <td>{{ $item->lead_materno }}</td>
   
    <td>{{ $correo }}</td>
    <td>{{ $item->lead_phone }}</td>
    <td>{{ $item->lead_source }}</td>
    <td>{{ $item->lead_title }}</td>
    <td>{{ $item->lead_description }}</td>
    <td>{{ number_format($item->lead_value,0,",",".") }}</td>
    <td>{{ $item->lead_custom_field_1 }}</td>
    <td>{{ $item->lead_custom_field_2 }}</td>
    <td>{{ $item->lead_custom_field_3 }}</td>
    <td>{{ $item->lead_custom_field_4 }}</td>
    <td>{{ $item->lead_custom_field_5 }}</td>
    <td>{{ $item->lead_custom_field_7 }}</td>
    <td>{{ $item->lead_custom_field_8 }}</td>
    <td>{{ $item->lead_custom_field_9 }}</td>
    <td>{{ $item->leadstatus_title }}</td>
    <td>{{ $fecreacion }}</td>
    <td>{{ $fcrea[1] }}</td>
    @if(isset($item->idInstructor))
        <td>{{ $item->nombreInstructor." ".$item->apellidoInstructor }}</td>
    @else
        <td></td>
    @endif
    <td>{{ $feactualiza }}</td>
    <td>{{ $factua[1] }}</td>
    
  </tr>
  @endforeach

</table>
</body>
</html>