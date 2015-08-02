<?php

$nPoints = 500 ;
$nSteps  =  50 ;
$delay   =  50 ;

$sourceLineColor = "rgb(150,0,0)"     ;
$sourceFillColor = "rgb(255,150,150)" ;
$curveLineColor  = "rgb(0,150,0)"     ;
$curveFillColor  = "rgb(150,255,150)" ;

$sourceFillOpacity = 0.1 ;
$sourceLineOpacity = 0.1 ;
$curveFillOpacity  = 0.5 ;
$curveLineOpacity  = 0.5 ;
$axesOpacity       = 0.5 ;
$unitCircleOpacity = 0.5 ;
$canvasColor = 'rgb(255,255,255)' ;

$type ='polar' ;
$type ='cartesian' ;
$polar_equation        = '1+cos(2*t)' ;
$parametric_equation_x = 'sinh(5*t)'  ;
$parametric_equation_y = 'cosh(5*t)'  ;
$cartesian_equation    = 'x*x'        ;
$invert_theta = true ;

if(isset($_GET['type'                 ])) $type                  = $_GET['type'] ;
if(isset($_GET['polar_equation'       ])) $polar_equation        = str_replace('plus','+',$_GET['polar_equation'])        ;
if(isset($_GET['parametric_equation_x'])) $parametric_equation_x = str_replace('plus','+',$_GET['parametric_equation_x']) ;
if(isset($_GET['parametric_equation_y'])) $parametric_equation_y = str_replace('plus','+',$_GET['parametric_equation_y']) ;
if(isset($_GET['cartesian_equation'   ])) $cartesian_equation    = str_replace('plus','+',$_GET['cartesian_equation'])    ;

if(isset($_GET['nPoints'])) $nPoints = $_GET['nPoints'] ;
if(isset($_GET['nSteps' ])) $nSteps  = $_GET['nSteps' ] ;
if(isset($_GET['delay'  ])) $delay   = $_GET['delay'  ] ;

if(isset($_GET['sourceFillColor'  ])) $sourceFillColor   = $_GET['sourceFillColor'  ] ;
if(isset($_GET['sourceLineColor'  ])) $sourceLineColor   = $_GET['sourceLineColor'  ] ;
if(isset($_GET['sourceLineOpacity'])) $sourceLineOpacity = $_GET['sourceLineOpacity'] ;
if(isset($_GET['sourceFillOpacity'])) $sourceFillOpacity = $_GET['sourceFillOpacity'] ;
if(isset($_GET['curveFillColor'   ])) $curveFillColor    = $_GET['curveFillColor'   ] ;
if(isset($_GET['curveLineColor'   ])) $curveLineColor    = $_GET['curveLineColor'   ] ;
if(isset($_GET['curveLineOpacity' ])) $curveLineOpacity  = $_GET['curveLineOpacity' ] ;
if(isset($_GET['curveFillOpacity' ])) $curveFillOpacity  = $_GET['curveFillOpacity' ] ;
if(isset($_GET['axesOpacity'      ])) $axesOpacity       = $_GET['axesOpacity'      ] ;
if(isset($_GET['unitCircleOpacity'])) $unitCircleOpacity = $_GET['unitCircleOpacity'] ;
if(isset($_GET['canvasColor'      ])) $canvasColor       = $_GET['canvasColor'      ] ;

?>