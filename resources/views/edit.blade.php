<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<br></br>
<div class="row container-fluid">
	<div class="col-md-12">
		@if($errors->all())
		@foreach($errors->all() as $e)
		<div class="alert alert-danger">
			{{$e}}
		</div>
		@endforeach
		@endif
		<div class="card">
			<div class="card-header">
				<h3 class="card-header">
					Update Data
				</h3>
			</div>

			<div class="card-body">
				<form action="{{ Route('siswa.update',$data->id) }}" method="post" enctype="multipart/form-data">
					@csrf @method('patch')
					<div class="form-group">
						<label for="">NIS</label>
						<input type="number" class="form-control" required="" name="nis" value="{{$data->nis}}">
					</div>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" class="form-control" required="" name="nama" value="{{$data->nama}}">
					</div>
					<div class="form-group">
						<label for="">Foto</label>
						<input type="file" name="foto" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>