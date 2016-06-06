<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Banger</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style type="text/css">
    	body
    	{
    		background-image: url('https://wallpaperscraft.com/image/board_black_line_texture_background_wood_55220_2560x1600.jpg');
    		color: white;
    	}
    	label
    	{
    		margin-left: 50px;
    	}
    	button
    	{
    		margin-left: 100px;
    	}
    </style>
</head>
<body>
	<div class="container">
	    <!-- <div class="row" style="margin:50px;"> -->
	        <div class="col-md-10" style="margin:30px auto; float:none;">
	            @if (count($errors) > 0)
	                <div class="alert alert-danger">
	                    @foreach ($errors->all() as $error)
	                        <p>{{ $error }}</p>
	                    @endforeach
	                </div>
	            @endif  
				<form class="form-inline" method="post" action="/filter">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="control-label" for="genre">Genre: </label>
						<select class="form-control" name="genre">
							<option></option>
							<option value="AlternativeRock">Alternative Rock</option>
							<option>Ambient</option>
							<option>Classical</option>
							<option>Country</option>
							<option value="Dance&EDM">Dance & EDM</option>
							<option>Dancehall</option>
							<option value="DeepHouse">Deep House</option>
							<option>Disco</option>
							<option value="Drum&Bass">Drum & Bass</option>
							<option>Dubstep</option>
							<option>Electronic</option>
							<option>Folk & Singer-Songwriter</option>
							<option value="Hip-hop&Rap">Hip-hop & Rap</option>
							<option>House</option>
							<option>Indie</option>
							<option value="Jazz&Blues">Jazz & Blues</option>
							<option>Latin</option>
							<option>Metal</option>
							<option>Piano</option>
							<option>Pop</option>
							<option value="R&B">R&B & Soul</option>
							<option>Raggae</option>
							<option>Reggaeton</option>
							<option>Rock</option>
							<option>Soundtrack</option>
							<option>Techno</option>
							<option>Trance</option>
							<option>Trap</option>
							<option>Triphop</option>
							<option>World</option>
						</select>
						<label class="control-label" for="artist">Artist</label>
						<input class="form-control" type="text" name="artist">
						<button class="btn btn-success" type="submit">Filter Songs</button>
					</div>
				</form>
	        </div>
	    <!-- </div> -->

	    @if ($tracks)
		    <div class="col-md-6" style="margin: 0px auto; float:none;">
				<h2 id="title">{{$tracks[$counter]->title}}</h2>
				<h4 id="genre">{{$tracks[$counter]->genre}}</h4>
				<iframe
					id="song"
					width="500"
					height="300"
					scrolling="no"
					frameborder="no"
					src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{$tracks[$counter]->id}}&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true">
				</iframe>
			</div>
			<?php if ($counter < $trackCount-1) : ?>
				<div class="row" style="margin-bottom: 100px;">
					<div class="col-md-3">
						<form method="post" action="/nextTrack" style="margin-left:75px; margin-top: 30px;">
							{{ csrf_field() }}
							<button id="nextButton" class="btn btn-success">
								Next Track<span class="glyphicon glyphicon-chevron-right"></span>
							</button>
						</form>
					</div>
				</div>
			<?php endif ?>
		@else
			<div class="col-md-6" style="margin: 50px auto; float:none;">
				<h1>No tracks with those parameters were found. Please try again</h1>
			</div>
		@endif
	</div>
</body>
</html>