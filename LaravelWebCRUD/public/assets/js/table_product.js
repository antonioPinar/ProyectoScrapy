$(document).ready(function() {
    listaProductos();

    $('#list_products').on('click', '.btndelete', function() {
        var id = $(this).data('id');

        swal({
            title: "¿Eliminar Producto?",
            text: "¿Está seguro? Este producto se eliminará",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
            closeOnCancel: true,
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                deleteProduct(id);
            }
        });
    });

    $('#list_products').on('click', '.btnedit', function() {

        var id = $(this).data('id');
        getProduct(id);
    });
});

function listaProductos() {
    $("#list_products").KTDatatable("destroy");
    $("#list_products").KTDatatable("init");
    $("#list_products").KTDatatable({
        data: {
            type: "remote",
            source: {
                read: {
                    url: url_list_productos,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }
            },
            pageSize: 10,
            serverPaging: !0,
            serverFiltering: !0,
            serverSorting: !0
        },
        layout: {
            scroll: true,
            customScrollbar: true,
            scrollX: true,
            footer: !1,
            spinner: {
                color: '#FFF'
            }
        },
        sortable: !0,
        pagination: !0,
        search: {
            input: $("#search_products"),
            key: "search_products"
        },
        translate: {
            records: {
                processing: 'Cargando...',
                noRecords: 'Sin resultados'
            },
            toolbar: {
                pagination: {
                    items: {
                        info: 'Mostrando {{start}} - {{end}} de {{total}} resultados'
                    }
                }
            }
        },
        rows: {
            autoHide: false,
        },
        columns: [{
                field: "id",
                title: "ID",
                sortable: !1,
                textAlign: "center"
            },
            {
                field: "titulo",
                title: "Producto",
                sortable: !1,
                textAlign: "center",

            },
            {
                field: "precio",
                title: "Precio",
                sortable: !1,
                textAlign: "center",
            },
            {
                field: "cantidad",
                title: "Cantidad",
                sortable: !1,
                textAlign: "center",
            },
            {
                field: "img",
                title: 'Imagen',
                textAlign: "center",
                sortable: !1,
                autoHide: false,
                template: function(row, data, index) {
                    return '<img src="' + url_upload_img + '/' + row.img + '" width="50px" height="auto">';
                },
            },
            {
                field: "#",
                title: "Acciones",
                sortable: !1,
                textAlign: "center",
                template: function(row, data, index) {
                    return '<div><button type="button" class="btn p-0 mx-2 btnedit" data-id="' + row.id + '"><img class="icon-edit" src="' + url_img + '/accion-editar-gris.svg" height="30px" width="auto"></button><button type="button" class="btn p-0 mx-2 btndelete" data-id="' + row.id + '"><img class="icon-delete" src="' + url_img + '/accion-borrar-gris.svg" height="30px" width="auto"></button></div>';
                }
            },
        ],
    });
}

function deleteProduct(id) {
    var url = url_delete_product + "/" + id;

    $.ajax({
        data: '',
        url: url,
        dataType: 'json',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.code == 1000) {
                $("#list_products").KTDatatable("reload");
                swal("", "Producto/s eliminados con éxito", "success");
            } else {
                swal("", "Parece que ha habido un error, inténtalo de nuevo más tarde", "error");
            }
        },
        error: function(xhr, status, errorThrown) {
            //Here the status code can be retrieved like;
            xhr.status;

            //The message added to Response object in Controller can be retrieved as following.
            xhr.responseText;
        }
    });
}

function getProduct(id) {
    var url = url_get_product + "/" + id;

    $.ajax({
        data: '',
        url: url,
        dataType: 'json',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.code == 1000) {
                var producto = response.producto;
                //para quitar el autorrelleno
                $('#ide').val(producto.id);
                $('#tituloe').val(producto.titulo);
                $('#descriptione').val(producto.description);

                $('#editProducto').modal('show'); //si no aparece al pulsar el bt es q no tenemos bn metido el html
            } else {
                swal("", "Parece que ha habido un error, inténtalo de nuevo más tarde", "error");
            }
        },
        error: function(xhr, status, errorThrown) {
            //Here the status code can be retrieved like;
            xhr.status;

            //The message added to Response object in Controller can be retrieved as following.
            xhr.responseText;
        }
    });
}