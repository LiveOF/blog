@extends('partials.layout')

@section('content')
    <div class="flex flex-col gap-4">
        <div class="flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-2">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>

                @if (Route::is('posts.deleted'))
                    <a href="{{ route('posts.index') }}" class="btn btn-ghost">All Posts</a>
                @else
                    <a href="{{ route('posts.deleted') }}" class="btn btn-ghost">Deleted Posts</a>
                @endif
            </div>

            <div class="text-sm opacity-70">
                Showing: <span class="font-semibold">{{ $posts->count() }}</span>
            </div>
        </div>

        <div class="flex justify-center">
            {{ $posts->links() }}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            @foreach ($posts as $post)
                <div class="card bg-base-100 shadow-sm border border-base-200">
                    <div class="card-body gap-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="min-w-0">
                                <h2 class="card-title truncate">
                                    {{ $post->title }}
                                </h2>
                                <div class="text-xs opacity-70">
                                    #{{ $post->id }} • Created {{ $post->created_at }}
                                </div>
                            </div>

                            @if ($post->trashed())
                                <span class="badge badge-error badge-outline">Deleted</span>
                            @else
                                <span class="badge badge-success badge-outline">Active</span>
                            @endif
                        </div>

                        <div class="text-sm opacity-80 line-clamp-3">
                            {!! $post->displayBody !!}
                        </div>

                        <div class="card-actions justify-between items-center">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-ghost">Back to site</a>

                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="btn btn-sm">Actions</div>
                                <ul tabindex="0"
                                    class="menu dropdown-content bg-base-100 rounded-box z-[1] mt-2 w-52 p-2 shadow">
                                    @if ($post->trashed())
                                        <li>
                                            <form action="{{ route('posts.restore', $post) }}" method="POST">
                                                @csrf
                                                <button class="text-success">Restore</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="{{ route('posts.permadestroy', $post) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-error">Perma delete</button>
                                            </form>
                                        </li>
                                    @else
                                        <li><a href="{{ route('posts.edit', $post) }}">Edit</a></li>
                                        <li>
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-error">Delete</button>
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection