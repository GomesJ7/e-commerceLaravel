@extends("layouts.app")
@section("content")
<div class="container">

	@if (session()->has('message'))
	<div class="alert alert-info">{{ session('message') }}</div>
	@endif

			</head>
			<body>
			<a id="cart_logo" href="/cart">Cart</a>
				<main class="my-8">
					<div class="container px-6 mx-auto">
						<div class="flex justify-center my-6">
							<div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
							  @if ($message = Session::get('success'))
								  <div class="p-4 mb-3 bg-green-400 rounded">
									  <p class="text-green-800">{{ $message }}</p>
								  </div>
							  @endif
								<h3 class="text-3xl text-bold">Cart List</h3>
							  <div class="flex-1">
								<table class="w-full text-sm lg:text-base" cellspacing="10">
								  <thead>
									<tr class="h-12 uppercase">
									  <th class="hidden md:table-cell">Id</th>
									  <th class="text-left">Name</th>
									  <th class="pl-5 text-left lg:text-right lg:pl-0">Quantity</th>
									  <th class="hidden text-right md:table-cell"> Price</th>
									  <!--<th class="hidden text-right md:table-cell"> Remove </th>-->
									</tr>
									</thead>
									<tbody id="cart_content">
									
									  	@foreach ($cartItems as $item)
									
										@endforeach
									
								</tbody>
								  
								</table>
								<div>
									Total :
								 {{ Cart::getTotal() }} €
								</div>
								<div class="pay">
									<a href="#">
										
									</a>
								</div>
								<div>
									<form action="{{ route('cart.checkout') }}" method="POST" enctype="multipart/form-data">
										@csrf
										<button class="px-6 py-2 text-red-800 bg-red-300" onclick="remove_cart()">Checkout</button>

									  </form><br>

								  <form action="{{ route('cart.clear') }}" method="POST">
									@csrf
									<button class="px-6 py-2 text-red-800 bg-red-300" onclick="remove_cart()">Remove All Cart</button>
								  </form>
								</div>
		
		
							  </div>
							</div>
						  </div>
					</div>
				</main>
				<script src="{{ asset('javascript/cart.js') }}"></script> 
				<script>display_cart_table()</script>
			</body>

		</table>
	</div>

@endsection