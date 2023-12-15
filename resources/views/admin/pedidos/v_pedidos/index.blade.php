@extends('layouts.admin.index')
@section('conteudo')
<div class="content-inner container-fluid pb-0" id="page_layout">

    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Serviços</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">Cadastrar pedido

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
                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th>Prestador</th>
                            <th>Investimento</th>
                           
                         
                        </tr>
                    </thead>
                    <tbody>
                     @php
                        $n=1;
                     @endphp
                        @foreach ($pedidos as $pedido)
                        <tr>
                            <td>@php
                              echo $n
                           @endphp</td>
                            <td>{{$pedido->pedido}}</td>
                           
                            <td>
                                {{$pedido->cliente}}
                            </td>
                            <td>{{$pedido->prestador}}</td>
                            <td>{{$pedido->preco}}</td>
                          


                          
                        </tr>
                        @php
                        $n++;
                        @endphp
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


     @endsection
