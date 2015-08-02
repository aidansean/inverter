function toggle_performance(){
  if(Get('tr_performance_delay').className=='hide'){
    var trs = Get('table_form').getElementsByTagName('tr') ;
    for(var i=0 ; i<trs.length ; i++){ if(trs[i].id.match('tr_performance')) trs[i].className = '' ; }
    Get('toggle_performance').innerHTML='Hide' ;
  }
  else{
    var trs = Get('table_form').getElementsByTagName('tr') ;
    for(var i=0 ; i<trs.length ; i++){ if(trs[i].id.match('tr_performance')) trs[i].className = 'hide' ; }
    Get('toggle_performance').innerHTML='Show' ;
  }
}
function toggle_display(){
  if(Get('tr_display_sourceFillColor').className=='hide'){
    var trs = Get('table_form').getElementsByTagName('tr') ;
    for(var i=0 ; i<trs.length ; i++){ if(trs[i].id.match('tr_display')) trs[i].className = '' ; }
    Get('toggle_display').innerHTML='Hide' ;
  }
  else{
    var trs = Get('table_form').getElementsByTagName('tr') ;
    for(var i=0 ; i<trs.length ; i++){ if(trs[i].id.match('tr_display')) trs[i].className = 'hide' ; }
    Get('toggle_display').innerHTML='Show' ;
  }
}
function toggle_curve(){
  if(Get('tr_curve_coordinates').className=='hide'){
    Get('toggle_curve').innerHTML = 'Hide' ;
    Get('tr_curve_coordinates').className = '' ;
    choose_coordinates(Get('select_coordinates')) ;
  }
  else{
    Get('tr_curve_coordinates').className        = 'hide' ;
    Get('tr_coorindates_points').className       = 'hide' ;
    Get('tr_coorindates_polar').className        = 'hide' ;
    Get('tr_coorindates_cartesian').className    = 'hide' ;
    Get('tr_coorindates_parametric_x').className = 'hide' ;
    Get('tr_coorindates_parametric_y').className = 'hide' ;
    Get('toggle_curve').innerHTML='Show' ;
    
  }
}
function choose_coordinates(select){
  var choice = select.options[select.selectedIndex].value ;
  if(choice=='points'){
    Get('tr_coorindates_points').className       = '' ;
    Get('tr_coorindates_polar').className        = 'hide' ;
    Get('tr_coorindates_cartesian').className    = 'hide' ;
    Get('tr_coorindates_parametric_x').className = 'hide' ;
    Get('tr_coorindates_parametric_y').className = 'hide' ;
  }
  if(choice=='polar'){
    Get('tr_coorindates_points').className       = 'hide' ;
    Get('tr_coorindates_polar').className        = '' ;
    Get('tr_coorindates_cartesian').className    = 'hide' ;
    Get('tr_coorindates_parametric_x').className = 'hide' ;
    Get('tr_coorindates_parametric_y').className = 'hide' ;
  }
  if(choice=='cartesian'){
    Get('tr_coorindates_points').className       = 'hide' ;
    Get('tr_coorindates_polar').className        = 'hide' ;
    Get('tr_coorindates_cartesian').className    = '' ;
    Get('tr_coorindates_parametric_x').className = 'hide' ;
    Get('tr_coorindates_parametric_y').className = 'hide' ;
  }
  if(choice=='parametric'){
    Get('tr_coorindates_points').className       = 'hide' ;
    Get('tr_coorindates_polar').className        = 'hide' ;
    Get('tr_coorindates_cartesian').className    = 'hide' ;
    Get('tr_coorindates_parametric_x').className = '' ;
    Get('tr_coorindates_parametric_y').className = '' ;
  }
}
function update_inverter(){
  var GETs = '?' ;
  GETs = GETs + 'delay='    + Get('form_delay').value   ;
  GETs = GETs + '&nPoints=' + Get('form_nPoints').value ;
  GETs = GETs + '&nSteps='  + Get('form_nSteps').value  ;
  
  var select = Get('select_coordinates') ;
  var choice = select.options[select.selectedIndex].value ;
  if(choice=='polar'){
    GETs = GETs + '&type=polar' ;
    GETs = GETs + '&polar_equation=' + Get('form_polar_equation').value.replace(/\+/g,'plus') ;
  }
  if(choice=='parametric'){
    GETs = GETs + '&type=parametric' ;
    GETs = GETs + '&parametric_equation_x=' + Get('form_parametric_equation_x').value.replace(/\+/g,'plus') ;
    GETs = GETs + '&parametric_equation_y=' + Get('form_parametric_equation_y').value.replace(/\+/g,'plus') ;
  }
  if(choice=='cartesian'){
    GETs = GETs + '&type=cartesian' ;
    GETs = GETs + '&cartesian_equation=' + Get('form_cartesian_equation').value.replace(/\+/g,'plus') ;
  }
  
  GETs = GETs + '&sourceFillColor='   + Get('form_sourceFillColor'  ).value ;
  GETs = GETs + '&sourceLineColor='   + Get('form_sourceLineColor'  ).value ;
  GETs = GETs + '&sourceFillOpacity=' + Get('form_sourceFillOpacity').value ;
  GETs = GETs + '&sourceLineOpacity=' + Get('form_sourceLineOpacity').value ;
  GETs = GETs + '&curveFillColor='    + Get('form_curveFillColor'   ).value ;
  GETs = GETs + '&curveLineColor='    + Get('form_curveLineColor'   ).value ;
  GETs = GETs + '&curveFillOpacity='  + Get('form_curveFillOpacity' ).value ;
  GETs = GETs + '&curveLineOpacity='  + Get('form_curveLineOpacity' ).value ;
  GETs = GETs + '&axesOpacity='       + Get('form_axesOpacity'      ).value ;
  GETs = GETs + '&unitCircleOpacity=' + Get('form_unitCircleOpacity').value ;
  GETs = GETs + '&canvasColor='       + Get('form_canvasColor'      ).value ;
  
  Get('inverter_wrapper').innerHTML = '<object type="image\/svg+xml" data="inverter.php' + GETs + '" name="inverter" width="600px" height="600px" ><\/object>' ;
  
  // Set colors
  Get('td_sourceFillColor').style.backgroundColor = Get('form_sourceFillColor').value ;
  Get('td_sourceLineColor').style.backgroundColor = Get('form_sourceLineColor').value ;
  Get('td_curveFillColor').style.backgroundColor  = Get('form_curveFillColor' ).value  ;
  Get('td_curveLineColor').style.backgroundColor  = Get('form_curveLineColor' ).value  ;
  Get('td_canvasColor').style.backgroundColor     = Get('form_canvasColor'    ).value     ;
  
  Get('link').href = 'index.php' + GETs ;
}
function Get(id){ return document.getElementById(id) ; }