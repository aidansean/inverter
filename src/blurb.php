<h3>About this transformation</h3>
<p>The inversion transformation takes a point \((x_0,y_0) = f(r_0,\theta_0)\) on the plane and inverts it through the origin to give a new point \((x_1,y_1)\).  The distance of the point \((x_0,y_0)\) to the origin is r<sub>0</sub> and the distance from the point (x<sub>1</sub>,y<sub>1</sub>) to the origin is \(r_1\).  Similarly, the angles made with the \(x\)-axis are \(\theta_0\) and \(\theta_1\).  The transformation for a point is:</p>

<p class="center">\( (x_0,y_0) = f(r_0,\theta_0) \)<br />
\(r_1 = 1/r_0\)<br />
\(\theta_1 = \theta_0+\pi\)</p>

<h3>Shape definitions</h3>
<p>The "source" (by default red) is transformed into a curve (by default green) in steps.  The steps are intended to help you to visualise how each point transforms and each step, in isolation, is meaningless.  The \(x\) and \(y\) axes transform onto themselves, and the unit circle (\(1=x^2+y^2\)) transforms onto itself.  Any point inside the unit circle will transform to a point outside the unit circle, and vice versa.  No point transforms onto itself.</p>
  
<h3>Display settings</h3>
<p>The opacity and colours of the source, curve, unit circle and axes can be changed using the settings listed below.</p>
  
<h3>Performance settings</h3>
<p>The inverter uses your computer's CPU to perform lots of calculations.  By default the settings suit a low end computer, so the animation is not very smooth.  If you want a smoother animation you can:</p>
<ul>
  <li>Increase the number of points to around 5,000, to get a smoother curve.</li>
  <li>Increase the number of steps to get a smoother transition.</li>
  <li>Decrease the delay to speed up the transition.</li>
</ul>

<h3>Curve definition</h3>
<p>There are two ways to define the curve you want to transform.  You can either provide a polygon, by specifying the points, or you can provide an equation to define the curve.  If you define the curve with an equation and nothing shows, you may have a problem with your equation (eg division by zero, square root of a negative number, natural log of a negative number.)</p>