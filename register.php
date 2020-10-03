<?php include('header.php');?>
	<!-- Start Top Slider -->
						<!-- <header id="top">
							<div id="categorySlider" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#categorySlider" data-slide-to="0" class="active"></li><li data-target="#categorySlider" data-slide-to="1"></li><li data-target="#categorySlider" data-slide-to="2"></li><li data-target="#categorySlider" data-slide-to="3"></li><li data-target="#categorySlider" data-slide-to="4"></li><li data-target="#categorySlider" data-slide-to="5"></li><li data-target="#categorySlider" data-slide-to="6"></li><li data-target="#categorySlider" data-slide-to="7"></li><li data-target="#categorySlider" data-slide-to="8"></li><li data-target="#categorySlider" data-slide-to="9"></li><li data-target="#categorySlider" data-slide-to="10"></li><li data-target="#categorySlider" data-slide-to="11"></li><li data-target="#categorySlider" data-slide-to="12"></li><li data-target="#categorySlider" data-slide-to="13"></li><li data-target="#categorySlider" data-slide-to="14"></li>			  </ol>
									<div class="carousel-inner" role="listbox">
										<div class="item active">
											<img src="https://www.toplistlinks.com/images/adults.jpg	" alt="Dating" class="img-responsive">
											<div class="carousel-caption">
												<h2>Dating</h2>
												<p>Dating sites</p>
												<p>
													<a class="btn btn-primary" role="button" href="https://www.toplistlinks.com/category/Dating"> GO </a>
												</p>
											</div>
										</div>
										<div class="item">
											<img src="https://www.toplistlinks.com/images/arts.jpg" alt="Arts" class="img-responsive">
											<div class="carousel-caption">
												<h2>Arts</h2>
												<p>Art & Design sites</p>
											</div>
										</div>
										<div class="item">
											<img src="https://www.toplistlinks.com/images/business.jpg	" alt="Business" class="img-responsive">
											<div class="carousel-caption">
												<h2>Business</h2>
												<p>Business company links</p>
											</div>
										</div>
										<div class="item">
											<img src="https://www.toplistlinks.com/images/computers.jpg	" alt="Computers" class="img-responsive">
											<div class="carousel-caption">
												<h2>Computers</h2>
												<p>Link to computer information</p>
											</div>
										</div>
										<div class="item">
											<img src="https://www.toplistlinks.com/images/games.jpg	" alt="Games" class="img-responsive">
											<div class="carousel-caption">
												<h2>Games</h2>
												<p>Links to popular games and gaming websites</p>
											</div>
										</div>
										<div class="item">
											<img src="https://www.toplistlinks.com/images/health.jpg	" alt="Health" class="img-responsive">
											<div class="carousel-caption">
												<h2>Health</h2>
												<p>Health information</p>
											</div>
											</div>
											<div class="item">
												<img src="https://www.toplistlinks.com/images/kids.jpg	" alt="Kids and Teens" class="img-responsive">
												<div class="carousel-caption">
													<h2>Kids and Teens</h2>
													<p>Websites for Kids</p>
												</div>
											</div>
											<div class="item">
												<img src="https://www.toplistlinks.com/images/news.jpg	" alt="News" class="img-responsive">
												<div class="carousel-caption">
													<h2>News</h2>
													<p>Links to online newspapers and websites</p>
											</p>
											</div>
											</div>
											<div class="item">
												<img src="https://www.toplistlinks.com/images/recreation.jpg	" alt="Recreation" class="img-responsive">
												<div class="carousel-caption">
													<h2>Recreation</h2>
													<p>Recreation activities and events for the whole family.</p>
													
												</div>
											</div><div class="item">
												<img src="https://www.toplistlinks.com/images/reference.jpg	" alt="Reference" class="img-responsive">
												<div class="carousel-caption">
													<h2>Reference</h2>
													<p>Reference links</p>
											</div>
											</div><div class="item">
												<img src="https://www.toplistlinks.com/images/regional.jpg	" alt="Regional" class="img-responsive">
												<div class="carousel-caption">
													<h2>Regional</h2>
													<p>Regional links</p>
											
											</div>
											</div><div class="item">
												<img src="https://www.toplistlinks.com/images/science.jpg	" alt="Science" class="img-responsive">
												<div class="carousel-caption">
													<h2>Science</h2>
													<p>Links to science resources</p>
											</div>
											</div><div class="item">
												<img src="https://www.toplistlinks.com/images/shopping.jpg	" alt="Shopping" class="img-responsive">
												<div class="carousel-caption">
													<h2>Shopping</h2>
													<p>The best places to shop online</p>
											</div>
											</div><div class="item">
												<img src="https://www.toplistlinks.com/images/society.jpg	" alt="Society" class="img-responsive">
												<div class="carousel-caption">
													<h2>Society</h2>
													<p>Society links</p>
											</div>
											</div><div class="item">
												<img src="https://www.toplistlinks.com/images/sports.jpg	" alt="Sports" class="img-responsive">
												<div class="carousel-caption">
													<h2>Sports</h2>
													<p>Sport links</p>
											</div>
											</div>			
											</div>		
											<a class="left carousel-control" href="#categorySlider" role="button" data-slide="prev">
												<span class="fa fa-chevron-left fa-2x" aria-hidden="true"></span>
												<span class="sr-only">Previous</span>
											</a>
											<a class="right carousel-control" href="#categorySlider" role="button" data-slide="next">
												<span class="fa fa-chevron-right fa-2x" aria-hidden="true"></span>
												<span class="sr-only">Next</span>
											</a>
											</div>
											</header> -->
<!-- End Top Slider -->
<div class="container" id="toplist">
	<div class="row">
		<hr class="hr-primary" />
		<ol class="breadcrumb bread-primary ">
			<li><a href="https://www.toplistlinks.com/"><i class="fa fa-newspaper-o"></i> Categories</a></li>
		</ol>
	</div>
	<script>
		$(function(){
			$("#filter").change(function(){
				var request = "/";
				var arr = request.split("/");
//alert(arr);
var val = $(this).val();
if(request.length == 1)
{
	request = "/filter/"+val;
}
else
{
	if(arr[1] == "filter")
	{
		request = "/filter/"+val;
	}
	else if(arr[1] == "page")
	{
		request = "/filter/"+val+"/"+arr[1]+"/"+arr[2];
	}
	else
	{
		request = "/"+arr[1]+"/"+arr[2]+"/filter/"+val;
	}
}
if(val != "")
{
	$("#search_form").attr("action",request);
//alert($("#search_form").attr("action"));
$("#search_form").submit();
}
else
{
	window.location.assign("https://gov.forsagetron.io/");
}
});
		});
	</script>
	<ul id="categories" class="list-group row">
		<li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Dating"> Dating (0)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Arts"> Arts (1)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Business"> Business (0)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Computers"> Computers (2)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Games"> Games (0)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Health"> Health (0)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Kids-and-Teens"> Kids and Teens (0)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/News"> News (1)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Recreation"> Recreation (1)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Reference"> Reference (0)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Regional"> Regional (0)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Science"> Science (0)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Shopping"> Shopping (2)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Society"> Society (2)</a></li><li class="list-group-item col-xs-4"><a href="https://www.toplistlinks.com/category/Sports"> Sports (1)</a></li></ul>
		<hr>
		<div class="row">
			<form class="form-horizontal" action="/">
<!--<div class="col-md-9">
<input type="text" placeholder="Search" class="form-control" name="search"/> 
</div>
<div class="col-md-3">
<input type="submit" value="Search" class="btn btn-primary col-md-12"/>
</div>-->
<!-- <div class="col-md-2"></div>
<div class="col-md-8">	
	<div class="input-group">
		<input type="text" placeholder="Search" class="form-control" name="search" value=""/> 
		<span class="input-group-btn"><button type="submit" value="Search" class="btn btn-primary"><i class="fa fa-search"></i> Search</button></span>
	</div>
</div> -->
<div class="col-md-2"></div>
</form>
</div>
<hr>
<div class="row">
	<div class="col-md-9">
		<h1>Global top ranked websites</h1>
	</div>
	<div class="col-md-3">
		<form action="" class="form-inline" id="search_form">
			<div class="input-group col-md-12">
				<div class="input-group-addon">Sort By: </div>
				<select id="filter" class="form-control" >
					<option value="">--Sort By--</option>
					<option selected value="asc">Ascending</option>
					<option  value="date">Date</option>
					<option  value="desc">Descending</option>
					<option  value="most_view">Most Viewed</option>
					<option  value="ratings">Ratings</option>
				</select>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div id="no-more-tables">
		<table class="col-md-12 table-bordered table-striped table-condensed cf">
			<thead class="cf">
				<tr>
					<th class="ranking_th numeric">Rankings</th>
					<th class="thumb_th numeric">Status</th>
					<th class="site_th numeric">Proposal</th>
					<th class="site_th numeric">Likes</th>
					<th class="site_th numeric">Start Time:</th>
					<th class="site_th numeric">End Time:</th>
					<th class="site_th numeric">Hits Out</th>
					<th class="votes_th numeric">Votes</th>
				</tr>
			</thead>
			<tbody>
<!--        <tr>
<td colspan="4" class="pages"><ul class="pagination"><li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li><li><a href=https://www.toplistlinks.com/page/2>2</a></li><li><a href=https://www.toplistlinks.com/page/2>Next</a></li></ul></td>
</tr>
-->        
<tr>
	<td class="rank"><span class="ranking" data-title="Ranking">1</span><br/>
		<!-- <a href="https://www.toplistlinks.com/category/Shopping">Shopping</a>				 -->
	</td>
	<td class="thumb" data-title="Thumb"><a href="#" target="_blank" class="" style="color: green;">Active</a></td>

		<td class="site" data-title="Sitename"><h3><a href="https://www.toplistlinks.com/out/78a2106659f41a5aa926d9d937274861d8d252b3" target="_blank">Amazon.com</a></h3>
			Amazon.com seeks to be Earth&#039;s most customer-centric company, where customers can find and disc&hellip;Moreover anything they might want to buy online<br />

			<a href="https://www.toplistlinks.com/out/78a2106659f41a5aa926d9d937274861d8d252b3" target="_blank">http://www.amazon.com</a>


			<div class="text-center">

				<!--<a href="http://www.amazon.com" target="_blank"><img src="http://www.toplistlinks.com/images/banner468x60.png" alt="Amazon.com" class="banner" /></a>-->

			</div>

		</td>
		<td class="thumb" data-title="Hits In">0</td>
		<td class="thumb" data-title="Hits Out">3625</td>
		<td class="thumb" data-title="Start Time">3:6:25</td>
		<td class="thumb" data-title="End Time">3:6:25</td>
		<td class="votes" data-title="Votes">

			<ul class="nav nav-pills">

				<li class="active"><a href="https://www.toplistlinks.com/siteinfo/3">Vote <span class="badge">66</span></a></li>
			</ul>
		</td>
	</tr>
	<tr>
		<td class="rank"><span class="ranking" data-title="Ranking">2</span><br/>
			<!-- <a href="https://www.toplistlinks.com/category/Recreation">Recreation</a>				 -->
		</td>
			<td class="thumb" data-title="Thumb"><a href="#" target="_blank" class="" style="color: green;">Active</a></td>

			<td class="site" data-title="Sitename"><h3><a href="https://www.toplistlinks.com/out/4545bd67a4eb00f5a77a742b5b088572069c6554" target="_blank">Booking.com</a></h3>
				Worldwide reservations for accommodation<br />

				<a href="https://www.toplistlinks.com/out/4545bd67a4eb00f5a77a742b5b088572069c6554" target="_blank">http://www.booking.com</a>


				<div class="text-center">

					<!--<a href="http://www.booking.com" target="_blank"><img src="http://q-ec.bstatic.com/static/img/b26logo/booking_logo_retina/22615963add19ac6b6d715a97c8d477e8b95b7ea.png" alt="Booking.com" class="banner" /></a>-->

				</div>

			</td>
			<td class="thumb" data-title="Hits In">0</td>
			<td class="thumb" data-title="Hits Out">2385</td>
			<td class="thumb" data-title="Start Time">3:6:25</td>
			<td class="thumb" data-title="End Time">3:6:25</td>
			<td class="votes" data-title="Votes">

				<ul class="nav nav-pills">

					<li class="active"><a href="https://www.toplistlinks.com/siteinfo/6">Vote <span class="badge">16</span></a></li>
				</ul>
			</td>
		</tr>
		<tr>
			<td class="rank"><span class="ranking" data-title="Ranking">3</span><br/>
				<!-- <a href="https://www.toplistlinks.com/category/Shopping">Shopping</a>				 -->
			</td>
				<td class="thumb" data-title="Thumb"><a href="#" target="_blank" class="" style="color: green;">Active</a></td>

				<td class="site" data-title="Sitename"><h3><a href="https://www.toplistlinks.com/out/f64627a1be1e09c10436a12ab577a3ef6a089651" target="_blank">Burkley Case</a></h3>
					We are artisans of leather, dedicated to superior quality. We cherish traditions and handcraftsmanship.  Every stitch is done with exact precision and extreme attention to detail.  We have engineered cases that not only have that classic genuine leather<br />

					<a href="https://www.toplistlinks.com/out/f64627a1be1e09c10436a12ab577a3ef6a089651" target="_blank">http://burkleycase.com</a>


					<div class="text-center">

						<!--<a href="http://burkleycase.com" target="_blank"><img src="https://cdn6.bigcommerce.com/s-m3jr8uyy/images/stencil/500x200/2017_logo_1478288495__68178.original-min_1481835847.png" alt="Burkley Case" class="banner" /></a>-->

					</div>

				</td>
				<td class="thumb" data-title="Hits In">1</td>
				<td class="thumb" data-title="Hits Out">1187</td>
				<td class="thumb" data-title="Start Time">3:6:25</td>
				<td class="thumb" data-title="End Time">3:6:25</td>
				<td class="votes" data-title="Votes">

					<ul class="nav nav-pills">

						<li class="active"><a href="https://www.toplistlinks.com/siteinfo/249">Vote <span class="badge">8</span></a></li>
					</ul>
				</td>
			</tr>
			<tr>
				<td class="rank"><span class="ranking" data-title="Ranking">4</span><br/>
					<!-- <a href="https://www.toplistlinks.com/category/Society">Society</a>				 -->
				</td>
					<td class="thumb" data-title="Thumb"><a href="#" target="_blank" class="" style="color: green;">Active</a></td>

					<td class="site" data-title="Sitename"><h3><a href="https://www.toplistlinks.com/out/c792aca4855ec48f21d096862d5fe90564ce5022" target="_blank">Facebook</a></h3>
						It&#039;s a one type of social networking site in the world<br />

						<a href="https://www.toplistlinks.com/out/c792aca4855ec48f21d096862d5fe90564ce5022" target="_blank">http://facebook.com/</a>

					</td>
					<td class="thumb" data-title="Hits In">0</td>
					<td class="thumb" data-title="Hits Out">1523</td>
					<td class="thumb" data-title="Start Time">3:6:25</td>
					<td class="thumb" data-title="End Time">3:6:25</td>
					<td class="votes" data-title="Votes">

						<ul class="nav nav-pills">

							<li class="active"><a href="https://www.toplistlinks.com/siteinfo/4">Vote <span class="badge">11</span></a></li>
						</ul>
					</td>
				</tr>
				<tr>
					<td class="rank"><span class="ranking" data-title="Ranking">5</span><br/>
						<!-- <a href="https://www.toplistlinks.com/category/Computers/Tech">Tech</a>				 -->
					</td>
						<td class="thumb" data-title="Thumb"><a href="#" target="_blank" class="" style="color: green;">Active</a></td>

						<td class="site" data-title="Sitename"><h3><a href="https://www.toplistlinks.com/out/8774ddfa82db552b821644af65500d164fbc9001" target="_blank">Front End Developers</a></h3>
							Front-End-Developer.com is for Web enthusiasts and professionals who enjoys the life on the front end. The members of the group are welcome to share and discuss anything that has to do with front end Web development.<br />

							<a href="https://www.toplistlinks.com/out/8774ddfa82db552b821644af65500d164fbc9001" target="_blank">https://www.front-end-developer.com/</a>


							<div class="text-center">

								<!--<a href="https://www.front-end-developer.com/" target="_blank"><img src="https://www.front-end-developer.com/wp-content/uploads/2018/02/frontend-developer.png" alt="Front End Developers" class="banner" /></a>-->

							</div>

						</td>
						<td class="thumb" data-title="Hits In">43</td>
						<td class="thumb" data-title="Hits Out">1096</td>
						<td class="thumb" data-title="Start Time">3:6:25</td>
						<td class="thumb" data-title="End Time">3:6:25</td>
						<td class="votes" data-title="Votes">

							<ul class="nav nav-pills">

								<li class="active"><a href="https://www.toplistlinks.com/siteinfo/250">Vote <span class="badge">14</span></a></li>
							</ul>
						</td>
					</tr>
					<tr>
						<td class="rank"><span class="ranking" data-title="Ranking">6</span><br/>
							<!-- <a href="https://www.toplistlinks.com/category/Computers">Computers</a>		 -->

						</td>
							<td class="thumb" data-title="Thumb"><a href="#" target="_blank" class="" style="color: green;">Active</a></td>

							<td class="site" data-title="Sitename"><h3><a href="https://www.toplistlinks.com/out/3b1a6f335b2d02bfc339cedd56a2d23613773cc4" target="_blank">Google</a></h3>
								Internet number one search engine to find the world&#039;s information, including webpages, images, and videos and more<br />

								<a href="https://www.toplistlinks.com/out/3b1a6f335b2d02bfc339cedd56a2d23613773cc4" target="_blank">https://www.google.com/</a>


								<div class="text-center">

									<!--<a href="https://www.google.com/" target="_blank"><img src="https://www.google.com/images/srpr/logo11w.png" alt="Google" class="banner" /></a>-->

								</div>

							</td>
							<td class="thumb" data-title="Hits In">0</td>
							<td class="thumb" data-title="Hits Out">1460</td>
							<td class="thumb" data-title="Start Time">3:6:25</td>
							<td class="thumb" data-title="End Time">3:6:25</td>
							<td class="votes" data-title="Votes">

								<ul class="nav nav-pills">

									<li class="active"><a href="https://www.toplistlinks.com/siteinfo/5">Vote <span class="badge">6</span></a></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td class="rank"><span class="ranking" data-title="Ranking">7</span><br/>
								<!-- <a href="https://www.toplistlinks.com/category/News">News</a>				 -->
							</td>

								<!-- <td class="thumb" data-title="Thumb"><a href=https://www.toplistlinks.com/out/3f9ace72d8ef293787f8733a65e83c7df8d5d89e target="_blank" class=""><img class="thumbnail img-resonponsive" width="150" src="https://s.wordpress.com/mshots/v1/http://news.ycombinator.com?w=400" /></a></td> -->
								<td class="thumb" data-title="Thumb"><a href="#" target="_blank" class="" style="color: green;">Active</a></td>
								<td class="site" data-title="Sitename"><h3><a href="https://www.toplistlinks.com/out/3f9ace72d8ef293787f8733a65e83c7df8d5d89e" target="_blank">Hacker News</a></h3>
									Community tech news<br />

									<a href="https://www.toplistlinks.com/out/3f9ace72d8ef293787f8733a65e83c7df8d5d89e" target="_blank">http://news.ycombinator.com</a>

								</td>
								<td class="thumb" data-title="Hits In">0</td>
								<td class="thumb" data-title="Hits Out">1662</td>
								<td class="thumb" data-title="Start Time">3:6:25</td>
								<td class="thumb" data-title="End Time">3:6:25</td>
								<td class="votes" data-title="Votes">

									<ul class="nav nav-pills">

										<li class="active"><a href="https://www.toplistlinks.com/siteinfo/17">Vote <span class="badge">3</span></a></li>
									</ul>
								</td>
							</tr>
							<tr>
								<td class="rank"><span class="ranking" data-title="Ranking">8</span><br/>
									<!-- <a href="https://www.toplistlinks.com/category/Sports">Sports</a> -->

								</td>
									<td class="thumb" data-title="Thumb"><a href="#" target="_blank" class="" style="color: green;">Active</a></td>

									<td class="site" data-title="Sitename"><h3><a href="https://www.toplistlinks.com/out/43340a1795539329a2c2a77da6d7fd4e178b5657" target="_blank">Nba.com</a></h3>
										The official site of the National Basketball Association<br />

										<a href="https://www.toplistlinks.com/out/43340a1795539329a2c2a77da6d7fd4e178b5657" target="_blank">http://www.nba.com</a>


										<div class="text-center">

											<!--<a href="http://www.nba.com" target="_blank"><img src="http://www.toplistlinks.com/images/nba.jpg" alt="Nba.com" class="banner" /></a>-->

										</div>

									</td>
									<td class="thumb" data-title="Hits In">0</td>
									<td class="thumb" data-title="Hits Out">1352</td>
									<td class="thumb" data-title="Start Time">3:6:25</td>
									<td class="thumb" data-title="End Time">3:6:25</td>
									<td class="votes" data-title="Votes">

										<ul class="nav nav-pills">

											<li class="active"><a href="https://www.toplistlinks.com/siteinfo/7">Vote <span class="badge">8</span></a></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td colspan="8" class="pages">
										<table width='100%'> <tr> <td width='85%'> <ul class="pagination"><li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li><li><a href=https://www.toplistlinks.com/page/2>2</a></li><li><a href=https://www.toplistlinks.com/page/2>Next</a></li></ul></td><td width='15%'><span class="align-right">Results 1 - 8  out of 10</span></td></tr></table>
									</td>
								</tr>
							</tbody>
						</table>   
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="text-center">
						<a class="btn btn-primary" role="button" href="/pages/new">Add Link</a>
					</div>
				</div>
				<hr>

<?php include('footer.php');?>