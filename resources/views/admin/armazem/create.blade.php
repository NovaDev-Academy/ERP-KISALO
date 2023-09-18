@extends('layouts.admin.index')
@section('conteudo')
<div class="content-inner container-fluid pb-0" id="page_layout">

    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Livraria</h4>
                </div>

             </div>
             <div class="card-body">


                            <form action="{{route('admin.armazem.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                @include('admin.armazem.form')

                                <div class="modal-footer">
                                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button  class="btn  btn-primary" id="ajaxSubmit" >Cadastrar</button>
                                </div>
                            </form>
                          </div>
                          {{-- <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="button" class="btn btn-primary">Save changes</button>
                          </div> --}}
                       </div>
                    </div>
                 </div>


                </div>
             </div>
          </div>
       </div>
    </div>


                </div>


                <script>
                    function updateCoordinates() {
                        // Verifica se os campos de Latitude e Longitude já foram preenchidos
                        const latitudeField = document.getElementById('latitude');
                        const longitudeField = document.getElementById('longitude');
                        if (latitudeField.value !== '' && longitudeField.value !== '') {
                            // Coordenadas já foram encontradas, interrompe a atualização
                            clearInterval(updateInterval);
                            return;
                        }

                        if ("geolocation" in navigator) {
                            // Obtém a localização atual do dispositivo
                            navigator.geolocation.getCurrentPosition(
                                position => {
                                    // Obtém a latitude e longitude
                                    const latitude = position.coords.latitude;
                                    const longitude = position.coords.longitude;
                                    // Atualiza os campos de Latitude e Longitude
                                    latitudeField.value = latitude;
                                    longitudeField.value = longitude;
                                    // Verifica novamente se os campos foram preenchidos para interromper a atualização
                                    if (latitudeField.value !== '' && longitudeField.value !== '') {
                                        clearInterval(updateInterval);
                                    }
                                },
                                error => {
                                    console.error('Erro ao obter a localização:', error);
                                }
                            );
                        } else {
                            console.error('Geolocalização não é suportada pelo navegador.');
                        }
                    }

                    // Atualiza as coordenadas a cada 2 segundos
                    const updateInterval = setInterval(updateCoordinates, 2000);
                </script>

@endsection
