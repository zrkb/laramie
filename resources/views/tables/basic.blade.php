@extends('admin::layouts/master')

@section('content')

	<div class="row mb-5">
		<div class="col">
			<h4 class="page-title">
				Basic Tables
			</h4>
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<p>Using the most basic table markup, here’s how <code>.table-based</code> tables look in Bootstrap.</p>
					
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">First</th>
									<th scope="col">Last</th>
									<th scope="col">Handle</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Mark</td>
									<td>Otto</td>
									<td>@mdo</td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>Jacob</td>
									<td>Thornton</td>
									<td>@fat</td>
								</tr>
								<tr>
									<th scope="row">3</th>
									<td>Larry</td>
									<td>the Bird</td>
									<td>@twitter</td>
								</tr>
								<tr>
									<th scope="row">4</th>
									<td>John</td>
									<td>Doe</td>
									<td>@doe</td>
								</tr>
								<tr>
									<th scope="row">5</th>
									<td>Alex</td>
									<td>Page</td>
									<td>@alex</td>
								</tr>
								<tr>
									<th scope="row">6</th>
									<td>Ed</td>
									<td>Sheeran</td>
									<td>@sheeran</td>
								</tr>
							</tbody>
						</table>
					</div>
					{{-- END table-responsive --}}

					<p>You can also invert the colors—with light text on dark backgrounds—with <code>.table-dark</code>.</p>

					<div class="table-responsive">
						<table class="table table-dark">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">First</th>
									<th scope="col">Last</th>
									<th scope="col">Handle</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Mark</td>
									<td>Otto</td>
									<td>@mdo</td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>Jacob</td>
									<td>Thornton</td>
									<td>@fat</td>
								</tr>
								<tr>
									<th scope="row">3</th>
									<td>Larry</td>
									<td>the Bird</td>
									<td>@twitter</td>
								</tr>
								<tr>
									<th scope="row">4</th>
									<td>John</td>
									<td>Doe</td>
									<td>@doe</td>
								</tr>
								<tr>
									<th scope="row">5</th>
									<td>Alex</td>
									<td>Page</td>
									<td>@alex</td>
								</tr>
								<tr>
									<th scope="row">6</th>
									<td>Ed</td>
									<td>Sheeran</td>
									<td>@sheeran</td>
								</tr>
							</tbody>
						</table>
					</div>
					{{-- END table-responsive --}}

					<p>Use <code>.table-striped</code> to add zebra-striping to any table row within the <tbody>.</p>

					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">First</th>
								<th scope="col">Last</th>
								<th scope="col">Handle</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Jacob</td>
								<td>Thornton</td>
								<td>@fat</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Larry</td>
								<td>the Bird</td>
								<td>@twitter</td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>John</td>
								<td>Doe</td>
								<td>@doe</td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>Alex</td>
								<td>Page</td>
								<td>@alex</td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>Ed</td>
								<td>Sheeran</td>
								<td>@sheeran</td>
							</tr>
						</tbody>
					</table>

					<p>Add <code>.table-bordered</code> for borders on all sides of the table and cells.</p>

					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">First</th>
								<th scope="col">Last</th>
								<th scope="col">Handle</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Jacob</td>
								<td>Thornton</td>
								<td>@fat</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Larry</td>
								<td>the Bird</td>
								<td>@twitter</td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>John</td>
								<td>Doe</td>
								<td>@doe</td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>Alex</td>
								<td>Page</td>
								<td>@alex</td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>Ed</td>
								<td>Sheeran</td>
								<td>@sheeran</td>
							</tr>
						</tbody>
					</table>

					<p>Add <code>.table-hover</code> to enable a hover state on table rows within a <code>&lt;tbody&gt;</code>.</p>

					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">First</th>
								<th scope="col">Last</th>
								<th scope="col">Handle</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Jacob</td>
								<td>Thornton</td>
								<td>@fat</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Larry</td>
								<td>the Bird</td>
								<td>@twitter</td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>John</td>
								<td>Doe</td>
								<td>@doe</td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>Alex</td>
								<td>Page</td>
								<td>@alex</td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>Ed</td>
								<td>Sheeran</td>
								<td>@sheeran</td>
							</tr>
						</tbody>
					</table>
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endsection