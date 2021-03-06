<?php

class builder {

//costruisce l'intestazione di pagina (parametri sono il titolo della pagina e lo sfondo dalla cartella immagini)
public static function Header($title,$bg='basicbg.jpg') {

    $bgurl = "../images/". $bg;
    header('Content-Type: text/html; charset=ISO-8859-1');
    header('<meta charset="UTF-8">');
    header ('<meta http-equiv="Content-type" content="text/html; charset=UTF-8">');
    echo '<html>
    <head>
        <title>'.$title. '</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css">
        <link href="/mdbootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/mdbootstrap/css/mdb.min.css" rel="stylesheet">
        <link href="/mdbootstrap/css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/datatables/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/css/baseline.css"/>
        <link rel="stylesheet" type="text/css" href="/tech/datepicker/bootstrap-datepicker3.min.css"/>
        <link rel="stylesheet" type="text/css" href="/tech/timepicker/jquery.timepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="/tech/chosen/component-chosen.min.css"/>
        <style> body {
                background-image: url('.$bgurl.');
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: #464646;
                }
        </style>
        <script>function showloader() {
                $("#loader").show();
              }
        </script>
    </head>
    <body>
    <div id="loader" class="loadingdiv">
        <img src="../../images/hourglass.gif" class="loadingimagediv">
    </div>
';


}

//include tutti gli script necessari
public static function Scripts() {


    echo '<script type="text/javascript" src="/mdbootstrap/js/jquery-3.3.1.min.js"></script>
          <script type="text/javascript" src="/mdbootstrap/js/bootstrap.min.js"></script>
          <script type="text/javascript" src="/mdbootstrap/js/popper.min.js"></script>
          <script type="text/javascript" src="/mdbootstrap/js/mdb.min.js"></script>
          <script type="text/javascript" src="/datatables/datatables.min.js"></script>
          <script type="text/javascript" src="/tech/datepicker/bootstrap-datepicker.min.js"></script>
          <script type="text/javascript" src="/tech/datepicker/bootstrap-datepicker.it.min.js"></script>
          <script type="text/javascript" src="/tech/timepicker/jquery.timepicker.min.js"></script>
          <script type="text/javascript" src="/tech/chosen/chosen.jquery.min.js"></script>';


    echo '<script type="text/javascript" src="/tech/jexport/tableExport.js"></script>
          <script type="text/javascript" src="/tech/jexport/jquery.base64.js"></script>';


    echo '<script>
            function stampa() {
                   window.print();
                }
        </script>';
    echo "
    <script type=\"text/javascript\">
    
        function checkAllIntercoms(e) {
            var aa = document.querySelectorAll(\"input[type=checkbox]\");
            for (var i = 0; i < aa.length; i++){
                aa[i].checked = e;
            }
        }    
    </script>
";
    echo '</body>';
}

//configura la DataTable con il nome della tabella, la paginazione, la lunghezza della paginazione, la colonna da ordinare (0 è la prima) e l'ordinamento
public static function configDataTable($tablename,$paginate,$lenght,$ordcol,$ascdesc) {
    echo '<script type="text/javascript" class="init">
                $(document).ready( function () {
                    $(\'#'.$tablename.'\').DataTable({
                        paging: '.$paginate.',    
                        "pageLength": '.$lenght.',
                        "order": [[ '.$ordcol.', "'.$ascdesc.'" ]],
                        "language": {
                            "decimal": ",",
                            "emptyTable": "Nessun risultato",
                            "info": "da _START_ a _END_ di _TOTAL_",
                            "infoEmpty": "Nessun Risultato",
                            "infoFiltered": "(filtrato da un totale di _MAX_ accessi)",
                            "infoPostFix": "",
                            "thousands": ".",
                            "lengthMenu": "Mostra _MENU_ risultati",
                            "loadingRecords": "Caricamento...",
                            "processing": "Elaborazione...",
                            "search": "Ricerca rapida:",
                            "zeroRecords": "Nessuna corrispondenza",
                            "paginate": {
                            "first": "Primo",
                            "last": "Ultimo",
                            "next": "Prossimo",
                            "previous": "Precedente"
                        },
                    "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                    }
                }
            });                   
    });
    </script >';
}

//come prima ma raggruppata
public static function configGroupedDataTable($grpclmn,$tablename,$paging,$lenght,$ordercolumn,$ascdesc,$grpcolspan,$grpcolor = '555555') {
    echo "<script>
            $(document).ready(function() {
                var groupColumn = ".$grpclmn.";
                var table = $('#".$tablename."').DataTable({
                    
                paging: '".$paging."',    
                \"pageLength\": '".$lenght."',
                \"order\": [[ ".$ordercolumn.", '".$ascdesc."' ]],
                \"language\": {
                               \"decimal\": \",\",
                               \"emptyTable\": \"Nessun risultato\",
                               \"info\": \"da _START_ a _END_ di _TOTAL_\",
                               \"infoEmpty\": \"Nessun Risultato\",
                               \"infoFiltered\": \"(filtrato da un totale di _MAX_)\",
                               \"infoPostFix\": \"\",
                               \"thousands\": \".\",
                               \"lengthMenu\": \"Mostra _MENU_ risultati\",
                               \"loadingRecords\": \"Caricamento...\",
                               \"processing\": \"Elaborazione...\",
                               \"search\": \"Ricerca rapida:\",
                               \"zeroRecords\": \"Nessuna corrispondenza\",
                               \"paginate\": {
                                              \"first\": \"Primo\",
                                              \"last\": \"Ultimo\",
                                              \"next\": \"Prossimo\",
                                              \"previous\": \"Precedente\"
                                            },
                               \"aria\": {
                                           \"sortAscending\": \": activate to sort column ascending\",
                                           \"sortDescending\": \": activate to sort column descending\"
                                         }
                            },
                \"columnDefs\": [
                        { \"visible\": false, \"targets\": groupColumn }
                    ],
                    \"order\": [[ groupColumn, 'asc' ]],
                    \"displayLength\": 25,
                    \"drawCallback\": function ( settings ) {
                        var api = this.api();
                        var rows = api.rows( {page:'current'} ).nodes();
                        var last=null;
             
                        api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                            if ( last !== group ) {
                                $(rows).eq( i ).before(
                                    '<tr class=\"DataTableGroup\" style=\"background-color: #{$grpcolor}\"><td colspan=\"".$grpcolspan."\">'+group+'</td></tr>'
                                );
            
                                last = group;
                            }
                        } );
                    }
                } );
             
                // Order by the grouping
                $('#example tbody').on( 'click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
                        table.order( [ groupColumn, 'desc' ] ).draw();
                    }
                    else {
                        table.order( [ groupColumn, 'asc' ] ).draw();
                    }
                } );
            } );
            
            </script>";
        }

//crea la barra di navigazione, la tabella dei parametri è quella scaricabile
public static function Navbar($table) {

    echo '<nav class="navbar navbar-expand-lg navbar-dark black">

    <a class="navbar-brand" href="\menu.php"><img src="/images/logo_logs.png" width="100"></a>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">

     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Logs</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/browser/browser.php" onclick="showloader()">Browser</a>
          <!--<a class="dropdown-item" href="/invoices/invoices.php?thcolor=59698d&status=manual" onclick="showloader()">Fatture da rettificare</a>
          <a class="dropdown-item" href="/receipts/receipts.php?thcolor=110e5e" onclick="showloader()">Cedolini</a>-->
        </div>
      </li>
     <!--   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Utenti</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/users/users.php" onclick="showloader()">Lista completa</a>
          <a class="dropdown-item" href="/users/users.php?status=active" onclick="showloader()">Utenti attivi</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/users/users.php?status=nocf" onclick="showloader()">Codice Fiscale mancante</a>
          <a class="dropdown-item" href="/users/users.php?status=nomail&thcolor=006273" onclick="showloader()">Email mancante</a>
          <a class="dropdown-item" href="/users/users.php?status=tosign&thcolor=d01add" onclick="showloader()">Da iscrivere</a>
          <a class="dropdown-item" href="/users/users.php?status=signed&thcolor=455114" onclick="showloader()">Iscritti non attivi</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accrediti</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/credits/credits.php" onclick="showloader()">Elenco completo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/credits/credits.php?status=ready" onclick="showloader()">Pronti</a>
          <a class="dropdown-item" href="/credits/credits.php?status=lost" onclick="showloader()">Persi</a>
          <a class="dropdown-item" href="/credits/credits.php?status=credited" onclick="showloader()">Accreditati</a>
          <a class="dropdown-item" href="/credits/credits.php?status=zero" onclick="showloader()">Nulli</a>
          <a class="dropdown-item" href="/credits/credits.php?status=sentlost" onclick="showloader()">Persi Notificati</a>
          
        </div>
      </li>-->
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opzioni</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/test.php?thcolor=000000" onclick="showloader()">Test</a>
          <!--<a class="dropdown-item" href="/options/conditions.php?thcolor=000000" onclick="showloader()">Condizioni</a>
          <a class="dropdown-item" href="/options/promos.php?thcolor=000000" onclick="showloader()">Promozioni</a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/options/edit_ini_file.php?thcolor=000000" onclick="showloader()">Modifica file INI</a> 
          <a class="dropdown-item" href="/options/log.php?thcolor=000" onclick="showloader()">LOG</a> <!--
          <a class="dropdown-item" href="/crons/primary_daily.php" onclick="showloader()">Aggiorna Tutto</a>
          <a class="dropdown-item" href="crons/monthly.php" onclick="showloader()">Manda Cedolini a Dom2</a>-->
        </div>
      </li>

      </ul>
      <ul class="navbar-nav pull-right">';

      if ($_SESSION["user_id"] != NULL) {echo '<li class="nav-item"><a class="nav-link" href="/logout.php" title="Click per logout">'.$_SESSION["user_name"].'</a></li>';}

      echo '<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 150px">Strumenti</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a href="" class="dropdown-item" data-toggle="modal" onclick="$(\'#'.$table.'\').tableExport({type:\'excel\',escape:\'false\'});">Esporta</a>
          <a href="" class="dropdown-item" data-toggle="modal" onclick="stampa()">Stampa</a>
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="mailto:max@swhub.io?subject=Segnalazione P.M.S." target="_blank">Segnala Problemi</a>
          <a class="dropdown-item" href="#">Versione '. $_SESSION['version']. '</a>
        </div>
      </li>  
       
      ';

    echo '</ul></div></nav>';

}

//avvia la sessione
public static function startSession() {
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location:https://punti.pickcenter.com/index.php");
    }
}

//prepara il datepicker per tutte i campi nominati nell'array
public static function createDatePicker($array) {

    $script = '';
    $number = count($array);
    for($i=0;$i<$number;$i++) {
        $script .= "
        <script>
            $('#".$array[$i]."').datepicker({
                language: \"it\",
                daysOfWeekDisabled: \"0,6\",
                autoclose: true,
                format: 'dd-mm-yyyy'
            });
          </script>
        ";
    }
    return $script;
}

//prepara il timepicker per tutte i campi nominati nell'array
    public static function createTimePicker($array) {

        $script = '';
        $number = count($array);
        for($i=0;$i<$number;$i++) {
            $script .= "
        <script>
                $('#".$array[$i]."').timepicker({
                'timeFormat': 'H:i',
                'minTime': '07:00am',
                'maxTime': '10:00pm'
                
                });
        </script>
        ";
        }
        return $script;
    }

//carica immagine v verde se valore 1 o x rossa se 0
public static function showCheck($value) {

    if ($value == 1) {
        return $imgstr = "SRC='/images/check.png' width='20'";
        } else return $imgstr = "SRC='/images/red-x.png' width='20'";

}

//mostra un avvertimento se le mail passate non coincidono
public static function showEmail($primary,$secondary = '',$message = '',$image= '',$secondaryimg='',$secondarymessage='') {

    $primary = strtolower($primary);
    $secondary = strtolower($secondary);

    if ($primary == $secondary || $secondary == '') {
        $op = "<A HREF='mailto:{$primary}'>{$primary}</A>";
    }
    if ($primary != $secondary && $primary != '') {
        $op = "<IMG SRC='{$image}' width='20' hspace='5' TITLE='{$message} ({$secondary})'><A HREF='mailto:{$primary}'>{$primary} </A>";
    }
    if ($secondary != '' && $primary == '') {
        $op = "<IMG SRC='{$secondaryimg}' TITLE='{$secondarymessage}' width='20' hspace='5'><A HREF='mailto:{$secondary}'>{$secondary} </A>";
    }

    return $op;
}

//mostra l'icona del CRM con un messaggio
public static function showCRMIcon($crmid,$urlmodulename) {
    if ($crmid!= '') {
        $op = "<A HREF='http://crm.pickcenter.com/index.php?module={$urlmodulename}s&action=DetailView&record={$crmid}' target='_blank'>
                                <IMG SRC='../images/swc_icon.png' width='24' title='MODIFICA DATI SUL CRM'></a>";
    } else $op = " <IMG SRC='../images/no_edit.png' width='24' title='CONTATTO/AZIENDA NON PRESENTE SUL CRM'>";
    return $op;
}

//legge il file ini per le configurazioni generali
public function readIniFile() {

    return $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/points.ini',true);

}


//ricarica la pagina corrente
public static function refreshPage() {
    echo "<meta http-equiv='refresh' content='0'>";
}

//torna a pagina (con percorso)
public static function backToPage($page) {
    echo "<script>window.location = '{$page}'</script>";
}

//crea una data in base al formato
public static  function cDateCreate($datestring,$format = 'Y-m-d') {
    $d = new DateTime($datestring);
    $dformat = $d->format($format);
    return $dformat;

}

}