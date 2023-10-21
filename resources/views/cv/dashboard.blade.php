@extends('layout.master_dashboard')

@section('content')
	<div id="colorlib-page">
		<div class="container-wrap">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<div class="text-center">
				<div class="author-img" style="background-image: url(/images/neta.jpg);"></div>
				<h1 id="colorlib-logo"><a href="index.html">Praneta Dwi Indarti</a></h1>
				<span class="position"><a href="#">Software Engineering Student</a></span>
			</div>
			<nav id="colorlib-main-menu" role="navigation" class="navbar">
				<div id="navbar" class="collapse">
					<ul>
						<li class="active"><a href="#" data-nav-section="home">Home</a></li>
						<li><a href="#" data-nav-section="about">About</a></li>
						<li><a href="#" data-nav-section="skills">Skills</a></li>
						<li><a href="#" data-nav-section="education">Education</a></li>
						<li><a href="#" data-nav-section="experience">Experience</a></li>
						<li><a href="#" data-nav-section="contact">Contact</a></li>
						<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
					</ul>
				</div>
			</nav>

		</aside>

		<div id="colorlib-main">
			<section id="colorlib-hero" class="js-fullheight" data-section="home">
				<div class="flexslider js-fullheight">
					<ul class="slides">
				   	<li style="background-image: url(/images/neta3.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
					   				<div class="slider-text-inner js-fullheight">
					   					<div class="desc">
						   					<h1 style="color: white;">Hi! I'm<br>Praneta Dwi Indarti</h1>
						   					<h2 style="color: white;">Software Engineering Student</h2>
											<h3 style="color: white;">Universitas Gadjah Mada</h3>
											</div>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				   	<li style="background-image: url(/images/neta2.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
					   				<div class="slider-text-inner">
					   					<div class="desc">
						   					<h1 style="color: white;">This is my<br>Curiculum Vitae</h1>
											</div>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				  	</ul>
			  	</div>
			</section>

			<section class="colorlib-about" data-section="about">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-12">
							<div class="row row-bottom-padded-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="col-md-12">
									<div class="about-desc">
										<span class="heading-meta">About Me</span>
										<h2 class="colorlib-heading">Who Am I?</h2>
										<p><strong>Hi I'm Praneta Dwi Indarti</strong> I am an undergraduate student majoring Software Engineering faculty of
											Vocational School at Gadjah Mada University. She is discipline, honest, and responsibility. She can work
											in individual or team well and manage the time properly. 
											</p>
										<p>Praneta is interested in technological advances,
										international issue and curious about new things to learn about it.</p>
									</div>
								</div>
							</div>
							<div class="row row-pt-md">
								<div class="col-md-4 text-center animate-box">
									<div class="services color-1">
										<span class="icon">
											<i class="icon-bulb"></i>
										</span>
										<div class="desc">
											<h3>Full Stack Developer</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center animate-box">
									<div class="services color-2">
										<span class="icon">
											<i class="icon-data"></i>
										</span>
										<div class="desc">
											<h3>Data Analytic</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center animate-box">
									<div class="services color-3">
										<span class="icon">
											<i class="icon-phone3"></i>
										</span>
										<div class="desc">
											<h3>AI</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center animate-box">
									<div class="services color-4">
										<span class="icon">
											<i class="icon-layers2"></i>
										</span>
										<div class="desc">
											<h3>Software</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center animate-box">
									<div class="services color-5">
										<span class="icon">
											<i class="icon-data"></i>
										</span>
										<div class="desc">
											<h3>Website</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center animate-box">
									<div class="services color-6">
										<span class="icon">
											<i class="icon-phone3"></i>
										</span>
										<div class="desc">
											<h3>Android</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="colorlib-skills" data-section="skills">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">My Specialty</span>
							<h2 class="colorlib-heading animate-box">My Skills</h2>
						</div>
					</div>
					<div class="card animate-box" style="background-color: aliceblue; padding: 20px; border-radius: 10px;" data-animate-effect="fadeInLeft">
						<div class="card-body" data-animate-effect="fadeInLeft">
							<div class="row">
								<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
									<p><strong>TECHICAL SKILLS</strong></p>
								</div>
								<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
									<div class="progress-wrap">
										<h3>GitHub</h3>
										<div class="progress">
											 <div class="progress-bar color-1" role="progressbar" aria-valuenow="80"
											  aria-valuemin="0" aria-valuemax="100" style="width:80%">
											<span>80%</span>
											  </div>
										</div>
									</div>
								</div>
								<div class="col-md-6 animate-box" data-animate-effect="fadeInRight">
									<div class="progress-wrap">
										<h3>Adobe Illustrator</h3>
										<div class="progress">
											 <div class="progress-bar color-2" role="progressbar" aria-valuenow="75"
											  aria-valuemin="0" aria-valuemax="100" style="width:75%">
											<span>75&%</span>
											  </div>
										</div>
									</div>
								</div>
								<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
									<div class="progress-wrap">
										<h3>Jupyter Notebook</h3>
										<div class="progress">
											 <div class="progress-bar color-3" role="progressbar" aria-valuenow="85"
											  aria-valuemin="0" aria-valuemax="100" style="width:85%">
											<span>85%</span>
											  </div>
										</div>
									</div>
								</div>
								<div class="col-md-6 animate-box" data-animate-effect="fadeInRight">
									<div class="progress-wrap">
										<h3>Figma</h3>
										<div class="progress">
											 <div class="progress-bar color-4" role="progressbar" aria-valuenow="85"
											  aria-valuemin="0" aria-valuemax="100" style="width:85%">
											<span>85%</span>
											  </div>
										</div>
									</div>
								</div>
								<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
									<div class="progress-wrap">
										<h3>Visual Studio Code</h3>
										<div class="progress">
											 <div class="progress-bar color-5" role="progressbar" aria-valuenow="90"
											  aria-valuemin="0" aria-valuemax="100" style="width:90%">
											<span>90%</span>
											  </div>
										</div>
									</div>
								</div>
								<div class="col-md-6 animate-box" data-animate-effect="fadeInRight">
									<div class="progress-wrap">
										<h3>Canva</h3>
										<div class="progress">
											 <div class="progress-bar color-6" role="progressbar" aria-valuenow="90"
											  aria-valuemin="0" aria-valuemax="100" style="width:90%">
											<span>90%</span>
											  </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<br>

					<div class="card animate-box" style="background-color: aliceblue; padding: 20px; border-radius: 10px;" data-animate-effect="fadeInLeft">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
									<p><strong>SOFT SKILLS</strong></p>
								</div>
								<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
									<p>- Honest</p>
									<p>- Discipline</p>
									<p>- Team Work</p>
								</div>
								<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
									<p>- Responsibility</p>
									<p>- Ontime</p>
									<p>- Decisive</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="colorlib-education" data-section="education">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Education</span>
							<h2 class="colorlib-heading animate-box">Education</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
							<div class="fancy-collapse-panel">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingOne">
									        <h4 class="panel-title">
									            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Universitas Gadjah Mada
									            </a>
									        </h4>
									    </div>
									    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									         <div class="panel-body">
									            <div class="row">
										      		<div class="col-md-9">
										      			<p><strong>Bachelor Applied Software Engineering </strong></p>
										      		</div>
										      		<div class="col-md-3">
										      			<p>2022-present</p>
										      		</div>
										      	</div>
									         </div>
									    </div>
									</div>
									<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingTwo">
									        <h4 class="panel-title">
									            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">SMA Negeri 1 Wates
									            </a>
									        </h4>
									    </div>
									    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									        <div class="panel-body">
												<div class="row">
													<div class="col-md-9">
														<p><strong>High School Mathematic and Natural Science (IPA)</strong></p>
														<p>School representative for City-Level National Science Competition 2020 and 2021 in Computer</p>
													</div>
													<div class="col-md-3">
														<p>2019-2022</p>
													</div>
												</div>
									        </div>
									    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="colorlib-experience" data-section="experience">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Experience</span>
							<h2 class="colorlib-heading animate-box">Work Experience</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
				         <div class="timeline-centered">

							<article class="timeline-entry animate-box" data-animate-effect="fadeInLeft">
					            <div class="timeline-entry-inner">
					               <div class="timeline-icon color-5">
					                  <i class="icon-pen2"></i>
					               </div>
					               <div class="timeline-label">
										<h2><a href="#">Event Division GamaExpo 2023</a> <span>September 2023- Present</span></h2>
											<div class="row">
									  			<div class="col-md-2">
										 		<p><strong>Member</strong></p>
									  			</div>
									  		<div class="col-md-10">
										  		<p>Create rundowns, invite speakers, event concepts, ensure events run well</p>
									  		</div>
								  		</div>
							 		</div>
					            </div>
					         </article>

					         <article class="timeline-entry animate-box" data-animate-effect="fadeInLeft">
					            <div class="timeline-entry-inner">
					               <div class="timeline-icon color-1">
					                  <i class="icon-pen2"></i>
					               </div>
					               <div class="timeline-label">
					                  	<h2><a href="#">Data Maning and AI KOMATIK UGM</a> <span>Februari 2023- Present</span></h2>
									  	<div class="row">
											<div class="col-md-2">
												<p><strong>Member</strong></p>
											</div>
											<div class="col-md-10">
												<p>Participated in organization events</p>
											</div>
										</div>
					               </div>
					            </div>
					         </article>

					         <article class="timeline-entry animate-box" data-animate-effect="fadeInRight">
					            <div class="timeline-entry-inner">
					               <div class="timeline-icon color-2">
					                  <i class="icon-pen2"></i>
					               </div>
								   <div class="timeline-label">
									<h2><a href="#">Social Community KMTEDI</a> <span>January 2023- Present</span></h2>
									<div class="row">
									  <div class="col-md-2">
										  <p><strong>Member</strong></p>
									  </div>
									  <div class="col-md-10">
										  <p>Participated in organization events</p>
									  </div>
								  </div>
								  <div class="row">
									<div class="col-md-2">
										<p><strong>Secretary and Treasurer in Vitamin Sea 2023</strong></p>
									</div>
									<div class="col-md-10">
										<p>Making proposal, ensuring the entire series of rundowns, equipment, consumptions, and all of the events goes well</p>
									</div>
								</div>
							 	</div>
					            </div>
					         </article>

					         <article class="timeline-entry animate-box" data-animate-effect="fadeInLeft">
					            <div class="timeline-entry-inner">
					               <div class="timeline-icon color-3">
					                  <i class="icon-pen2"></i>
					               </div>
					               <div class="timeline-label">
										<h2><a href="#">Majelis Permusyawaratan Kelas</a> <span> July 2019-June 2021</span></h2>
										<div class="row">
									  		<div class="col-md-2">
										  		<p><strong>Member of Division A</strong></p>
									  		</div>
									  	<div class="col-md-10">
										  	<p>Participated in organization events in LO, Event, Design and Decoration, and Risk Management 
											division.
											</p>
									  	</div>
								  	</div>
								 </div>
					            </div>
					         </article>

					         <article class="timeline-entry animate-box" data-animate-effect="fadeInTop">
					            <div class="timeline-entry-inner">
					               <div class="timeline-icon color-4">
					                  <i class="icon-pen2"></i>
					               </div>
								   <div class="timeline-label">
										<h2><a href="#">Real’s al-Mu’minun (Mosque Youth)</a> <span>June 2017- Present</span></h2>
										<div class="row">
									  		<div class="col-md-2">
										  		<p><strong>Member</strong></p>
									  		</div>
									  		<div class="col-md-10">
										  		<p>Participated in organization events</p>
									  		</div>
								  		</div>
										<div class="row">
											<div class="col-md-2">
												<p><strong>Treasurer</strong></p>
											</div>
											<div class="col-md-10">
												<p>Record, manage and control the financial during Ramadhan 2022. And manage finances of “Jalan Sehat” event for public participants to commemorate “Maulid Nabi” 2022</p>
											</div>
										</div>
							 		</div>
					         </article>

					         <article class="timeline-entry begin animate-box" data-animate-effect="fadeInBottom">
					            <div class="timeline-entry-inner">
					               <div class="timeline-icon color-none">
					               </div>
					            </div>
					         </article>
					      </div>
					   </div>
				   </div>
				</div>
			</section>

			<section class="colorlib-contact" data-section="contact">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Get in Touch</span>
							<h2 class="colorlib-heading">Contact</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-globe-outline"></i>
								</div>
								<div class="colorlib-text">
									<p><a href="#" style="color: black;">pranetaw23@gmail.com</a></p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-map"></i>
								</div>
								<div class="colorlib-text">
									<p>Giyoso, Salamrejo, Sentolo, Kulon Progo, Yogyakarta</p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-phone"></i>
								</div>
								<div class="colorlib-text">
									<p><a href="tel://" style="color: black;">085877573513</a></p>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-md-push-1">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInRight">
									<form action="">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Name" style="color: black;">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Email">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Subject">
										</div>
										<div class="form-group">
											<textarea name="" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="Send Message">
										</div>
									</form>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</section>

		</div><!-- end:colorlib-main -->
	</div><!-- end:container-wrap -->
	</div><!-- end:colorlib-page -->
    @endsection



