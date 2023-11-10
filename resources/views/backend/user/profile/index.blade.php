@extends('backend.layouts.app')

@section('title', 'User')
@section('subTitle', 'Profile')

@section('content')
    <!-- Page Content -->
    <!-- User Info -->
    <div class="bg-image bg-image-bottom" style="background-image: url('{{ asset('assets/media/photos/photo13@2x.jpg') }}');">
        <div class="bg-primary-dark-op py-4">
            <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-3">
                    <a class="img-link" href="be_pages_generic_profile.html">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('assets/media/avatars/avatar15.jpg') }}"
                            alt="">
                    </a>
                </div>
                <!-- END Avatar -->

                <!-- Personal -->
                <h1 class="h3 text-white fw-bold mb-2">
                    {{ auth()->user()->name }}
                </h1>
                <h2 class="h5 fw-medium text-white-75">
                    {{ auth()->user()->email }}
                </h2>
                <!-- END Personal -->

                <!-- Actions -->
                <button type="button" class="btn btn-primary me-1">
                    <i class="fa fa-fw fa-envelope opacity-50 me-1"></i> Message
                </button>
                <a class="btn btn-alt-primary" href="{{ route('profile.edit', $user->id) }}">
                    <i class="fa fa-fw fa-pencil-alt opacity-50 mb-1"></i> Edit
                </a>
                <!-- END Actions -->
            </div>
        </div>
    </div>
    <!-- END User Info -->

    <!-- Main Content -->
    <div class="content">

        <!-- Articles -->
        <h2 class="content-heading d-flex justify-content-between align-items-center">
            <span class="fw-semibold"><i class="si si-note me-1"></i> Articles</span>
            <button type="button" class="btn btn-sm rounded-pill btn-alt-secondary">View More..</button>
        </h2>
        <div class="push">
            <a class="block block-rounded block-link-shadow mb-3" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <p class="fs-sm fw-medium text-muted float-sm-end mb-1">3 hours ago</p>
                    <h4 class="fs-base text-primary mb-0">
                        5 things I've learned working from home
                    </h4>
                </div>
            </a>
            <a class="block block-rounded block-link-shadow mb-3" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <p class="fs-sm fw-medium text-muted float-sm-end mb-1">2 days ago</p>
                    <h4 class="fs-base text-primary mb-0">
                        Vue.js or React.js? Let's dive in!
                    </h4>
                </div>
            </a>
            <a class="block block-rounded block-link-shadow mb-3" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <p class="fs-sm fw-medium text-muted float-sm-end mb-1">1 week ago</p>
                    <h4 class="fs-base text-primary mb-0">
                        10 important things I wish I knew
                    </h4>
                </div>
            </a>
            <a class="block block-rounded block-link-shadow mb-3" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <p class="fs-sm fw-medium text-muted float-sm-end mb-1">2 weeks ago</p>
                    <h4 class="fs-base text-primary mb-0">
                        Bringing your productivity back
                    </h4>
                </div>
            </a>
            <a class="block block-rounded block-link-shadow mb-3" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <p class="fs-sm fw-medium text-muted float-sm-end mb-1">1 month ago</p>
                    <h4 class="fs-base text-primary mb-0">
                        Creating a super smooth CSS animation
                    </h4>
                </div>
            </a>
            <!-- END Articles -->
        </div>
        <!-- END Main Content -->
    </div>
    <!-- END Page Content -->
@endsection
