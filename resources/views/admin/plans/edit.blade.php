@extends('layouts.admin')

@section('content')
    {{--dashboard--}}

    <div class="relative bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="px-4 pt-6">
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <form class="form-horizontal" method="post" action="{{ route("admin.plans.update", ["plan" => $plan]) }}">
                @csrf
                @method('put')
                <!-- form start -->

                    <div class="col-md-12 mb-3">
                        <h3 class="pull-right title text-3xl font-bold">Edit Plan</h3>
                    </div>
                    @include("admin.plans.form")

                    <div class="card-footer">
                        <div class="col-md-8 mx-auto">
                            <button class="py-2 px-4 rounded bg-sky-600 text-white">Update</button>
                        </div>
                    </div>
                    <!-- Role Creation -->
                </form>
            </div>
        </div>
    </div>

@endsection
