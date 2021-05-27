@extends("dashboard.layouts.app")

@section('title', config('app.name') . ' | All Questions')

@push('style')
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Page Title-->
                <h2 class="text-dark font-weight-bold my-1 mr-5">all questions</h2>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">all questions</li>
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
                            <h3 class="card-label">all questions</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('dashboard.questions.create') }}"
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
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table id="my_datatable" class="text-center">
                            <thead>
                            <tr>
                                <th><strong>#</strong></th>
                                <th><strong>title</strong></th>
                                <th><strong>answers</strong></th>
                                <th><strong>right answer</strong></th>
                                <th><strong>score</strong></th>
                                <th><strong>quiz</strong></th>
                                <th><strong>action</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $index => $question)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <th data-toggle="tooltip" data-placement="top"
                                        title="{{ $question->title }}">
                                        {{ Str::limit($question->title, 40) }}
                                    </th>
                                    <th>

                                        @foreach((array) json_decode($question->answers) as $answer)
                                            <span
                                                class="label label-md label-light-primary label-inline font-weight-bold py-2 my-2">
                                                {{ $answer }}
                                            </span>
                                        @endforeach
                                    </th>
                                    <th> {{ $question->right_answer }} </th>
                                    <th> {{ $question->score }} </th>
                                    <th> {{ $question->quiz->name }} </th>

                                    <th>
                                        <a href="{{ route('dashboard.questions.edit', $question->id) }}"
                                           class="btn btn-sm btn-clean btn-icon mr-2 pulse pulse-success"
                                           data-toggle="popover" data-placement="top" data-content="Edit"
                                        >
                                                <span class="svg-icon svg-icon-success svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                         width="24px" height="24px"
                                                         viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1"
                                                           fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                  height="24"/>
                                                            <path
                                                                d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                            <rect fill="#000000" opacity="0.3" x="5"
                                                                  y="20" width="15" height="2"
                                                                  rx="1"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                            <span class="pulse-ring"></span>
                                        </a>
                                        <span data-toggle="modal" data-target="#exampleModalCenter">
                                            <button type="button"
                                                    class="btn btn-sm btn-clean btn-icon pulse pulse-danger delete-btn"
                                                    data-id="{{ $question->id }}"
                                                    data-name="{{ $question->title }}"
                                                    data-toggle="popover" data-placement="top" data-content="Delete"
                                            >
                                                <span
                                                    class="svg-icon svg-icon-danger svg-icon-2x">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        width="24px" height="24px"
                                                        viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1"
                                                               fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                      height="24"/>
                                                                <path
                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                    fill="#000000"
                                                                    fill-rule="nonzero"/>
                                                                <path
                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                    fill="#000000" opacity="0.3"/>
                                                            </g>
                                                    </svg>
                                                </span>
                                                <span class="pulse-ring"></span>
                                            </button>
                                        </span>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
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
                    <form action="{{ route('dashboard.questions.destroy') }}" method="post" class="form_delete">
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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $('#my_datatable').DataTable();
        $(function () {
            $('[data-popover="popover"]').popover();
            $('.delete-btn').on('click', function (e) {
                let name = $(this).attr('data-name');
                let id = $(this).attr('data-id');
                $('.modal-body h4 strong').html(name);
                $('#input_id').val(id);
            });
        })
    </script>
@endpush
