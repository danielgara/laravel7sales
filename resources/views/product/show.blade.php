@extends('layouts.master')

@section('title', $data["title"])

@section('content')


<div class="row" style="margin-top:20px; margin-bottom:20px">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">{{ $data["product"]->getName() }}</h5>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{ $data["product"]->getPrice() }}</h6>
                                <div>
                                <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                    <div class="col-md-12">Qtt: 
                                    <input type="number" class="form-control" name="quantity" min="0" style="width: 80px;">
                                    </div>
                                    <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-success">Add</button>
                                    </div>
                                    </div>
                                </form>
                                </div>
                                <ul class="list-inline small">
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                                </ul>
                            </div>
                        </div><img src="https://i.imgur.com/KFojDGa.jpg" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->
            </ul> <!-- End -->
        </div>
    </div>

@endsection

