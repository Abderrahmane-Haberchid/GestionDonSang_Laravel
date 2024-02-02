<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Merci de votre inscription! vant de continuer, veuilez confirmer votre adresse email en cliquant sur le lient que vous avez reçu, si vous l'avez toujours pas reçu nous pouvons vous le renvoyer.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Un nouveau email de vérifcation a été envoyé à votre e-mail renseigné lors votre inscription.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Renvoyer l'email de vérification') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Se déconnecter') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
