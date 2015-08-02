<table class="inverter" id="table_form">
<tr>
  <th class="inverter inverter_heading" colspan="3">Performance settings (<span id="toggle_performance" onClick="toggle_performance()">Hide</span>)</th>
</tr>
<tr id="tr_performance_delay">
  <th>Delay between updates: </th>
  <td class="inverter_td_1"><input type="text" id="form_delay" name="delay" value="<?php echo $delay ; ?>"></td>
  <td class="inverter_td_2">milliseconds</td>
</tr>
<tr id="tr_performance_nSteps">
  <th>Number of steps: </th>
  <td class="inverter_td_1"><input type="text" id="form_nSteps" name="nSteps" value="<?php echo $nSteps ; ?>"></td>
  <td class="inverter_td_2"></td>
</tr>
<tr id="tr_performance_nPoints">
  <th>Number of points: </th>
  <td class="inverter_td_1"><input type="text"  id="form_nPoints" name="nPoints" value="<?php echo $nPoints ; ?>"></td>
  <td class="inverter_td_2"></td>
</tr>
<tr>
  <th class="inverter inverter_heading" colspan="3">Display settings (<span id="toggle_display" onClick="toggle_display()">Show</span>)</th>
</tr>
<tr id="tr_display_sourceLineColor" class="hide">
  <th class="inverter_th_0">Source line colour: </th>
  <td class="inverter_td_1"><input type="text" id="form_sourceLineColor" name="sourceLineColor" value="<?php echo $sourceLineColor ; ?>"></td>
  <td class="inverter_td_2" id="td_sourceLineColor" style="background-color:<?php echo $sourceLineColor ;?>"></td>
</tr>
<tr id="tr_display_sourceFillColor" class="hide">
  <th class="inverter_th_0">Source fill colour: </th>
  <td class="inverter_td_1"><input type="text" id="form_sourceFillColor" name="sourceFillColor" value="<?php echo $sourceFillColor ; ?>"></td>
  <td class="inverter_td_2" id="td_sourceFillColor" style="background-color:<?php echo $sourceFillColor ;?>"></td>
</tr>
<tr id="tr_display_sourceLineOpacity" class="hide">
  <th class="inverter_th_0">Source line opacity: </th>
  <td class="inverter_td_1"><input type="text" id="form_sourceLineOpacity" name="sourceLineOpacity" value="<?php echo $sourceLineOpacity ; ?>"></td>
  <td class="inverter_td_2"></td>
</tr>
<tr id="tr_display_sourceFillOpacity" class="hide">
  <th class="inverter_th_0">Source fill opacity: </th>
  <td class="inverter_td_1"><input type="text" id="form_sourceFillOpacity" name="sourceFillOpacity" value="<?php echo $sourceFillOpacity ; ?>"></td>
  <td class="inverter_td_2"></td>
</tr>
<tr id="tr_display_curveLineColor" class="hide">
  <th class="inverter_th_0">Curve line colour: </th>
  <td class="inverter_td_2"><input type="text" id="form_curveLineColor" name="curveLineColor" value="<?php echo $curveLineColor ; ?>"></td>
  <td class="inverter_td_2" id="td_curveLineColor" style="background-color:<?php echo $curveLineColor ;?>"></td>
</tr>
<tr id="tr_display_curveFillColor" class="hide">
  <th class="inverter_th_0">Curve fill colour: </th>
  <td class="inverter_td_1"><input type="text" id="form_curveFillColor" name="curveFillColor" value="<?php echo $curveFillColor ; ?>"></td>
  <td class="inverter_td_2" id="td_curveFillColor" style="background-color:<?php echo $curveFillColor ;?>"></td>
</tr>
<tr id="tr_display_curveLineOpacity" class="hide">
  <th class="inverter_th_0">Curve line opacity: </th>
  <td class="inverter_td_1"><input type="text" id="form_curveLineOpacity" name="curveLineOpacity" value="<?php echo $curveLineOpacity ; ?>"></td>
  <td class="inverter_td_2"></td>
</tr>
<tr id="tr_display_curveFillOpacity" class="hide">
  <th class="inverter_th_0">Curve fill opacity: </th>
  <td class="inverter_td_1"><input type="text" id="form_curveFillOpacity" name="curveFillOpacity" value="<?php echo $curveFillOpacity ; ?>"></td>
  <td class="inverter_td_2"></td>
</tr>
<tr id="tr_display_axesOpacity" class="hide">
  <th class="inverter_th_0">Axes opacity: </th>
  <td class="inverter_td_1"><input type="text" id="form_axesOpacity" name="axesOpacity" value="<?php echo $axesOpacity ; ?>"></td>
  <td class="inverter_td_2"></td>
</tr>
<tr id="tr_display_unitCircleOpacity" class="hide">
  <th class="inverter_th_0">Unit circle opacity: </th>
  <td class="inverter_td_1"><input type="text" id="form_unitCircleOpacity" name="unitCircleOpacity" value="<?php echo $unitCircleOpacity ; ?>"></td>
  <td class="inverter_td_2"></td>
</tr>
<tr id="tr_display_canvasColor" class="hide">
  <th class="inverter_th_0">Canvas color: </th>
  <td class="inverter_td_1"><input type="text" id="form_canvasColor" name="unitCanvasColor" value="<?php echo $canvasColor ; ?>"></td>
  <td class="inverter_td_2" id="td_canvasColor" style="background-color:<?php echo $canvasColor ;?>"></td>
</tr>

<tr>
  <th class="inverter inverter_heading" colspan="3">Curve settings (<span id="toggle_curve" onClick="toggle_curve()">Hide</span>)</th>
</tr>
<tr id="tr_curve_coordinates">
  <th class="inverter_th_0">Input type</th>
  <td class="inverter_td_1">
    <select id="select_coordinates" name="coordinates" onChange="choose_coordinates(this)">
      <option value="none"> </option>
      <option value="polar">Polar coordinates</option>
      <option value="cartesian">Cartesian coordinates</option>
      <option value="parametric">Parametric coordinates</option>
    </select>
  <td class="inverter_td_2"></td>
</tr>
<tr id="tr_coorindates_points" class="hide">
  <th class="inverter_th_0">r = </th>
  <td class="inverter_td_1"><input type="text" name="polar_equation" value="<?php echo $polar_equation ; ?>"/></td>
  <td class="inverter_td_2">eg r = sin(4&theta;)</td>
</tr>
<tr id="tr_coorindates_polar" class="hide">
  <th class="inverter_th_0">r = </th>
  <td class="inverter_td_1"><input type="text" id="form_polar_equation" name="polar_equation" value="<?php echo $polar_equation ; ?>"/></td>
  <td class="inverter_td_2">eg r = <?php echo $polar_equation ; ?></td>
</tr>
<tr id="tr_coorindates_parametric_x" class="hide">
  <th class="inverter_th_0">x = </th>
  <td class="inverter_td_1"><input type="text" id="form_parametric_equation_x" name="parametric_equation_x" value="<?php echo $parametric_equation_x ; ?>"/></td>
  <td class="inverter_td_2">eg x = <?php echo $parametric_equation_x ; ?></td>
</tr>
<tr id="tr_coorindates_parametric_y" class="hide">
  <th class="inverter_th_0">y = </th>
  <td class="inverter_td_1"><input type="text" id="form_parametric_equation_y" name="parametric_equation_y" value="<?php echo $parametric_equation_y ; ?>"/></td>
  <td class="inverter_td_2">eg y = <?php echo $parametric_equation_y ; ?></td>
</tr>
<tr id="tr_coorindates_cartesian" class="hide">
  <th class="inverter_th_0">y = </th>
  <td class="inverter_td_1"><input type="text" id="form_cartesian_equation" name="cartesian_equation" value="<?php echo $cartesian_equation ; ?>"/></td>
  <td class="inverter_td_2">eg y = <?php echo $cartesian_equation ; ?></td>
</tr>
<tr id="tr_coorindates_cartesian">
  <th class="inverter_th_0"></th>
  <th class="inverter_th_0" style="text-align:center"><input type="submit" onClick="update_inverter()" value="Make changes" /></td>
  <th class="inverter_th_0"></td>
</tr>

</table>