<?php
include('settings.php') ;
$title = 'Inverter' ;
$js_scripts = array('functions.js') ;
include($_SERVER['FILE_PREFIX'] . '/_core/preamble.php') ;
?>
<script type="text/javascript">
function start(){
<?php
if(isset($_GET['type'])){
  echo '  var select = Get("select_coordinates") ;' , PHP_EOL ;
  echo '  for(var i=0 ; i<select.options.length ; i++)' , PHP_EOL , '  {' , PHP_EOL ;
  echo '    if(select.options[i].value=="' , $_GET['type'] , '")' , PHP_EOL , '    {' , PHP_EOL ;
  echo '      select.options[i].selected = true ;' , PHP_EOL , '      break ;' , PHP_EOL , '    }' , PHP_EOL , '  }' , PHP_EOL ;
}
?>
  update_inverter() ;
}
</script>
<p class="notice">You need a browser which is capable of displaying scalable vector graphics to view this page properly.</p>
<?php include('form.php') ;?>
<div id="inverter_wrapper"></div>
<p><a href="" id="link">Link</a></p>
<?php include('blurb.php') ;?>

<?php foot() ; ?>