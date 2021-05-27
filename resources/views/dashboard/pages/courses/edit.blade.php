@extends("dashboard.layouts.app")

@section('title', config('app.name') . ' | Course Edit')

@push('style')
    <link href="{{ asset('dashboard/css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .image-input .image-input-wrapper {
            width: 250px;
            height: 150px;
        }
    </style>
@endpush

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Page Title-->
                <h2 class="text-dark font-weight-bold my-1 mr-5">edit course</h2>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item ">
                        <a href="{{ route('dashboard.courses.index') }}" class="text-muted">courses</a>
                    </li>
                    <li class="breadcrumb-item text-muted"> edit course</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">edit courses</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <!--begin::Wizard Form-->
                                <form class="form" action="{{ route('dashboard.courses.update', $course->id) }}"
                                      method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="form-group text-center">
                                            <label class="d-block mb-3">
                                                <strong>course image:</strong>
                                            </label>
                                            <div class="image-input image-input-outline" id="kt_image_1">
                                                <div class="image-input-wrapper"
                                                     style="background-image: url({{ $course->image_path }})"></div>

                                                <label
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="change" data-toggle="tooltip" title=""
                                                    data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="image"
                                                           accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="image"/>
                                                </label>

                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                  <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                 </span>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="title">
                                                <strong>title:</strong>
                                            </label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                   name="title" id="title" value="{{ old('title', $course->title) }}"
                                                   placeholder="Enter title"/>
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">
                                                <strong>description:</strong>
                                            </label>
                                            <textarea type="text"
                                                      class="form-control @error('description') is-invalid @enderror"
                                                      name="description" id="description" rows="5"
                                                      placeholder="Enter description">{{ old('description', $course->description) }}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="link">
                                                <strong>link:</strong>
                                            </label>
                                            <input type="text" class="form-control @error('link') is-invalid @enderror"
                                                   name="link" id="link" value="{{ old('link', $course->link) }}"
                                                   placeholder="Enter link"/>
                                            @error('link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label>
                                                <strong>status:</strong>
                                            </label>
                                            <div class="col-9 col-form-label">
                                                <div class="radio-inline">
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="status"
                                                               value="0" {{ $course->status == 0 ? 'checked' : '' }}/>
                                                        <span></span>
                                                        Free
                                                    </label>
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="status"
                                                               value="1" {{ $course->status == 1 ? 'checked' : '' }}/>
                                                        <span></span>
                                                        Paid
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="track_id">
                                                <strong>tracks:</strong>
                                            </label>
                                            <div></div>
                                            <select class="custom-select form-control" name="track_id" id="track_id">
                                                @foreach($tracks as $index => $track)
                                                    <option value="{{ $track->id }}"
                                                        {{ $track->id == $course->track_id ? 'selected' : '' }}
                                                    >
                                                        {{ $track->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">Save Data</button>
                                    </div>
                                </form>
                                <!--end::Wizard Form-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@stop

@push('script')
    <script src="{{ asset('dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
    <script>
        var avatar1 = new KTImageInput('kt_image_1');
    </script>
@endpush
