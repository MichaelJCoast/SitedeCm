<x-app-layout>
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <x-validation-errors />
                    <x-success-message />

                    <form method="POST" action="{{ route('dashboard.update') }}">
                        @method('PUT')
                        @csrf
                        <div class="container flex flex-row mx-auto space-x-12">
                            <div class="container flex flex-col mx-auto space-y-2">
                                <h3 class="text-white font-medium text-xl capitalize">A tua conta</h3>
                                <p class="text-white">Assegura que o teu nome está correto. Podes também mudar a palavra-passe.</p>
                            </div>         
                            <div class="container flex flex-col mx-auto space-y-4">
                                <div>
                                        <x-label for="name" :value="__('Nome')" />
                                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ auth()->user()->name }}" autofocus />
                                </div>
                                    <div>
                                        <x-label for="new_password" :value="__('New password')" />
                                        <x-input id="new_password" class="block mt-1 w-full"
                                                 type="password"
                                                 name="password"
                                                 autocomplete="new-password" />
                                    </div>
                                    <div>
                                        <x-label for="confirm_password" :value="__('Confirm password')" />
                                        <x-input id="confirm_password" class="block mt-1 w-full"
                                                 type="password"
                                                 name="password_confirmation"
                                                 autocomplete="confirm-password" />
                                    </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
