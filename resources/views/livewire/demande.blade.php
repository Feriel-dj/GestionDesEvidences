<div>
   
    <!--<form class="form-horizontal mt-4" role="form" method="POST"  action="" >-->
        <form wire:submit.prevent="register">
        <div class="card">
            <div class="card-body">
        @csrf
          <x-jet-input type="hidden" name="token" value="72d30a5e8daac559"/>
          <div class="form-group mt-3">
              <x-jet-label for="cas" class="control-label text-gray-800">Nom de cas</x-jet-label> 
              <x-jet-input  wire:model="cas" type="text" class="form-control" id="" name="cas"
               placeholder="Veuillez désigner un nom de cas."/>
               @error('cas') <span class="error">{{ $message }} </span>@enderror
          </div>
       
          <div class="form-group mt-3">
              <x-jet-label for="num_dossier" class="control-label text-gray-800">Numéro d’affaire criminelle
                  <span style="color:rgb(221, 45, 45);">*</span>
              </x-jet-label>
             <x-jet-input wire:model="num_dossier" type="text" class="form-control" id="" name="num_dossier"
                    value="9999/R/"  onkeyup="showHint(this.value)" />
                  <span id="txtHint"></span>
                  @error('num_dossier') <span class="error">{{ $message }} </span>@enderror
          </div>
          
          <div class="form-group mt-3">
              <x-jet-label for="crime" class="control-label text-gray-800">Infraction principale 
                  <span style="color:rgb(221, 45, 45);">*</span>
              </x-jet-label>
                  <x-jet-input wire:model="crime" type="text" class="form-control" id="" name="crime"
                   placeholder="Spécifier l'infraction principale " maxlength="128" />
                   @error('crime') <span class="error">{{ $message }} </span>@enderror
          </div>
         
          <div class="form-group mt-3">
              <x-jet-label for="classification" class="control-label text-gray-800">Classification
                  <span style="color:rgb(221, 45, 45);">*</span>
              </x-jet-label>
                  <select wire:model="classification" style="text-align:left;"  class="btn btn-default block mt-1 w-full border-gray-300
                   focus:border-indigo-300 focus:ring-opacity-50 rounded-md shadow-sm" name="classification" id="classification " >
                      <option value="selected">Choisir une classification</option>   
                       <option value="Property crime">Crime contre les biens</option>                          
                         <option value="Drug offense">Infraction liée à la drogue</option>                           
                          <option value="Sexual crime">Crime sexuels </option>                           
                           <option value="Financial crime">Criminalités financières</option>                           
                            <option value="Cybercrime">Cybercriminalités</option> 
                              <option value="Traffic crime">Délits de la route</option>                          
                               <option value="Crimes against justice">Crime contre la justice</option>                            
                               <option value="Violent crime"> Crime Violents</option>                           
                                <option value="Internal investigation">Enquete interne</option>                            
                                <option value="Foreigner offenses">Infractions contre les étrangers</option>                           
                                 <option value="Other crime">Autres crimes</option>                    
                  </select>
                  </div>
                  @error('classification')
                  <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                  @enderror
          
          <div class="form-group mt-3">
              <x-jet-label for="cas_suspect" class=" control-label text-gray-800">Suspect/cible
                  <span style="color:rgb(221, 45, 45);">*</span>
              </x-jet-label>
             
                  <x-jet-input wire:model="cas_suspect" type="text" class="form-control" id="cas_suspect" name="cas_suspect" 
                  placeholder="Nom" maxlength="128" wire:model="cas_suspect"/>
        
          </div>
          @error('cas_suspect')
          <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
          @enderror
          <div class="form-group mt-3">
              <x-jet-label for="investigateur_légiste" class=" control-label text-gray-800"> Chef d’enquête
                  <span style="color:rgb(221, 45, 45);">*</span>
              </x-jet-label>
                  <x-jet-input wire:model="investigateur_légiste" type="text" class="form-control" id="responsable_enquete" name="responsable_enquete" 
                  placeholder="Nom et rang" maxlength="128"/>
                        
              </div>
              @error('investigateur_légiste')
              <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
              @enderror
          
          <div class="form-group mt-3">
              <x-jet-label for="investigateur_de_cas" class="control-label text-gray-800">Enquêteur de cas
                  <span style="color:rgb(221, 45, 45);">*</span>
              </x-jet-label>
              
                  <x-jet-input  wire:model="investigateur_de_cas" type="text" class="form-control" id="investigateur_de_cas" name="investigateur_de_cas"
                   placeholder="Nom et rang" value="" maxlength="128" />
              </div>
              @error('investigateur_de_cas')
              <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
              @enderror
         
          <div class="form-group mt-3">
              <x-jet-label for="investigateur_tel" class="control-labe text-gray-800">Enquêteur tél
                  <span style="color:rgb(221, 45, 45);">*</span>
              </x-jet-label>
             
                  <x-jet-input wire:model="investigateur_tel" type="text" class="form-control" id="investigateur_tel" name="investigateur_tel"
                   placeholder="Tel.no." value="+213"  />
              </div>
              @error('investigateur_tel')
              <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
              @enderror
          <div class="form-group mt-3">
              <x-jet-label for="unite_enqueteur" class="control-label text-gray-800">Unité
                  <span style="color:rgb(221, 45, 45);">*</span>
              </x-jet-label>
                  <select wire:model="unite_enqueteur" style="text-align:left;" class="btn btn-default block mt-1 w-full border-gray-300 
                  focus:border-indigo-300 focus:ring-opacity-50 rounded-md shadow-sm" name="unite_enqueteur" 
                  id="unite_enqueteur" >
                      <option value="" disabled selected> Unité d'enquête</option>
                      <option value="Unit 1">Unité 1</option> 
                       <option value="Unit 2">Unité 2</option>                           
                        <option value="Unit 3">Unité 3</option>                   
                       </select>
              </div>
              @error('unite_enqueteur')
              <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
              @enderror
          
          <div class="form-group mt-3">
              <x-jet-label for="date_confiscation" class="control-label text-gray-800">Date de confiscation
                  <span style="color:rgb(221, 45, 45);">*</span>
              </x-jet-label>
              
                  <x-jet-input  wire:model="date_confiscation" type="date" class="form-control text-gray-800" id="date_confiscation" name="date_confiscation" 
                  placeholder="YYYY-MM-DD, oldest if several." maxlength="10"/>
              </div>
              @error('date_confiscation')
              <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
              @enderror
          <div class="form-group mt-3">
              <x-jet-label for="case_request_description" class="control-label text-gray-800">Description de l’appareil
                  <span style="color:rgb(221, 45, 45);">*</span>
              </x-jet-label>
                  <x-jet-input  wire:model="description_demande" type="text" class="form-control" id="description_demande" name="description_demande"
                    maxlength="1024" wire:model="description_demande"/>
              </div>
              @error('description_demande')
              <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
              @enderror
    
          <div class="form-group mt-3">
              <x-jet-label for="action_demande" class=" control-label text-gray-800">Détails de la demande
                  <span style="color:rgb(221, 45, 45);">*</span>
              </x-jet-label>
                  <x-jet-input wire:model="action_demande" type="text" class="form-control" id="action_demande" name="action_demande"
                   placeholder="Veuillez préciser les détails de la demande." maxlength="1024" />
              </div>
              @error('action_demande')
              <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
              @enderror
          <div class="form-group mt-3">
              <x-jet-label for="contient_appareils" class="control-label text-gray-800"></x-jet-label>
              
                  <x-jet-input type="hidden" name="contient_appareils" value="0"/>
                  <x-jet-input  wire:model="contient_appareils" type="checkbox" name="contient_appareils" value="1"/> La demande contient des appareils mobiles
                 
          </div>
          @error('contient_appareils')
          <p class="text-red-500 text-sm mb-6 -mt-3">{{  $message  }}</p>
          @enderror
          <div class="form-group mt-3">
              <x-jet-label for="cas_urgence" class=" control-label text-gray-800">Urgence</x-jet-label>
              
                  <select wire:model="cas_urgence" style="text-align:left;" class="btn btn-default block mt-1 w-full border-gray-300 
                  focus:border-indigo-300 focus:ring-opacity-50 rounded-md shadow-sm" name="case_urgency" id="cas_urgence" >
                      <option value="1">Urgent</option>
                      <option value="2" >Normal</option>
                      <option value="3">Peut attendre</option>
                  </select>
                  <x-jet-input type="text" class="mt-2 form-control" id="perustelu" 
                  placeholder="le cas d'urgence doivent etre justifiés." name="cas_urgence_justification" maxlength="128" wire:model='cas_urgence_justification'/>
          </div>
          @error('cas_urgence')
          <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
          @enderror
         
        <div class="form-group">
            <x-jet-label for="fichier" class="text-gray-800">Sélectionner un fichier</x-jet-label>
            <div class="custom-file">
                <input wire:model="fichier" id="fichier" class="custom-file-input" type="file" name="fichier">
                <label for="fichier" class="custom-file-label"> 
                    @if ($fichier)
                    {{ $fichier->getClientOriginalName() }}
                    @else
                    Choisir un fichier 
                     @endif     
                </label>
            </div>
        </div>
        @error('fichier')
        <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
        @enderror
          <div class="form-group mt-4">
              <div class="col-sm-offset-2 col-sm-10">
                  <x-jet-button type="submit" id="request_save_button" style="position: reight" ><i class="fa fa-save"></i> Sauvegarder </x-jet-button>
                     
                  &nbsp;&nbsp;<x-jet-danger-button type="reset"> Supprimer</x-jet-danger-button>
              </div>
          </div>
      </form>     
</div>
