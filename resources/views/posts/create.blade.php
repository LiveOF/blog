@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-1/2 mx-auto">

        <div class="card-body">
            <h2 class="card-title">New Post</h2>
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Title</legend>
                    <input name="title" type="text" class="input w-full" placeholder="Title" />
                    {{-- <p class="label">Optional</p> --}}
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Your bio</legend>
                    <textarea name="body" class="textarea h-48 w-full" placeholder="Bio"></textarea>
                    {{-- <div class="label">Optional</div> --}}
                </fieldset>
                <button class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
