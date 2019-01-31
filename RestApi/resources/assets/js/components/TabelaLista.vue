<template>
    <div>
        <div class='form-inline'>
            <a v-if='criar' v-bind:href='criar'>Criar</a>

            <div class='form-group pull-right'>
                <input type='search' class='form-control' placeholder='Buscar' v-model='buscar'>
                {{buscar}}
            </div>
        </div>

        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th style='cursor:pointer;' v-on:click='ordenaColuna(index)' v-for='(titulo, index) in titulos'>{{titulo}}</th>
                    <th v-id='detalhe || editar || deletar'>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for='(item, index) in lista'>
                    <td v-for='i in item'>{{i}}</td>
                    <td v-id='detalhe || editar || deletar'>
                        <form v-bind:id='index' v-if='deletar && token' v-bind:action='deletar' method=post>
                            <input type='hidden' name='_method' value='DELETE'>
                            <input type='hidden' name='_token' v-bind:value='token'>

                            <a v-if="detalhe" v-bind:href='detalhe'>Detalhe |</a>
                            <a v-if="editar" v-bind:href='editar'>Editar |</a>
                            <a v-on:click="executaForm(index)" v-bind:href='deletar'>Deletar</a>
                        </form>

                        <span v-if='!token'>
                            <a v-if="detalhe" v-bind:href='detalhe'>Detalhe |</a>
                            <a v-if="editar" v-bind:href='editar'>Editar |</a>
                            <a v-on:click="executaForm(index)">Deletar</a>
                        </span>

                        <span v-if='token && !deletar'>
                            <a v-if="detalhe" v-bind:href='detalhe'>Detalhe |</a>
                            <a v-if="editar" v-bind:href='editar'>Editar</a>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:[
            'titulos',
            'items',
            'ordem',
            'ordemCol',
            'criar',
            'detalhe',
            'editar',
            'deletar',
            'token'
        ],
        data:function(){
            return {
                buscar:''
            }
        },
        methods:{
            executaForm:function(index){
                document.getElementById(index).submit();
            },
            ordenaColuna:function(coluna){
                this.ordemCol = coluna;

                if(this.ordem.toLowerCase() == 'asc')
                    this.ordem = 'desc';
                else
                    this.ordem = 'asc';
            }
        },
        computed:{
            lista:function(){
                let ordem = this.ordem || "asc";
                let ordemCol = this.ordemCol || 0;

                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == 'asc')
                {
                    this.items.sort(function(a,b){
                        if(a[ordemCol] > b[ordemCol])
                            return 1;
                        else if(a[ordemCol] < b[ordemCol])
                            return -1;
                        else
                            return 0;
                    });
                }
                else
                {
                    this.items.sort(function(a,b){
                        if(a[ordemCol] < b[ordemCol])
                            return 1;
                        else if(a[ordemCol] > b[ordemCol])
                            return -1;
                        else
                            return 0;
                    });
                }

                

                /*return this.items.filter(res => {
                    for(let k=0; k<res.length; k++) {
                        if((res[k]+'').toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0 ){
                            return true;
                        }
                    }
                    
                    return false;
                });

                return true;*/
                return this.items;
            }
        }
    }
</script>
