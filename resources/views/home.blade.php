@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-10">
		<h1>Welcome to Banger Music!</h1>
		<h2>Love listening to new music, but hate doing all the work to find it?  Let us discover the next Banger for you.  Easily filter your music searches by genre or artist, and view related tracks with ease.</h2>
		<form class="form-inline" method="post" action="/filter" style="margin-top:50px;">
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
</div>

@endsection