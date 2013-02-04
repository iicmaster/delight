@layout('layout.main')

@section('title')
Products
@endsection

@section('content')
	<div>
		<h1>The Pastry shop</h1>
		<ul>
			<li>
				<div>
					<div>
						<h2><a href="index.php">Special Treats</a></h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
						<a href="index.php" class="view">view all</a>
					</div>
					<a href="index.php">{{ HTML::image('img/special-treats.jpg', 'Image') }}</a>
				</div>
			</li>
			<li>
				<div>
					<div>
						<h2><a href="index.php">Tarts</a></h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
						<a href="index.php" class="view">view all</a>
					</div>
					<a href="index.php">{{ HTML::image('img/tarts.jpg', 'Image') }}</a>
				</div>
			</li>
			<li>
				<div>
					<div>
						<h2><a href="index.php">Cakes</a></h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
						<a href="index.php" class="view">view all</a>
					</div>
					<a href="index.php">{{ HTML::image('img/cakes.jpg', 'Image') }}</a>
				</div>
			</li>
			<li>
				<div>
					<div>
						<h2><a href="index.php">Desserts</a></h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
						<a href="index.php" class="view">view all</a>
					</div>
					<a href="index.php">{{ HTML::image('img/dessert.jpg', 'Image') }}</a>
				</div>
			</li>
			<li>
				<div>
					<div>
						<h2><a href="index.php">Pastries</a></h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
						<a href="index.php" class="view">view all</a>
					</div>
					<a href="index.php">{{ HTML::image('img/pastries.jpg', 'Image') }}</a>
				</div>
			</li>
			<li>
				<div>
					<div>
						<h2><a href="index.php">Healthy Food</a></h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
						<a href="index.php" class="view">view all</a>
					</div>
					<a href="index.php">{{ HTML::image('img/healthy-food.jpg', 'Image') }}</a>
				</div>
			</li>
		</ul>
	</div>
@endsection