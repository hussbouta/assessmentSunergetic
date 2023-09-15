let url = "http://localhost:8000/api/v1/customers/";


//define formatter outside of the table
let btnDelete = function(cell, formatterParams, onRendered){
    return "<i class='text-danger fa-solid fa-trash-can'></i>"
};

let btnEdit = function(cell, formatterParams, onRendered){
    return "<i class='text-primary fa-regular fa-floppy-disk'></i>"
};

let table = new Tabulator("#cpanel", { 
    ajaxURL: url,  
    ajaxResponse:function(url, params, response){
        return response.data; 
     },
    layout:"fitColumns",
    paginationSize:10,
    pagination:true,
    footerElement:"<button id='btnAddCustomer' class='btn btn-success'>Add customer</button>",
    columns:[
        {
            title:"Firstname", field:"firstname", editor:"textarea", maxWidth:300
        },
        {
            title:"Lastname", field:"lastname", editor:"textarea", maxWidth:300
        },
        {
            title:"Email", field:"email", editor:"textarea", maxWidth:300
        },
        {
            title:"Address", field:"address", editor:"textarea", maxWidth:300
        },
        {
            title:"Zipcode", field:"zipcode", editor:"textarea", maxWidth:300
        },
        {
            title:"City", field:"city", editor:"textarea", maxWidth:300
        },

        {
            title:"Phone", field:"phone", editor:"textarea", maxWidth:300
        },
        {
            title:"Delete", formatter:btnDelete, headerHozAlign:"center", hozAlign:"center", maxWidth:120,
                cellClick:function(e, cell){

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `Delete customer ${cell.getData().firstname}`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                        if (result.isConfirmed) {

                            let id = cell.getData().id;
                            let response = $.ajax({
                                url: url+id,
                                type: 'DELETE',
                                });
                            
                            table.replaceData();

                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                                )
                        }
                      })
            }
        },
        {
            title:"Update", formatter:btnEdit, headerHozAlign:"center", hozAlign:"center",maxWidth:120,
                cellClick: async function(e, cell){
               
                    let id = cell.getData().id;
                    let message;
                    $.ajax({
                        url: url+id,
                        type: 'PUT',
                        dataType: 'json',
                        data: cell.getData(),
                        success: function (data) {
                            
                            message = data.message;
                            Swal.fire({
                                position: 'top-end',
                                icon: 'info',
                                title: message,
                                showConfirmButton: false,
                                timer: 2000
                              })
                        }
                    });

                    setTimeout(() => {
                        location.reload()
                      }, "2000");                    
            },
        }
    ],
 });

 table.on("tableBuilt", function(){

    let btnAddCustomer = document.getElementById("btnAddCustomer");
    btnAddCustomer.addEventListener("click", function() {
        table.addRow({});
    });

 });







