<div class="navbar bg-base-100 shadow-sm sticky top-0 z-50">
    <div class="navbar-start gap-2">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>

            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-64 p-2 shadow">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('posts.index') }}">Admin Posts</a></li>
                @auth
                    <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                @endauth
            </ul>
        </div>

        <a href="{{ route('home') }}" class="btn btn-ghost text-xl">
            {{ config('app.name') }}
        </a>
    </div>

    <div class="navbar-center hidden lg:flex">
        <div role="tablist" class="tabs tabs-boxed">
            <a role="tab" class="tab {{ request()->routeIs('home') ? 'tab-active' : '' }}"
                href="{{ route('home') }}">Home</a>
            <a role="tab" class="tab {{ request()->routeIs('posts.*') ? 'tab-active' : '' }}"
                href="{{ route('posts.index') }}">Posts</a>
            @auth
                <a role="tab" class="tab {{ request()->routeIs('profile.*') ? 'tab-active' : '' }}"
                    href="{{ route('profile.edit') }}">Profile</a>
            @endauth
        </div>
    </div>

    <div class="navbar-end gap-2">
        <form action="{{ route('home') }}" method="GET" class="hidden md:block">
            <label class="input input-bordered flex items-center gap-2">
                <input name="q" type="text" class="grow" placeholder="Search title..."
                    value="{{ request('q') }}" />
                <kbd class="kbd kbd-sm">/</kbd>
            </label>
        </form>

        @auth
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost">
                    {{ auth()->user()->name }}
                    <svg class="h-4 w-4 opacity-70" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>

                <ul tabindex="0" class="menu dropdown-content bg-base-100 rounded-box z-[1] mt-2 w-52 p-2 shadow">
                    <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        @endauth
    </div>
</div>