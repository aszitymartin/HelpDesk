<aside class="w-20 p-4 text-sm sidenav">

    <a href="/" class="flex flex-row align-ccenter gap-4">
        <img src="/assets/img/icon.png" class="sidenav-icon">
        <span>{{ config('app.name', 'HelpDesk') }}</span>
    </a>
    
    <hr />

    <div class="sidenav-inner flex flex-col gap-1">

            <a class="sidenav-menu-item w-full" href="/">
                <x-icon name="dashboard-4" class="svg-icon" />
                {{ __('sidenav.dashboard') }}
            </a>

            <a class="sidenav-menu-item w-full" href="/">
                <x-icon name="book-2" class="svg-icon" />
                {{ __('sidenav.tickets') }}
            </a>

            <a class="sidenav-menu-item w-full" href="/">
                <x-icon name="calendar-mark" class="svg-icon" />
                {{ __('sidenav.events') }}
            </a>

        <hr />

            <a class="sidenav-menu-item w-full" href="/">
                <x-icon name="dashboard-circle" class="svg-icon" />
                {{ __('sidenav.categories') }}
            </a>

            <a class="sidenav-menu-item w-full" href="/">
                <x-icon name="tag" class="svg-icon" />
                {{ __('sidenav.labels') }}
            </a>

            <a class="sidenav-menu-item sidenav-menu-dropdown-btn w-full">
                <x-icon name="view-in-ar-3d-scan" class="svg-icon" />
                {{ __('sidenav.templates') }}
                <x-icon name="caret-right" class="svg-icon ml-auto icon-small sidenav-dropdown-indicator" />
            </a>

                <div class="sidenav-dropdown-container">
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="mail-send-envelope" class="svg-icon" />
                        {{ __('sidenav.email') }}
                    </a>
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="book-2" class="svg-icon" />
                        {{ __('sidenav.ticket') }}
                    </a>
                </div>

        <hr />

            <a class="sidenav-menu-item sidenav-menu-dropdown-btn w-full">
                <x-icon name="padlock-square-1" class="svg-icon" />
                {{ __('sidenav.security') }}
                <x-icon name="caret-right" class="svg-icon ml-auto icon-small sidenav-dropdown-indicator" />

            </a>

                <div class="sidenav-dropdown-container">
                    <a class="sidenav-menu-item" href="/teams">
                        <x-icon name="keyhole-lock-circle" class="svg-icon" />
                        {{ __('sidenav.teams') }}
                    </a>
                    @can('roles.manage')
                        <a class="sidenav-menu-item" href="/roles">
                            <x-icon name="keyhole-lock-circle" class="svg-icon" />
                            {{ __('sidenav.roles') }}
                        </a>
                    @endcan
                    @can('permissions.manage')
                        <a class="sidenav-menu-item" href="/permissions">
                            <x-icon name="keyhole-lock-circle" class="svg-icon" />
                            {{ __('sidenav.permissions') }}
                        </a>
                    @endcan
                </div>

            <a class="sidenav-menu-item sidenav-menu-dropdown-btn w-full">
                <x-icon name="user-circle-single" class="svg-icon" />
                {{ __('sidenav.users') }}
                <x-icon name="caret-right" class="svg-icon ml-auto icon-small sidenav-dropdown-indicator" />

            </a>

                <div class="sidenav-dropdown-container">
                    <a class="sidenav-menu-item" href="/users">
                        <x-icon name="customer-support-1" class="svg-icon" />
                        {{ __('sidenav.team') }}
                    </a>
                    <a class="sidenav-menu-item" href="/users">
                        <x-icon name="user-friendship-group" class="svg-icon" />
                        {{ __('sidenav.customers') }}
                    </a>
                </div>

            <a class="sidenav-menu-item sidenav-menu-dropdown-btn w-full">
                <x-icon name="heatmap-1" class="svg-icon" />
                {{ __('sidenav.modules') }}
                <x-icon name="caret-right" class="svg-icon ml-auto icon-small sidenav-dropdown-indicator" />
            </a>

                <div class="sidenav-dropdown-container">
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="announcement-megaphone" class="svg-icon" />
                        {{ __('sidenav.escalate') }}
                    </a>
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="light-display-mode" class="svg-icon" />
                        {{ __('sidenav.satisfaction') }}
                    </a>
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="book-2" class="svg-icon" />
                        {{ __('sidenav.recurring') }}
                    </a>
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="database-server-2" class="svg-icon" />
                        {{ __('sidenav.automations') }}
                    </a>
                </div>

        <hr />

            <a class="sidenav-menu-item w-full" href="/">
                <x-icon name="slide-deck" class="svg-icon" />
                {{ __('sidenav.reports') }}
            </a>

            <a class="sidenav-menu-item w-full" href="/">
                <x-icon name="chart-column" class="svg-icon" />
                {{ __('sidenav.statistics') }}
            </a>

            <a class="sidenav-menu-item w-full" href="/">
                <x-icon name="open-folder" class="svg-icon" />
                {{ __('sidenav.files') }}
            </a>

        <hr />

            <a class="sidenav-menu-item sidenav-menu-dropdown-btn w-full">
                <x-icon name="screwdriver-wrench" class="svg-icon" />
                {{ __('sidenav.tools') }}
                <x-icon name="caret-right" class="svg-icon ml-auto icon-small sidenav-dropdown-indicator" />
            </a>

                <div class="sidenav-dropdown-container">
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="chat-two-bubbles" class="svg-icon" />
                        {{ __('sidenav.service') }}
                    </a>
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="module-puzzle-2" class="svg-icon" />
                        {{ __('sidenav.fields') }}
                    </a>
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="module-puzzle-2" class="svg-icon" />
                        {{ __('sidenav.statuses') }}
                    </a>
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="module-puzzle-2" class="svg-icon" />
                        {{ __('sidenav.priorities') }}
                    </a>
                </div>

            <a class="sidenav-menu-item sidenav-menu-dropdown-btn w-full">
                <x-icon name="cog-1" class="svg-icon" />
                {{ __('sidenav.settings') }}
                <x-icon name="caret-right" class="svg-icon ml-auto icon-small sidenav-dropdown-indicator" />
            </a>

                <div class="sidenav-dropdown-container">
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="cog-1" class="svg-icon" />
                        {{ __('sidenav.general') }}
                    </a>
                    <a class="sidenav-menu-item" href="/">
                        <img src="/assets/img/icon.png" class="svg-icon">
                        {{ __('sidenav.helpdesk') }}
                    </a>
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="pen-draw" class="svg-icon" />
                        {{ __('sidenav.looks') }}
                    </a>
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="mail-send-envelope" class="svg-icon" />
                        {{ __('sidenav.email') }}
                    </a>
                    <a class="sidenav-menu-item" href="/">
                        <x-icon name="keyboard" class="svg-icon" />
                        {{ __('sidenav.misc') }}
                    </a>
                </div>

    </div>

</aside>