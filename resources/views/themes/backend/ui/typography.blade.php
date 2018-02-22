@extends('layouts/master')

@section('content')

	<div class="row mb-5">
		<div class="col">
			<h4 class="page-title">
				Typography
			</h4>
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5">
		<div class="col">
			<h5 class="card-title">Headings</h5>

			<div class="card">
				<div class="card-body">

					<h1>h1. Bootstrap heading</h1>
					<p class="text-muted">Suspendisse vel quam malesuada, aliquet sem sit amet, fringilla elit. Morbi
						tempor tincidunt tempor. Etiam id turpis viverra, vulputate sapien nec,
						varius sem. Curabitur ullamcorper fringilla eleifend. In ut eros hendrerit
						est consequat posuere et at velit.</p>

					<div class="clearfix"></div>

					<h2>h2. Bootstrap heading</h2>
					<p class="text-muted">In nec rhoncus eros. Vestibulum eu mattis nisl. Quisque viverra viverra magna
						nec pulvinar. Maecenas pellentesque porta augue, consectetur facilisis diam
						porttitor sed. Suspendisse tempor est sodales augue rutrum tincidunt.
						Quisque a malesuada purus.</p>

					<div class="clearfix"></div>

					<h3>h3. Bootstrap heading</h3>
					<p class="text-muted">Vestibulum auctor tincidunt semper. Phasellus ut vulputate lacus. Suspendisse
						ultricies mi eros, sit amet tempor nulla varius sed. Proin nisl nisi,
						feugiat quis bibendum vitae, dapibus in tellus.</p>

					<div class="clearfix"></div>

					<h4>h4. Bootstrap heading</h4>
					<p class="text-muted">Nulla et mattis nunc. Curabitur scelerisque commodo condimentum. Mauris
						blandit, velit a consectetur egestas, diam arcu fermentum justo, eget
						ultrices arcu eros vel erat.</p>

					<div class="clearfix"></div>

					<h5>h5. Bootstrap heading5</h5>
					<p class="text-muted">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim
						eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet.
						Nulla sapien mauris, eleifend et sem ac, commodo dapibus odio. Vivamus
						pretium nec odio cursus elementum. Suspendisse molestie ullamcorper
						ornare.</p>

					<div class="clearfix"></div>

					<h6>h6. Bootstrap heading</h6>
					<p class="text-muted">Donec ultricies, lacus id tempor condimentum, orci leo faucibus sem, a
						molestie libero lectus ac justo. ultricies mi eros, sit amet tempor nulla
						varius sed. Proin nisl nisi, feugiat quis bibendum vitae, dapibus in
						tellus.</p>

					<h3>
						Fancy display heading
						<small class="text-muted">With faded secondary text</small>
					</h3>

					<h1 class="display-1">Display 1</h1>
					<h1 class="display-2">Display 2</h1>
					<h1 class="display-3">Display 3</h1>
					<h1 class="display-4">Display 4</h1>
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END row --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5">
		<div class="col-md-6">
			<h5 class="card-title">Inline text elements</h5>

			<div class="card">
				<div class="card-body">
					<p>You can use the mark tag to <mark>highlight</mark> text.</p>
					<p><del>This line of text is meant to be treated as deleted text.</del></p>
					<p><s>This line of text is meant to be treated as no longer accurate.</s></p>
					<p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
					<p><u>This line of text will render as underlined</u></p>
					<p><small>This line of text is meant to be treated as fine print.</small></p>
					<p><strong>This line rendered as bold text.</strong></p>
					<p><em>This line rendered as italicized text.</em></p>
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}

		<div class="col-md-6">
			<h5 class="card-title">Contextual Text Colors</h5>

			<div class="card">
				<div class="card-body">
					<p class="text-custom">
						<code>.text-custom - </code> Etiam porta sem malesuada.
					</p>

					<p class="text-pink">
						<code>.text-pink - </code> Donec ullamcorper nulla fringilla.
					</p>

					<p class="text-muted">
						<code>.text-muted - </code> Fusce dapibus, tellus tortor mauris.
					</p>

					<p class="text-primary">
						<code>.text-primary - </code> Nullam id dolor  ut id elit.
					</p>

					<p class="text-success">
						<code>.text-success - </code> Duis mollis, nisi erat porttitor ligula.
					</p>

					<p class="text-info">
						<code>.text-info - </code> Maecenas sed diam sit amet non magna.
					</p>

					<p class="text-warning">
						<code>.text-warning - </code> Etiam porta magna mollis euismod.
					</p>

					<p class="text-danger">
						<code>.text-danger - </code> Donec ullamcorper nulla fringilla.
					</p>

					<p class="text-purple m-b-0">
						<code>.text-purple - </code> Fusce dapibus, tortor mauris nibh.
					</p>
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5">
		<div class="col-4">
			<div class="card">
				<div class="card-body">

					<h5 class="card-title">Unordered</h5>

					<p>
						A list of items in which the order does not explicitly matter.
					</p>

					<ul>
						<li>
							Lorem ipsum dolor sit amet
						</li>
						<li>
							Consectetur adipiscing elit
						</li>
						<li>
							Integer molestie lorem at massa
						</li>
						<li>
							Facilisis in pretium nisl aliquet
						</li>
						<li>
							Nulla volutpat aliquam velit
							<ul>
								<li>
									Phasellus iaculis neque
								</li>
								<li>
									Purus sodales ultricies
								</li>
								<li>
									Vestibulum laoreet porttitor sem
								</li>
								<li>
									Ac tristique libero volutpat at
								</li>
							</ul>
						</li>
						<li>
							Faucibus porta lacus fringilla vel
						</li>
						<li>
							Aenean sit amet erat nunc
						</li>
						<li>
							Eget porttitor lorem
						</li>
					</ul>
				</div>
			</div>
		</div>
		{{-- END col --}}

		<div class="col-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Ordered</h5>

					<p>
						A list of items in which the order does explicitly matter.
					</p>

					<ol>
						<li>
							Lorem ipsum dolor sit amet
						</li>
						<li>
							Consectetur adipiscing elit
						</li>
						<li>
							Integer molestie lorem at massa
						</li>
						<li>
							Facilisis in pretium nisl aliquet
						</li>
						<li>
							Nulla volutpat aliquam velit
							<ol>
								<li>
									Phasellus iaculis neque
								</li>
								<li>
									Purus sodales ultricies
								</li>
								<li>
									Vestibulum laoreet porttitor sem
								</li>
								<li>
									Ac tristique libero volutpat at
								</li>
							</ol>
						</li>
						<li>
							Faucibus porta lacus fringilla vel
						</li>
						<li>
							Aenean sit amet erat nunc
						</li>
						<li>
							Eget porttitor lorem
						</li>
					</ol>
				</div>
			</div>
		</div>
		{{-- END col --}}

		<div class="col-4">
			<div class="card">
				<div class="card-body">
					
					<h5 class="card-title">Unstyled</h5>

					<p>
						<strong>This only applies to immediate children
						list items</strong>, meaning you will need to add the class for any nested lists as well.
					</p>

					<ul class="list-unstyled">
						<li>
							Lorem ipsum dolor sit amet
						</li>
						<li>
							Integer molestie lorem at massa
							<ul>
								<li>
									Phasellus iaculis neque
								</li>
								<li>
									Phasellus iaculis neque
								</li>
							</ul>
						</li>
						<li>
							Faucibus porta lacus fringilla vel
						</li>
						<li>
							Eget porttitor lorem
						</li>
					</ul>
					
					<h5 class="card-title">Inline list</h5>

					<ul class="list-inline">
						<li class="list-inline-item">Lorem ipsum</li>
						<li class="list-inline-item">Phasellus iaculis</li>
						<li class="list-inline-item">Nulla volutpat</li>
					</ul>
				</div>
			</div>
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5">
		<div class="col-md-6">
			<h5 class="card-title">Addresses</h5>

			<div class="card">
				<div class="card-body">
					<address>
						<strong>Twitter, Inc.</strong>
						<br>
						795 Folsom Ave, Suite 600
						<br>
						San Francisco, CA 94107
						<br>
						<abbr title="Phone">P:</abbr> (123) 456-7890
					</address>

					<address>
						<strong>Full Name</strong>
						<br>
						<a href="mailto:#">first.last@example.com</a>
					</address>

				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}

		<div class="col-md-6">
			<h5 class="card-title">Blockquotes</h5>

			<div class="card">
				<div class="card-body">
					<blockquote class="blockquote blockquote-border">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
							erat a ante.
						</p>
						<footer class="blockquote-footer">
							Someone famous in <cite title="Source Title">Source Title</cite>
						</footer>
					</blockquote>

					<p class="text-muted">
						Add <code>.text-right</code> for a blockquote with right-aligned content.
					</p>

					<blockquote class="blockquote blockquote-border text-right">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
							erat a ante.
						</p>
						<footer class="blockquote-footer">
							Someone famous in <cite title="Source Title">Source Title</cite>
						</footer>
					</blockquote>
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5">
		<div class="col-md-6">
			<h5 class="card-title">Description Lists</h5>

			<div class="card">
				<div class="card-body">
					<dl class="row">
						<dt class="col-sm-3">Description lists</dt>
						<dd class="col-sm-9">A description list is perfect for defining terms.</dd>
						<dt class="col-sm-3">Euismod</dt>
						<dd class="col-sm-9">
							<p>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</p>
							<p>Donec id elit non mi porta gravida at eget metus.</p>
						</dd>
						<dt class="col-sm-3">Malesuada porta</dt>
						<dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>
						<dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
						<dd class="col-sm-9">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
						<dt class="col-sm-3">Nesting</dt>
						<dd class="col-sm-9">
							<dl class="row">
								<dt class="col-sm-4">Nested definition list</dt>
								<dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
							</dl>
						</dd>
					</dl>
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}

		<div class="col-md-6">
			<h5 class="card-title">Code Blocks</h5>

			<div class="card">
				<div class="card-body">
					<p>For example, <code>&lt;section&gt;</code> should be wrapped as inline.</p>

					<pre><code>&lt;p&gt;Sample text here...&lt;/p&gt; &lt;p&gt;And another line of sample text here...&lt;/p&gt;</code></pre>

					<h5 class="card-title">Variables</h5>
					<p><var>y</var> = <var>m</var><var>x</var> + <var>b</var></p>

					<h5 class="card-title">User Input</h5>
					<p>
						To switch directories, type <kbd>cd</kbd> followed by the name of the directory.
						<br>
						To edit settings, press <kbd><kbd>ctrl</kbd> + <kbd>,</kbd></kbd>
					</p>

					<h5 class="card-title">Sample Output</h5>
					<p><samp>This text is meant to be treated as sample output from a computer program.</samp></p>
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endsection