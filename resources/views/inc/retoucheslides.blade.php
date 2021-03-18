<div class="container my-4">

	<h3>Retouches</h3>
	<hr class="my-4">

	<!--Carousel Wrapper-->
	<div id="retouche-item" class="carousel slide carousel-multi-item" data-ride="carousel">

		<!--Controls-->
		<div class="controls-top">
			<a class="btn-floating" href="#retouche-item" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
			<a class="btn-floating" href="#retouche-item" data-slide="next"><i class="fa fa-chevron-right"></i></a>
		</div>
		<!--/.Controls-->

		<!--Indicators-->
        <ol class="carousel-indicators">
            @foreach( $retouches as $retouche )

               <li data-target="#retouche-item" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>

            @endforeach
        </ol>
        <!--/.Indicators-->

		<!--Slides-->
		<div class="carousel-inner" role="listbox">
            @foreach ($retouches->chunk(3) as $retoucheCollection)
			<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
				<div class="row">
                    @foreach ($retoucheCollection as $retouche)
                    <div class="col-md-4">
						<div class="card mb-2">
                            <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $retouche->image }}" alt="Card image cap"/>
							<div class="card-body">
								<h4 class="card-title">{{ $retouche->titre}}</h4>
								<p class="card-text">{{ $retouche->description}}</p>
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
