<div class="navbar bg-white lg:px-20 fixed w-full shadow-sm">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl">
            <p><span class="text-blue-500">Stay</span>Cation</p>
        </a>
    </div>
    <div class="flex-none">
        <ul class="menu-horizontal px-1 flex gap-5">
            <li class="my-auto"><a href="">Home</a></li>
            <li class="my-auto"><a href="">BrowseBy</a></li>
            <li class="my-auto"><a href="">Stories</a></li>
            <li class="my-auto"><a href="">Agent</a></li>
            <li>
                @auth
                <details class="dropdown">
                    <summary class="m-1 btn">Halo, {{ Auth::user()->name }}</summary>
                    <ul class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                        <li>
                            <form action="{{ route("logout") }}" method="POST">
                                @csrf
                                <button class="btn w-full" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </details>
                @else
                    <a href="{{ route("home.login.google.index") }}">
                        <button class="btn bg-blue-500 text-white">
                            <img src="{{ asset("assets/images/google.png") }}" alt="" width="30px">
                            Login By Google
                        </button>
                    </a>
                @endauth
            </li>
        </ul>
    </div>
</div>