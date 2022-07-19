@extends('app')
@section('title','Edit')
@section('content')
@include('sweetalert::alert')

<div class="container-mx-auto ">
    <div class="flex items-center justify-center">
        <div class="h-screen p-5">
            <form action="{{ route('poster.update',$poster->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card w-96 bg-base-100 shadow-xl">
                    <div class="card-title">
                        <a href="/" class="btn btn-accent">Back</a>
                    </div>
                    <div class="card-body">
                        <label for="" class="card-title">Edit film</label>
                        <div class="mb-5">
                            <label for="title" class="card-title">title</label>
                            <input class="input input-bordered input-primary" name="title" value="{{ $poster->title }}">
                        </div>
                        <div class="space-y-2">
                            <figure ><img src="{{ asset('image/'.$poster->poster) }}" class="rounded-xl"/></figure>
                            <label class="block">
                                <span class="sr-only" for="poster" class="text-white">Choose Poster Photo</span>
                                <input type="file" name="poster" class="block w-full text-sm text-slate-500
                                file:cursor-pointer
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-slate-800 file:text-slate-200
                                hover:file:bg-indigo-500
                                "
                                />
                                @error('poster')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="text-white px-5 py-1 bg-slate-800 font-semibold rounded-full hover:bg-slate-600">Update</button>
                        </div>

                    </div>
                  </div>
            </form>

        </div>
    </div>
</div>

@endsection
