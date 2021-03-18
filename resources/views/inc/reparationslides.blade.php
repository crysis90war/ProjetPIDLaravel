<div class="container my-4">

	<h3>Réparations</h3>
	<hr class="my-4">

	<!--Carousel Wrapper-->
	<div id="reparation-item" class="carousel slide carousel-multi-item" data-ride="carousel">

		<!--Controls-->
		<div class="controls-top">
			<a class="btn-floating" href="#reparation-item" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
			<a class="btn-floating" href="#reparation-item" data-slide="next"><i class="fa fa-chevron-right"></i></a>
		</div>
		<!--/.Controls-->

		<!--Indicators-->
        <ol class="carousel-indicators">
            @foreach( $reparations as $reparation )

               <li data-target="#reparation-item" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>

            @endforeach
        </ol>
		<!--/.Indicators-->

		<!--Slides-->
		<div class="carousel-inner" role="listbox">

            @foreach ($reparations->chunk(3) as $reparationCollection)

			<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
				<div class="row">
                    @foreach ($reparationCollection as $reparation)
                    <div class="col-md-4">
						<div class="card mb-2">
                            <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $reparation->image }}" alt="Card image cap"/>
							<div class="card-body">
								<h4 class="card-title">{{ $reparation->titre}}</h4>
								<p class="card-text">{{ $reparation->description}}</p>
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
