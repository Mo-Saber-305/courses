@extends("dashboard.layouts.app")

@section('title', config('app.name') . ' | Quiz Show')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Page Title-->
                <h2 class="text-dark font-weight-bold my-1 mr-5">show quiz</h2>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item ">
                        <a href="{{ route('dashboard.quizzes.index') }}" class="text-muted">quizzes</a>
                    </li>
                    <li class="breadcrumb-item text-muted"> show quiz</li>
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
                            <h3 class="card-label">Quiz name: <strong>{{ $quiz->name }}</strong></h3>
                        </div>
                        <!--begin::Button-->
                        <a href="{{ route('dashboard.quiz.questions.create', $quiz->id) }}"
                           class="btn btn-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-light svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                            <path
                                                d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z"
                                                fill="#000000"/>
                                        </g>
                                    </svg>
                                </span>
                            add new question
                        </a>
                        <!--end::Button-->
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            @foreach($quiz->questions as $index => $question)
                                <div class="col-md-6">
                                    <div class="pt-30 pt-md-25 pb-15 px-5  text-center">
                                        <!--begin::Content-->
                                        <span
                                            class="font-size-h1 d-block d-block font-weight-boldest text-dark-75 py-2">Question {{ $index + 1 }} </span>
                                        <h4 class="font-size-h6 d-block d-block font-weight-bold mb-7 text-dark-50">
                                            {{ $question->title }}
                                        </h4>
                                        <div class="text-center">
                                            <strong>answers:</strong>

                                            <div class="d-flex justify-content-center align-items-center mt-5 mb-10">
                                                @foreach(json_decode($question->answers) as $index => $answer)
                                                    <div class="d-flex align-items-center">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M12,18 C15.3137085,18 18,15.3137085 18,12 C18,8.6862915 15.3137085,6 12,6 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18 Z"
            fill="#000000"/>
        <path
            d="M12,16 C14.209139,16 16,14.209139 16,12 C16,9.790861 14.209139,8 12,8 C9.790861,8 8,9.790861 8,12 C8,14.209139 9.790861,16 12,16 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg></span>

                                                        <span
                                                            class="text-muted font-weight-bold mr-3">{{ $answer }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="text-center mb-10">
                                            <strong>the right answer is:</strong>
                                            <div class="mt-5">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M12,18 C15.3137085,18 18,15.3137085 18,12 C18,8.6862915 15.3137085,6 12,6 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18 Z"
            fill="#000000"/>
        <path
            d="M12,16 C14.209139,16 16,14.209139 16,12 C16,9.790861 14.209139,8 12,8 C9.790861,8 8,9.790861 8,12 C8,14.209139 9.790861,16 12,16 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg></span>

                                                <span
                                                    class="text-muted font-weight-bold">{{ $question->right_answer }}</span>
                                            </div>
                                        </div>
                                        <div class="text-center mb-10">
                                            <strong>score is: <span
                                                    class="text-primary">{{ $question->score }}</span></strong>
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ route('dashboard.questions.edit', $question->id) }}"
                                               class="btn btn-sm btn-clean btn-success mr-2"
                                               data-toggle="popover" data-placement="top" data-content="Edit"
                                            >
                                                Edit
                                            </a>
                                            <span data-toggle="modal" data-target="#exampleModalCenter">
                                            <button type="button"
                                                    class="btn btn-sm btn-clean btn-danger delete-btn"
                                                    data-id="{{ $question->id }}"
                                                    data-name="{{ $question->title }}"
                                                    data-toggle="popover" data-placement="top" data-content="Delete"
                                            >
                                                Delete
                                            </button>
                                        </span>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                </div>
                            @endforeach
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

    <!-- Modal-->
    <div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">delete question</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h4>
                        Are you sure to delete ( <strong></strong> ) ?
                    </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">Close
                    </button>
                    <form action="{{ route('dashboard.quiz.questions.destroy') }}" method="post" class="form_delete">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" id="input_id">
                        <button type="submit" class="btn btn-danger font-weight-bold">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

@push('script')
    <script>
        $(document).ready(function () {

            $('.delete-btn').on('click', function (e) {
                let name = $(this).attr('data-name');
                let id = $(this).attr('data-id');
                $('.modal-body h4 strong').html(name);
                $('#input_id').val(id);
            });
        });
    </script>
@endpush
