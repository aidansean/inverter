<?php header("Content-type: image/svg+xml") ; ?>
<?php include('settings.php') ; ?>
<svg width="600" height="600" xmlns="http://www.w3.org/2000/svg" version="1.2" 
xmlns:xlink="http://www.w3.org/1999/xlink" onload="startup(evt)" 
xmlns:xhtml="http://www.w3.org/1999/xhtml"
id="global">
<rect id="canvas" onclick="click()"></rect>
<g id="shapes" onclick="click()"></g>
<script type="text/ecmascript">
<![CDATA[
var svgNS = "http://www.w3.org/2000/svg" ;
// These are the parameters that you can play around with:
var running = 1 ; // Turn the script on or off
var   delay = <?php echo $delay   ; ?> ; // Delay between updates (ms)
var    stop = <?php echo $nSteps  ; ?> ; // How long to run the script for
var nPoints = <?php echo $nPoints ; ?> ; // How many points to show

var sourceFillColor   = '<?php echo $sourceFillColor ;   ?>' ;
var sourceLineColor   = '<?php echo $sourceLineColor ;   ?>' ;
var sourceFillOpacity = '<?php echo $sourceFillOpacity ; ?>' ;
var sourceLineOpacity = '<?php echo $sourceLineOpacity ; ?>' ;
var curveFillColor    = '<?php echo $curveFillColor ;    ?>' ;
var curveLineColor    = '<?php echo $curveLineColor ;    ?>' ;
var curveFillOpacity  = '<?php echo $curveFillOpacity ;  ?>' ;
var curveLineOpacity  = '<?php echo $curveLineOpacity ;  ?>' ;

var axesOpacity       = '<?php echo $axesOpacity ;       ?>' ;
var unitCircleOpacity = '<?php echo $unitCircleOpacity ; ?>' ;
var canvasColor       = '<?php echo $canvasColor ;       ?>' ;

// Settings for the page
var    gw = 600 ; // width
var    gh = 600 ; // height
var scale = 100 ; // Convert units to pixels
var x_min = -5*gw/scale ;
var x_max =  5*gw/scale ;
var y_min = -5*gh/scale ;
var y_max =  5*gh/scale ;

var pi = Math.PI ; // Whimper.  Pi is not a var!

var pX0 = new Array() ;
var pY0 = new Array() ;
var pX1 = new Array() ;
var pY1 = new Array() ;
var pX2 = new Array() ;
var pY2 = new Array() ;

var t0 = 0 ;
nPoints = 10*nPoints ;
for(var i=0 ; i<nPoints ; i++){
  <?php
  if($type=='polar'){
    echo 'var t = 2*Math.PI*i/nPoints ;' , PHP_EOL ;
    echo '  pX0[i] = (' , $polar_equation , ')*cos(t) ;' , PHP_EOL ;
    echo '  pY0[i] = (' , $polar_equation , ')*sin(t) ;' , PHP_EOL ;
  }
  if($type=='cartesian'){
    echo 'var t = i/nPoints ;' , PHP_EOL ;
    echo '  var x = x_min+(x_max-x_min)*t ;' , PHP_EOL ;
    echo '  pX0[i] = x ; pY0[i] = ' , str_replace('"','',$cartesian_equation) , ' ;' , PHP_EOL ;
  }
  if($type=='parametric'){ 
    echo 'var t = -1 + 2*i/nPoints ;' , PHP_EOL ;
    echo '  pX0[i] = ' , str_replace('"','',$parametric_equation_x) , ' ;' , PHP_EOL ;
    echo '  pY0[i] = ' , str_replace('"','',$parametric_equation_y) , ' ;' , PHP_EOL ;
  }
  ?>
}

var pXTemp ;
var pYTemp ;
for(var i=0 ; i<pX0.length ; i++){
  pX1[i] = xInvert(pX0[i],pY0[i]) ;
  pY1[i] = yInvert(pX0[i],pY0[i]) ;
}

var counter = 0 ;
function startup(evt){
  counter = 0 ;
  var line = make("line","xAxis") ;
  append("shapes",line) ;
  set("xAxis","x1",X(-0.5*gw)) ;
  set("xAxis","x2",X( 0.5*gw)) ;
  set("xAxis","y1",Y(0)) ;
  set("xAxis","y2",Y(0)) ;
  set("xAxis","stroke","rgb(0,0,0)") ;
  set("xAxis","stroke-opacity",axesOpacity) ;
  line = make("line","yAxis") ;
  append("shapes",line) ;
  set("yAxis","x1",X(0)) ;
  set("yAxis","x2",X(0)) ;
  set("yAxis","y1",Y(-0.5*gh)) ;
  set("yAxis","y2",Y( 0.5*gh)) ;
  set("yAxis","stroke","rgb(0,0,0)") ;
  set("yAxis","stroke-opacity",axesOpacity) ;
  
  var unitCircle = make("circle","unitCircle") ;
  append("shapes",unitCircle) ;
  set("unitCircle", "cx",X(0)) ;
  set("unitCircle", "cy",Y(0)) ;
  set("unitCircle", "r",X(1)-X(0)) ;
  set("unitCircle", "fill-opacity",0) ;
  set("unitCircle", "stroke","rgb(99,99,99)") ;
  set("unitCircle", "stroke-opacity",unitCircleOpacity) ;
  
  set("global","width" ,gw) ;
  set("global","height",gh) ;
  set("canvas","width" ,gw) ;
  set("canvas","height",gh) ;
  set("canvas","fill",canvasColor) ;
  
  var source = make("path","source") ;
  append("shapes",source) ;
  set("source","fill"          , sourceFillColor  ) ;
  set("source","fill-opacity"  , sourceFillOpacity) ;
  set("source","stroke"        , sourceLineColor  ) ;
  set("source","stroke-opacity", sourceLineOpacity) ;
  
  var curve = make("path","curve") ;
  append("shapes",curve) ;
  set("curve","fill"          , curveFillColor  ) ;
  set("curve","fill-opacity"  , curveFillOpacity) ;
  set("curve","stroke"        , curveLineColor  ) ;
  set("curve","stroke-opacity", curveLineOpacity) ;
  
  // Set up source
  for(i=0 ; i<pX0.length ; i++){
    pX2[i] = round(pX0[i]+counter/stop*(pX1[i]-pX0[i])) ;
    pY2[i] = round(pY0[i]+counter/stop*(pY1[i]-pY0[i])) ;
    path = path+" L "+X(pX2[i])+" "+Y(pY2[i]) ;
  }
  var path = "M "+round(X(pX2[0]))+" "+round(Y(pY2[0])) ;
  for(i=1 ; i<pX0.length ; i++){
    path = path+" L "+round(X(pX2[i]))+" "+round(Y(pY2[i])) ;
  }
  path = path+" L "+round(X(pX2[0]))+" "+round(Y(pY2[0])) ;
  set("source","d",path) ;
  
  go() ;
}
function click(){
  if(counter>=stop){
    counter = 0 ;
    Get('shapes').removeChild(document.getElementById('source'    )) ;
    Get('shapes').removeChild(document.getElementById('curve'     )) ;
    Get('shapes').removeChild(document.getElementById('unitCircle')) ;
    Get('shapes').removeChild(document.getElementById('xAxis'     )) ;
    Get('shapes').removeChild(document.getElementById('yAxis'     )) ;
    startup() ;
  }
  if(running==1){
    running = 0 ;
  }
  else{
    running = 1 ;
  }
}
function go(){
  if(running==1){
    update() ;
    counter++ ;
  }
  if(counter<stop+1) window.setTimeout("go()", delay) ;
}
function update(){
  for(i=0 ; i<pX0.length ; i++){
    pX2[i] = round(pX0[i]+counter/stop*(pX1[i]-pX0[i])) ;
    pY2[i] = round(pY0[i]+counter/stop*(pY1[i]-pY0[i])) ;
    path = path+" L "+round(X(pX2[i]))+" "+round(Y(pY2[i])) ;
  }
  var path = "M "+round(X(pX2[0]))+" "+round(Y(pY2[0])) ;
  for(i=1 ; i<pX0.length ; i++){
    path = path+" L "+round(X(pX2[i]))+" "+round(Y(pY2[i])) ;
  }
  path = path+" L "+round(X(pX2[0]))+" "+round(Y(pY2[0])) ;
  set("curve","d",path) ;
}

function xInvert(x,y){
  var theta = atan2(y,x) ;
  r = sqrt(x*x+y*y) ;
  if(r==0) return 0 ;
  r = 1/r ;
  <?php if($invert_theta) echo '  theta = theta + Math.PI' , PHP_EOL ; ?>
  return r*cos(theta) ;
}
function yInvert(x,y){
  var theta = atan2(y,x) ;
  r = sqrt(x*x+y*y) ;
  if(r==0) return 0 ;
  r = 1/r ;
  <?php if($invert_theta) echo '  theta = theta + Math.PI' , PHP_EOL ; ?>
  return r*sin(theta) ;
}
function X(x){ return 0.5*gw+(x*scale) ; }
function Y(y){ return 0.5*gh-(y*scale) ; }

function   floor(a){ return Math.floor(a)   ; }
function     abs(a){ return Math.abs(a)     ; }
function    acos(a){ return Math.acos(a)    ; }
function    asin(a){ return Math.asin(a)    ; }
function    atan(a){ return Math.atan(a)    ; }
function atan2(a,b){ return Math.atan2(a,b) ; }
function     cos(a){ return Math.cos(a)     ; }
function     sin(a){ return Math.sin(a)     ; }
function     tan(a){ return Math.tan(a)     ; }
function     exp(a){ return Math.exp(a)     ; }
function       e(a){ return Math.exp(a)     ; }
function    sinh(a){ return 0.5*(Math.exp(a)-Math.exp(-a)) ; }
function    cosh(a){ return 0.5*(Math.exp(a)+Math.exp(-a)) ; }
function    tanh(a){ return sinh(0)/cosh(0) ; }
function sqrt(a){
  if(a<0) return 0 ;
  return Math.sqrt(a) ;
}
function pow(a, b){
  if(a<0){
    if(b!=round(b)) return 0 ;
  }
  return Math.pow(a,b) ;
}
function  ln(a){ return log(a) ; }
function log(a){
  if(a<=0) return 0 ;
  return Math.log(a) ;
}


// Helper functions
function append(parentId, child){ document.getElementById(parentId).appendChild(child) ; }
function set(elementId, attribute, value) { document.getElementById(elementId).setAttributeNS(null,attribute,value) ; }
function make(type, id){
  var thisObject = document.createElementNS(svgNS , type) ;
  thisObject.setAttributeNS(null,"id",id) ;
  return thisObject ;
}
function round(text){ return text.toPrecision(5) ; }
function   Get(id  ){ return document.getElementById(id) ; }

//]]>
</script>
</svg>

