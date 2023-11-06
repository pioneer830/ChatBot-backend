@extends('layouts.user')

@section('content')

    <link rel="stylesheet" href="{{asset('assets/css/table.css')}}">
    <section class="b">
        <div class="relative lg:ml-64 p-8">
        <div class="px-4 pt-6">
            <div class="col-md-12 mx-auto" style="float: right; margin-bottom: 5px;">
                <a href="{{route('tones.create')}}" class="py-2 px-3 rounded bg-sky-600 text-white">Create</a>
            </div>
            <h2 class="title text-3xl font-bold ot ld">Tones / <span class="font-sm">List</span></h2>

            <div class="rr tf ot ld">
                <div class="oo ca i_ iq">
                    <table>
                        <tr>
                            <th>Sr</th>
                            <th>Tone Name</th>
                            <th>Character Lengths</th>
                            <th>Actions</th>
                        </tr>
                        @if($tones->count())
                        @foreach($tones as $tone)
                            <tr>
                                <td>{{$tone->id ?? 0}}</td>
                                <td>{{$tone->tone->name ?? ''}}</td>
                                <td>{{$tone->characterLength->name ?? ''}}</td>
                                <td>
                                    <form onsubmit="return confirm('Are you sure you want to delete?')" method="post" action="{{route('tones.destroy', $tone)}}">
                                        <a class="py-1 px-2 rounded bg-sky-600 text-white" href="{{route('tones.edit', $tone)}}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="py-0 px-2 rounded bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
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
