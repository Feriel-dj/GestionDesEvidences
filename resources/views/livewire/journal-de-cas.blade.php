<div class=" row p-2 pt-2">
    <div class="col-12">
      <div class="card">
       
        
                
                  <!-- /.card-header -->
                 
                  <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                    <table class="table table-head-fixed">
                      <thead>
                        <tr>
                            <th style="width: 10%;" class="text-center">Num_dossier</th>
                          <th style="width: 40%;" class="text-center">Crime</th>
                          <th style="width:20%;" class="text-center">Ajouter</th>
                          <th style="width:30%;" class="text-center">Ajouter par</th>
                         

                        </tr>
                      </thead>
                       <tbody>
                          
                            @foreach ($affichedemande as $journal)
                                <tr>
                                  <td class="text-center">{{ $journal->id }}</td>
                                    <td class="text-center" >{{ $journal->crime }}</td>
                                  
                                    <td class="text-center">{{ optional($journal->created_at)->diffForHumans() }}</td>  
                                   <td class="text-center">{{ $journal->creator->name }}
                                      {{ $journal->creator->Prénom }}
                                    </td>
                                   
                                </tr>
                            @endforeach
                      </tbody>
                      
                    </table>
                  </div>
                 
                  <!-- /.card-body -->
                
                
                <!-- /.card -->
              </div>
        </div>
      
    
    