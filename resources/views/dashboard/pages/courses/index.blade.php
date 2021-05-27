@extends("dashboard.layouts.app")

@section('title', config('app.name') . ' | All Courses')

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
                <h2 class="text-dark font-weight-bold my-1 mr-5">all courses</h2>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">all courses</li>
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
                            <h3 class="card-label">all courses</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('dashboard.courses.create') }}"
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
                                add new course
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
                                <th><strong>image</strong></th>
                                <th><strong>tracks</strong></th>
                                <th><strong>users count</strong></th>
                                <th><strong>status</strong></th>
                                <th><strong>action</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $index => $course)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <th>{{ Str::limit($course->title, 40) }}</th>
                                    <th>
                                        <img src="{{ $course->image_path }}" width="100" alt="....">
                                    </th>
                                    <th> {{ $course->track->name }} </th>
                                    <th>( {{ $course->users_count }} ) student</th>
                                    <th>{{ $course->status == true ? 'paid' : 'free' }}</th>
                                    <th>
                                        <a href="{{ route('dashboard.courses.show', $course->id) }}"
                                           class="btn btn-sm btn-clean btn-icon mr-2 pulse pulse-primary"
                                           data-toggle="popover" data-placement="top" data-content="Show"
                                        >
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                   <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\General\Binocular.svg--><svg
                                                           xmlns="http://www.w3.org/2000/svg"
                                                           xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                           height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M12.8434797,16 L11.1565203,16 L10.9852159,16.6393167 C10.3352654,19.064965 7.84199997,20.5044524 5.41635172,19.8545019 C2.99070348,19.2045514 1.55121603,16.711286 2.20116652,14.2856378 L3.92086709,7.86762789 C4.57081758,5.44197964 7.06408298,4.00249219 9.48973122,4.65244268 C10.5421727,4.93444352 11.4089671,5.56345262 12,6.38338695 C12.5910329,5.56345262 13.4578273,4.93444352 14.5102688,4.65244268 C16.935917,4.00249219 19.4291824,5.44197964 20.0791329,7.86762789 L21.7988335,14.2856378 C22.448784,16.711286 21.0092965,19.2045514 18.5836483,19.8545019 C16.158,20.5044524 13.6647346,19.064965 13.0147841,16.6393167 L12.8434797,16 Z M17.4563502,18.1051865 C18.9630797,18.1051865 20.1845253,16.8377967 20.1845253,15.2743923 C20.1845253,13.7109878 18.9630797,12.4435981 17.4563502,12.4435981 C15.9496207,12.4435981 14.7281751,13.7109878 14.7281751,15.2743923 C14.7281751,16.8377967 15.9496207,18.1051865 17.4563502,18.1051865 Z M6.54364977,18.1051865 C8.05037928,18.1051865 9.27182488,16.8377967 9.27182488,15.2743923 C9.27182488,13.7109878 8.05037928,12.4435981 6.54364977,12.4435981 C5.03692026,12.4435981 3.81547465,13.7109878 3.81547465,15.2743923 C3.81547465,16.8377967 5.03692026,18.1051865 6.54364977,18.1051865 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                                </span>
                                            <span class="pulse-ring"></span>
                                        </a>
                                        <a href="{{ route('dashboard.courses.edit', $course->id) }}"
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
                                                    data-id="{{ $course->id }}"
                                                    data-name="{{ $course->name }}"
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
                    <h2 class="modal-title" id="exampleModalLabel">delete course</h2>
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
                    <form action="{{ route('dashboard.courses.destroy') }}" method="post" class="form_delete">
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
