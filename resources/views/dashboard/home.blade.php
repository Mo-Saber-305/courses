@extends('dashboard.layouts.app')

@inject('users', "App\Models\User")
@inject('tracks', "App\Models\Track")
@inject('courses', "App\Models\Course")
@inject('videos', "App\Models\Video")
@inject('quizzes', "App\Models\Quiz")
@inject('questions', "App\Models\Question")

@section('title', config('app.name') . ' | Dashboard')

@section('content')
    <div class="row text-center justify-content-center">
        <div class="col-xl-3">
            <a href="{{ route('dashboard.users.index') }}" style="color: unset">
                <!--begin::Stats Widget 25-->
                <div class="card card-custom bg-light-success card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
												<span class="svg-icon svg-icon-5x svg-icon-success">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"></polygon>
															<path
                                                                d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
															<path
                                                                d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                                fill="#000000" fill-rule="nonzero"></path>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                        <span
                            class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 d-block">students</span>
                        <span
                            class="font-weight-bold font-size-h4">( <strong>{{ $users->where('type', 'user')->count() }}</strong> )</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 25-->
            </a>
        </div>
        <div class="col-xl-3">
            <a href="{{ route('dashboard.tracks.index') }}" style="color: unset">
                <!--begin::Stats Widget 25-->
                <div class="card card-custom bg-light-primary card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
												<span class="svg-icon svg-icon-5x svg-icon-primary">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M11.5,5 L18.5,5 C19.3284271,5 20,5.67157288 20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L11.5,8 C10.6715729,8 10,7.32842712 10,6.5 C10,5.67157288 10.6715729,5 11.5,5 Z M5.5,17 L18.5,17 C19.3284271,17 20,17.6715729 20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 C4,17.6715729 4.67157288,17 5.5,17 Z M5.5,11 L18.5,11 C19.3284271,11 20,11.6715729 20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L5.5,14 C4.67157288,14 4,13.3284271 4,12.5 C4,11.6715729 4.67157288,11 5.5,11 Z"
            fill="#000000" opacity="0.3"/>
        <path
            d="M4.82866499,9.40751652 L7.70335558,6.90006821 C7.91145727,6.71855155 7.9330087,6.40270347 7.75149204,6.19460178 C7.73690043,6.17787308 7.72121098,6.16213467 7.70452782,6.14749103 L4.82983723,3.6242308 C4.62230202,3.44206673 4.30638833,3.4626341 4.12422426,3.67016931 C4.04415337,3.76139218 4,3.87862714 4,4.00000654 L4,9.03071508 C4,9.30685745 4.22385763,9.53071508 4.5,9.53071508 C4.62084305,9.53071508 4.73759731,9.48695028 4.82866499,9.40751652 Z"
            fill="#000000"/>
    </g>
</svg>
                                                    <!--end::Svg Icon-->
												</span>
                        <span
                            class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 d-block">tracks</span>
                        <span
                            class="font-weight-bold font-size-h4">( <strong>{{ $tracks->count() }}</strong> )</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 25-->
            </a>
        </div>
        <div class="col-xl-3">
            <a href="{{ route('dashboard.courses.index') }}" style="color: unset">
                <!--begin::Stats Widget 25-->
                <div class="card card-custom bg-light-info card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
        												<span class="svg-icon svg-icon-5x svg-icon-info">
        													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
        													<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                 height="24px"
                                                                 viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path
                    d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                    fill="#000000" opacity="0.3"/>
                <path
                    d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                    fill="#000000"/>
                <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
            </g>
        </svg>
                                                            <!--end::Svg Icon-->
        												</span>
                        <span
                            class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 d-block">courses</span>
                        <span
                            class="font-weight-bold font-size-h4">( <strong>{{ $courses->count() }}</strong> )</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 25-->
            </a>
        </div>
        <div class="col-xl-3">
            <a href="{{ route('dashboard.videos.index') }}" style="color: unset">
                <!--begin::Stats Widget 25-->
                <div class="card card-custom bg-light-secondary card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
        												<span class="svg-icon svg-icon-5x svg-icon-secondary">
        													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
        													<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                 height="24px"
                                                                 viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path
                    d="M6,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,19 C20,20.1045695 19.1045695,21 18,21 L6,21 C4.8954305,21 4,20.1045695 4,19 L4,5 C4,3.8954305 4.8954305,3 6,3 Z M5.5,5 C5.22385763,5 5,5.22385763 5,5.5 L5,6.5 C5,6.77614237 5.22385763,7 5.5,7 L6.5,7 C6.77614237,7 7,6.77614237 7,6.5 L7,5.5 C7,5.22385763 6.77614237,5 6.5,5 L5.5,5 Z M17.5,5 C17.2238576,5 17,5.22385763 17,5.5 L17,6.5 C17,6.77614237 17.2238576,7 17.5,7 L18.5,7 C18.7761424,7 19,6.77614237 19,6.5 L19,5.5 C19,5.22385763 18.7761424,5 18.5,5 L17.5,5 Z M5.5,9 C5.22385763,9 5,9.22385763 5,9.5 L5,10.5 C5,10.7761424 5.22385763,11 5.5,11 L6.5,11 C6.77614237,11 7,10.7761424 7,10.5 L7,9.5 C7,9.22385763 6.77614237,9 6.5,9 L5.5,9 Z M17.5,9 C17.2238576,9 17,9.22385763 17,9.5 L17,10.5 C17,10.7761424 17.2238576,11 17.5,11 L18.5,11 C18.7761424,11 19,10.7761424 19,10.5 L19,9.5 C19,9.22385763 18.7761424,9 18.5,9 L17.5,9 Z M5.5,13 C5.22385763,13 5,13.2238576 5,13.5 L5,14.5 C5,14.7761424 5.22385763,15 5.5,15 L6.5,15 C6.77614237,15 7,14.7761424 7,14.5 L7,13.5 C7,13.2238576 6.77614237,13 6.5,13 L5.5,13 Z M17.5,13 C17.2238576,13 17,13.2238576 17,13.5 L17,14.5 C17,14.7761424 17.2238576,15 17.5,15 L18.5,15 C18.7761424,15 19,14.7761424 19,14.5 L19,13.5 C19,13.2238576 18.7761424,13 18.5,13 L17.5,13 Z M17.5,17 C17.2238576,17 17,17.2238576 17,17.5 L17,18.5 C17,18.7761424 17.2238576,19 17.5,19 L18.5,19 C18.7761424,19 19,18.7761424 19,18.5 L19,17.5 C19,17.2238576 18.7761424,17 18.5,17 L17.5,17 Z M5.5,17 C5.22385763,17 5,17.2238576 5,17.5 L5,18.5 C5,18.7761424 5.22385763,19 5.5,19 L6.5,19 C6.77614237,19 7,18.7761424 7,18.5 L7,17.5 C7,17.2238576 6.77614237,17 6.5,17 L5.5,17 Z"
                    fill="#000000" opacity="0.3"/>
                <path
                    d="M11.3521577,14.5722612 L13.9568442,12.7918113 C14.1848159,12.6359797 14.2432972,12.3248456 14.0874656,12.0968739 C14.0526941,12.0460053 14.0088196,12.002002 13.9580532,11.9670814 L11.3533667,10.1754041 C11.1258528,10.0189048 10.8145486,10.0764735 10.6580493,10.3039875 C10.6007019,10.3873574 10.5699997,10.4861652 10.5699997,10.5873545 L10.5699997,14.1594818 C10.5699997,14.4356241 10.7938573,14.6594818 11.0699997,14.6594818 C11.1706891,14.6594818 11.2690327,14.6290818 11.3521577,14.5722612 Z"
                    fill="#000000"/>
            </g>
        </svg>
                                                            <!--end::Svg Icon-->
        												</span>
                        <span
                            class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 d-block">videos</span>
                        <span
                            class="font-weight-bold font-size-h4">( <strong>{{ $videos->count() }}</strong> )</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 25-->
            </a>
        </div>
        <div class="col-xl-3">
            <a href="{{ route('dashboard.quizzes.index') }}" style="color: unset">
                <!--begin::Stats Widget 25-->
                <div class="card card-custom bg-light-dark card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
        												<span class="svg-icon svg-icon-5x svg-icon-dark">
        													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
        													<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                 height="24px"
                                                                 viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"/>
                <path
                    d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                <path
                    d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                    fill="#000000" fill-rule="nonzero"/>
            </g>
        </svg>
                                                            <!--end::Svg Icon-->
        												</span>
                        <span
                            class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 d-block">quizzes</span>
                        <span
                            class="font-weight-bold font-size-h4">( <strong>{{ $quizzes->count() }}</strong> )</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 25-->
            </a>
        </div>
        <div class="col-xl-3">
            <a href="{{ route('dashboard.questions.index') }}" style="color: unset">
                <!--begin::Stats Widget 25-->
                <div class="card card-custom bg-light-danger card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
        												<span class="svg-icon svg-icon-5x svg-icon-danger">
        													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
        													<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                 height="24px"
                                                                 viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                <path
                    d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z"
                    fill="#000000"/>
            </g>
        </svg>
                                                            <!--end::Svg Icon-->
        												</span>
                        <span
                            class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 d-block">questions</span>
                        <span
                            class="font-weight-bold font-size-h4">( <strong>{{ $questions->count() }}</strong> )</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 25-->
            </a>
        </div>
    </div>

    <div class="row">
        @if($courses->count() > 0)
            <div class="col-lg-5">

                <!--begin::List Widget 12-->
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title font-weight-bolder text-dark mx-auto">top courses</h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2">
                    @foreach($courses->all()->sortByDesc('users_count')->take(6) as $index => $course)
                        <!--begin::Item-->
                            <div class="d-flex flex-wrap align-items-center mb-10">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-60 symbol-2by3 flex-shrink-0">
                                    <div class="symbol-label"
                                         style="background-image: url({{ $course->image_path }})"></div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="d-flex flex-column ml-4 flex-grow-1 mr-2">
                                    <a href="{{ route('dashboard.courses.show', $course->id) }}"
                                       class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1"
                                       data-toggle="tooltip" data-placement="top" title="{{ $course->title }}"
                                    >
                                        {{ Str::limit($course->title, 20) }}
                                    </a>
                                    <span
                                        class="text-muted font-weight-bold">{{ $course->users->count() }} students</span>
                                </div>
                                <!--end::Title-->
                                <!--begin::btn-->
                                <span
                                    class="label label-lg  {{ $course->status == 0 ? 'label-light-success' : 'label-light-danger' }} w-70px label-inline mt-lg-0 mb-lg-0 my-2 font-weight-bold py-4">
                                <strong>{{ $course->status == 0 ? 'free' : 'paid' }}</strong>
                            </span>
                                <!--end::Btn-->
                            </div>
                            <!--end::Item-->
                        @endforeach
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 12-->

            </div>
        @endif

        @if($tracks->count() > 0)
            <div class="col-lg-3">
                <!--begin::List Widget 7-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title font-weight-bolder text-dark mx-auto">top tracks</h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-0">
                    @foreach($tracks->all()->sortByDesc('courses_count')->take(10) as $index => $track)
                        <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between flex-wrap mb-8">
                                <!--begin::Text-->
                                <a href="{{ route('dashboard.tracks.show', $track->id) }}"
                                   class="font-weight-bold text-dark-75 text-hover-primary font-size-lg">
                                    {{ $track->name }}
                                </a>
                                <div
                                    class="label label-xl label-light label-inline text-dark-50 font-weight-bolder">
                                    {{ $track->courses_count }} courses
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                        @endforeach
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 7-->
            </div>
        @endif

        @if($users->count() > 0)
            <div class="col-lg-4">
                <!--begin::List Widget 7-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title font-weight-bolder text-dark mx-auto">top students</h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-0">
                    @foreach($users->where('type', 'user')->get()->sortByDesc('courses_count')->take(5) as $index => $user)
                        <!--begin::Item-->
                            <div class="d-flex align-items-center flex-wrap mb-10">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-50 symbol-light mr-5">
                                <span class="symbol-label">
                                    <img src="{{ $user->image_path }}"
                                         class="h-50 align-self-center" alt="">
                                </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="{{ route('dashboard.users.show', $user->id) }}"
                                       class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">
                                        {{ $user->name }}
                                    </a>
                                    <span class="text-muted font-weight-bold">{{ $user->email }}</span>
                                    <div
                                        class="label label-xl label-light label-inline mt-2 text-dark-50 font-weight-bolder"
                                        style="width: fit-content;">
                                        {{ $user->courses_count }} courses
                                    </div>
                                </div>
                                <!--end::Text-->

                            </div>
                            <!--end::Item-->
                        @endforeach
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 7-->
            </div>
        @endif
    </div>
@endsection
