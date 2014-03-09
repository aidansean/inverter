from project_module import project_object, image_object, link_object, challenge_object

p = project_object('inverter', 'Mathematical inverter')
p.domain = 'http://www.aidansean.com/'
p.path = 'inverter'
p.preview_image_ = image_object('http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg', 408, 287)
p.github_repo_name = 'inverter'
p.mathjax = True
p.links.append(link_object(p.domain, 'inverter', 'Live page'))
p.introduction = 'This project performs the mathetical inversion transformation.  A curve on the plane is inverted such that points within the unit circle are mapped outsid the unit circle and vice versa.'
p.overview = '''This project was developed to satisfy my curiosity about the inversion transformation.  The user can choose to use on three coordinate systems, which are Cartesian, polar and parametric.  The equations are sent to a PHP script which generates an SVG file with Javascript embedded within in.  The SVG image then changes dynamically to show the user how the curve transforms under inversion.  The user can change the graphical settings to make a more aesthetically pleasing image.

The transformation of the point \(\vec{r}=(r,\theta)\) takes the form:

\begin{eqnarray}
  r      & \\to r'      & = 1/r        \\\\
  \\theta & \\to \\theta' & = \\pi+\\theta \\\\
\end{eqnarray}
'''

p.challenges.append(challenge_object('The project should allow the user to specify an arbitrary equation to use, without incurring a penalty associated with parsing the equation.', 'By passing the equations via PHP, it is possible to write the equations otu without relying on a CPU intensive function such as <code>eval</code> to interpret the equations.', 'Resolved'))

p.challenges.append(challenge_object('This project requires Javascript to interact with an SVG iamge.', 'The security restrictions imposed on SVG images are severe, so any Javascript must be completely embedded within the SVG image itself.  This was not the first time I had embedded Javascript within an SVG image, but it was one of the first time I\'d automated the writing of the SVG image to include Javascript.', 'Resolved'))

print p.wordpress_text()
