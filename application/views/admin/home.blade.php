@layout('layout.admin')

@section('title')
Admin Home Page
@endsection

@section('content')
<div class="home">
	<div class="aside">
		<h1>Welcome to our site</h1>
		<p>  Pastry is the name given to various kinds of baked goods made from ingredients such as flour, butter, shortening, baking powder or eggs. Small cakes, tarts and other sweet baked goods are called &#34;pastries&#34;. </p>  
		<p>Pastry may also refer to the dough from which such baked goods are made. Pastry dough is rolled out thinly and used as a base for baked goods. Common pastry dishes include pies, tarts and quiches. 
		<p>Pastry is distinguished from bread by having a higher fat content, which contributes to a flaky or crumbly texture. A good pastry is light and airy and fatty, but firm enough to support the weight of the filling. When making a shortcrust pastry, care must be taken to blend the fat and flour thoroughly before adding. <a href="index.php" class="readmore">read more</a></p>
	</div>
	<div class="section">
		<div>
			<h2>The food story</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adispiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exercitation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
		</div>
		<ul>
			<li class="first">
				<a href="index.php">{{ HTML::image('img/cake.jpg', 'Image') }}</a>
			</li>
			<li>
				<a href="index.php">{{ HTML::image('img/burgercake.jpg', 'Image') }}</a>
			</li>
			<li>
				<a href="index.php">{{ HTML::image('img/cupcake.jpg', 'Image') }}</a>
			</li>
		</ul>
	</div>
</div>
@endsection