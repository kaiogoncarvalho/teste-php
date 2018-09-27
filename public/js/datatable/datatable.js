$(document).ready( function () {

    function filterColumn ( i ) {
        $('#example').DataTable().column( i ).search(
            $('#col'+i+'_filter option:selected').val()
        ).draw();
    }

    var table = $('#example').DataTable({

        "pageLength": 10,
        "processing": true,
        "serverSide": true,
        "ajax": "activities",
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
                "data": "name",
                "name" : "name"
            },
            {
                "data": "description",
                "name" : "description"
            },
            {
                "data": "start_date",
                "name" : "start_date"
            },
            {
                "data": "end_date",
                "name" : "end_date"
            },
            {
                "data": "status.name",
                "name" : "status_id"
            },
            {
                "data": "situation_name",
                "name" : "situation"
            }
        ],
        "rowCallback": function ( row, data ) {
            if ( data.status_id == "4" ){ $('td', row).css('background-color', '#5cb85c');}
        },
        select: true,
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>',
                className: 'btn btn-success',
                action: function ( e, dt, node, config ) {
                    window.location.href = "create";
                }
            },
            {
                text: '<span class="glyphicon glyphicon-pencil aria-hidden="true"></span>',
                className: 'btn btn-default',
                action: function ( e, dt, node, config ) {
                    var linha = table.rows( { selected: true } )[0][0];
                    var data = table.row(linha).data();
                    if(linha != undefined) {
                        window.location.href = "edit/" + data.id;
                    }
                    else{
                        $.alert({
                            title: 'Escolha uma atividade!',
                            content: 'Nenhuma Atividade foi escolhida!',
                        });
                    }
                }
            },
            {
                text: '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                className: 'btn btn-danger',
                action: function ( e, dt, node, config ) {
                    var linha = table.rows( { selected: true } )[0][0];
                    var data = table.row(linha).data();
                    if(linha != undefined) {
                        $.confirm({
                            title: 'Exclusão de Atividade',
                            content: 'Realmente deseja excluir esta atividade?',
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                confirmar: function () {
                                    window.location.href = "delete/"+data.id;
                                },
                                cancelar: function () {

                                },
                            }
                        });
                    }
                    else{
                        $.alert({
                            title: 'Escolha uma atividade!',
                            content: 'Nenhuma Atividade foi escolhida!',
                        });
                    }


                }
            }
        ],
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    });


    $('select.column_filter').on( 'change', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    } );
});
