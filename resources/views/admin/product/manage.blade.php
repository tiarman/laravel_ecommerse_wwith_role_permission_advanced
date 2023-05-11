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
                            <h2 class="panel-title">Manage slider</h2>
                        </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                                    <a href="{{ route('admin.slider.list') }}" class="brn btn-success btn-sm">Slider list</a>
                                </div>
                            </div>
                            @if(session()->has('status'))
                                {!! session()->get('status') !!}
                            @endif

                            <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $slider->id }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <input type="text" name="title" placeholder="Slider title" value="{{ old('title', $slider->title) }}"
                                                   class="form-control @error('title') is-invalid @enderror">
                                            @error('title')
                                            <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $slider->description) }}</textarea>
                                            @error('description')
                                            <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Button label</label>
                                            <input type="text" name="btn_title" placeholder="Slider btn_title" value="{{ old('btn_title', $slider->btn_title) }}"
                                                   class="form-control @error('btn_title') is-invalid @enderror">
                                            @error('btn_title')
                                            <strong class="text-danger">{{ $errors->first('btn_title') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Button link</label>
                                            <input type="text" name="btn_link" placeholder="Slider btn_link" value="{{ old('btn_link', $slider->btn_link) }}"
                                                   class="form-control @error('btn_link') is-invalid @enderror">
                                            @error('btn_link')
                                            <strong class="text-danger">{{ $errors->first('btn_link') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Image <label class="text-danger">*</label></label>
                                            <input type="file" name="image" placeholder="Slider image" value="{{ old('image', $slider->image) }}"
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
                                                @foreach(\App\Models\Slider::$statusArray as $statys)
                                                    <option value="{{ $statys }}"
                                                            @if(old('status', $slider->status) == $statys) selected @endif>{{ ucfirst($statys) }}</option>
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
@endsection
