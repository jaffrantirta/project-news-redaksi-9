
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
	<link rel="apple-touch-icon" sizes="57x57" href="/img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
<link rel="manifest" href="/img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/img/favicon/ms-icon-144x144.png"><link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/plugins/select2/select2.min.css" rel="stylesheet">
	<link href="css/ladda-themeless.min.css" rel="stylesheet">
	<link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	<link href="css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
	<link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	<link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/customstyle.css" rel="stylesheet">
	<link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
	<link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet"></head><body>

    <div id="wrapper">

		<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
							<!--<span>
                            <img alt="image" class="img-circle" src="img/user_male2-48x48.jpg" />
                            </span>-->
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span class="clear">
									<span class="block m-t-xs"><strong class="font-bold">I Komang Suparta</strong></span>
									<span class="text-muted text-xs block">Pewarta <b class="caret"></b></span>
								</span>
							</a>
							<ul class="dropdown-menu animated fadeInRight m-t-xs">
								<li><a href="/profile.php">Profile</a></li>
								<li class="divider"></li>
								<li><a href="/logout.php?redirect=true">Logout</a></li>
							</ul>
                    </div>
                    <div class="logo-element">
                      ANT
                    </div>
                </li>
								<li>
										<a href="/sso/send_session.php?sid=908ce4cdfc756d2e94578444a6c7c304" id="nav_sp2mt" title="SP2MT"><i class="fa fa-caret-square-o-right"></i> <span class="nav-label">SP2MT</span></a>
				</li>
								<li>
                    <a href="#"><i class="fa fa-newspaper-o"></i> <span class="nav-label">News New</span><span class="fa arrow"></span><span class="label label-info menunewsalert hidden pull-right">New</span></a>
                    <ul class="nav nav-second-level">
												<li><a href="news.create.new.php" title="Create News">Create News</a></li>
																	</ul>
                </li>
								<li class="active">
                    <a href="#"><i class="fa fa-pencil-square-o"></i> <span class="nav-label">News Bureau</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
												<li><a href="news.create.biro.php" title="Create News">Create News</a></li>
												<li><a href="news.list.biro.php" title="News List">News List</a></li>
												<li class="active"><a href="news.list.wire.biro.php" title="News Wire">News Wire</a></li>
																	</ul>
                </li>
								<li>
                    <a href="#"><i class="fa fa-camera-retro"></i> <span class="nav-label">Photo Bureau</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
						<li><a href="photo.gallery.list.biro.php" title="Photo List">Photo List</a></li>
						<li><a href="photo.gallery.create.biro.php" title="New Photo">New Photo</a></li>
                    </ul>
                </li>
								<li>
						<a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Stockphotos Bureau</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
						<li><a href="stockphotos.list.biro.php" title="Stockphotos List">Stockphotos List</a></li>
						<li><a href="stockphotos.create.biro.php" title="Add Stockphotos">Add Stockphotos</a></li>
						</ul>
				</li>
								<li>
                    <a href="#"><i class="fa fa-dropbox"></i> <span class="nav-label">Dropbox Photo</span><span class="fa arrow"></span> <span class="label label-danger photodropboxcount hidden pull-right"></span></a>
                    <ul class="nav nav-second-level">
						<li><a href="photo.dropbox.list.php" title="Dropbox Photo List">Photo List <span class="label label-danger photodropboxcount hidden pull-right"></span></a></li>
						<li><a href="photo.dropbox.create.php" title="New Dropbox Photo">New Photo</a></li>
                    </ul>
                </li>
								<li>
                    <a href="#"><i class="fa fa-dropbox"></i> <span class="nav-label">Dropbox Video</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
						<li><a href="video.dropbox.list.php" title="Dropbox Video List">Video List</a></li>
						<li><a href="video.dropbox.create.php" title="New Dropbox Video">New Video</a></li>
                    </ul>
                </li>
								<li>
                    <a href="#"><i class="fa fa-object-group"></i> <span class="nav-label">Infographics Bureau</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
						<li><a href="infographics.list.biro.php" title="Infographics List">Infographics List</a></li>		
						<li><a href="infographics.create.biro.php" title="Create Infographics">Create Infographics</a></li>
					</ul>
                </li>
								<li>
                    <a href="#"><i class="fa fa-video-camera"></i> <span class="nav-label">Video Bureau</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
						<li><a href="video.list.biro.php" title="List Video">Video List</a></li>
						<li><a href="video.create.biro.php" title="New Video">New Video</a></li>
                    </ul>
                </li>
								<li>
                    <a href="/contact.list.php" title="Person Antara"><i class="fa fa-address-book-o"></i> <span class="nav-label">Person Antara</span></a>
                </li>
								<li>
                    <a href="/free.photo.list.php" title="Free Image"><i class="fa fa-picture-o"></i> <span class="nav-label">Free Image</span></a>
                </li>
								<li>
                    <a href="#"><i class="fa fa-twitter-square"></i> <span class="nav-label">Monitoring & Sosmed</span><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
												<li><a href="trending.google.php" title="Google Trends"><i class="fa fa-google"></i> <span class="nav-label">Google Trends</span></a></li>
						<li><a href="trending.twitter.php" title="Twitter Trends"><i class="fa fa-twitter"></i> <span class="nav-label">Twitter Trends</span></a></li>
						<li><a href="news.list.spy.php" title="List News Spy"><i class="fa fa-user-secret"></i> <span class="nav-label">News Spy</span></a></li>
						<li><a href="news.list.spy.php?top=1" title="List News Spy Popular"><i class="fa fa-user-secret"></i> <span class="nav-label">News Spy (Popular)</span></a></li>
					</ul>
                </li>
								<li>
						<a href="#"><i class="fa fa-bar-chart"></i> <span class="nav-label">Statistics</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
						<li><a href="stat.realtime.php" title="Real Time News">Real Time News</a></li>
						<li><a href="stat.analytics.realtime.all.php" title="Real Time Analytics">RT Google Analytics</a></li>
						<li><a href="stat.analytics.pageviews.php" title="Real Time Analytics">Google Analytics</a></li>
						<li><a href="stat.popular.php" title="Popular News">Popular News</a></li>
												<li><a href="stat.news.biro.global.php" title="Statistics Bureau">Statistics Bureau</a></li>
						<li><a href="stat.all.biro.php" title="Graph Statistic">Graph Statistics Bureau</a></li>
						<li><a href="stat.news.biro.php" title="News Statistic">News Statistics Bureau</a></li>
						<li><a href="stat.reporter.biro.php" title="Reporter Statistic">Reporter Statistics Bureau</a></li>
						<li><a href="stat.editor.biro.php" title="Editor Statistic">Editor Statistics Bureau</a></li>
												</ul>
				</li>
								<li>
					<a href="#"><i class="fa fa-thumb-tack"></i> <span class="nav-label">Announcement</span><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><a href="announcement.php?category=1" title="Announcements">Announcements</a></li>
						<li><a href="announcement.php?category=2" title="Downloads">Downloads</a></li>
											</ul>
				</li>
								<li>
					<a href="#"><i class="fa fa-thumb-tack"></i> <span class="nav-label">Tickets</span><span class="fa arrow"></span><span class="label label-danger ticketcount hidden pull-right">New</span></a>
					<ul class="nav nav-second-level">
						<li><a href="ticket.create.php" title="Create Ticket">Create Ticket</a></li>
						<li><a href="ticket.list.php" title="Tickets">Tickets <span class="label label-warning ticketcount hidden pull-right"></span></a></li>
											</ul>
				</li>
								
				<li>
                    <a href="profile.php" title="Profile"><i class="fa fa-user"></i> <span class="nav-label">Profile</span></a>
                </li>
				<li class="landing_link">
                    <a href="logout.php" title="Logout"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
                </li>
                            </ul>

        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
		<div class="row border-bottom">
	<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
		<!--<form role="search" class="navbar-form-custom" action="search_results.html">
			<div class="form-group">
				<input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
			</div>
		</form>-->
	</div>
		<ul class="nav navbar-top-links navbar-right" style="padding-right: 30px;">
						<li class="hidden-xs">
				<strong><a href="https://www.antaranews.com" title="antaranews.com" target="_blank">https://www.antaranews.com</a></strong>
			</li>
			<li>
				<span class="m-r-sm text-muted welcome-message">Welcome <strong><a href="/profile.php" title="Profile">I Komang Suparta</a></strong></span>			</li>
						<li class="dropdown">
				<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
					<i class="fa fa-bell"></i>
									</a>
				<ul class="dropdown-menu dropdown-messages">
									</ul>
			</li>
						<li>
				<a href="/logout.php?redirect=true" title="Logout">
					<i class="fa fa-sign-out"></i> Logout
				</a>
			</li>
					</ul>
	</nav>
</div>		
        <div class="wrapper wrapper-content">

            <div class="row">
                <div class="col-lg-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>Create News</h5>
							<div class="ibox-tools">
								<a class="collapse-link">
									<i class="fa fa-chevron-up"></i>
								</a>
							</div>
						</div>
						<div class="ibox-content">
							<div class="row">
								<form method="post" class="form-horizontal" id="newsForm">
									<form method="post" class="form-horizontal" id="newsForm">
																		<div class="form-group">
										<label class="col-sm-2 control-label">Biro</label>
										<div class="col-sm-3">
											<select class="select2 form-control" name="biro" readonly id="biro" data-placeholder="Choose Biro">
												<option value=""></option><option value="BDA">Aceh/NAD</option><option value="ANT">Antaranews</option><option value="DPS" selected>Bali</option><option value="BLT">Bangka/Belitung</option><option value="BNT">Banten</option><option value="BTM">Batam/Kepulauan Riau</option><option value="BKL">Bengkulu</option><option value="BPJ">Bogor/Bekasi</option><option value="GRT">Gorontalo</option><option value="JBI">Jambi</option><option value="BDG">Jawa Barat</option><option value="SMG">Jawa Tengah</option><option value="SBY">Jawa Timur</option><option value="PTN">Kalimantan Barat</option><option value="BJM">Kalimantan Selatan</option><option value="PLK">Kalimantan Tengah</option><option value="SMD">Kalimantan Timur</option><option value="TJS">Kalimantan Utara</option><option value="KUL">Kuala Lumpur</option><option value="BDL">Lampung</option><option value="ABN">Maluku</option><option value="MTR">NTB</option><option value="KPG">NTT</option><option value="JPR">Papua</option><option value="MKW">Papua Barat</option><option value="PKB">Riau</option><option value="UJP">Sulawesi Selatan</option><option value="PLU">Sulawesi Tengah</option><option value="KDR">Sulawesi Tenggara</option><option value="MDO">Sulawesi Utara</option><option value="PDG">Sumatera Barat</option><option value="PLB">Sumatera Selatan</option><option value="MDN">Sumatera Utara</option><option value="YKT">Yogyakarta</option>											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Title</label>
										<div class="col-sm-10"><input type="text" name="title" id="title" value="KOI pastikan anggaran kontingen Indonesia untuk SEA Games terpenuhi" placeholder="Title" class="form-control" required></div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Byline</label>
																				<div class="col-sm-2"><input type="text" name="byline" id="byline" value="Asep Firmansyah" placeholder="Byline" class="form-control" required></div>
										<label class="col-sm-2 control-label">Editor</label>
										<div class="col-sm-2"><input type="text" name="editor" id="editor" value="Irwan Suhirwandi" placeholder="Editor" class="form-control" required></div>
										<label class="col-sm-2 control-label">Dateline City <span class="required">*</span> <i class="m-l-xs fa fa-question-circle text-muted" data-toggle="popover" data-placement="auto" data-content="Di isi nama kota tempat kejadian berita contoh <b>Jakarta</b>. Secara default akan terisi kota Anda."></i></label>
										<div class="col-sm-2"><input type="text" name="dateline_city" id="dateline_city" value="Jakarta" placeholder="City" class="form-control"></div>
									</div>
																		<div class="form-group">
										<div class="col-sm-12">
																						<textarea id="content" class="" name="content" required>Ketua Umum Komite Olimpiade Indonesia (KOI) Raja Sapta Oktohari memastikan anggaran untuk kebutuhan kontingen Indonesia di SEA Games telah terpenuhi dengan masuknya dana dari sponsor.<br />  <br />  Sebelumnya, Kementerian Pemuda dan Olahraga (Kemenpora) hanya bisa memenuhi anggaran sebesar Rp59 miliar dari total yang diajukan Rp67 miliar. Namun selisih delapan miliar rupiah itu telah terpenuhi dari pemasukan pihak swasta.<br />  <br />  &quot;Insya Allah (terpenuhi). Nah selisih ada delapan miliar sudah dibantu beberapa perusahaan lain dan cabang olahraga,&quot; kata Oktohari seusai menghadiri peluncuran kampanye dukungan Gojek untuk SEA Games di Gelora Bung Karno, Senin.<br />  <br />  Menurutnya, angka Rp67 miliar itu merupakan batas minimum. Ia berharap dana yang terkumpul untuk kebutuhan SEA Games bisa melebihi dari angka usulan.<br />  <br />  &quot;Ada beberapa kontribusi dari swasta, dan juga kontribusi dari beberapa cabor-cabor. Mudah-mudahan targetnya lebih dari 67 miliar, karena kami ingin lebih dari minimum,&quot; kata dia.<br />  <br />  <br />  <br />  <br />  <br />  Sesmenpora Gatot S. Dewa Broto mengatakan awalnya KOI mengajukan anggaran sebesar Rp64 miliar yang kemudian diperbaharui lagi menjadi Rp67 miliar.<br />  <br />  Ketersediaan dana yang bisa terpenuhi oleh Kemenpora hanya Rp59,6 miliar per tanggal 12 November 2019. Anggaran itu telah disesuaikan serta melewati tahap verifikasi, ujungnya mempertimbangkan target raihan medali pada ajang multi-cabang terbesar se-Asia Tenggara tersebut.<br />  <br />  Kemenpora menganggap kekurangan dari nilai anggaran Rp67 miliar itu masih harus diverifikasi urgensi kebutuhannya serta dilakukan efisiensi. Kemenpora tidak ingin hanya demi popularitas maka semua permintaan KOI dipenuhi, khawatir akan berpotensi menjadi temuan pada saat diperiksa oleh BPK.<br />  <br /></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Keyword</label>
										<div class="col-sm-8"><input type="text" name="keyword" id="keyword" placeholder="Keyword" value="KOI,Sea Games,Anggaran Sea Games,Raja Sapta Oktohari" class="tagsinput form-control" required="required"></div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Related News</label>
										<div class="col-sm-6">
											<div class = "input-group">
												<input type="text" id="keywordRelatedNews" placeholder="Search" class="form-control">
												<span class = "input-group-btn">
													<label class="btn btn-info" id="searchRelatedNews">Search Related News</label>
													<label class="btn btn-info hidden" id="closeRelatedNews">Close</label>
												</span>
											</div>
										</div>
									</div>
									<div class="col-sm-12 hidden m-t-sm hidden hiddenRelatedNews" id="relatedNews"></div>
									<div class="col-sm-12 hidden m-t-sm hidden text-right hiddenRelatedNews" id="relatedNewsPaging"></div>
									<div class="form-group" id="mainPictureView">
										<label class="col-sm-2 control-label">Main Picture</label>
										<div class="col-sm-10">
											<div class="row" id="pictureView">
																									<div class="col-sm-4">
														<div class="relativepicture">
														<button class="btn btn-xs btn-danger onpicture" type="button"><i class="fa fa-remove"></i></button>
														<img src="https://img.antaranews.com/cache/270x180/2019/11/18/20191118105853_IMG_0003.jpg" class="img-responsive">
														</div>
													</div>
													<div class="col-sm-8">
														<textarea class="form-control h-130" name="mainCaption" id="mainCaption" placeholder="Main Caption">Ketua Umum Komite Olimpiade Indonesia (KOI) Raja Sapta Oktohari saat menyampaikan sambutan dalam peluncuran kampanye dukungan Gojek untuk kontingen Indonesia di SEA Games, Senin (18/11/2019). ANTARA/Asep Firmansyah.</textarea>
													</div>
																								</div>
											<input type="hidden" name="mainPicture" id="mainPicture" value="https://img.antaranews.com/cache/270x180/2019/11/18/20191118105853_IMG_0003.jpg">
										</div>
									</div>
									<div class="form-group" id="browse_picture">
	<label class="col-sm-2 control-label">Picture <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" data-content="<p><b>Upload New:</b> Minimal resolusi lebar adalah 800 piksel</p><p><b>Stockphotos:</b> Ketika akan mengklik foto dari stok untuk di masukkan dalam body berita, pastikan kursor berada pada posisi yang tepat.</p>"></i></label>
	<div class="col-sm-10">
		<div class="row">
			<div class="col-sm-12 m-b-sm">
				<div class="row">
					<div class="col-sm-12">
						<div class="btn-group">
														<label class="btn btn-info" id="actualPicture">Actual</label>
							<label class="btn btn-info" id="browsePicture">Stockphotos</label>
														<label class="btn btn-info" id="newPicture">Upload New</label>
						</div>
					</div>
				</div>
			</div>
						<div class="col-sm-12 hidden hiddenActualPicture">
				<p class="">No Actual Photo</p>
			</div>
			<div class="col-sm-12 hidden hiddenSearchPicture">
				<div class="row">
					<div class="col-sm-4">
						<input type="text" name="pictureKeyword" id="pictureKeyword" placeholder="picture keyword" class="form-control">
					</div>
					<div class="col-sm-3">
						<select class="select2 form-control" name="pictureBiro" id="pictureBiro" data-placeholder="Choose Biro">
							<option value="">All</option><option value="BDA">Aceh/NAD</option><option value="ANT">Antaranews</option><option value="DPS">Bali</option><option value="BLT">Bangka/Belitung</option><option value="BNT">Banten</option><option value="BTM">Batam/Kepulauan Riau</option><option value="BKL">Bengkulu</option><option value="BPJ">Bogor/Bekasi</option><option value="GRT">Gorontalo</option><option value="JBI">Jambi</option><option value="BDG">Jawa Barat</option><option value="SMG">Jawa Tengah</option><option value="SBY">Jawa Timur</option><option value="PTN">Kalimantan Barat</option><option value="BJM">Kalimantan Selatan</option><option value="PLK">Kalimantan Tengah</option><option value="SMD">Kalimantan Timur</option><option value="TJS">Kalimantan Utara</option><option value="KUL">Kuala Lumpur</option><option value="BDL">Lampung</option><option value="ABN">Maluku</option><option value="MTR">NTB</option><option value="KPG">NTT</option><option value="JPR">Papua</option><option value="MKW">Papua Barat</option><option value="PKB">Riau</option><option value="UJP">Sulawesi Selatan</option><option value="PLU">Sulawesi Tengah</option><option value="KDR">Sulawesi Tenggara</option><option value="MDO">Sulawesi Utara</option><option value="PDG">Sumatera Barat</option><option value="PLB">Sumatera Selatan</option><option value="MDN">Sumatera Utara</option><option value="YKT">Yogyakarta</option>						</select>														
					</div>
					<div class="col-sm-3">
						<select class="select2 form-control" name="pictureCategory" id="pictureCategory" data-placeholder="Choose Category">
							<option value="">Choose Category</option><option value="EKB">Ekonomi</option><option value="SBH">Hiburan</option><option value="LOG">Logo</option><option value="INT">Mancanegara</option><option value="ORK">Olahraga</option><option value="NAS">Peristiwa</option><option value="TEK">Teknologi</option><option value="TOK">Tokoh</option><option value="WBM">Warta Bumi</option><option value="WIS">Wisata</option>						</select>														
					</div>
					<div class="col-sm-2">
						<span class="btn btn-info" id="searchPicture">Search</span>
					</div>
				</div>
			</div>
			<div class="col-sm-12 hidden m-t-sm hiddenSearchPicture" id="resultPicture">
			</div>
			<div class="col-sm-12 hidden m-t-sm textcenter hiddenSearchPicture" id="resultPicturePaging">
			</div>
						
			<div class="col-sm-12 hidden hiddenNewPicture">
				<div class="row">
					<div class="form-group">
						<label class="col-sm-2 control-label">Watermark</label>
						<div class="col-sm-3">
							<select class="select2 form-control" name="wmposition" id="wmposition" data-placeholder="Choose Watermark">
								<option value=""></option>
								<option value="NO">No Watermark</option>
								<option value="BR">Bottom Right</option>
															</select>														
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-3">
							<select class="select2 form-control" name="newPictureCategory" id="newPictureCategory" data-placeholder="Choose Category">
								<option value="">Choose Category</option><option value="EKB">Ekonomi</option><option value="SBH">Hiburan</option><option value="LOG">Logo</option><option value="INT">Mancanegara</option><option value="ORK">Olahraga</option><option value="NAS">Peristiwa</option><option value="TEK">Teknologi</option><option value="TOK">Tokoh</option><option value="WBM">Warta Bumi</option><option value="WIS">Wisata</option>							</select>														
						</div>
						<div class="col-sm-3">
							<select class="select2 form-control" name="newPictureSubCategory" id="newPictureSubCategory" data-placeholder="Choose Sub Category">
								<option value=""></option>
							</select>														
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">IPTC</label>
						<div class="col-sm-8">
							<div class="checkbox checkbox-success checkbox-inline">
								<input id="hasIptc" value="1" name="hasIptc" type="checkbox">
								<label for="antaranewsTopNews">Has IPTC</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Caption</label>
							<div class="col-sm-8">
							<textarea name="newPictureCaption" rows="6" id="newPictureCaption" placeholder="Caption" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Keyword</label>
						<div class="col-sm-8">
							<input type="text" name="newPictureKeyword" id="newPictureKeyword" placeholder="Keyword" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Credit</label>
						<div class="col-sm-8">
							<input type="text" name="newPictureCredit" id="newPictureCredit" placeholder="Credit" class="form-control">
						</div>
					</div>
					<!--<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-8">
							<span class="btn btn-success fileinput-button">
								<i class="glyphicon glyphicon-plus"></i>
								<span>Add files...</span>
							</span>
						</div>
					</div>-->
					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-2">
							<span class="btn btn-success" id="uploadPicture">
							<i class="fa fa-upload"></i>
							Choose File</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><div class="form-group" id="browse_video">
	<label class="col-sm-2 control-label">File Video</label>
	<div class="col-sm-10">
		<div class="row">
			<div class="col-sm-12 m-b-sm">
				<div class="row">
					<div class="col-sm-12">
						<div class="btn-group">
														<label class="btn btn-info" id="actualVideo">Actual</label>
							<label class="btn btn-info" id="browseVideo">Stockvideos</label>
														<label class="btn btn-info" id="newVideo">Upload New</label>
						</div>
					</div>
				</div>
			</div>
						<div class="col-sm-12 hidden hiddenActualVideo">
				<p class="">No Actual Video</p>
			</div>
			<div class="col-sm-12 hidden hiddenSearchVideo">
				<div class="row">
					<div class="col-sm-4">
						<input type="text" name="videoKeyword" id="videoKeyword" placeholder="video keyword" class="form-control">
					</div>
					<div class="col-sm-3">
						<select class="select2 form-control" name="videoCategory" id="videoCategory" data-placeholder="Choose Category">
							<option value="">Choose Category</option><option value="EKO">Ekonomi</option><option value="FEA">Feature</option><option value="KAM">Hankam</option><option value="HUK">Hukum</option><option value="INT">Internasional</option><option value="TEK">Iptek</option><option value="KES">Kesehatan</option><option value="KSR">Kesra</option><option value="WBM">Lingkungan</option><option value="MGP">Megapolitan</option><option value="ORK">Olahraga</option><option value="AUT">Otomotif</option><option value="WST">Pariwisata</option><option value="PDK">Pendidikan</option><option value="POL">Politik</option><option value="SBH">Seni Budaya</option>						</select>														
					</div>
					<div class="col-sm-2">
						<span class="btn btn-info" id="searchVideo">Search</span>
					</div>
				</div>
			</div>
			<div class="col-sm-12 hidden m-t-sm hiddenSearchVideo" id="resultVideo">
			</div>
			<div class="col-sm-12 hidden m-t-sm textcenter hiddenSearchVideo" id="resultVideoPaging">
			</div>
						<div class="col-sm-12 hidden hiddenNewVideo">
				<div class="row">
					<div class="form-group">
						<label class="col-sm-3 control-label">Category</label>
						<div class="col-sm-3">
							<select class="select2 form-control" name="newVideoCategory" id="newVideoCategory" data-placeholder="Choose Category">
								<option value="">Choose Category</option><option value="EKO">Ekonomi</option><option value="FEA">Feature</option><option value="KAM">Hankam</option><option value="HUK">Hukum</option><option value="INT">Internasional</option><option value="TEK">Iptek</option><option value="KES">Kesehatan</option><option value="KSR">Kesra</option><option value="WBM">Lingkungan</option><option value="MGP">Megapolitan</option><option value="ORK">Olahraga</option><option value="AUT">Otomotif</option><option value="WST">Pariwisata</option><option value="PDK">Pendidikan</option><option value="POL">Politik</option><option value="SBH">Seni Budaya</option>							</select>														
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Title</label>
						<div class="col-sm-8">
							<input type="text" name="newVideoTitle" id="newVideoTitle" placeholder="Title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Description</label>
							<div class="col-sm-8">
							<textarea name="newVideoCaption" rows="6" id="newVideoCaption" placeholder="Description" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Keyword</label>
							<div class="col-sm-8">
							<input type="text" name="newVideoKeyword" id="newVideoKeyword" placeholder="Keyword" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Image File</label>
						<div class="col-sm-8">
							<div class="input-group">
								<input type="text" name="newVideoImage" id="newVideoImage" value="" readonly placeholder="Image" class="form-control">
								<span class="input-group-btn">
									<button id="showNewVideoImage" class="btn btn-info" type="button" title="Show">
									<i class="fa fa-eye"></i>
									</button>
								</span>
							</div>
							<p id="showImageHolder" class="hidden"></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Video File</label>
						<div class="col-sm-8">
							<div class="input-group">
								<input type="text" name="newVideoFile" id="newVideoFile" value="" readonly placeholder="Video File" class="form-control">
								<span class="input-group-btn">
									<button id="showNewVideoFile" class="btn btn-info" type="button" title="Show">
									<i class="fa fa-eye"></i>
									</button>
								</span>
							</div>
							<p id="showVideoHolder" class="hidden"></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Capture Image From Video?</label>
						<div class="col-sm-2">
							<div class="checkbox checkbox-success">
								<input id="captureVideoTime" value="1" checked="checked" type="checkbox">
								<label for="status">Yes, at time</label>
							</div>
						</div>
						<div class="col-sm-2">
							<input type="text" name="newVideoCaptureSecond" id="newVideoCaptureSecond" value="01" min="00" max="59" placeholder="Second" class="form-control">
						</div>
						<div class="col-sm-2">
							<input type="text" name="newVideoCaptureMS" id="newVideoCaptureMS" value="000" min="000" max="999" placeholder="Micro Second" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-3">
							<span class="btn btn-success" id="uploadVideo">
							<i class="fa fa-upload"></i> Choose Image Or Video</span>
						</div>
						<div class="col-sm-2">
							<span class="btn btn-info" id="insertVideo">
							<i class="fa fa-save"></i> Insert Video</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>									<div class="form-group hidden" id="mainVideoView">
										<label class="col-sm-2 control-label">Main Video</label>
										<div class="col-sm-10">
											<div class="row" id="videoView">
											</div>
										</div>
										<input type="hidden" name="videoImage" id="videoImage" value="">
										<input type="hidden" name="video" id="video" value="">
									</div>
									<div class="form-group hidden" id="caption_list">
										<label class="col-sm-2 control-label">Caption List</label>
										<div class="col-sm-10">
											<div class="row">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Quote</label>
										<div class="col-sm-10">
											<textarea class="form-control" rows="4" name="quote" id="quote" placeholder="Quote"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">City</label>
										<div class="col-sm-3">
											<select class="select2 form-control" name="city_id" id="city_id" data-placeholder="Choose City">
												<option value=""></option><option value="35">--Semua Biro--</option><option value="1">Aceh/NAD</option><option value="38">Antaranews</option><option value="18">Bali</option><option value="6">Bangka/Belitung</option><option value="12">Banten</option><option value="8">Batam/Kepulauan Riau</option><option value="5">Bengkulu</option><option value="13">Bogor/Bekasi</option><option value="14" selected="selected">DKI Jakarta</option><option value="31">Gorontalo</option><option value="4">Jambi</option><option value="11">Jawa Barat</option><option value="15">Jawa Tengah</option><option value="17">Jawa Timur</option><option value="21">Kalimantan Barat</option><option value="23">Kalimantan Selatan</option><option value="24">Kalimantan Tengah</option><option value="22">Kalimantan Timur</option><option value="37">Kalimantan Utara</option><option value="36">Kuala Lumpur</option><option value="10">Lampung</option><option value="30">Maluku</option><option value="32">Maluku Utara</option><option value="19">NTB</option><option value="20">NTT</option><option value="33">Papua</option><option value="34">Papua Barat</option><option value="7">Riau</option><option value="26">Sulawesi Barat</option><option value="29">Sulawesi Selatan</option><option value="28">Sulawesi Tengah</option><option value="25">Sulawesi Tenggara</option><option value="27">Sulawesi Utara</option><option value="3">Sumatera Barat</option><option value="9">Sumatera Selatan</option><option value="2">Sumatera Utara</option><option value="16">Yogyakarta</option>											</select>
										</div>
									</div>
																		<div class="form-group hiddenbiro">
										<label class="col-sm-2 control-label">Category</label>
																				<div class="col-sm-2">
											<select class="select2 form-control" name="language" id="language" data-placeholder="Choose Language" required>
												<option value=""></option>
												<option value="id" selected>Indonesia</option>
												<option value="en">English</option>
											</select>
										</div>
																				<div class="col-sm-3 hiddenbiro">
											<select class="select2 form-control" name="biroCategory" id="biroCategory" data-placeholder="Choose Category">
												
											</select>
										</div>
										<div class="col-sm-3 hiddenbiro">
											<select class="select2 form-control" name="biroSubCategory" id="biroSubCategory" data-placeholder="Choose Sub Category">
												
											</select>
										</div>
									</div>
																		<div class="form-group hiddenbiroantaranews">
										<label class="col-sm-2 control-label">Top News</label>
										<div class="col-sm-2">
											<div class="checkbox checkbox-success checkbox-inline">
												<input id="antaranewsTopNews" value="1" name="antaranewsTopNews" type="checkbox">
												<label for="antaranewsTopNews">Top News</label>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="checkbox checkbox-success checkbox-inline">
												<input id="antaranewsHeadline" value="1" name="antaranewsHeadline" type="checkbox">
												<label for="antaranewsHeadline">Headline News</label>
											</div>
										</div>
																				<div class="col-sm-2">
											<div class="checkbox checkbox-success checkbox-inline">
												<input id="antaranewsTopCategory" value="1" name="antaranewsTopCategory" type="checkbox">
												<label for="antaranewsTopCategory">Top Category</label>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="checkbox checkbox-success checkbox-inline">
												<input id="antaranewsSubmenu" value="1" name="antaranewsSubmenu" type="checkbox">
												<label for="antaranewsSubmenu">Submenu</label>
											</div>
										</div>
									</div>
																		<div class="form-group">
										<label class="col-sm-2 control-label">Status</label>
										<div class="col-sm-4">
											<div class="checkbox checkbox-success">
												<input id="status" value="1" name="status" type="checkbox">
												<label for="status">Publish</label>
											</div>
										</div>
									</div>
																		<div class="form-group">
										<label class="col-sm-2 control-label"></label>
										<input type="hidden" name="referer" value="">
										<input type="hidden" name="newsId" id="newsId" value="610419">
										<input type="hidden" name="news_wire_id" id="news_wire_id" value="7492255">
										<input type="hidden" name="titleSource" id="titleSource" value="KOI pastikan anggaran kontingen Indonesia untuk SEA Games terpenuhi" name="titleSource">
										<input type="hidden" name="idNews" id="idNews" value="">										
										<div class="col-sm-1"><button class="btn btn-submit btn-primary">Submit</button></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
        <div id="help-wait">
	</div>
<div class="footer">
	<div class="text-center">
		<strong>Copyright</strong> ANTARA &copy; 2019	</div>
</div>
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
<link href="/js/plugins/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="/js/plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
<link href="/js/plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
<script src="/js/plugins/pnotify/dist/pnotify.js"></script>
<script src="/js/plugins/pnotify/dist/pnotify.buttons.js"></script>
<script src="/js/plugins/pnotify/dist/pnotify.nonblock.js"></script>
<script>
	$(function () {
		var announcement = $.cookie('announcement');
		if(announcement != 'true') {
			/* swal({
				html:true,
				title: "",
				text: 'Utamakan KUALITAS dalam Mengedit Berita',
				type: 'warning'
			}); */
			$(function () {
				new PNotify({
					title: "Utamakan KUALITAS dalam Mengedit Berita",
					text: "",
					type: "error",
					delay: 5000,
					styling: "bootstrap3"
				});
			});
			var date = new Date();
			var minutes = 60;
			date.setTime(date.getTime() + (minutes * 60 * 1000));
			$.cookie('announcement', 'true', { expires: minutes, path: '/', domain: 'antaranews.com' });
		}
				$("#butuh-pertolongan").on('click', function(e) {
			e.preventDefault();
			swal({
				html:true,
				title: "Confirmation",
				text: "Request Technical Help?",
				type: "warning",
				showCancelButton: true,
				closeOnConfirm: false,
				closeOnCancel: true
			}, function (isConfirm) {
				if (isConfirm) {
					$.ajax({
						url: '/ajax/helpdesk.request.php',
						type: 'POST',
						data: '',
						dataType: 'json'
					})
					.done(function(response){
						if(response.status=='success') {
							$("#help-wait").html('<a href="#" class="wait-round-button">Wait</a>');
							swal({
								title: "Sent!",
								text: "Technical Help Request Sent!",
								type: "success",
								timer: 2000
							});
						}
						else
						{
							swal("Error!", "Failed Request Technical Help!", "error");
						}
					})
					.fail(function(){
						swal('Oops...', 'Something went wrong!', 'error');
					});
				}
			});
		});
	});
	/* $(document).ready(function(){
		var announcement = $.cookie('announcement');
		if(announcement != 'true') {
			swal({
				html:true,
				title: "Success",
				text: '<a href="/announcement.view.php?id=5" target="_blank">Joint Maintenance Telah Berhasil. System, Web Server dan Database telah diupgrade versi terbaru.<br />Terimakasih atas kerjasamanya.</a>',
				type: 'success'
			});
			var date = new Date();
			var minutes = 60;
			date.setTime(date.getTime() + (minutes * 60 * 1000));
			$.cookie('announcement', 'true', { expires: minutes, path: '/', domain: 'antaranews.com' });
		}
	}); */
</script>
<script type="text/javascript">
_atrk_opts = { atrk_acct:"M1FNo1IWhe10N8", domain:"antaranews.com",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://certify-js.alexametrics.com/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://certify.alexametrics.com/atrk.gif?account=M1FNo1IWhe10N8" style="display:none" height="1" width="1" alt="" /></noscript>

    </div>
    </div>

    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js?1549543506"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>

	<!-- Select2 -->
    <script src="/js/plugins/select2/select2.full.min.js"></script>
	<script src="/js/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
    <script src="/js/plugins/validate/id.js" type="text/javascript"></script>
    <script src="/js/plugins/ladda/spin.min.js" type="text/javascript"></script>
    <script src="/js/plugins/ladda/ladda.min.js" type="text/javascript"></script>
    <script src="/ckeditor/ckeditor.js"></script>
	<script src="/js/plugins/dropzone/dropzone.js"></script>
	<!-- Tags Input -->
    <script src="/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
	<script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>
	<script src="/js/plugins/clockpicker/clockpicker.js"></script>
	<script src="/js/plugins/sweetalert/sweetalert.min.js"></script>
	<script src="/js/picturevideo.js"></script>
	<script src="/js/custom/category.js"></script>
	<script src="/js/custom/category_biro.js"></script>
    <script>
		CKEDITOR.replace('content');
		CKEDITOR.on('instanceReady', function () {
			$.each(CKEDITOR.instances, function (instance) {
				CKEDITOR.instances[instance].document.on("keyup", CK_jQ);
				CKEDITOR.instances[instance].document.on("paste", CK_jQ);
				CKEDITOR.instances[instance].document.on("keypress", CK_jQ);
				CKEDITOR.instances[instance].document.on("blur", CK_jQ);
				CKEDITOR.instances[instance].document.on("change", CK_jQ);
			});
		});
		function CK_jQ() {
			for (instance in CKEDITOR.instances) {
				CKEDITOR.instances[instance].updateElement();
			}
		}
		$(document).ready(function(){
			$('#newsForm').on('keyup keypress', function(e) {
				var keyCode = e.keyCode || e.which;
				if (keyCode === 13) { 
					e.preventDefault();
					return false;
				}
			});
			load_category_biro();
			$(".select2").select2({
				width: '100%',
				allowClear: true
			});
			$(".select2multi").select2({
				width: '100%',
				allowClear: false
			});
			$(".select2").on("select2:close", function (e) {  
				$(this).valid();
			});
			$("#hidePicture").on('click', function() {
				$('#browse_picture').toggleClass('hidden');
			});
			
			$(document).on('click', 'a.relatedNewsPage, #searchRelatedNews', function(e) {
				e.preventDefault();
				$(this).prop('disabled', true);
				var keyword = $('#keywordRelatedNews').val();
				if(keyword=="") {
					var keyword = $('#keyword').val();
				}
				if(keyword=="") {
					swal("Error", "Please fill keyword", "error");
					$(this).prop('disabled', false);
					return false;
				}
				$('.hiddenRelatedNews').empty().removeClass('hidden');
				$('#closeRelatedNews').removeClass('hidden');
				var page = $(this).attr('data-page');
				var dataString = 'keyword=' + keyword;
				if(page!=undefined) {
					dataString += '&page=' + page;
				}
				$.ajax({
					type: "GET",
					url: "/ajax/related.news.biro.php",
					data: dataString,
					dataType: "json",
					success: function(data) {
						if(parseInt(data.total) > 0) {
							var relatedNews = '';
							var j = 0;
							$.each(data.images, function(i, item) {
								if(j % 4 == 0) {
									relatedNews += '<div class="row">';
								}
								relatedNews += '<div class="col-sm-3"><img src="' + item['photo'] +'" title="' + item['title'] +'" data-url="' + item['url'] +'" class="w200 relatedNewsPicture pointer m-r-sm m-b-sm">';
								relatedNews += '<p><a href="' + item['url'] +'" target="_blank" title="' + item['title'] + '">' + item['title'] + '</a></p></div>';
								if(j % 4 == 3) {
									relatedNews += '</div>';
								}
								j++;
							});
							$('#relatedNews').html(relatedNews);
							var maxPage = parseInt(data.maxPage);
							var curPage = parseInt(data.curPage);
							var relatedNewsPaging = '<ul class="pagination">';
							var startLoop;
							var endLoop;
							if (curPage >= 5) {
								startLoop = curPage - 4;
								if (maxPage > curPage + 4) {
									endLoop = curPage + 4;
								}
								else
								{
									endLoop = maxPage;
								}
							}
							else
							{
								startLoop = 1;
								if (maxPage > 8)
									endLoop = 8;
								else
									endLoop = maxPage;
							}
							var prevPage = curPage - 1;
							if(curPage > 1) {
								relatedNewsPaging += '<li class="paginate_button"><a href="#" class="relatedNewsPage" title="1" data-page="1">First</a></li>';
								relatedNewsPaging += '<li class="paginate_button"><a href="#" class="relatedNewsPage" title="' + prevPage + '" data-page="' + prevPage + '">Prev</a></li>';
							}
							for(i = startLoop; i <= endLoop; i++) {
								if(i == curPage) {
									relatedNewsPaging += '<li class="paginate_button active"><a href="#" class="relatedNewsPage" title="' + i + '" data-page="' + i + '">' + i + '</a></li>';
								}
								else
								{
									relatedNewsPaging += '<li class="paginate_button"><a class="relatedNewsPage" href="#" title="' + i + '" data-page="' + i + '">' + i + '</a></li>';
								}
							}
							if(curPage < maxPage) {
								var nextPage = curPage + 1;
								relatedNewsPaging += '<li class="paginate_button"><a href="#" class="relatedNewsPage" title="' + nextPage + '" data-page="' + nextPage + '">Next</a></li>';
								relatedNewsPaging += '<li class="paginate_button"><a href="#" class="relatedNewsPage" title="' + maxPage + '" data-page="' + maxPage + '">Last</a></li>';
							}
							relatedNewsPaging += '</ul>';
							$('#relatedNewsPaging').html(relatedNewsPaging);
						}
						else
						{
							$('#relatedNews').html('<p class="alert alert-warning">No Result!</p>');
						}
					}
				});
				$(this).prop('disabled', false);
			});
			
			$('#relatedNews').on('click', 'img.relatedNewsPicture', function() {
				var title = $(this).attr('title');
				var url = $(this).attr('data-url');
				insertRelatedNews(title, url);
				//$(".hiddenRelatedNews").addClass("hidden");
			});
			
			$('#closeRelatedNews').on('click', function() {
				$(".hiddenRelatedNews").addClass("hidden");
			});
			
			$('#keywordRelatedNews').on('keypress', function (e) {
				if(e.which === 13){
					$("#searchRelatedNews").trigger("click");
				}
			});
			
			var insertRelatedNews = function(title, url) {
				var related = '<b>Baca juga: <a href="' + url + '" target="_blank" title="' + title + '">' + title + '</a></b>';
				CKEDITOR.instances.content.insertHtml(related);
			}
			
			$('#resultPicture').on('click', 'img', function() {
				var mainPictureValue = $('#mainPicture').val();
				var src = $(this).attr('src').replace('/270x180/', '/730x487/');
				var caption = $(this).attr('data-caption');
				insertImage(src, caption);
			});
			
			var insertImage = function(src, caption) {
				var mainPictureValue = $('#mainPicture').val();
				if(mainPictureValue == "") {
					var mainPicture = '<div class="col-sm-4"><div class="relativepicture w200"><img src="' + src +'" class="w200"><input type="hidden" name="photo" value="' + src +'"><button class="btn btn-xs btn-danger onpicture" type="button"><i class="fa fa-remove"></i></button></div></div>';
						mainPicture += '<div class="col-sm-8"><textarea class="form-control h-130" name="mainCaption" id="mainCaption" placeholder="Main Caption">' + caption + '</textarea></div>';
					$('#pictureView').html(mainPicture);
					$('#mainPicture').val(src);
				}
				else
				{
					src = src.replace('/270x180/', '/730x487/');
					var code = CKEDITOR.instances.content.getData();
					var object = $($.parseHTML(code));
					var imagesCount = object.children('img').length + 1;
					var figure = '<figure class="figure-image" id="fgimage_'+imagesCount+'">';
					figure += '<img src="' + src + '" id="image_'+imagesCount+'">';
					figure += '<figcaption class="fig-caption">'+ caption +'</figcaption></figure>';
					CKEDITOR.instances.content.insertHtml(figure);
				}
				$('.hiddenSearchPicture, .hiddenNewPicture').addClass('hidden');
				$('#browsePicture, #newPicture').removeClass('active');
			}
			
			$(document).on('click', '.onpicture', function() {
				$('#mainPicture').val('');
				$(this).closest('#pictureView').empty();
			});
			$('.tagsinput').tagsinput({
				tagClass: 'label label-primary'
			});
			$('#custom_date .input-group.date').datepicker({
				format: 'dd-mm-yyyy',
				todayBtn: "linked",
				keyboardNavigation: false,
				forceParse: false,
				calendarWeeks: true,
				autoclose: true
			});
			$('.clockpicker').clockpicker();
			
			$('#pictureKeyword').on('keypress', function (e) {
				if(e.which === 13){
					$(this).attr("disabled", "disabled");
					$("#searchPicture").trigger("click");
					$(this).removeAttr("disabled");
				}
			});

			$(document).on('click', 'a.picturePage, #searchPicture', function(e) {
				e.preventDefault();
				$('#resultPicture').empty().removeClass('hidden');
				var keyword = $('#pictureKeyword').val();
				if(keyword=='') {
					swal("Error","Please fill keyword","error");
					return false;
				}
				var category = $('#pictureCategory').val();
				var page = $(this).attr('data-page');
				var dataString = 'keyword=' + keyword;
				if(category!=undefined) {
					dataString += '&category=' + category;
				}
				if(page!=undefined) {
					dataString += '&page=' + page;
				}
				$.ajax({
					type: "GET",
					url: "/ajax/browsePicturesBiro.php",
					data: dataString,
					dataType: "json",
					success: function(data) {
						if(parseInt(data.total) > 0) {
							var resultPicture = '';
							var j = 0;
							$.each(data.images, function(i, item) {
								//var smallImage = '/cache/270x180'+item['filename'].replace('/thumb/', '/');
								var caption = item['caption'];
								if(j % 4 == 0) {
									resultPicture += '<div class="row">';
								}
								resultPicture += '<img src="' + item['filename'] +'" data-caption="' + caption + '" class="w200 pointer m-r-sm m-b-sm">';
								if(j % 4 == 3) {
									resultPicture += '</div>';
								}
								j++;
							});
							$('#resultPicture').html(resultPicture);
							var maxPage = parseInt(data.maxPage);
							var curPage = parseInt(data.curPage);
							var picturePaging = '<ul class="pagination">';
							var startLoop;
							var endLoop;
							if (curPage >= 5) {
								startLoop = curPage - 4;
								if (maxPage > curPage + 4) {
									endLoop = curPage + 4;
								}
								else
								{
									endLoop = maxPage;
								}
							}
							else
							{
								startLoop = 1;
								if (maxPage > 8)
									endLoop = 8;
								else
									endLoop = maxPage;
							}
							var prevPage = curPage - 1;
							if(curPage > 1) {
								picturePaging += '<li class="paginate_button"><a href="#" class="picturePage" title="1" data-page="1">First</a></li>';
								picturePaging += '<li class="paginate_button"><a href="#" class="picturePage" title="' + prevPage + '" data-page="' + prevPage + '">Prev</a></li>';
							}
							for(i = startLoop; i <= endLoop; i++) {
								if(i == curPage) {
									picturePaging += '<li class="paginate_button active"><a href="#" class="picturePage" title="' + i + '" data-page="' + i + '">' + i + '</a></li>';
								}
								else
								{
									picturePaging += '<li class="paginate_button"><a class="picturePage" href="#" title="' + i + '" data-page="' + i + '">' + i + '</a></li>';
								}
							}
							if(curPage < maxPage) {
								var nextPage = curPage + 1;
								picturePaging += '<li class="paginate_button"><a href="#" class="picturePage" title="' + nextPage + '" data-page="' + nextPage + '">Next</a></li>';
								picturePaging += '<li class="paginate_button"><a href="#" class="picturePage" title="' + maxPage + '" data-page="' + maxPage + '">Last</a></li>';
							}
							picturePaging += '</ul>';
							$('#resultPicturePaging').html(picturePaging);
						}
						else
						{
							$('#resultPicture').html('<p class="alert alert-warning">No Result!</p>');
							$('#resultPicturePaging').html("");
						}
					}
				});
			});
			
			$('#videoKeyword').on('keypress', function (e) {
				if(e.which === 13){
					$(this).attr("disabled", "disabled");
					$("#searchVideo").trigger("click");
					$(this).removeAttr("disabled");
				}
			});
			
			$(document).on('click', 'a.videoPage, #searchVideo', function(e) {
				e.preventDefault();
				$('#resultVideo').empty().removeClass('hidden');
				var keyword = $('#videoKeyword').val();
				if(keyword=='') {
					swal("Error","Please fill keyword","error");
					return false;
				}
				var category = $('#videoCategory').val();
				var page = $(this).attr('data-page');
				var dataString = 'keyword=' + keyword;
				if(category!=undefined) {
					dataString += '&category=' + category;
				}
				if(page!=undefined) {
					dataString += '&page=' + page;
				}
				$.ajax({
					type: "GET",
					url: "/ajax/browseVideos.php",
					data: dataString,
					dataType: "json",
					success: function(data) {
						if(parseInt(data.total) > 0) {
							var _domainImage = 'https://video.antaranews.com/preview/';
							var _domainVideo = 'https://video.antaranews.com/clip/';
							var resultVideo = '';
							var j = 0;
							$.each(data.videos, function(i, item) {
								var videoImage = _domainImage + item['imagefile'];
								var video = _domainVideo + item['videofile'];
								var title = item['title'];
								var caption = item['caption'];
								if(j % 4 == 0) {
									resultVideo += '<div class="row">';
								}
								resultVideo += '<div class="col-sm-3 m-b-sm"><div class="row m-r-sm m-b-sm"><img class="img-responsive pointer videoChooser" src="' + videoImage +'" data-video="' + video +'" data-title="' + title + '">';
								resultVideo += '<p><strong>'+ title + '</strong></p></div></div>';
								if(j % 4 == 3) {
									resultVideo += '</div>';
								}
								j++;
							});
							$('#resultVideo').html(resultVideo);
							var maxPage = parseInt(data.maxPage);
							var curPage = parseInt(data.curPage);
							var picturePaging = '<ul class="pagination">';
							var startLoop;
							var endLoop;
							if (curPage >= 5) {
								startLoop = curPage - 4;
								if (maxPage > curPage + 4) {
									endLoop = curPage + 4;
								}
								else
								{
									endLoop = maxPage;
								}
							}
							else
							{
								startLoop = 1;
								if (maxPage > 8)
									endLoop = 8;
								else
									endLoop = maxPage;
							}
							var prevPage = curPage - 1;
							if(curPage > 1) {
								picturePaging += '<li class="paginate_button"><a href="#" class="videoPage" title="1" data-page="1">First</a></li>';
								picturePaging += '<li class="paginate_button"><a href="#" class="videoPage" title="' + prevPage + '" data-page="' + prevPage + '">Prev</a></li>';
							}
							for(i = startLoop; i <= endLoop; i++) {
								if(i == curPage) {
									picturePaging += '<li class="paginate_button active"><a href="#" class="videoPage" title="' + i + '" data-page="' + i + '">' + i + '</a></li>';
								}
								else
								{
									picturePaging += '<li class="paginate_button"><a class="videoPage" href="#" title="' + i + '" data-page="' + i + '">' + i + '</a></li>';
								}
							}
							if(curPage < maxPage) {
								var nextPage = curPage + 1;
								picturePaging += '<li class="paginate_button"><a href="#" class="videoPage" title="' + nextPage + '" data-page="' + nextPage + '">Next</a></li>';
								picturePaging += '<li class="paginate_button"><a href="#" class="videoPage" title="' + maxPage + '" data-page="' + maxPage + '">Last</a></li>';
							}
							picturePaging += '</ul>';
							$('#resultVideoPaging').html(picturePaging);
						}
						else
						{
							$('#resultVideo').html('<p class="alert alert-warning">No Result!</p>');
							$('#resultVideoPaging').html("");
						}
					}
				});
			});
			
			load_stockphoto = function(parent) {
				var category = $('#newPictureCategory').val();
				var dataString = 'category='+category;
				$.ajax({
					type: "GET",
					url: "/ajax/combo_stockphotocategory.php",
					data: dataString,
					dataType: "json",
					success: function(data) {
						if(data.length > 0) {
							$('#newPictureSubCategory').empty().select2({"data":data});
						}
						else
						{
							$('#newPictureSubCategory').empty().select2({"data":data});
						}
					}
				});
			};
			$('#newPictureCategory').change(function(){
				load_stockphoto(parent);
			});
			$('#channelCheckbox2').on('change', function() {
				if($(this).is(':checked')) {
					$('.hiddenportal').removeClass('hidden');
					$('#websiteType').attr("required");
				}
				else
				{
					$('.hiddenportal').addClass('hidden');
					$('#websiteType').select2("val", "");
					$('#websiteType').attr("required", "false").trigger('change');
				}
			});
			$('#hasIptc').on('change', function() {
				if($(this).is(':checked')) {
					$('.hiddeniptc').addClass('hidden');
				}
				else
				{
					$('.hiddeniptc').removeClass('hidden');
				}
			});
			$('#websiteType').on('change', function() {
				var val = $(this).val();
				if(val=='pusat') {
					$('.hiddenbiro').addClass('hidden');
					$('.hiddenantaranews').removeClass('hidden');
					$('.hiddenbiroantaranews').removeClass('hidden');
					$('#biro').removeAttr("required");
					$('#biroCategory').removeAttr("required");
					$('#antaranewsCategory').attr("required");
				}
				else if(val=='biro') {
					$('.hiddenbiro').removeClass('hidden');
					$('.hiddenbiroantaranews').removeClass('hidden');
					$('.hiddenantaranews').addClass('hidden');
					$('#biro').attr("required");
					$('#biroCategory').attr("required");
					$('#antaranewsCategory').removeAttr("required");
				}
				else
				{
					$('#biro, #biroCategory, #antaranewsCategory').removeAttr("required");
					$('.hiddenbiro, .hiddenantaranews, .hiddenbiroantaranews').addClass('hidden');
				}
			});
			$('#biro').on('change', function() {
				var val = $(this).val();
			});
			$('#saveDraft').on('click', function() {
				$("#newsForm").valid();
			});
			$('#uploadPicture').dropzone({
				url: "/ajax/uploadImageBiro.php",
				paramName: "file", // The name that will be used to transfer the file
				maxFilesize: 20, // MB
				acceptedFiles: ".jpg,.png,.jpeg,.gif", //"image/*.xlsx,.xls,.pdf,.doc,.docx",
				/* accept: function(file, done) {
					if(file.name == "justinbieber.jpg") {
					  done("Naha, you don't.");
					}
					else { done(); }
				},
				params: {
					foo: "bar"
				}, */
				init: function() {
					this.on("addedfile", function (file) {
						var biro = $('#biro').val();
						if(biro==''){
							this.removeFile(file);
							swal("Error","Please choose biro","error");
							return false;
						}
						var wmposition = $('#wmposition').val();
						if(wmposition==''){
							this.removeFile(file);
							swal("Error","Please choose watermark position","error");
							return false;
						}
						var category = $('#newPictureCategory').val();
						if(category==''){
							this.removeFile(file);
							swal("Error","Please choose category","error");
							return false;
						}
						var subcategory = $('#newPictureSubCategory').val();
						if(subcategory==''){
							this.removeFile(file);
							swal("Error","Please choose subcategory","error");						
							return false;
						}
						if(!$('#hasIptc').is(':checked')) {
							var caption = $('#newPictureCaption').val();
							if(caption==''){
								this.removeFile(file);
								swal("Error","Caption can not empty","error");
								return false;
							}
							var keyword = $('#newPictureKeyword').val();
							if(keyword==''){
								this.removeFile(file);
								swal("Error","Keyword can not empty","error");
								return false;
							}
						}
						/* if(!confirm("Do you want to upload the file?")){
							this.removeFile(file);
							return false;
						} */
					});
					this.on("sending", function(file, xhr, formData) {
						var wmposition = $('#wmposition').val();
						var category = $('#newPictureCategory').val();
						var subcategory = $('#newPictureSubCategory').val();
						var title = $('#newPictureTitle').val();
						var caption = $('#newPictureCaption').val();
						var keyword = $('#newPictureKeyword').val();
						var credit = $('#newPictureCredit').val();
						var biro = $('#biro').val();
						formData.append("biro", biro);
						formData.append("wmposition", wmposition);
						formData.append("category", category);
						formData.append("subcategory", subcategory);
						formData.append("caption", caption);
						formData.append("keyword", keyword);
						formData.append("credit", credit);
					});
					this.on("complete", function (file) {
						this.removeFile(file);
					});
					/* this.on("complete", function(file, responseText) {
						alert(responseText);
					}); */
					/* this.on("removedfile", function (file) {
						// delete from our dict removed file
						delete addedFilesHash[file];
					}); */
				},
				success: function(file, response ) {
					this.removeFile(file);
					obj = JSON.parse(response);
					if(obj.status=='success') {
						if(obj.caption=="") {
							var caption = $('#newPictureCaption').val();
							var credit = $('#newPictureCredit').val();
							if(credit != "") {
								caption += '('+credit+')';
							}
						}
						else
						{
							var caption = obj.caption;
						}
						insertImage(obj.image, caption);
					}
					else
					{
						showError(obj);
					}
				},
				parallelUploads: 1,
				uploadMultiple: false,
				maxFiles: 1,
				autoProcessQueue: true,
			});
			showError = function(obj) {
				swal("Error",obj.error,obj.status);
			}
			$('#uploadVideo').dropzone({
				url: "/ajax/uploadVideo.php",
				paramName: "file", // The name that will be used to transfer the file
				maxFilesize: 50, // MB
				acceptedFiles: ".jpg,.png,.jpeg,.gif,.mp4,.flv", //"video/*,image/*.xlsx,.xls,.pdf,.doc,.docx",
				/* accept: function(file, done) {
					if(file.name == "justinbieber.jpg") {
					  done("Naha, you don't.");
					}
					else { done(); }
				},
				params: {
					foo: "bar"
				}, */
				init: function() {
					this.on("addedfile", function (file) {
						var category = $('#newVideoCategory').val();
						var title = $('#newVideoTitle').val();
						var caption = $('#newVideoCaption').val();
						var keyword = $('#newVideoKeyword').val();
						if(category==''){
							this.removeFile(file);
							swal("Error","Please choose category","error");
							return false;
						}
						if(title==''){
							this.removeFile(file);
							swal("Error","Title can not empty","error");
							return false;
						}
						if(caption==''){
							this.removeFile(file);
							swal("Error","Description can not empty","error");
							return false;
						}
						if(keyword==''){
							this.removeFile(file);
							swal("Error","Keyword can not empty","error");
							return false;
						}
						/* if(!confirm("Do you want to upload the file?")){
							this.removeFile(file);
							return false;
						} */
					});
					this.on("sending", function(file, xhr, formData) {
						var category = $('#newVideoCategory').val();
						var title = $('#newVideoTitle').val();
						var caption = $('#newVideoCaption').val();
						var keyword = $('#newVideoKeyword').val();
						var capturetime = $('#captureVideoTime').val();
						var seconds = $('#newVideoCaptureSecond').val();
						var microseconds = $('#newVideoCaptureMS').val();
						formData.append("category", category);
						formData.append("title", title);
						formData.append("caption", caption);
						formData.append("keyword", keyword);
						formData.append("capturetime", capturetime);
						formData.append("seconds", seconds);						
						formData.append("microseconds", microseconds);
					});
					this.on("complete", function (file) {
						this.removeFile(file);
					});
					/* this.on("complete", function(file, responseText) {
						alert(responseText);
					}); */
					/* this.on("removedfile", function (file) {
						// delete from our dict removed file
						delete addedFilesHash[file];
					}); */
				},
				success: function(file, response) {
					this.removeFile(file);
					obj = JSON.parse(response);
					var fileVideo = '';
					var fileImage = '';
					if(obj.type == 'video') {
						if(obj.file != '') {
							fileVideo = obj.file.replace('/video/', 'https://video.antaranews.com/');
							$("#newVideoFile").val(fileVideo);
						}
						if(obj.image != '') {
							fileImage = obj.image.replace('/video/', 'https://video.antaranews.com/');
							$("#newVideoImage").val(fileImage);
						}
						//insertVideo(fileImage, fileVideo);
					}
					else if(obj.type == 'image') {
						if(obj.file != '') {
							fileImage = obj.file.replace('/video/', 'https://video.antaranews.com/');
							$("#newVideoImage").val(fileImage);
						}
					}
				},
				/* init: () => {
					var dropzone = this.dropzone;
					var keyword = $('#newPictureKeyword').val();
					alert(keyword);
					$(document).on('click', '#upload-btn', function(e) {
						e.preventDefault();
						var files = dropzone.getQueuedFiles();
						files.forEach(function(file) {
						dropzone.processFile(file);
						});
					});
				}, */
				/* init: function() {
				this.on("maxfilesexceeded", function(file){
					alert("No more files please!");
				}); */
				parallelUploads: 1,
				uploadMultiple: false,
				maxFiles: 1,
				autoProcessQueue: true,
			});
			/* Dropzone.options.dropzoneForm = {
				paramName: "file", // The name that will be used to transfer the file
				maxFilesize: 2, // MB
				dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)"
			}; */
			$('#resultVideo').on('click', 'img.videoChooser', function() {
				var img = $(this).attr('src');
				var video = $(this).attr('data-video');
				insertVideo(img, video);
			});			
			$(document).on('click', '#insertVideo', function() {
				var image = $("#newVideoImage").val().replace("/small/", "/full/");
				if(image=="") {
					swal("Error","Empty Video Image!","error");
					return false;
				}
				var video = $("#newVideoFile").val();
				if(video=="") {
					swal("Error","Empty File Video!","error");
					return false;
				}
				var cate = $('#newVideoCategory').val();
				var newVideoTitle = $('#newVideoTitle').val();
				var description = $('#newVideoCaption').val();
				var newVideoKeyword = $('#newVideoKeyword').val();
				$.ajax({
					type: "POST",
					cache: false,
					async: false,
					url: "/ajax/stockvideos.create.php",
					data: 'cate='+cate+'&title='+newVideoTitle+'&description='+description+'&keyword='+newVideoKeyword+'&videofile='+video+'&imagefile='+image,
					dataType: "json",
					success: function(data) {
						insertVideo(image, video);
						/* var status = parseInt(data.status);
						if(status=='success') {
							
						} */
					}
				});
			});
			var insertVideo = function(fileImage, fileVideo) {
				var newVideoImage = $('#newVideoImage').val();
				if(newVideoImage != "") {
					fileImage = newVideoImage.replace('/small/', '/full/');
				}
				var videoTag = '<video controls="" src="'+fileVideo+'" poster="'+fileImage+'" class="note-video-clip" data-image="'+fileImage+'"></video>';
				CKEDITOR.instances.content.insertHtml(videoTag);
			}
			$(document).on('click', '#showNewVideoImage', function() {
				var image = $("#newVideoImage").val();
				var imageTag = '<img id="videoNewImageFile" src="'+image+'">';
				if($("#videoNewImageFile").length) {
					$("#showImageHolder").empty().addClass("hidden");
				}
				else
				{
					$("#showImageHolder").html(imageTag).removeClass("hidden");
				}
			});
			$(document).on('click', '#showNewVideoFile', function() {
				var video = $("#newVideoFile").val();
				var videoTag = '<video id="videoNewVideoFile" class="note-video-clip" controls="" src="'+video+'"></video>';
				if($("#videoNewVideoFile").length) {
					$("#showVideoHolder").empty().addClass("hidden");
				}
				else
				{
					$("#showVideoHolder").html(videoTag).removeClass("hidden");
				}
			});
			$('#captureVideoTime').on('change', function() {
				if($(this).is(':checked')) {
					$('#newVideoCaptureSecond').val("01");
					$('#newVideoCaptureMS').val("000");
				}
				else
				{
					$('#newVideoCaptureSecond').val("");
					$('#newVideoCaptureMS').val("");
				}
			});
		});
		$(function() {
			$.validator.setDefaults({
				//ignore: ".ignore :hidden",
				//ignore: [],
				highlight: function (element, errorClass, validClass) {
					var elem = $(element);
					if(elem.hasClass("editor")) {
						elem.find().closest('.note-editor').addClass(errorClass);
					}
					else
					{
						elem.closest('.form-group').addClass('has-error');
					}
				},
				unhighlight: function (element, errorClass, validClass) {
					var elem = $(element);
					if(elem.hasClass("editor")) {
						elem.find().closest('.note-editor').removeClass(errorClass);
					}
					else
					{
						elem.closest('.form-group').removeClass('has-error');
					}
				},
				errorElement: 'span',
				errorClass: 'help-block',
				errorPlacement: function (error, element) {
					var elem = $(element);
					if (element.is(':checkbox')) {
						error.insertAfter(element.parent());
					}
					else if(elem.hasClass("select2-hidden-accessible")) {
						error.insertAfter($("#select2-" + elem.attr("id") + "-container").parent().parent().parent());
					} else {
						error.insertAfter(element);
					}
				}
			});
			var validateNews = $('#newsForm').validate({
				framework: 'bootstrap',
				rules: {
					title: {
						required: true
					},
					keyword: {
						required: true
					},
					content: {
						required: true
					}
				},
				submitHandler: function(form) {
					CK_jQ();
					var l = Ladda.create(document.querySelector('.btn-submit'));
					l.start();
					$.ajax({
						type: "POST",
						cache: false,
						url: "/ajax/news.edit.src.biro.php",
						data: $('#newsForm').serialize(),
						dataType: "json",
						success: function(data) {
							window.onbeforeunload = null;
							if(data.status=="success") {
								swal("Success",data.message,data.status);
								setTimeout(function () {
									window.location.replace(data.redirect);
								}, 500);
								//$('.alert').empty().html(data.message);
								//$('.alert').removeClass('alert-danger').addClass('alert-success').removeClass('hidden');
							}
							else
							{
								swal("Error",data.message,data.status);
								//$('.alert').empty().html(data.message);
								//$('.alert').removeClass('alert-success').addClass('alert-danger').removeClass('hidden');
							}
						}
					}).always(function() {
						l.stop();
					});
				}
			});
			window.onbeforeunload = function(){
				var news_wire_id = $("#news_wire_id").val();
				var dataString = 'news_wire_id='+ news_wire_id;
				$.ajax({
					async: false,
					cache: false,
					type: "POST",
					url: "/ajax/release_news_wire_biro.php",
					data: dataString,
					success: function(msg) {
						if (msg == "true") {
							return true;
						}
					}
				});
				//return false;
			}
		});
	</script>
</body>
</html>