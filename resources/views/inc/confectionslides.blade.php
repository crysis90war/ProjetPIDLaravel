<div class="container my-4">

	<h3>Conféctions</h3>
	<hr class="my-4">

	<!--Carousel Wrapper-->
	<div id="confection-item" class="carousel slide carousel-multi-item" data-ride="carousel">

		<!--Controls-->
		<div class="controls-top">
			<a class="btn-floating" href="#confection-item" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
			<a class="btn-floating" href="#confection-item" data-slide="next"><i class="fa fa-chevron-right"></i></a>
		</div>
		<!--/.Controls-->


		{{-- <ol class="carousel-indicators">
			<li data-target="#confection-item" data-slide-to="0" class="active"></li>
			<li data-target="#confection-item" data-slide-to="1"></li>
			<li data-target="#confection-item" data-slide-to="2"></li>
        </ol> --}}

        <!--Indicators-->
        <ol class="carousel-indicators">
            @foreach( $confections as $confection )

               <li data-target="#confection-item" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>

            @endforeach
        </ol>
		<!--/.Indicators-->

		<!--Slides-->
		<div class="carousel-inner" role="listbox">

            @foreach ($confections->chunk(3) as $confectionCollection)

			<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
				<div class="row">
                    @foreach ($confectionCollection as $confection)
                    <div class="col-md-4">
						<div class="card mb-2">
                            <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $confection->image }}" alt="Card image cap"/>
							<div class="card-body">
								<h4 class="card-title">{{ $confection->titre}}</h4>
								<p class="card-text">{{ $confection->description}}</p>
							</div>
						</div>
                    </div>
                    @endforeach
				</div>
            </div>

            @endforeach

		</div>
		<!--/.Slides-->

	</div>
	<!--/.Carousel Wrapper-->
</div>
