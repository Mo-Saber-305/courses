@extends("dashboard.layouts.app")

@section('title', config('app.name') . ' | َQuestion Create')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Page Title-->
                <h2 class="text-dark font-weight-bold my-1 mr-5">add new question</h2>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item ">
                        <a href="{{ route('dashboard.questions.index') }}" class="text-muted">questions</a>
                    </li>
                    <li class="breadcrumb-item text-muted"> add new question</li>
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
                            <h3 class="card-label">add new questions</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <!--begin::Wizard Form-->
                                <form class="form" action="{{ route('dashboard.quiz.questions.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">
                                                <strong>title:</strong>
                                            </label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                   name="title" id="title" value="{{ old('title') }}"
                                                   placeholder="Enter title"/>
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="answers">
                                                <strong>answers:</strong>
                                            </label>
                                            <select
                                                class="select2 form-control @error('answers[]') is-invalid @enderror"
                                                name="answers[]" id="answers" multiple>
                                                <option></option>
                                            </select>
                                            @error('answers[]')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="right_answer">
                                                <strong>right answer:</strong>
                                            </label>
                                            <input type="text"
                                                   class="form-control @error('right_answer') is-invalid @enderror"
                                                   name="right_answer" id="right_answer"
                                                   value="{{ old('right_answer') }}"
                                                   placeholder="Enter right_answer"/>
                                            @error('right_answer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="score">
                                                <strong>score:</strong>
                                            </label>
                                            <input type="number"
                                                   class="form-control @error('score') is-invalid @enderror"
                                                   name="score" id="score" value="{{ old('score') }}"
                                                   placeholder="Enter score"/>
                                            @error('score')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="quiz_id">
                                                <strong>quizzes:</strong>
                                            </label>
                                            <div></div>
                                            <select class="select2 form-control" name="quiz_id" id="quiz_id">
                                                <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
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
            $('select').select2({
                placeholder: "Select quiz",
            });

            $("#answers").select2({
                tags: true,
                placeholder: "Type Answers",
            });
        });
    </script>
@endpush
