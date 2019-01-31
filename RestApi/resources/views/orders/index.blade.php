@extends('layouts.app')

@section('content')
    <pagina tamanho='12'>
        <painel titulo='Orders List'>
            {{--<tabela-lista 
                v-bind:titulos="['#', 'Store Name', 'Order Total', 'Date', 'Products']"
                v-bind:items="{{ $orders }}"
                ordem='desc'
                ordemCol=1
                criar='#criar'
                detalhe='#detalhe'
                editar='#editar'
                deletar='#deletar'
                token='12456897452'
            ></tabela-lista>--}}

            <h1 class='text-center'>Order History</h1>

            <div class='row'>
                <div class='col-md-8 col-md-offset-2'>
                    <form id='searchOrdersForm' method='post'>
                        <div class='form-group'>
                            <input type='search' name='search' id='search' placeholder='Search' class='form-control'>
                        </div>
                        
                        <div class='text-center'>
                            <div class='form-group'>
                                <submit class='btn btn-primary' id='submitSearchOrdersForm'>
                                    <i class="fas fa-search"></i>
                                </submit>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-hovered table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Store Name</th>
                        <th>Order Total</th>
                        <th>Date</th>
                        <th>Products</th>
                    </tr>
                </thead>
                <tbody id='tableBody'>
                    @include('orders._list')
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

@section('scripts')
    <script src="{{ asset('js/searchOrders.js') }}"></script>
@endsection