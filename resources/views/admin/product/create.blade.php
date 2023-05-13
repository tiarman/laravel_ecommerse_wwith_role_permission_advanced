@extends('layouts.admin')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/admin2/dist/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Create new product</h2>
                        </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                                    <a href="{{route('product.list')}}" class="brn btn-success btn-sm">List of product</a>
                                </div>
                            </div>

                            @if(session()->has('status'))
                                {!! session()->get('status') !!}
                            @endif
                            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Product Name</label>
                                            <input type="text" name="name" placeholder="Slider name" value="{{ old('name') }}"
                                                   class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Product Code</label>
                                            <input type="text" name="code" placeholder="Slider code" value="{{ old('code') }}"
                                                   class="form-control @error('code') is-invalid @enderror">
                                            @error('code')
                                            <strong class="text-danger">{{ $errors->first('code') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Category/Sub Category<span class="text-danger">*</span></label>
                                            <select name="subcategory_id" id="subcategory_id"  class="form-control @error('subcategory_id') is-invalid @enderror">
                                                <option value="">Choose a category Status</option>
                                                @foreach($categories as $e)
                                                @php
                                                    $subcat = DB::table('sub_categories')->where('category_id', $e->id)->get();
                                                @endphp
                                                    <option style="color: blue;font-weight: 600" disabled="" value="{{ $e->id }}" @if(old('category_id') == $e->category_name) selected @endif>{{ ucfirst($e->category_name) }}</option>
                                                    @foreach ($subcat as $s )
                                                    <option value="{{ $s->id }}" @if(old('subcategory_id') == $s->subcategory_name) selected @endif>-{{ ucfirst($s->subcategory_name) }}</option>


                                                    @endforeach
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')
                                            <strong class="text-danger">{{ $errors->first('subcategory_id') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--  <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Sub Category<span class="text-danger">*</span></label>
                                            <select name="subcategory_id" required class="form-control @error('subcategory_id') is-invalid @enderror">
                                                <option value="">Choose a category Status</option>
                                                @foreach($subcategory as $e)
                                                    <option value="{{ $e->id }}" @if(old('subcategory_id') == $e->subcategory_name) selected @endif>{{ ucfirst($e->subcategory_name) }}</option>
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')
                                            <strong class="text-danger">{{ $errors->first('subcategory_id') }}</strong>
                                            @enderror
                                        </div>
                                    </div>  --}}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Child Category<span class="text-danger">*</span></label>
                                            <select name="childcategory_id" id="childcategory_id"  class="form-control @error('childcategory_id') is-invalid @enderror">
                                                <option value="">Choose a category Status</option>
                                                @foreach($childcategory as $e)
                                                    <option value="{{ $e->id }}" @if(old('childcategory_id') == $e->childcategory_name) selected @endif>{{ ucfirst($e->childcategory_name) }}</option>
                                                @endforeach
                                            </select>
                                            @error('childcategory_id')
                                            <strong class="text-danger">{{ $errors->first('childcategory_id') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Brand<span class="text-danger">*</span></label>
                                            <select name="brand_id" id="brand_id"  class="form-control @error('brand_id') is-invalid @enderror">
                                                <option value="">Choose a category Status</option>
                                                @foreach($brand as $e)
                                                    <option value="{{ $e->id }}" @if(old('brand_id') == $e->brand_name) selected @endif>{{ ucfirst($e->brand_name) }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                            <strong class="text-danger">{{ $errors->first('brand_id') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Pickup Point<span class="text-danger">*</span></label>
                                            <select name="pickuppoint_id" id="pickuppoint_id"  class="form-control @error('pickuppoint_id') is-invalid @enderror">
                                                <option value="">Choose a Pickup Point</option>
                                                @foreach($pickup_point as $e)
                                                    <option value="{{ $e->id }}" @if(old('pickuppoint_id') == $e->pickup_point_name) selected @endif>{{ ucfirst($e->pickup_point_name) }}</option>
                                                @endforeach
                                            </select>
                                            @error('pickuppoint_id')
                                            <strong class="text-danger">{{ $errors->first('pickuppoint_id') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Unit</label>
                                            <input type="text" name="unit" placeholder="Slider unit" value="{{ old('unit') }}"
                                                   class="form-control @error('unit') is-invalid @enderror">
                                            @error('unit')
                                            <strong class="text-danger">{{ $errors->first('unit') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Tags</label>
                                            <select multiple="multiple" name="tag_name[]" placeholder="Enter tag_name" value="{{ old('tag_name[]') }}"
                                                   class="form-control select2 @error('tag_name[]') is-invalid @enderror">
                                            </select>
                                            @error('tag_name[]')
                                            <strong class="text-danger">{{ $errors->first('tag_name[]') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Purchase Price</label>
                                            <input type="text" name="purchase_price" placeholder="Enter purchase price" value="{{ old('purchase_price') }}"
                                                   class="form-control @error('purchase_price') is-invalid @enderror">
                                            @error('purchase_price')
                                            <strong class="text-danger">{{ $errors->first('purchase_price') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Selling Price</label>
                                            <input type="text" name="selling_price" placeholder="Enter selling price" value="{{ old('selling_price') }}"
                                                   class="form-control @error('selling_price') is-invalid @enderror">
                                            @error('selling_price')
                                            <strong class="text-danger">{{ $errors->first('selling_price') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Discount Price</label>
                                            <input type="text" name="discount_price" placeholder="Enter discount price" value="{{ old('discount_price') }}"
                                                   class="form-control @error('discount_price') is-invalid @enderror">
                                            @error('discount_price')
                                            <strong class="text-danger">{{ $errors->first('discount_price') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Stock Quantity</label>
                                            <input type="text" name="stock_quantity" placeholder="Slider stock_quantity" value="{{ old('stock_quantity') }}"
                                                   class="form-control @error('stock_quantity') is-invalid @enderror">
                                            @error('stock_quantity')
                                            <strong class="text-danger">{{ $errors->first('stock_quantity') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Warehouse<span class="text-danger">*</span></label>
                                            <select name="warehouse_id" id="warehouse_id"  class="form-control @error('warehouse_id') is-invalid @enderror">
                                                <option value="">Choose a warehouse</option>
                                                @foreach($warehouse as $e)
                                                    <option value="{{ $e->id }}" @if(old('warehouse_id') == $e->warehouse_name) selected @endif>{{ ucfirst($e->warehouse_name) }}</option>
                                                @endforeach
                                            </select>
                                            @error('warehouse_id')
                                            <strong class="text-danger">{{ $errors->first('warehouse_id') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Color</label>
                                            <select type="text" multiple="multiple" name="color[]" placeholder="Enter color" value="{{ old('color') }}"
                                                   class="form-control select2 @error('color') is-invalid @enderror"></select>
                                            @error('color')
                                            <strong class="text-danger">{{ $errors->first('color') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Size</label>
                                            <input type="text" name="size" placeholder="Enter size" value="{{ old('size') }}"
                                                   class="form-control @error('size') is-invalid @enderror">
                                            @error('size')
                                            <strong class="text-danger">{{ $errors->first('size') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                    <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Product Details</label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                                            @error('description')
                                            <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Featured Status<span class="text-danger">*</span></label>
                                            <select name="featured"  class="form-control @error('featured') is-invalid @enderror">
                                                <option value="">Choose a featured</option>
                                                @foreach(\App\Models\Product::$featuredArrays as $statys)
                                                    <option value="{{ $statys }}"
                                                            @if(old('featured') == $statys) selected @endif>{{ ucfirst($statys) }}</option>
                                                @endforeach
                                            </select>
                                            @error('featured')
                                            <strong class="text-danger">{{ $errors->first('featured') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Today Deal<span class="text-danger">*</span></label>
                                            <select name="today_deal"  class="form-control @error('today_deal') is-invalid @enderror">
                                                <option value="">Choose a today_deal</option>
                                                @foreach(\App\Models\Product::$todayDealArrays as $statys)
                                                    <option value="{{ $statys }}"
                                                            @if(old('today_deal') == $statys) selected @endif>{{ ucfirst($statys) }}</option>
                                                @endforeach
                                            </select>
                                            @error('today_deal')
                                            <strong class="text-danger">{{ $errors->first('today_deal') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Status<span class="text-danger">*</span></label>
                                            <select name="status"  class="form-control @error('status') is-invalid @enderror">
                                                <option value="">Choose a status</option>
                                                @foreach(\App\Models\Product::$statusArrays as $statys)
                                                    <option value="{{ $statys }}"
                                                            @if(old('status') == $statys) selected @endif>{{ ucfirst($statys) }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <strong class="text-danger">{{ $errors->first('status') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Video Embed</label>
                                                <input type="text" name="video" placeholder=" video" value="{{ old('video') }}"
                                                       class="form-control @error('video') is-invalid @enderror">
                                                @error('video')
                                                <strong class="text-danger">{{ $errors->first('video') }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Thumbnail <label class="text-danger">*</label></label>
                                            <input type="file" name="image"  placeholder="Slider image" value="{{ old('image') }}"
                                                   class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                            <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-danger btn-sm" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>




@endsection


@section('script')

  <script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('.select2').select2({
        tags: true,
      })
    })
  </script>

<script>

    {{--  $(".select2").select2({
        tags: true,
    })  --}}



    $("#subcategory_id").change(function(){
        var id = $(this).val();
        $.ajax({
            url: "{{ url("/get-child-category/") }}/"+id,
            type:'get',
            success:function(data){
                $('select[name="childcategory_id"]').empty();
                $.each(data, function(key,data){
                    $('select[name="childcategory_id"]').append('<option value="'+ data.id +'">'+data.childcategory_name +'</option>');

                });
            }
        });
    });
</script>

@endsection
