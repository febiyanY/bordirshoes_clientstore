
@extends('layouts.home')

@section('pagetitle')
Sepatu Bordir.id | Home
@endsection

@section('content')
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">Sepatu Bordir.id</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.index')}}">Home</a>
                </li>
                @if(session('user'))
                @if(session('user')->type=='admin')
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('category.index')}}">Kategori <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product.index')}}">Produk Baru</a>
                </li>
                @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart.index')}}">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                @if(session('user'))
                    @if(session('user')->type=='admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.index')}}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Log out</a>
                        </li>
                    @else
                    @endif
                    @if(session('user')->type=='user')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('userprofile.show')}}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Log out</a>
                        </li>
                    @else
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login.index')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('registration.index')}}">Register</a>
                    </li>
                @endif
            </ul>

            <form class="form-inline my-2 my-lg-0" method="post" action="/home/search">
            	{{csrf_field()}}
                <div class="input-group input-group-sm">
                    <input type="text" name="searchText" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ml-3" href="{{route('cart.index')}}">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="badge badge-light">{{Cart::content()->count()}}</span>
                </a>
                <!-- @if(session('user'))
                    <a class="btn btn-danger btn-sm ml-3" href="/logout">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                @else
                @endif -->
            </form>
        </div>
    </div>
</nav>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">SEPATU BORDIR.ID</h1>
        <p class="lead text-muted mb-0">Selamat Belanja, Nikmati Promo yang Tersedia</p>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="category.html">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sub-category</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categories</div>
                <ul class="list-group category_block">
                    @foreach($categories as $category)
                    	<li class="list-group-item"><a href="/home/category/{{$category->categoryId}}">{{$category->categoryName}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Produk Terbaru</div>
                @if(!$products->isEmpty())
                <div class="card-body">
                    <img class="img-fluid" src="https://cdn.pixabay.com/photo/2013/07/12/19/21/pumps-154636_960_720.png" />
                    
                    <h5 class="card-title">{{$products[0]->productName}}</h5>
                    <p class="card-text">{{$products[0]->description}}</p>
                    <p class="bloc_left_price">Rp. {{number_format($products[0]->price, 2, '.', ',')}}</p>
                   
                </div>
                @endif
            </div>
        </div>
        <div class="col">
            <div class="row">
            	<!-- Start product counting -->
              
            	@foreach($products as $product)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2013/07/12/19/21/pumps-154636_960_720.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="/home/product/{{$product->productId}}" title="View Product">{{$product->productName}}</a></h4>
                            <p class="card-text">{{$product->description}}</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">Rp. {{number_format($product->price, 2, '.', ',')}} </p>
                                </div>
                                <div class="col">
                                    <a href="/home/product/{{$product->productId}}" class="btn btn-success btn-block">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @if($products->isEmpty())
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <h1>Kosong</h1>
                    </div>
                </div>
                @endif
                <!-- End product counting -->
                @if(!$products->isEmpty())
                <div class="col-12">
                    {{$products->links('vendor.pagination.bootstrap-4')}}
                    <!-- <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav> -->
                </div>
                @endif
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>About</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <h5>Informations</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                <h5>Others links</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3">
            <h5>Kontak</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home mr-2"></i> Sepatu Bordir.id</li>
                    <li><i class="fa fa-envelope mr-2"></i> email@ub.com</li>
                    <li><i class="fa fa-phone mr-2"></i> +62000000</li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Back to top</a>
                </p>
            </div>
        </div>
    </div>
</footer>
@endsection

@section('styles')
	<style type="text/css">
		.bloc_left_price {
		    color: #c01508;
		    text-align: center;
		    font-weight: bold;
		    font-size: 150%;
		}
		.category_block li:hover {
		    background-color: #007bff;
		}
		.category_block li:hover a {
		    color: #ffffff;
		}
		.category_block li a {
		    color: #343a40;
		}
		.add_to_cart_block .price {
		    color: #c01508;
		    text-align: center;
		    font-weight: bold;
		    font-size: 200%;
		    margin-bottom: 0;
		}
		.add_to_cart_block .price_discounted {
		    color: #343a40;
		    text-align: center;
		    text-decoration: line-through;
		    font-size: 140%;
		}
		.product_rassurance {
		    padding: 10px;
		    margin-top: 15px;
		    background: #ffffff;
		    border: 1px solid #6c757d;
		    color: #6c757d;
		}
		.product_rassurance .list-inline {
		    margin-bottom: 0;
		    text-transform: uppercase;
		    text-align: center;
		}
		.product_rassurance .list-inline li:hover {
		    color: #343a40;
		}
		.reviews_product .fa-star {
		    color: gold;
		}
		.pagination {
		    margin-top: 20px;
		}
		footer {
		    background: #343a40;
		    padding: 40px;
		}
		footer a {
		    color: #f8f9fa!important
		}
	</style>
@endsection