@extends('backend.admin_master')
@section('content')
    <h1 class="text-center mb-2">add products</h1>


    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12"> 
                    <div class="card card-default">
                        <div class="card-body">
                            <form method="POST" action="{{ route('all_products.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">First name</label>
                                        <input type="text" name="name" class="form-control" id="validationServer01"
                                            placeholder="name" value="" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">image</label>
                                        <input type="file" name="image" class="form-control" id="validationServer01"
                                            value="" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">quantity</label>
                                        <input type="text" name="quantity" class="form-control" id="validationServer01"
                                            placeholder="quantity" value="" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">price</label>
                                        <input type="text" name="price" class="form-control" id="validationServer01"
                                            placeholder="price" value="" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">sale_price</label>
                                        <input type="text" name="sale_price" class="form-control" id="validationServer01"
                                            placeholder="sale_price" value="">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">category</label>

                                        <select class="form-control" name="category" aria-label="Default select example" required>
                                            <option selected>Open this select menu</option>
                                            <option value="sport">sport</option>
                                            <option value="classic">classic</option>
                                            <option value="glass">glass</option>
                                          </select>


                                        {{-- <input type="text" name="category" class="form-control" id="validationServer01"
                                            placeholder="category" value="" required> --}}
                                    </div>



                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">type</label>

                                        <select class="form-control" name="type" aria-label="Default select example" required>
                                            <option selected>Open this select menu</option>
                                            <option value="men">men</option>
                                            <option value="woman">woman</option>
                                          </select>

                                        {{-- <input type="text" name="type" class="form-control" id="validationServer01"
                                            placeholder="type" value="" required> --}}
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">description</label>
                                        <textarea type="text" name="description" rows="5" class="form-control" id="validationServer01"
                                            placeholder="description" value="" required></textarea>
                                    </div>
                                <button class="btn btn-primary" type="submit">add product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
