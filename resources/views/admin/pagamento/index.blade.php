@extends('layouts.admin.index')
@section('conteudo')
<div class="content-inner container-fluid pb-0" id="page_layout">

    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Pagamentos</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">Cadastrar Pagamento
                        <svg class="size-28 hvr-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
             </div>
             <div class="card-body">

                <div class="table-responsive">
                   <table id="input-datatable" class="table" data-toggle="data-table-column-filter">
                    <thead>
                        <tr>
                           <th>#</th>
                            <th>Numero</th>
                            <th>Servico</th>
                            <th>Valor</th>
                            <th>Prestador</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Comprovativo</th>
                          <th>Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagamentos as $pagamento)
                        <tr>
                           <td>#</td>
                            <td>{{$pagamento->numero}}</td>
                            <td>{{$pagamento->servico}}</td>
                           <td class = "preco" >{{$pagamento->preco}}</td>
                            <td>
                                {{$pagamento->prestador}}
                            </td>
                            <td>
                              @foreach($clientes as $cliente)
                                 @if($cliente->id == $pagamento->user_id)
                                 {{ $cliente->name }}
                                 @endif
                              @endforeach
                            </td>
                         
                            <td>

                               @if($pagamento->estado==0)
                                     <p class="badge bg-warning">Em analise</p>
 
                               @elseif($pagamento->estado==1)
                                     <p class="badge bg-success">Aprovado</p>
                               @else
                               <p class="badge bg-danger">Não Aprovado</p>
                               @endif
                            </td>
                            <td>@if(isset($pagamento->comprovativo))
                                 <p class="badge bg-success">Enviado</p>
                                @else
                                 <p class="badge bg-danger">Em falta</p>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn-icon btn-warning rounded" data-bs-toggle="modal"data-bs-target=".bd-example-modal-xl{{$pagamento->id}}"  >
                                    <span class="btn-inner">
                                       <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>
                                    </span>
                                 </a>
                                 
                                 @if(Auth::user()->vc_tipo_utilizador==1)
                                 @if($pagamento->estado==0 || $pagamento->estado==2)
                                 <a class="btn btn-sm btn-icon btn-success rounded" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Aprovar" href="{{route('admin.pagamento.aceitar', $pagamento->id)}}">
                                    <span class="btn-inner">
                                       
                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7281 21.9137C11.8388 21.9715 11.9627 22.0009 12.0865 22C12.2103 21.999 12.3331 21.9686 12.4449 21.9097L16.0128 20.0025C17.0245 19.4631 17.8168 18.8601 18.435 18.1579C19.779 16.6282 20.5129 14.6758 20.4998 12.6626L20.4575 6.02198C20.4535 5.25711 19.9511 4.57461 19.2082 4.32652L12.5707 2.09956C12.1711 1.96424 11.7331 1.96718 11.3405 2.10643L4.72824 4.41281C3.9893 4.67071 3.496 5.35811 3.50002 6.12397L3.54231 12.7597C3.5554 14.7758 4.31448 16.7194 5.68062 18.2335C6.3048 18.9258 7.10415 19.52 8.12699 20.0505L11.7281 21.9137ZM10.7836 14.1089C10.9326 14.2521 11.1259 14.3227 11.3192 14.3207C11.5125 14.3198 11.7047 14.2472 11.8517 14.1021L15.7508 10.2581C16.0438 9.96882 16.0408 9.50401 15.7448 9.21866C15.4478 8.9333 14.9696 8.93526 14.6766 9.22454L11.3081 12.5449L9.92885 11.2191C9.63186 10.9337 9.15467 10.9367 8.8607 11.226C8.56774 11.5152 8.57076 11.98 8.86775 12.2654L10.7836 14.1089Z" fill="currentColor"></path>
                                    </svg>
                        
                                    </span>
                                 </a>

                                 <a class="btn btn-sm btn-icon btn-danger rounded" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Desaprovar" href="{{route('admin.pagamento.recusar', $pagamento->id)}}">
                                    <span class="btn-inner">
                                       
                                       <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M19.2013 4.32867C19.9461 4.57382 20.4493 5.26122 20.4493 6.02608L20.4997 12.6637C20.5097 14.674 19.775 16.6253 18.4263 18.1561C17.8123 18.8621 17.0172 19.4603 16.0107 19.9996L12.4377 21.9117C12.327 21.9706 12.2062 22 12.0855 22C11.9647 22 11.8338 21.9706 11.7231 21.9117L8.11991 20.0486C7.10336 19.5191 6.30824 18.9307 5.68422 18.2345C4.3154 16.7244 3.55047 14.773 3.54041 12.7628L3.50015 6.12316C3.49008 5.3583 3.99333 4.67286 4.72806 4.41693L11.3407 2.1037C11.7332 1.96543 12.166 1.96543 12.5686 2.1037L19.2013 4.32867ZM14.4205 14.0866C14.7124 13.8022 14.7124 13.3315 14.4205 13.0472L13.0617 11.7224L14.4205 10.3995C14.7124 10.1152 14.7124 9.65429 14.4205 9.35913C14.1286 9.07476 13.6455 9.07476 13.3536 9.35913L11.9949 10.6839L10.6361 9.35913C10.3442 9.07476 9.87119 9.07476 9.56924 9.35913C9.27736 9.65429 9.27736 10.1152 9.56924 10.3995L10.928 11.7224L9.56924 13.0472C9.27736 13.3315 9.27736 13.8022 9.56924 14.0866C9.72022 14.2337 9.91145 14.3013 10.1027 14.3013C10.304 14.3013 10.4952 14.2337 10.6361 14.0866L11.9949 12.7628L13.3536 14.0866C13.5046 14.2337 13.6958 14.3013 13.8871 14.3013C14.0783 14.3013 14.2796 14.2337 14.4205 14.0866Z" fill="currentColor"></path>
                                       </svg>
                                   
                                    </span>
                                 </a>
                           @else
                           <a class="btn btn-sm btn-icon btn-danger rounded" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Desaprovar" href="{{route('admin.pagamento.recusar', $pagamento->id)}}">
                              <span class="btn-inner">
                                 
                                 <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M19.2013 4.32867C19.9461 4.57382 20.4493 5.26122 20.4493 6.02608L20.4997 12.6637C20.5097 14.674 19.775 16.6253 18.4263 18.1561C17.8123 18.8621 17.0172 19.4603 16.0107 19.9996L12.4377 21.9117C12.327 21.9706 12.2062 22 12.0855 22C11.9647 22 11.8338 21.9706 11.7231 21.9117L8.11991 20.0486C7.10336 19.5191 6.30824 18.9307 5.68422 18.2345C4.3154 16.7244 3.55047 14.773 3.54041 12.7628L3.50015 6.12316C3.49008 5.3583 3.99333 4.67286 4.72806 4.41693L11.3407 2.1037C11.7332 1.96543 12.166 1.96543 12.5686 2.1037L19.2013 4.32867ZM14.4205 14.0866C14.7124 13.8022 14.7124 13.3315 14.4205 13.0472L13.0617 11.7224L14.4205 10.3995C14.7124 10.1152 14.7124 9.65429 14.4205 9.35913C14.1286 9.07476 13.6455 9.07476 13.3536 9.35913L11.9949 10.6839L10.6361 9.35913C10.3442 9.07476 9.87119 9.07476 9.56924 9.35913C9.27736 9.65429 9.27736 10.1152 9.56924 10.3995L10.928 11.7224L9.56924 13.0472C9.27736 13.3315 9.27736 13.8022 9.56924 14.0866C9.72022 14.2337 9.91145 14.3013 10.1027 14.3013C10.304 14.3013 10.4952 14.2337 10.6361 14.0866L11.9949 12.7628L13.3536 14.0866C13.5046 14.2337 13.6958 14.3013 13.8871 14.3013C14.0783 14.3013 14.2796 14.2337 14.4205 14.0866Z" fill="currentColor"></path>
                                 </svg>
                             
                              </span>
                           </a>
                           @endif
                           @endif


                                 @if(Auth::user()->vc_tipo_utilizador==2 || Auth::user()->vc_tipo_utilizador==3 )
                                 @if($pagamento->estado==1)
                                

                                 <a class="btn btn-sm btn-icon btn-danger rounded" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Desaprovar" href="{{route('prestador.pagamento.recusar', $pagamento->id)}}">
                                    <span class="btn-inner">
                                       
                                       <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M19.2013 4.32867C19.9461 4.57382 20.4493 5.26122 20.4493 6.02608L20.4997 12.6637C20.5097 14.674 19.775 16.6253 18.4263 18.1561C17.8123 18.8621 17.0172 19.4603 16.0107 19.9996L12.4377 21.9117C12.327 21.9706 12.2062 22 12.0855 22C11.9647 22 11.8338 21.9706 11.7231 21.9117L8.11991 20.0486C7.10336 19.5191 6.30824 18.9307 5.68422 18.2345C4.3154 16.7244 3.55047 14.773 3.54041 12.7628L3.50015 6.12316C3.49008 5.3583 3.99333 4.67286 4.72806 4.41693L11.3407 2.1037C11.7332 1.96543 12.166 1.96543 12.5686 2.1037L19.2013 4.32867ZM14.4205 14.0866C14.7124 13.8022 14.7124 13.3315 14.4205 13.0472L13.0617 11.7224L14.4205 10.3995C14.7124 10.1152 14.7124 9.65429 14.4205 9.35913C14.1286 9.07476 13.6455 9.07476 13.3536 9.35913L11.9949 10.6839L10.6361 9.35913C10.3442 9.07476 9.87119 9.07476 9.56924 9.35913C9.27736 9.65429 9.27736 10.1152 9.56924 10.3995L10.928 11.7224L9.56924 13.0472C9.27736 13.3315 9.27736 13.8022 9.56924 14.0866C9.72022 14.2337 9.91145 14.3013 10.1027 14.3013C10.304 14.3013 10.4952 14.2337 10.6361 14.0866L11.9949 12.7628L13.3536 14.0866C13.5046 14.2337 13.6958 14.3013 13.8871 14.3013C14.0783 14.3013 14.2796 14.2337 14.4205 14.0866Z" fill="currentColor"></path>
                                       </svg>
                                   
                                    </span>
                                 </a>
                           @else
                           <a class="btn btn-sm btn-icon btn-success rounded" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Aprovar" href="{{route('prestador.pagamento.aceitar', $pagamento->id)}}">
                              <span class="btn-inner">
                                 
                     <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7281 21.9137C11.8388 21.9715 11.9627 22.0009 12.0865 22C12.2103 21.999 12.3331 21.9686 12.4449 21.9097L16.0128 20.0025C17.0245 19.4631 17.8168 18.8601 18.435 18.1579C19.779 16.6282 20.5129 14.6758 20.4998 12.6626L20.4575 6.02198C20.4535 5.25711 19.9511 4.57461 19.2082 4.32652L12.5707 2.09956C12.1711 1.96424 11.7331 1.96718 11.3405 2.10643L4.72824 4.41281C3.9893 4.67071 3.496 5.35811 3.50002 6.12397L3.54231 12.7597C3.5554 14.7758 4.31448 16.7194 5.68062 18.2335C6.3048 18.9258 7.10415 19.52 8.12699 20.0505L11.7281 21.9137ZM10.7836 14.1089C10.9326 14.2521 11.1259 14.3227 11.3192 14.3207C11.5125 14.3198 11.7047 14.2472 11.8517 14.1021L15.7508 10.2581C16.0438 9.96882 16.0408 9.50401 15.7448 9.21866C15.4478 8.9333 14.9696 8.93526 14.6766 9.22454L11.3081 12.5449L9.92885 11.2191C9.63186 10.9337 9.15467 10.9367 8.8607 11.226C8.56774 11.5152 8.57076 11.98 8.86775 12.2654L10.7836 14.1089Z" fill="currentColor"></path>
                     </svg>
                  
                              </span>
                           </a>
                           @endif
                           @endif
                                </td>
                        </tr>
                       {{-- MODAL CADASTRAR USUARIO --}}
                <div class="modal fade bd-example-modal-xl{{$pagamento->id}}" tabindex="-1" role="dialog"   aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                       <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-title">Modal title</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                             </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('admin.pagamento.update',$pagamento->id)}}" method="post" enctype="multipart/form-data">
                                @csrf

                                @include('admin.pagamento.form')

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

                        @endforeach


                    </tbody>
                      <tfoot>
                         <tr>
                            <th title="Name">Name</th>
                            <th title="Position">Position</th>
                            <th title="Office">Office</th>
                            <th title="Age">Age</th>

                         </tr>
                      </tfoot>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>


                </div>


                {{-- MODAL CADASTRAR USUARIO --}}
                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"   aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                       <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-title">Modal title</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                             </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('admin.pagamento.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                @include('admin.pagamento.form')

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
                 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                 <script>
                     $(document).ready(function () {
                         $('#categorias_id').change(function () {
                             var categoriaId = $(this).val();
                             var loadingElement = $('#loading');
                             var descricaoPara = $('#descricao_para');
                 
                             // Mostrar a mensagem de carregamento
                             loadingElement.show();
                             descricaoPara.empty(); // Limpar o conteúdo anterior
                 
                             $.ajax({
                                 url: '/admin/pagamento/get-subcategoria-descricao/' + categoriaId,
                                 type: 'GET',
                                 success: function (response) {
                                     // Ocultar a mensagem de carregamento e atualizar a descrição
                                     loadingElement.hide();
                                     descricaoPara.text(response.descricao);
                                 },
                                 error: function () {
                                     // Lidar com erros, se houver
                                     loadingElement.hide();
                                     descricaoPara.text('Erro ao carregar a descrição.');
                                 }
                             });
                         });
                     });
</script>



<script>
    //Script para formatar o valor do preco
    function formatarMoeda(valor) {
        let valorSemFormato = valor.replace(/\D/g, ''); 
        if (valorSemFormato === '') {
            return valor;
        }
        while (valorSemFormato.length < 3) {
            valorSemFormato = '0' + valorSemFormato;
        }
        let parteInteira = valorSemFormato.substring(0, valorSemFormato.length - 2);
        let parteDecimal = valorSemFormato.substring(valorSemFormato.length - 2);
        if (parteInteira.length > 3) {
            parteInteira = parteInteira.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        }

        let moedaFormatada = parteInteira + ',' + parteDecimal;
        return moedaFormatada + ' AKz';
    }
    function formatarValoresNaTabela() {
        let celulasPreco = document.querySelectorAll('.preco');
        celulasPreco.forEach(function (celula) {
            let valor = celula.textContent.trim();

            let valorFormatado = formatarMoeda(valor);

            celula.textContent = valorFormatado;
        });
    }
    window.onload = formatarValoresNaTabela;
</script>

<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@if (session('eliminada'))
<script>
Swal.fire(
'Utilizadores Eliminado com sucesso!',
'',
'success'
)
</script>
@endif
@if (session('editada'))
<script>
Swal.fire(
'Utilizadores editado com sucesso!',
'',
'success'
)
</script>
@endif
@if (session('editada_f'))
<script>
Swal.fire(
'ERro ao editar Utilizadores!',
'',
'error'
)
</script>
@endif

@if (session('status'))
<script>
Swal.fire(
'Utilizadores Cadastrado Com Sucesso!',
'',
'success'
)
</script>
@endif
@if (session('status_f'))
<script>
Swal.fire(
'Erro ao cadastrar Utilizadores!',
'',
'success'
)
</script>
@endif
                 
                 
@endsection
