@extends("dashboard.layouts.app")

@section('title', config('app.name') . ' | Video Show')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Page Title-->
                <h2 class="text-dark font-weight-bold my-1 mr-5">show video</h2>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item ">
                        <a href="{{ route('dashboard.videos.index') }}" class="text-muted">videos</a>
                    </li>
                    <li class="breadcrumb-item text-muted"> show video</li>
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
                            <h3 class="card-label">Video name: <strong>{{ $video->title }}</strong></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/RrfUoRP5X7s"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
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
                    <h2 class="modal-title" id="exampleModalLabel">delete video</h2>
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
    <script src="{{ asset('dashboard/js/pages/crud/forms/widgets/select2.js') }}"></script>
    {{--    <script src="{{ asset('dashboard/js/pages/widgets.js') }}"></script>--}}
    <script>
        $(document).ready(function () {
            $('select').select2({
                placeholder: "Select course",
            });

            $('.delete-btn').on('click', function (e) {
                let name = $(this).attr('data-name');
                let id = $(this).attr('data-id');
                $('.modal-body h4 strong').html(name);
                $('#input_id').val(id);
            });
        });
    </script>
@endpush
