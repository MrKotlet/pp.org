
    <!-- Be present above all else. - Naval Ravikant -->


        <div class="col-8 col-lg-2 border g-0 nav-div">
        <div class="menu-toggle home-nav-header home-link-active text-center">menu</div>
            <div class="">

                <div class="home-link-active home-nav-header">
                    <h2 class="text-center">User Panel</h2>
                </div>

                <div class="link home-link text-center container-fluid">
                    <a class="link text-decoration-none" aria-current="page" href="/home">Start</a>
                </div>
                <div class="link text-center home-link">
                    <a class="link text-decoration-none" aria-current="page" href="/notifications">Notifications</a>
                </div>
                <div class="nav-item text-center home-link">
                    <a class="link text-decoration-none" href="/meetings">Meetings</a>
                </div>

                @if($user->company)
                    <div class="nav-item text-center home-link">
                        <a class="link text-decoration-none" href="/step2">Edit Company Profile</a>
                    </div>
                    <div class="nav-item text-center home-link">
                        <a class="link text-decoration-none" href="/company/{{$company->id}}">Company site preview</a>
                    </div>
                    <div class="nav-item text-center home-link">
                        <a class="link text-decoration-none" href="/meetingSettings">B2B settings</a>
                    </div>
                @else
                    <div class="nav-item text-center home-link">
                        <a class="link text-decoration-none" href="/step1">Create Company Profile</a>
                    </div>
                @endif
                <div class="link text-center home-link">
                    <a class="link text-decoration-none" aria-current="page" href="/usersettings">Account settings</a>
                </div>

                <div class="nav-item text-center home-link">
                    <a class="link text-decoration-none" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                </div>
            </div>
        </div>



@push('scripts')

    <link rel="stylesheet" href="{{asset('css/userpanel/homenav.css')}}">
    <script src="{{ asset('js/userpanel/homenav.js') }}"></script>
@endpush
