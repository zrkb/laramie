@extends('admin::layouts/master')

@section('content')

	<div class="row mb-5">
		<div class="col">
			<h4 class="page-title">
				Datatables
			</h4>
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5">
		<div class="col">
			<div class="card">

				<div class="card-body">
					<p>Add class <code>.datatables</code> to your tables to add more features like search, sort and export functionality.</p>
					
					<div class="table-responsive">
						<table class="table table-striped datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Full Name</th>
									<th>Song</th>
									<th>Tags</th>
									<th>Username</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="Jimi Hendrix">JH</span>
										</div>
										<a href="javascript:;">Jimi Hendrix</a>
									</td>
									<td>
										Purple Haze
									</td>
									<td>
										<span class="badge badge-secondary">Rock</span>
										<span class="badge badge-secondary">Psychedelic</span>
									</td>
									<td><a href="javascript:;">@voodoochild</a></td>
									<td>
										<a href="javascript:;" class="btn p-0 text-primary mr-2" data-toggle="tooltip" data-placement="left" title="Ver Detalle">
											<i data-feather="menu" class="ft"></i>
										</a>

										<a href="javascript:;" class="btn p-0 text-success mr-2" data-toggle="tooltip" data-placement="top" title="Editar ">
											<i data-feather="edit-2" class="ft"></i>
										</a>
										<a href="javascript:;" class="btn p-0 text-danger" data-toggle="tooltip" data-placement="right" title="Eliminar ">
											<i data-feather="trash-2" class="ft"></i>
										</a>
									</td>
									<!-- <td>
										<span class="text-success mr-2">•</span>
										Active
									</td> -->
								</tr>
								<tr>
									<td>2</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="George Harrison">GH</span>
										</div>
										<a href="javascript:;">George Harrison</a>
									</td>
									<td>While My Guitar Gently Weeps</td>
									<td>
										<span class="badge badge-secondary">Acoustic</span>
										<span class="badge badge-secondary">Country</span>
									</td>
									<td><a href="javascript:;">@lucyinthesky</a></td>
									<td>
										<span class="text-success mr-2">•</span>
										Active
									</td>
								</tr>
								<tr>
									<td>3</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="Eric Clapton">EC</span>
										</div>
										<a href="javascript:;">Eric Clapton</a>
									</td>
									<td>Sunshine Of Your Love</td>
									<td>
										<span class="badge badge-secondary">Blues</span>
										<span class="badge badge-secondary">Psychedelic</span>
									</td>
									<td><a href="javascript:;">@whitenose</a></td>
									<td>
										<span class="text-warning mr-2">•</span>
										Inactive
									</td>
								</tr>
								<tr>
									<td>4</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="Joe Satriani">JS</span>
										</div>
										<a href="javascript:;">Joe Satriani</a>
									</td>
									<td>Always With Me, Always with you</td>
									<td>
										<span class="badge badge-secondary">Heavy</span>
										<span class="badge badge-secondary">Shred</span>
									</td>
									<td><a href="javascript:;">@darkalien</a></td>
									<td>
										<span class="text-success mr-2">•</span>
										Active
									</td>
								</tr>
								<tr>
									<td>5</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="Jimmy Page">JP</span>
										</div>
										<a href="javascript:;">Jimmy Page</a>
									</td>
									<td>Whole Lotta Love</td>
									<td>
										<span class="badge badge-secondary">Rock</span>
										<span class="badge badge-secondary">Psychedelic</span>
									</td>
									<td><a href="javascript:;">@magicdust</a></td>
									<td>
										<span class="text-warning mr-2">•</span>
										Inactive
									</td>
								</tr>
								<tr>
									<td>6</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="Alex Turner">AT</span>
										</div>
										<a href="javascript:;">Alex Turner</a>
									</td>
									<td>My Propeller</td>
									<td>
										<span class="badge badge-secondary">Garage</span>
										<span class="badge badge-secondary">Rock</span>
									</td>
									<td><a href="javascript:;">@alexa</a></td>
									<td>
										<span class="text-warning mr-2">•</span>
										Inactive
									</td>
								</tr>
								<tr>
									<td>7</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="James Hetfield">JH</span>
										</div>
										<a href="javascript:;">James Hetfield</a>
									</td>
									<td>One</td>
									<td>
										<span class="badge badge-secondary">Heavy</span>
										<span class="badge badge-secondary">Metal</span>
									</td>
									<td><a href="javascript:;">@whiplash</a></td>
									<td>
										<span class="text-warning mr-2">•</span>
										Inactive
									</td>
								</tr>
								<tr>
									<td>8</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="Brian May">BM</span>
										</div>
										<a href="javascript:;">Brian May</a>
									</td>
									<td>Love Of My Life</td>
									<td>
										<span class="badge badge-secondary">Acoustic</span>
										<span class="badge badge-secondary">Lovesong</span>
									</td>
									<td><a href="javascript:;">@radiogaga</a></td>
									<td>
										<span class="text-warning mr-2">•</span>
										Inactive
									</td>
								</tr>
								<tr>
									<td>9</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="David Gilmour">DG</span>
										</div>
										<a href="javascript:;">David Gilmour</a>
									</td>
									<td>Wish you were here</td>
									<td>
										<span class="badge badge-secondary">Psychedelic</span>
										<span class="badge badge-secondary">Blues</span>
									</td>
									<td><a href="javascript:;">@fractals</a></td>
									<td>
										<span class="text-warning mr-2">•</span>
										Inactive
									</td>
								</tr>
								<tr>
									<td>10</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="Tom DeLonge">TD</span>
										</div>
										<a href="javascript:;">Tom Delonge</a>
									</td>
									<td>Adam's Song</td>
									<td>
										<span class="badge badge-secondary">Punk</span>
										<span class="badge badge-secondary">Rock</span>
									</td>
									<td><a href="javascript:;">@firstdate</a></td>
									<td>
										<span class="text-success mr-2">•</span>
										Active
									</td>
								</tr>
							</tbody>
						</table>
						{{-- END datatables --}}
					</div>
					{{-- END table-responsive --}}
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endsection