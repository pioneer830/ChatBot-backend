@extends('layouts.user')

@section('content')

<link rel="stylesheet" href="{{asset('assets/css/table.css')}}">
<section class="b">
    <div class="relative lg:ml-64 p-8">
        <div class="px-4 pt-6">
            <div class="col-md-12 mx-auto" style="float: right; margin-bottom: 5px;">
                <a href="{{route('intentions.create')}}" class="py-2 px-3 rounded bg-sky-600 text-white">Create</a>
            </div>
            <h2 class="title text-3xl font-bold ot ld">List of Intentions</h2>

            <div class="rr tf ot ld">
                <div class="oo ca i_ iq">
                    <table>
                        <tr>
                            <th>S/N</th>
                            <th>Tone Name</th>
                        </tr>
                        @php
                        $num = 1;
                        @endphp
                        @if($intentions->count())
                        @foreach($intentions as $intention)

                        <tr>

                            <td>{{$num}}</td>
                            <td>{{$intention->name ?? ''}}</td>
                        </tr>
                        @php
                        $num++;
                        @endphp
                        @endforeach

                        @else
                        <tr>
                            <td style="text-align: center;" colspan="4">No data found.</td>
                        </tr>
                        @endif

                    </table>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection