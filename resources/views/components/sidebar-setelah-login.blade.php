<aside class="bg-primary w-[280px] p-8">
    <div class=" text-white px-4">


        @if ( auth()->user()->profile != null && file_exists(public_path('storage/profile/' . auth()->user()->profile)))
            <img src="{{ asset('storage/profile/' . auth()->user()->profile) }}"
                class="w-24 aspect-square rounded-full object-cover mx-auto border-2 border-gray-100">
        @else
            <img src="{{ asset('lib/images/default-profile.webp') }}"
                class="w-24 aspect-square rounded-full object-cover mx-auto">
        @endif

        <div class="text-2xl font-bold mt-2">{{ auth()->user()->name }}</div>
        <div class="flex items-center mt-2">
            <div class="font-medium uppercase">{{ auth()->user()->role }}</div>

            @if (auth()->user()->is_mentor)
                <div class="ml-1 text-lg font-bold">(Mentor)</div>
            @endif
        </div>
        @isset(auth()->user()->program_studi)
            <div class="mt-2">{{ auth()->user()->program_studi }}</div>
        @endisset
        @isset(auth()->user()->generasi)
            <div>Generasi {{ auth()->user()->generasi }}</div>
        @endisset
    </div>
    <div class="flex flex-col gap-4 text-xl mt-8 text-white font-semibold">
        <a href="/dashboard" class="flex px-4 py-3 items-center gap-4 hover:bg-gray-100 hover:bg-opacity-10 rounded-md">
            <i class="fa fa-home w-6 h-6"></i><span>Dashboard</span>
        </a>
        @if (auth()->user()->role == 'admin')
            <a href="/dashboard/user"
                class="flex px-4 py-3 items-center gap-4 hover:bg-gray-100 hover:bg-opacity-10 rounded-md">
                <i class="fa fa-user w-6 h-6"></i><span>User</span>
            </a>
        @endif
        @if (auth()->user()->role == 'admin')
            <a href="/dashboard/mentor"
                class="flex px-4 py-3 items-center gap-4 hover:bg-gray-100 hover:bg-opacity-10 rounded-md">
                <i class="fa fa-graduation-cap w-6 h-6"></i><span>Mentor</span>
            </a>
        @endif
        <a href="/dashboard/mentoring"
            class="flex px-4 py-3 items-center gap-4 hover:bg-gray-100 hover:bg-opacity-10 rounded-md">
            <i class="fa fa-users w-6 h-6"></i><span>Mentoring</span>
        </a>

        @if (auth()->user()->role == 'admin')
            <a href="/dashboard/e-book"
                class="flex px-4 py-3 items-center gap-4 hover:bg-gray-100 hover:bg-opacity-10 rounded-md">
                <i class="fa fa-book w-6 h-6"></i><span>E-Book</span>
            </a>
        @endif

        <a href="/dashboard/profile"
            class="flex px-4 py-3 items-center gap-4 hover:bg-gray-100 hover:bg-opacity-10 rounded-md">
            <i class="fa fa-user-circle w-6 h-6"></i><span>Profil</span>
        </a>

        <form action="/logout" method="post" class="contents">
            @csrf
            <button type="submit"
                class="flex px-4 py-3 items-center gap-4 hover:bg-gray-100 hover:bg-opacity-10 rounded-md">
                <i class="fa fa-right-from-bracket w-6 h-6"></i><span>Keluar</span>
            </button>
        </form>
    </div>
</aside>
