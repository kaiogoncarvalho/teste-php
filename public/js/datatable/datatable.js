$(document).ready(function () {

    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
            '<td>Descrição:</td>'+
            '<td>'+d.description+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>Criado em:</td>'+
            '<td>'+d.created_at+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>Atualizado em:</td>'+
            '<td>'+d.updated_at+'</td>'+
            '</tr>'+
            '</table>';
    }

    function filterColumn(i) {
        $('#example').DataTable().column(i).search(
            $('#col' + i + '_filter option:selected').val()
        ).draw();
    }

    var table = $('#example').DataTable({

        "pageLength": 10,
        "processing": true,
        "serverSide": true,
        "ajax": "products/datatable",
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json",
            select: {
                rows: {
                    _: "Você selecionou %d linhas",
                    0: "",
                    1: "Você selecionou 1 linha"
                }
            }
        },
        "columns": [
            {
                "orderable":      false,
                "data":           null,
                "defaultContent": ""
            },
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": '<button type="button" class="btn btn-default" value=""><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Detalhes</button>'
            },
            {
              "data" : "id",
              "name" : "id"
            },
            {
                "data": "name",
                "name": "name"
            },
            {
                "data": "quantity",
                "name": "quantity"
            },
            {
                "data": "price",
                "name": "price"
            },
            {
                "name": 'action',
                "data": null
            }
        ],
        "rowCallback": function (row, data) {
            if (data.quantity <= 3) {
                $('td', row).css('background-color', '#f5c6cb');
            }
        },
        select: true,
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Criar',
                className: 'btn btn-success',
                action: function (e, dt, node, config) {
                    window.location.href = "product";
                }
            },
            {
                text: '<span class="glyphicon glyphicon-pencil aria-hidden="true"></span> Editar',
                className: 'btn btn-default',
                action: function (e, dt, node, config) {
                    var linha = table.rows({selected: true})[0][0];
                    var data = table.row(linha).data();
                    if (linha != undefined) {
                        window.location.href = "product/" + data.id;
                    }
                    else {
                        $.alert({
                            title: 'Escolha um Produto!',
                            content: 'Nenhum Produto foi escolhido!',
                        });
                    }
                }
            },
            {
                text: '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Deletar',
                className: 'btn btn-danger',
                action: function (e, dt, node, config) {
                    var linha = table.rows({selected: true})[0][0];
                    var data = table.row(linha).data();
                    if (linha != undefined) {
                        $.confirm({
                            title: 'Exclusão de Produto',
                            content: 'Realmente deseja excluir esta produto?',
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                confirmar: function () {
                                    window.location.href = "product/delete/" + data.id;
                                },
                                cancelar: function () {

                                },
                            }
                        });
                    }
                    else {
                        $.alert({
                            title: 'Escolha um Produto!',
                            content: 'Nenhuma Produto foi escolhido!',
                        });
                    }


                }
            }
        ],
        columnDefs: [
            {
                orderable: false,
                className: 'select-checkbox',
                targets:   0
            },
            {
                orderable: false,
                "targets": -1,
                "data": null,
                "render": function ( data, type, row ) {
                    var dropdown =  "<div class='btn-group'>"
                        + "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Ações <span class='caret'></span></button>"
                        +  "<ul class='dropdown-menu'>"
                        + "<li><a href='stock?product="+row.id+"&quantity=1'>Aumentar Estoque </a></li>"
                        + "<li><a href='stock?product="+row.id+"&quantity=-1'>Diminuir Estoque</a></li>"
                        + "</ul>"
                        + "</div>";
                    return dropdown;
                },

    }
],
    select: {
        style:    'os',
            selector
    :
        'td:first-child'
    }
,
    order: [[2, 'asc'], [4, 'asc']]
});


    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

});
