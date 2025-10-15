<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
            <span></span>
        </a>


        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Gestión')" class="grid">
                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                    wire:navigate>Dashboard</flux:navlist.item>
                <flux:navlist.item icon="calendar-days" :href="route('eventos.index')"
                    :current="request()->routeIs('eventos.*')" wire:navigate>Eventos</flux:navlist.item>
                <flux:navlist.item icon="users" :href="route('clientes.index')"
                    :current="request()->routeIs('clientes.*')" wire:navigate>Clientes</flux:navlist.item>
                <flux:navlist.item icon="briefcase" :href="route('proveedores.index')"
                    :current="request()->routeIs('proveedores.*')" wire:navigate>Proveedores</flux:navlist.item>
                <flux:navlist.item icon="wrench-screwdriver" :href="route('servicios.index')"
                    :current="request()->routeIs('servicios.*')" wire:navigate>Servicios</flux:navlist.item>
                <flux:navlist.item icon="clipboard-document-list" :href="route('reservas.index')"
                    :current="request()->routeIs('reservas.*')" wire:navigate>Reservas</flux:navlist.item>
                <flux:navlist.item icon="star" :href="route('calificaciones.index')"
                    :current="request()->routeIs('calificaciones.*')" wire:navigate>Calificaciones</flux:navlist.item>
                <flux:navlist.item icon="calendar" :href="route('agenda.index')"
                    :current="request()->routeIs('agenda.*')" wire:navigate>Agenda</flux:navlist.item>
                <flux:navlist.item icon="chart-bar" :href="route('reportes.index')"
                    :current="request()->routeIs('reportes.*')" wire:navigate>Reportes</flux:navlist.item>
                <flux:navlist.item icon="cog-6-tooth" :href="route('configuracion.index')"
                    :current="request()->routeIs('configuracion.*')" wire:navigate>Configuración</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit"
                target="_blank">
                {{ __('Repository') }}
            </flux:navlist.item>

            <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire"
                target="_blank">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist>

        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile :name="optional(auth()->user())->name" :initials="optional(auth()->user())->initials()"
                icon:trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ optional(auth()->user())->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ optional(auth()->user())->name }}</span>
                                <span class="truncate text-xs">{{ optional(auth()->user())->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="optional(auth()->user())->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ optional(auth()->user())->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ optional(auth()->user())->name }}</span>
                                <span class="truncate text-xs">{{ optional(auth()->user())->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
