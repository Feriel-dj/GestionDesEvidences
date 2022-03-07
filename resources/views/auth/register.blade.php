<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
          
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <b><h1  class="border-b text-white"  align="center" font-size="600">S'inscrire</h1></b>


              <form method="POST" action="{{ route('register') }}" x-data="{role_id: 'Enquêteur'}">
            @csrf

            <div class="mt-2">
                <x-jet-label for="name" value="{{ __('Nom') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-2">
                <x-jet-label for="Prénom" value="{{ __('Prénom') }}" />
                <x-jet-input id="Prénom" class="block mt-1 w-full" type="text" name="Prénom" :value="old('Prénom')" required autofocus autocomplete="Prénom" />
            </div>

            <div class="mt-2" x-show="role_id == 'Enquêteur' ">
                <x-jet-label for="Rang" value="{{ __('Rang') }}" />
                <x-jet-input id="Rang" class="block mt-1 w-full" type="text" name="Rang" :value="old('Rang')" required autofocus autocomplete="Rang" />
            </div>

            <div class="mt-2">
                <x-jet-label for="email" value="{{ __('E-mail') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-2">
                <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-2">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmer le mot de passe') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="form-group mt-2">
                <x-jet-label for="role_id"  > Niveau d'accès </x-jet-label>
                <select name="role_id" x-model="role_id" id="role_id" class="form-control block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="admin">Administrateur</option>
                    <option value="Enquêteur" >Enquêteur</option>
                    <option value="Avocat" @if(old('role_id')== 'Avocat')selected @endif>Avocat</option>
                    
                </select>
             </div>

            <!-- <div class="Drapeaux form-group mt-2" x-show="role_id == 'Enquêteur' ">
                <x-jet-label class="mt-2" for="Drapeaux"  :value="__('Drapeaux')"/>
                <div class="mt-2">
                     <x-jet-label for="Légal" class="col-md-12">
                       <x-jet-input type="hidden" id="Légal" name="Légal" value="-"/>
                       <x-jet-input type="checkbox" id="Légal" name="Légal" value="Légal"/> Légal 
                     </x-jet-label>
                   </div>
                   <div class="mt-2">
                    <x-jet-label for="Mobile" class="col-md-12">
                      <x-jet-input type="hidden" id="Mobile" name="Mobile" value="-"/>
                      <x-jet-input type="checkbox" id="Mobile" name="Mobile" value="Mobile"/> Mobile
                    </x-jet-label>
            </div>
        </div>-->
        <div class="Drapeaux form-group mt-2" x-show="role_id == 'Enquêteur'">
            <x-jet-label class="mt-2" for="Drapeaux"> Drapeaux

            <x-jet-label class="mt-2" for="Medecin_legiste">
                <input type="checkbox" id="Medecin_legiste" value="Medecin_legiste"> Médecin légiste
            </x-jet-label>
            <x-jet-label class="mt-2" for=" Examinateur_mobile">
               <input type="checkbox" id=" Examinateur_mobile" value=" Examinateur_mobile"> Examinateur mobile
           </x-jet-label>
            </x-jet-label>
        </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-2">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-100 hover:text-gray-900" href="/">
                    {{ __('vous êtes déjà inscrit?') }}
                </a>

                <x-jet-button class="ml-4 ">
                    {{ __("S'inscrire") }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
