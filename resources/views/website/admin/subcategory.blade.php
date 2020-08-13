@extends("ecommerce.layout.master")

@section("title","Category")


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.alert').not('.alert-important').delay(1000).fadeOut(1500);
      });
    </script>
@section("body")
    <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              
              
              <!-- Horizontal Form-->
              <div class="offset-2 col-lg-6 mb-5 stl_card">
                <div class="card" style="width: 130%;">
                  <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Subcategory Form</h3>
                  </div>
                  <div class="card-body">
                    <p>Add subcategory and select an parrent category.</p>

                    @if($errors->any())
                      <ul class="list-group">
                      @foreach($errors->all() as $error)

                          <li class="alert alert-danger fade show">
                            {{ $error }}
                          </li>
                        
                      @endforeach
                      </ul>
                    @endif

                    @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                    @endif
                    @if(session()->has('msgError'))
                      <div class="alert alert-danger">
                          {{ session()->get('msgError') }}
                      </div>
                    @endif
                    
                    <form class="form-horizontal" action="/insert/subcategory" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Sub Category Name</label>
                        <div class="col-md-8">
                          <input id="inputHorizontalSuccess" type="text" placeholder="Sub Category Name" name="name" value="{{ old('name') }}" class="form-control form-control-success"><small class="form-text text-muted ml-3">Write subcategory name.</small>
                        </div>
                      </div>

                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Select Category</label>
                        <div class="col-md-8 ">
                          <select name="category[]" class="form-control form-control-success">
                              <option value="" disabled selected>--Select Category--</option>
                              @foreach($records as $rec)
                                <option value="{{ $rec->id }}">{{ $rec->name }}</option>
                              @endforeach

                          </select>

                        </div>
                        
                      </div>

                      
                      <div class="form-group row">
                        <div class="col-md-9 ml-auto">
                          <a href="{{ url("admin") }}" class="btn btn-secondary">Cancel</a>

                          <button type="submit" class="btn btn-primary ml-5">Save</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
             
            </div>
          </section>
        </div>
@endsection
