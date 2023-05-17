@extends('layouts.admin')

@section('stylesheet')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Manage product</h2>
                        </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                                    <a href="{{ route('product.list') }}" class="brn btn-success btn-sm">Slider list</a>
                                </div>
                            </div>
                            @if(session()->has('status'))
                                {!! session()->get('status') !!}
                            @endif

                            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Category/Sub Category<span class="text-danger">*</span></label>
                                            <select name="subcategory_id"  id="subcategory_id"  class="form-control @error('subcategory_id') is-invalid @enderror">
                                                <option value="{{ old('subcategory_id', $product->subcategory_id) }}>Choose a category Status</option>
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Child Category<span class="text-danger">*</span></label>
                                            <select name="childcategory_id" id="childcategory_id"  class="form-control @error('childcategory_id') is-invalid @enderror">
                                                <option value="{{ old('childcategory_id', $product->childcategory_id) }}>Choose a category Status</option>
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
                                            <label class="control-label">Product Name</label>
                                            <input type="text" name="name" placeholder="Slider name" value="{{ old('name', $product->name) }}"
                                                   class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Product Code</label>
                                                <input type="text" name="name" placeholder="Product Code" value="{{ old('code', $product->code) }}"
                                                       class="form-control @error('code') is-invalid @enderror">
                                                @error('code')
                                                <strong class="text-danger">{{ $errors->first('code') }}</strong>
                                                @enderror
                                            </div>
                                            </div>
                                </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $product->description) }}</textarea>
                                            @error('description')
                                            <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Image <label class="text-danger">*</label></label>
                                            <input type="file" name="image" placeholder="Slider image" value="{{ old('image', $product->image) }}"
                                                   class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                            <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Status<span class="text-danger">*</span></label>
                                            <select name="status" required class="form-control @error('status') is-invalid @enderror">
                                                <option value="">Choose a status</option>
                                                @foreach(\App\Models\Product::$statusArrays as $statys)
                                                    <option value="{{ $statys }}"
                                                            @if(old('status', $product->status) == $statys) selected @endif>{{ ucfirst($statys) }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <strong class="text-danger">{{ $errors->first('status') }}</strong>
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
