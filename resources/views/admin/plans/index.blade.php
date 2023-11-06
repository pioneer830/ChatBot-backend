@extends('layouts.admin')

@section('content')
    {{--dashboard--}}

    <div class="relative bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="px-4 pt-6">
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                @include("share.flash-message")
                <div class="flex justify-between items-center">
                    {{--                    <div class="flex gap-2 items-center">--}}
                    {{--                        <label>Search: </label>--}}
                    {{--                        <input type="text" name="keyword" value="{{ old('keyword', isset($search_params['keyword']) ? $search_params['keyword'] : "") }}"/>--}}
                    {{--                    </div>--}}
                    <a href="{{ route("admin.plans.create") }}" class="px-3 py-1 rounded bg-sky-600 text-white">Create Plan</a>
                </div>


                <div class="mt-8">
                    <table class="table table-striped w-full table-auto">
                        <thead>
                        <tr class=" bg-gray-300">
                            <th class="py-2 border-b border-gray-400">Plan Name</th>
                            <th class="py-2 border-b border-gray-400">Plan Intverval</th>
                            <th class="py-2 border-b border-gray-400">Plan Amount</th>
                            <th class="py-2 border-b border-gray-400">Plan Trial Period</th>
                            <th class="py-2 border-b border-gray-400">#</th>
                        </tr>
                        </thead>
                        @if ($plans->count() > 0)
                            <tbody>
                            @foreach($plans as $plan)
                                <tr class="text-center">
                                    <td class="py-2 border-b border-gray-400">{{ $plan->name }}</td>
                                    <td class="py-2 border-b border-gray-400">{{ $plan->plan_interval }}</td>
                                    <td class="py-2 border-b border-gray-400">{{ $plan->amount }}</td>
                                    <td class="py-2 border-b border-gray-400">{{ $plan->trial_period_days }}</td>
                                    <td class="py-2 border-b border-gray-400">
                                        <a href="{{ route("admin.plans.edit", ["plan" => $plan->id]) }}">EDIT</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
