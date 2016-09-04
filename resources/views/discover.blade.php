@extends('layouts.app')

@section('content')

<div class="container">
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
				<label class="control-label" for="genre" style="margin-left:50px;">Genre: </label>
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
				<label class="control-label" for="artist" style="margin-left:50px;">Artist</label>
				<input class="form-control" type="text" name="artist">
				<button class="btn btn-primary" type="submit" style="margin-left:100px;">Filter Songs</button>
			</div>
		</form>
    </div>

    @if ($tracks)
	    <div class="col-md-8" style="margin: 0px auto; float:none;">
			<h2 id="title">{{$tracks[$counter]->title}}</h2>
			<h4 id="genre">{{$tracks[$counter]->genre}}</h4>
			<iframe
				id="song"
				width="625"
				height="400"
				scrolling="no"
				frameborder="no"
				src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{$tracks[$counter]->id}}&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true">
			</iframe>
		</div>
		<?php if ($counter < $trackCount-1) : ?>
			<div class="container">
				<div class="row" style="margin-top: 10px;">
					<div class="col-md-2 col-md-offset-3">
						<form method="get" action="/relatedTracks/{{$tracks[$counter]->id}}">
							{{ csrf_field() }}
							<button id="nextButton" class="btn btn-primary">
								Related Tracks
							</button>
						</form>
					</div>
					<div class="col-md-5">
						<form method="post" action="/nextTrack" style="margin-left:75px;">
							{{ csrf_field() }}
							<button id="nextButton" class="btn btn-primary">
								Next Track<span class="glyphicon glyphicon-chevron-right"></span>
							</button>
						</form>
					</div>
				</div>
			</div>
		<?php endif ?>
	@else
		<div class="col-md-6" style="margin: 50px auto; float:none;">
			<h1>No tracks with those parameters were found. Please try again</h1>
		</div>
	@endif
</div>
@endsection