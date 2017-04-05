@extends('layouts.app')

@section('title', $album->name)

@section('content')

<!-- ???? -->
<div class="row">
    <div class="col-sm-3">
        @if( $album->cover == '' )
            <img class="img-responsive" src="/img/covers/default.jpg">
        @else
            <img class="img-responsive" src="{{ $album->cover }}">
        @endif
    </div>
    <div class="col-sm-9">
        <h2>{{ $album->name }}</h2>
        <p>{{ $album->intro }}</p>

        <!-- ?????????? -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadPhoto">
          Upload Photo
        </button>
	
        <!-- ?????????? -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editAlbum">
          Edit Album
        </button>
        <!-- ?????????? -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAlbum">
          Delete Album
        </button>
    </div>
</div>


<!-- ???????? -->
<div class="modal fade" id="uploadPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Photo</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="album_id" value="{{ $album->id }}">
            <div class="form-group">
              <input type="file" name="photo" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Click here to add a title for this photo">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="intro" placeholder="Click here to add an introduction for this photo">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- ???????? -->
<div class="modal fade" id="editAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Album</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="{{ route('albums.update', $album->id) }}" method="post"  enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Album name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required value="{{ $album->name }}">
              </div>
            </div>
            <div class="form-group">
              <label for="intro" class="col-sm-2 control-label">Album introduction</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="intro" name="intro" value="{{ $album->intro }}">
              </div>
            </div>
	   <!-- ???????? -->
            <div class="form-group">
                <label for="intro" class="col-sm-2 control-label">Cover picture</label>
                <div class="col-sm-10">
                  <input type="file" name="cover">
                </div>
            </div>
            <!-- ???????? -->

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- ???????? -->
<div class="modal fade" id="deleteAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="text-align:center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Do you want to delete this album?</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('albums.destroy', $album->id) }}" method="post" style="display: inline-block;">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">Dlete</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>



<!-- ???? -->
<hr>
<div class="row masonry">
	@each('shared.photo',$photos,'photo')
</div>
{!! $photos->render() !!}
@endsection

@section('script')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<!--???-->
<script>
$('.masonry').imagesLoaded(function() {
    $('.masonry').masonry({
    itemSelector: '.item'
    });
});
</script>
@endsection
