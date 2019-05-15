<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<br></br>
<div class="row container-fluid">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<a href="{{Route('siswa.create')}}" class="btn btn-primary">Add Data</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-stripped table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>NIS</th>
								<th>Nama</th>
								<th>Pict</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($list as $row)
							<tr>
								<td>{{$loop->index+1}}</td>
								<td>{{$row->nis}}</td>
								<td>{{$row->nama}}</td>
								<td><img src="{{ asset('upload/'.$row->foto) }}" alt="" class="img-circle" style="width:50px; height:50px;"></td>
								<td>
									<form action="{{Route('siswa.destroy',$row->id)}}" method="post">
										@csrf @method('delete')
										<a href="{{Route('siswa.edit',$row->id)}}" class="btn btn-primary">Update</a>
										<button class="btn btn-danger" type="submit">Hapus</button>

									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>