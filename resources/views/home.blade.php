@extends('app')
@section('title','home')
@section('content')
@include('sweetalert::alert')

    <div class="hero min-h-screen bg-gradient-to-tr from-indigo-600">
        <div class="hero-content flex-col lg:flex-row">
          <img src="{{ asset('image/1.jpg') }}" class="max-w-sm rounded-lg shadow-2xl" />
          <div>
            <h1 class="text-2xl md:text-5xl font-bold">Box Office News!</h1>
            <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
            <button class="btn btn-primary">Get Started</button>
          </div>
        </div>
    </div>
    <div class="flex justify-center m-5">
            <label for="my-modal-3" class="btn btn-primary modal-button">Add Film</label>
            <input type="checkbox" id="my-modal-3" class="modal-toggle" />
            <div class="modal">
            <div class="modal-box relative">
                <div class="">
                    <label for="my-modal-3" class="text-xl font-bold ">Add Film</label>
                </div>
                <div class="p-5">
                    <form action="{{ route('poster.store') }}" method="post" enctype="multipart/form-data" for="my-modal-3">
                        @csrf
                        <div class="space-y-3 mb-5">
                            <label for="title" class="text-xl font-semibold mb-8">Title</label>
                            <input type="text" name="title" class="px-5 py-1 rounded-full bg-slate-800 border-2 border-indigo-500  focus:text-white block text-slate-300" placeholder="Title" value="{{ old('title') }}">
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label class="block">
                                <span class="sr-only" for="poster" class="text-white">Choose Poster Photo</span>
                                <input type="file" name="poster" class="block w-full text-sm text-slate-500
                                file:cursor-pointer
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-green-800 file:text-slate-200
                                hover:file:bg-indigo-500
                                "/>
                                @error('poster')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="px-5 py-1 bg-indigo-700 rounded-full text-sm  hover:bg-slate-500 text-white ">Upload</button>
                        </div>
                    </form>
                </div>
                <label for="my-modal-3" class="btn btn-danger btn-sm btn-circle absolute right-2 top-2">✕</label>
            </div>
        </div>
    </div>
    <div class="container p-12 mx-auto ">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 ">
                @foreach ($posters as $items )
                <div class="card w-40  md:w-72  image-full">
                    <figure><img src="{{ asset('image/'. $items->poster) }}" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $items->title }}</h2>
                        <p>Dibuat {{ $items->created_at->format('d F, Y') }} | Di Update {{ $items->updated_at->diffForHumans() }}</p>

                        <div class="card-actions justify-end">

                            <a href="poster/edit/{{ $items->id }}" class="btn btn-primary">edit</a>

                            <form action="{{ route('poster.destroy',$items->id) }}" method="POST">
                                @csrf @method('delete')
                                <button type="submit" class="btn bg-red-500">delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        <div class="btn-group flex items-center flex-col" >
            <div class="cursor-pointer">{{ $posters->links()  }}</div>
        </div>
    </div>
@endsection
