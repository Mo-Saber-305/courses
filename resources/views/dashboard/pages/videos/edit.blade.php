@extends("dashboard.layouts.app")

@section('title', config('app.name') . ' | Video Edit')


@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Page Title-->
                <h2 class="text-dark font-weight-bold my-1 mr-5">edit video</h2>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item ">
                        <a href="{{ route('dashboard.videos.index') }}" class="text-muted">videos</a>
                    </li>
                    <li class="breadcrumb-item text-muted"> edit video</li>
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
                            <h3 class="card-label">edit videos</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <!--begin::Wizard Form-->
                                <form class="form" action="{{ route('dashboard.videos.update', $video->id) }}"
                                      method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">
                                                <strong>title:</strong>
                                            </label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                   name="title" id="title" value="{{ old('title', $video->title) }}"
                                                   placeholder="Enter title"/>
                                            @error('title')
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
                                                   name="link" id="link" value="{{ old('link', $video->link) }}"
                                                   placeholder="Enter link"/>
                                            @error('link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="course_id">
                                                <strong>course:</strong>
                                            </label>
                                            <div></div>
                                            <select class="custom-select form-control" name="course_id" id="course_id">
                                                @foreach($courses as $index => $course)
                                                    <option value="{{ $course->id }}"
                                                        {{ $course->id == $video->course_id ? 'selected' : '' }}
                                                    >
                                                        {{ $course->title }}
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
    <script src="{{ asset('dashboard/js/pages/crud/forms/widgets/select2.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#course_id').select2({
                placeholder: "Select course",
            });
        });
    </script>
@endpush
