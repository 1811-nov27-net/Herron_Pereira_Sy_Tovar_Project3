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
                                    <i class="fas fa-search fa-lg"></i>
                                </submit>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <form id='sendMailForm' action='{{route('site.orders.send')}}' method='post'>
                @csrf
                <div class='row margin text-center'>
                    <submit class='btn btn-success' id='btn_sendInvoices'>
                        <i class="far fa-envelope fa-lg"></i> &nbsp;
                        Send Invoices
                    </submit>
                </div>

                <div class="form-group {{ $errors->has('orders') ? 'has-error' :'' }}">
                    {!! $errors->first('orders','<span class="help-block">:message</span>') !!}
                </div>
                
                @include('layouts._errors');

                <table class="table table-hovered table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><input type='checkbox' id='selectAllInvoices'></th>
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
            </form>
        </painel>
    </pagina>
@endsection

@section('scripts')
    <script src="{{ asset('js/orders.js') }}"></script>
@endsection