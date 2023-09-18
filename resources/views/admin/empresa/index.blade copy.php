@extends('layouts.admin.index')
@section('conteudo')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<div class="col-xl-12">
    <div class="card">
        <div class="card-header " style="display: flex;justify-content: space-between">
            <div>
                <h4>Dados da Empresa</h4>
            </div>
            <div>
                <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather icon-plus"></i>
                </button>
            </div>
        </div>
        <div>

        </div>
        <div>


        </div>
        <div class="card-body table-border-style">
            <div class="">
                <table class="table table-striped col-md-12 col-sm-12">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>IBAN</th>
                            <th>Contactos</th>

                            <th>Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{$empresa->id}}</td>
                            <td>
                                {{$empresa->iban}}
                            </td>
                            <td>{{$empresa->contactos}}</td>

                            <td><div class="btn-group card-option">
                                <button type="button" class="btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">

                                     <li class="dropdown-item -"><a data-toggle="modal" data-target="#exampleModal{{$empresa->id}}" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Editar</a></li>
                                    <li class="dropdown-item "><a href="{{route('admin.empresa.delete', $empresa->id)}}"><i class="feather icon-trash"></i> Eliminar</a></li>
                                </ul>
                            </div></td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{$empresa->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$empresa->marca}} {{$empresa->modelo}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('admin.empresa.update',$empresa->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @include('admin.empresa.form')
                                            <div class="modal-footer">
                                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                                <button  class="btn  btn-primary" id="ajaxSubmit" >Send message</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

{{-- Cadastrar empresa --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.empresa.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.empresa.form')

                    <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                        <button  class="btn  btn-primary" id="ajaxSubmit" >Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Editar empresa --}}
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

@if (session('eliminada'))
    <script>
        Swal.fire(
            'Empresa Eliminado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('editada'))
<script>
    Swal.fire(
        'Empresa editado com sucesso!',
        '',
        'success'
    )
</script>
@endif
@if (session('editada_f'))
<script>
Swal.fire(
    'ERro ao editar Empresa!',
    '',
    'error'
)
</script>
@endif

@if (session('status'))
<script>
    Swal.fire(
        'Empresa cadastrada Com Sucesso!',
        '',
        'success'
    )
</script>
@endif
@if (session('status_f'))
<script>
Swal.fire(
    'Erro ao cadastrar Empresa!',
    '',
    'error'
)
</script>
@endif

@endsection

